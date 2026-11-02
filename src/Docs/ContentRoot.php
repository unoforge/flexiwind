<?php

namespace Flexiwind\Docs;

final class ContentRoot
{
    public function __construct(
        public readonly string $name,
        public readonly string $path,
        public readonly ?string $editUrl = null,
        public readonly int $priority = 0,
    ) {}
}
