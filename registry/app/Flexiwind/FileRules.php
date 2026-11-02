<?php

declare(strict_types=1);

namespace App\Flexiwind;

/**
 * Les règles d'un <x-ui.file-trigger> ou d'un <x-ui.dropzone>, telles que
 * le navigateur les vérifie avant l'envoi. Elles aident la saisie : la
 * validation Livewire (`mimes`, `max`) reste celle qui décide.
 */
class FileRules
{
    /** @var array<string, string> */
    public const TEXTS = [
        'type' => 'This type of file is not accepted.',
        'size' => 'Over :max, not uploaded.',
        'count' => 'Only :max files at a time.',
        'uploading' => ':size · :progress%',
        'done' => ':size · Uploaded',
        'error' => ':size · Upload failed',
        'ready' => ':size',
    ];

    /**
     * @param  array<string, string>  $texts
     * @return array{accept: list<string>, maxBytes: ?int, maxLabel: ?string, maxFiles: ?int, multiple: bool, model: ?string, texts: array<string, string>}
     */
    public static function config(?string $accept, int|string|null $maxSize, int|string|null $maxFiles, bool $multiple, ?string $model, string $removeLabel, array $texts = []): array
    {
        $maxBytes = self::bytes($maxSize);

        return [
            'accept' => self::accept($accept),
            'maxBytes' => $maxBytes,
            'maxLabel' => $maxBytes === null ? null : self::human($maxBytes),
            'maxFiles' => $maxFiles === null || $maxFiles === '' ? null : max(1, (int) $maxFiles),
            'multiple' => $multiple,
            'model' => $model ?: null,
            'texts' => ['remove' => $removeLabel] + array_map('strval', $texts) + self::TEXTS,
        ];
    }

    /**
     * `accept` découpé : extensions (`.pdf`) et types (`image/*`, `application/pdf`).
     *
     * @return list<string>
     */
    public static function accept(?string $accept): array
    {
        if ($accept === null || trim($accept) === '') {
            return [];
        }

        return array_values(array_filter(array_map(
            fn (string $item): string => strtolower(trim($item)),
            explode(',', $accept),
        )));
    }

    /**
     * Une taille en octets : un entier est en kilo-octets, comme la règle `max`
     * de Laravel ; une chaîne porte son unité (`500KB`, `10MB`, `1.5 GB`).
     */
    public static function bytes(int|string|null $size): ?int
    {
        if ($size === null || $size === '') {
            return null;
        }

        if (is_int($size) || ctype_digit($size)) {
            return (int) $size * 1024;
        }

        if (! preg_match('/^\s*(\d+(?:\.\d+)?)\s*(B|KB|MB|GB)\s*$/i', $size, $match)) {
            return null;
        }

        $units = ['B' => 1, 'KB' => 1024, 'MB' => 1024 ** 2, 'GB' => 1024 ** 3];

        return (int) round((float) $match[1] * $units[strtoupper($match[2])]);
    }

    public static function human(int $bytes): string
    {
        foreach (['GB' => 1024 ** 3, 'MB' => 1024 ** 2, 'KB' => 1024] as $unit => $size) {
            if ($bytes >= $size) {
                $value = round($bytes / $size, $bytes / $size < 10 ? 1 : 0);

                return ($value == (int) $value ? (string) (int) $value : (string) $value).' '.$unit;
            }
        }

        return $bytes.' B';
    }
}
