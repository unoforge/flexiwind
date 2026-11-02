<?php

namespace Flexiwind\Docs;

/**
 * Parseur de front matter volontairement minimal : scalaires, booléens,
 * nombres et listes inline `[a, b]`. Pas de dépendance YAML, et surtout
 * aucune ambiguïté possible pour un contributeur externe.
 */
final class FrontMatter
{
    /** @return array{0: array<string, mixed>, 1: string} */
    public static function parse(string $raw): array
    {
        $raw = str_replace("\r\n", "\n", $raw);

        if (! preg_match('/\A---\n(.*?)\n---\n?(.*)\z/s', $raw, $matches)) {
            return [[], $raw];
        }

        $data = [];

        foreach (explode("\n", $matches[1]) as $line) {
            if (trim($line) === '' || str_starts_with(trim($line), '#')) {
                continue;
            }

            if (! preg_match('/^([A-Za-z0-9_-]+)\s*:\s*(.*)$/', $line, $pair)) {
                continue;
            }

            $data[$pair[1]] = self::value(trim($pair[2]));
        }

        return [$data, $matches[2]];
    }

    private static function value(string $value): mixed
    {
        if ($value === '') {
            return '';
        }

        if (str_starts_with($value, '[') && str_ends_with($value, ']')) {
            $inner = trim(substr($value, 1, -1));

            return $inner === '' ? [] : array_map(
                static fn (string $item): mixed => self::value(trim($item)),
                explode(',', $inner)
            );
        }

        if (preg_match('/^"(.*)"$/s', $value, $m) || preg_match("/^'(.*)'$/s", $value, $m)) {
            return $m[1];
        }

        return match (strtolower($value)) {
            'true' => true,
            'false' => false,
            'null' => null,
            default => is_numeric($value) ? $value + 0 : $value,
        };
    }
}
