---
title: "AI Skills"
group: "Getting Started"
order: 40
tier: "free"
description: "AI-assistant skills that help Cursor, Cline, Windsurf, and other AI tools generate accurate Flexiwind code."
seoDescription: "Install and use Flexiwind AI Skills to help your AI assistant generate accurate components, blocks, and theme code for your Laravel project."
keywords: "AI Skills, Cursor, Cline, Windsurf, Boost, MCP, AI Assistant, Installation"
---

Flexiwind AI Skills are a collection of markdown guides designed to help AI assistants (Cursor, Cline, Windsurf, GitHub Copilot, and any LLM) generate accurate Flexiwind code — correct component names, props, install commands, and composition patterns.

## Installation

### Via Laravel Boost

If your Laravel project uses Laravel Boost, install the skill directly into any project:

```bash
php artisan boost:add-skill unoforge/flexiwind --skill flexiwind
```

### Via npx / Skills CLI

To use the skill in any AI tool:

```bash
npx skills add unoforge/flexiwind --skill flexiwind
```

## What's Included

The Flexiwind skill package contains:

- **SKILL.md** — Main entry point: component map, blocks catalog, theme tokens, CLI reference, composition patterns, and answering guidelines.
- **Components (40+)** — One file per component (button, input, modal, card, table, etc.), each with demo code, install command, props, styling, guidance, and common mistakes to avoid.
- **References:** best-practices.md, things-to-avoid.md, styling-principles.md, theme.md, colors.md, button-utilities.md, components.md, composables.md, accessibility.md, performance.md.

## Using with AI Tools

### Cursor

Add the `skills/flexiwind/` directory to your Cursor project context, or reference it in your Cursor rules file. The AI will use the component reference and best-practices files to generate correct code.

### Cline / Roo Code

These tools automatically detect skills installed via `npx skills add`. No additional configuration needed.

### GitHub Copilot / ChatGPT / Claude

Paste the relevant component file or reference as context when asking for Flexiwind code. The accurate, friction-based examples in each skill file help prevent hallucinated APIs.

## Quick Start for AI

When asking an AI assistant to write Flexiwind code, include this instruction:

```bash
Use the Flexiwind skill files in skills/flexiwind/ for accurate component names, install commands, and prop references. Never invent x-ui.* components or props.
```

## Source

The Flexiwind skills repository is open source. Contributions, bug reports, and feature requests are welcome:

[github.com/unoforge/flexiwind -- skills/flexiwind/](https://github.com/unoforge/flexiwind/tree/main/skills/flexiwind)
