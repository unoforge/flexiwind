<?php

declare(strict_types=1);

namespace App\Flexiwind;

use BackedEnum;
use Illuminate\Contracts\Support\Arrayable;
use UnitEnum;

/**
 * Les options d'un listbox ou d'un autocomplete, quelle que soit leur forme.
 *
 * Accepte une liste de valeurs (`['Paris', 'Lyon']`), un tableau associatif
 * valeur => libellé (`['fr' => 'France']`), une liste de lignes (tableaux,
 * objets, modèles Eloquent) ou une Collection. Les clés à lire sont
 * configurables : `option-label="name"`, `option-value="id"`.
 */
class OptionList
{
    /**
     * @param  iterable<mixed>|Arrayable<array-key, mixed>|null  $options
     * @param  array{value?: string, label?: string, description?: string, icon?: string, avatar?: string, disabled?: string, group?: string}  $keys
     * @return list<array{value: string, label: string, description: ?string, icon: ?string, avatar: ?string, disabled: bool, group: ?string}>
     */
    public static function normalize(iterable|Arrayable|null $options, array $keys = []): array
    {
        if ($options === null) {
            return [];
        }

        $keys += ['value' => 'value', 'label' => 'label', 'description' => 'description', 'icon' => 'icon', 'avatar' => 'avatar', 'disabled' => 'disabled', 'group' => 'group'];
        $items = $options instanceof Arrayable ? $options->toArray() : $options;
        $isList = is_array($items) && array_is_list($items);
        $normalized = [];

        foreach ($items as $key => $option) {
            if ($option instanceof UnitEnum) {
                $normalized[] = self::option(
                    $option instanceof BackedEnum ? (string) $option->value : $option->name,
                    method_exists($option, 'label') ? (string) $option->label() : $option->name,
                );

                continue;
            }

            // Une valeur seule : dans une liste, elle est aussi son libellé ;
            // dans un tableau associatif, la clé est la valeur.
            if (is_scalar($option) || $option === null) {
                $normalized[] = self::option($isList ? (string) $option : (string) $key, (string) $option);

                continue;
            }

            $value = data_get($option, $keys['value']);
            $label = data_get($option, $keys['label']);

            if ($value === null && $label === null) {
                continue;
            }

            $normalized[] = self::option(
                (string) ($value ?? $label),
                (string) ($label ?? $value),
                self::text(data_get($option, $keys['description'])),
                self::text(data_get($option, $keys['icon'])),
                self::text(data_get($option, $keys['avatar'])),
                (bool) data_get($option, $keys['disabled'], false),
                self::text(data_get($option, $keys['group'])),
            );
        }

        return $normalized;
    }

    /**
     * Les options rangées par groupe, dans l'ordre d'apparition des groupes.
     * Les options sans groupe forment un premier bloc sans titre.
     *
     * @param  list<array{value: string, label: string, description: ?string, icon: ?string, avatar: ?string, disabled: bool, group: ?string}>  $options
     * @return list<array{label: ?string, options: list<array{value: string, label: string, description: ?string, icon: ?string, avatar: ?string, disabled: bool, group: ?string}>}>
     */
    public static function groups(array $options): array
    {
        $groups = [];

        foreach ($options as $option) {
            $groups[$option['group'] ?? ''][] = $option;
        }

        return array_map(
            fn (string|int $label, array $items): array => ['label' => $label === '' ? null : (string) $label, 'options' => $items],
            array_keys($groups),
            array_values($groups),
        );
    }

    /**
     * La valeur de départ, en chaînes : ce que le navigateur compare.
     *
     * @return list<string>
     */
    public static function selected(mixed $value): array
    {
        if ($value instanceof Arrayable) {
            $value = $value->toArray();
        }

        $values = is_array($value) ? $value : [$value];

        return array_values(array_map(
            fn (mixed $item): string => $item instanceof BackedEnum ? (string) $item->value : (string) $item,
            array_filter($values, fn (mixed $item): bool => $item !== null && $item !== '' && (is_scalar($item) || $item instanceof BackedEnum)),
        ));
    }

    /**
     * @return array{value: string, label: string, description: ?string, icon: ?string, avatar: ?string, disabled: bool, group: ?string}
     */
    private static function option(string $value, string $label, ?string $description = null, ?string $icon = null, ?string $avatar = null, bool $disabled = false, ?string $group = null): array
    {
        return compact('value', 'label', 'description', 'icon', 'avatar', 'disabled', 'group');
    }

    private static function text(mixed $value): ?string
    {
        return is_scalar($value) && (string) $value !== '' ? (string) $value : null;
    }
}
