<?php

namespace App\Support;

use DOMDocument;
use DOMElement;
use DOMXPath;
use Illuminate\Support\Str;
use Exception;

class HeadingExtractor
{
    /**
     * Extract headings from HTML to create a table of contents.
     *
     * @param string $html The input HTML string
     * @param string[] $headingLevels Array of heading tags to extract (e.g., ['h2', 'h3'])
     * @param string|null $containerQuery Optional XPath query for container
     * @return array Array of grouped headings
     * @throws Exception If HTML parsing fails
     */
    public static function extractFromHtml(
        string $html,
        array $headingLevels = ['h2', 'h3'],
        ?string $containerQuery = null
    ): array {
        // Initialize DOMDocument
        $dom = new DOMDocument();
        libxml_use_internal_errors(true); // Suppress warnings, capture errors
        if (!$dom->loadHTML('<?xml encoding="utf-8" ?>' . $html)) {
            libxml_clear_errors();
            throw new Exception('Failed to parse HTML');
        }
        libxml_use_internal_errors(false);

        $xpath = new DOMXPath($dom);

        // Build XPath query for specified heading levels
        $query = $containerQuery
            ? sprintf('%s//%s', $containerQuery, implode(' | ', $headingLevels))
            : '//' . implode(' | //', $headingLevels);

        $headings = $xpath->query($query);
        $groupedHeadings = [];
        $currentGroup = null;
        $usedSlugs = []; // Track slugs to ensure uniqueness

        foreach ($headings as $heading) {
            /** @var DOMElement $heading */
            $text = trim($heading->textContent);
            if (!$text || !$heading->getAttribute('id') && !$text) {
                continue; // Skip empty headings or those without id/text
            }

            $slug = $heading->getAttribute('id') ?: Str::slug($text);
            // Ensure unique slugs
            $baseSlug = $slug;
            $suffix = 1;
            while (isset($usedSlugs[$slug])) {
                $slug = $baseSlug . '-' . $suffix++;
            }
            $usedSlugs[$slug] = true;

            $headingObj = (object) [
                'text' => $text,
                'slug' => $slug,
                'level' => strtolower($heading->tagName), // Include level for flexibility
            ];

            if ($heading->tagName === $headingLevels[0]) {
                // Start new group for top-level heading
                $currentGroup = [
                    'heading' => $headingObj,
                    'subheadings' => []
                ];
                $groupedHeadings[] = $currentGroup;
            } elseif ($currentGroup !== null) {
                // Add to current group's subheadings
                $currentGroup['subheadings'][] = $headingObj;
                $groupedHeadings[array_key_last($groupedHeadings)] = $currentGroup;
            }
        }

        return $groupedHeadings;
    }
}