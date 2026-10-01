---
title: "Assign people with a search"
group: "Recipes"
order: 40
tier: "pro"
state: "new"
description: "Search thousands of people on the server as you type, pick several, keep their names on the chips."
seoDescription: "Assign users with a Livewire server-side search: Flexiwind autocomplete, multiple values, Eloquent whereLike, validation."
keywords: "livewire autocomplete, server side search, assign users, multiselect search laravel, tags input livewire"
---

## The result

Type part of a name or a team (`eng`, `jo`), pick a few people, then **Assign**. Diane is already assigned.

:::raw
<x-docs.preview-ui>
    <livewire:cookbook-assign-search />
</x-docs.preview-ui>
:::

## When to search on the server

A [listbox](/components/listbox) loads every option in the page: fine for a team of twenty, not for a company of five thousand. Here the page holds only the people picked; the server answers each search with six results at most.

## The component

```blade title="resources/views/components/⚡assign-reviewers.blade.php"
<?php

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;

new class extends Component
{
    #[Locked]
    public int $taskId;

    public string $query = '';

    /** @var list<int> */
    public array $reviewers = [];

    public function mount(Task $task): void
    {
        $this->authorize('update', $task);

        $this->taskId = $task->id;
        $this->reviewers = $task->reviewers()->pluck('users.id')->all();
    }

    /** What people typed, searched among the team only. */
    #[Computed]
    public function results(): Collection
    {
        $query = trim($this->query);

        if (mb_strlen($query) < 2) {
            return new Collection;
        }

        return auth()->user()->team->users()
            ->whereLike('name', '%'.$query.'%')
            ->orderBy('name')
            ->limit(6)
            ->get(['users.id', 'name', 'email']);
    }

    /** The people already picked: their chips keep a name, outside of the results. */
    #[Computed]
    public function assigned(): Collection
    {
        return auth()->user()->team->users()->whereKey($this->reviewers)->get(['users.id', 'name', 'email']);
    }

    public function save(): void
    {
        $task = Task::findOrFail($this->taskId);
        $this->authorize('update', $task);

        $validated = $this->validate([
            'reviewers' => ['required', 'array', 'max:5'],
            'reviewers.*' => ['integer', 'distinct', Rule::exists('team_user', 'user_id')->where('team_id', auth()->user()->team_id)],
        ]);

        $task->reviewers()->sync($validated['reviewers']);

        $this->dispatch('toast', type: 'success', message: 'Reviewers assigned');
    }
};
?>

<form wire:submit="save" class="flex flex-col gap-4">
    <x-ui.autocomplete wire:model="reviewers" search="query" min-chars="2" multiple label="Reviewers"
        :options="$this->results" :selected-options="$this->assigned"
        option-value="id" option-label="name" option-description="email" />
    @error('reviewers') <p class="text-xs text-destructive">{{ $message }}</p> @enderror

    <x-ui.button type="submit" class="self-start">Assign</x-ui.button>
</form>
```

## How it works

1. `search="query"` names the property that receives the text. The autocomplete waits 300 ms after the last key and two characters (`min-chars`) before it sets it: one request per pause, not per key.
2. Livewire renders the new `results`; the autocomplete swaps its options in place. The input keeps its focus and its text, a spinner shows while the server works, and the previous results fade instead of disappearing.
3. `selected-options` passes the people already picked. They give the chips a name — even when they are not part of the current results — but never show up in the list.
4. `reviewers` is `wire:model`, not `.live`: picks stay in the browser until **Assign**, then go in one request.

## Security

- **SQL**: `whereLike` binds the text as a parameter. The query is never built by concatenating what people type, so a `'` or a `%` is just a character.
- **Scope**: searches and validation run on the team's users only (`team->users()`, `Rule::exists(...)->where('team_id', ...)`). An id from another company is refused even if someone sends it by hand.
- **Size**: `max:5` and `distinct` bound what can be saved; `limit(6)` bounds what a search returns.
- `#[Locked]` on `$taskId`: the task cannot be swapped from the browser, and `save()` checks the policy again.

## Variations

- **One person only**: drop `multiple` and make `reviewers` a nullable int.
- **Invite someone not found**: put a link or a button in the `empty` slot — see the [autocomplete composition](/components/autocomplete#composition).
- **Large tables**: add an index on `name`, or switch to [Laravel Scout](https://laravel.com/docs/scout) and keep the same component: only `results()` changes.
