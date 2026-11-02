@php
    $tasks = [
        ['title' => 'Design new dashboard layout', 'project' => 'Atlas', 'priority' => 'high', 'assignee' => 'Alex', 'due' => 'Today', 'completed' => false],
        ['title' => 'Fix login button alignment', 'project' => 'Nova', 'priority' => 'medium', 'assignee' => 'Sam', 'due' => 'Tomorrow', 'completed' => false],
        ['title' => 'Update API documentation', 'project' => 'Core', 'priority' => 'low', 'assignee' => 'Jordan', 'due' => 'Feb 10', 'completed' => true],
        ['title' => 'Implement dark mode toggle', 'project' => 'Atlas', 'priority' => 'medium', 'assignee' => 'Alex', 'due' => 'Feb 12', 'completed' => false],
        ['title' => 'Migrate database schema', 'project' => 'Core', 'priority' => 'high', 'assignee' => 'Riley', 'due' => 'Feb 14', 'completed' => false],
    ];
@endphp

<div class="w-full max-w-7xl px-1 sm:px-4 mx-auto">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-semibold text-foreground">Team Tasks</h2>
            <p class="text-sm text-muted-foreground mt-0.5">Manage and track your team's progress.</p>
        </div>
        <x-ui.button size="sm">
            <x-ui.icon name="ph--plus" class="size-4 mr-1.5" />
            Add task
        </x-ui.button>
    </div>
    <div class="rounded-ui border border-border overflow-hidden">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-card border-b border-border">
                    <th class="py-3 px-4 text-xs font-semibold uppercase tracking-wider text-muted-foreground w-8">
                        <x-ui.checkbox />
                    </th>
                    <th class="py-3 px-4 text-xs font-semibold uppercase tracking-wider text-muted-foreground">Task</th>
                    <th class="py-3 px-4 text-xs font-semibold uppercase tracking-wider text-muted-foreground hidden sm:table-cell">Project</th>
                    <th class="py-3 px-4 text-xs font-semibold uppercase tracking-wider text-muted-foreground hidden md:table-cell">Priority</th>
                    <th class="py-3 px-4 text-xs font-semibold uppercase tracking-wider text-muted-foreground hidden lg:table-cell">Assignee</th>
                    <th class="py-3 px-4 text-xs font-semibold uppercase tracking-wider text-muted-foreground">Due</th>
                    <th class="py-3 px-4 w-10"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-border">
                @foreach ($tasks as $task)
                    <tr class="hover:bg-muted/20 transition-colors {{ $task['completed'] ? 'opacity-60' : '' }}">
                        <td class="py-3 px-4">
                            <x-ui.checkbox :checked="$task['completed']" />
                        </td>
                        <td class="py-3 px-4">
                            <span class="text-sm {{ $task['completed'] ? 'line-through text-muted-foreground' : 'font-medium text-foreground' }}">
                                {{ $task['title'] }}
                            </span>
                        </td>
                        <td class="py-3 px-4 text-sm text-muted-foreground hidden sm:table-cell">{{ $task['project'] }}</td>
                        <td class="py-3 px-4 hidden md:table-cell">
                            @php
                                $priorityColors = ['high' => 'danger', 'medium' => 'warning', 'low' => 'gray'];
                            @endphp
                            <x-ui.badge variant="soft" :intent="$priorityColors[$task['priority']]" size="sm">
                                {{ ucfirst($task['priority']) }}
                            </x-ui.badge>
                        </td>
                        <td class="py-3 px-4 text-sm text-muted-foreground hidden lg:table-cell">{{ $task['assignee'] }}</td>
                        <td class="py-3 px-4">
                            <span class="text-sm {{ $task['due'] === 'Today' ? 'text-destructive font-medium' : 'text-muted-foreground' }}">
                                {{ $task['due'] }}
                            </span>
                        </td>
                        <td class="py-3 px-4">
                            <x-ui.button size="xs" variant="ghost" icon-only>
                                <x-ui.icon name="ph--dots-three-vertical" class="size-4" />
                            </x-ui.button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>