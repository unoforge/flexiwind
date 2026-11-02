---
title: "Alert Dialog"
group: "Overlays & Disclosure"
order: 20
tier: "free"
description: "Confirmation dialog pattern for destructive or high-impact actions using modal behavior."
seoDescription: "Create interactive alert dialogs using Flexiwind's modal dialog component."
keywords: "confirmation, alert dialog, warning modal"
---

## Demo

::preview{example="alert-dialog/demo"}

## Installation

Alert dialog relies on the modal system. Install and review modal usage first on the [modal documentation page](/components/modal).

## API

| Prop | Description |
| --- | --- |
| `x-ui.modal` and subcomponents | Alert dialog is implemented on top of modal primitives and behavior. |
| `x-ui.modal.trigger` | Element that opens the confirmation dialog. |
| `x-ui.modal.content` | Dialog surface with layout, sizing, and close behavior options. |
| `x-ui.modal.header\|title\|description\|footer` | Structured slots for clear confirmation copy and actions. |
