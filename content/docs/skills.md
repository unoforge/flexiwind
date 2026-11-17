---
title: "AI Skills"
group: "Getting Started"
order: 40
tier: "free"
description: "AI-assistant skills that help Cursor, Cline, Windsurf, and other AI tools generate accurate Flexiwind code."
seoDescription: "Install and use Flexiwind AI Skills to help your AI assistant generate accurate components, blocks, and theme code for your Laravel project."
keywords: "AI Skills, Cursor, Cline, Windsurf, Boost, MCP, AI Assistant, Installation"
---

Flexiwind AI Skills are markdown guides that help AI assistants (Cursor, Cline, Windsurf, GitHub Copilot, Claude Code, and other LLM tools) generate accurate Flexiwind code — correct component names, props, install commands, and composition patterns.

Once installed, the skill is discovered by name (`flexiwind`). You do not need to point the model at a project-root `skills/` folder.

## Installation

### Via Laravel Boost

If your Laravel project uses Laravel Boost:

```bash
php artisan boost:add-skill unoforge/flexiwind --skill flexiwind
```

### Via npx / Skills CLI

Works with Cursor, Claude Code, Cline, Codex, and other supported agents:

```bash
# Project install (shared with the repo)
npx skills add unoforge/flexiwind --skill flexiwind

# Global install (available on this machine across projects)
npx skills add unoforge/flexiwind --skill flexiwind -g
```

Optional flags:

```bash
# Target a specific agent (example: Cursor only)
npx skills add unoforge/flexiwind --skill flexiwind -a cursor -y

# List skills in the package without installing
npx skills add unoforge/flexiwind --list
```

## Where the skill lands

Install tools never put skills at the project root as `skills/flexiwind/`. That path exists only in the Flexiwind **source repository** (authoring / packaging).

After install, the skill typically lives under an agent skills directory:

| Scope | Typical locations |
| --- | --- |
| **Project** | `.agents/skills/flexiwind/`, sometimes `.cursor/skills/flexiwind/`, `.claude/skills/flexiwind/`, … |
| **Global** (`-g`) | `~/.agents/skills/flexiwind/`, `~/.cursor/skills/flexiwind/`, `~/.claude/skills/flexiwind/`, … |

Exact folders depend on the agent(s) you selected. The Skills CLI and Boost place (or symlink) the skill into each agent’s expected path.

Confirm with:

```bash
npx skills list
```

## What's Included

The Flexiwind skill package contains:

- **SKILL.md** — Main entry point: component map, blocks catalog, theme tokens, CLI reference, composition patterns, and answering guidelines.
- **Components** — Per-component guides (button, input, modal, card, table, etc.) with demo code, install command, props, styling, guidance, and common mistakes.
- **References** — best-practices, things-to-avoid, styling-principles, theme, colors, button-utilities, components, composables, accessibility, performance, interactions.

## Using with AI Tools

### Cursor / Claude Code / Cline / Codex

After a project or global install, open a **new** agent chat. The skill should appear by name (`flexiwind`) in the agent’s skills list. No manual “add this folder to context” step is required for tools that load Agent Skills automatically.

### GitHub Copilot / ChatGPT / Claude (no skill loader)

If the tool does not auto-load skills, paste the relevant component or reference markdown from the installed skill folder (or from the [source on GitHub](https://github.com/unoforge/flexiwind/tree/main/skills/flexiwind)) into the conversation when you need accurate Flexiwind APIs.

## Prompting the assistant

You do not need a filesystem path. Prefer the skill name:

```text
Use the Flexiwind skill for accurate component names, install commands, and prop references. Never invent x-ui.* components or props.
```

If the tool cannot auto-load skills, attach or `@`-mention the installed `flexiwind` skill / `SKILL.md` from your agent skills directory (see [Where the skill lands](#where-the-skill-lands)).

## Source

The skill is authored in the Flexiwind repo (packaging source — not an install path):

[github.com/unoforge/flexiwind/tree/main/skills/flexiwind](https://github.com/unoforge/flexiwind/tree/main/skills/flexiwind)

## Next: ship a whole app

Once the skill is installed, the free components get you far. When you need a
complete client-ready surface — invoicing, sales CRM, advanced blocks — open
[Templates](/templates) or [Pricing](/pricing). Pro includes every template and
the `@fx/` registry your agent can install the same way.
