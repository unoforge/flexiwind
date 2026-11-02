@php
    $members = [
        ['name' => 'Alex Rivera', 'role' => 'Lead Developer', 'tasks' => 12, 'completed' =>9, 'initials' => 'AR', 'online' => true],
        ['name' => 'Sam Chen', 'role' => 'UX Designer', 'tasks' =>8, 'completed' =>6, 'initials' => 'SC', 'online' => true],
        ['name' => 'Jordan Lee', 'role' => 'Frontend Developer', 'tasks' =>10, 'completed' =>4, 'initials' => 'JL', 'online' => false],
        ['name' => 'Maya Patel', 'role' => 'Backend Developer', 'tasks' =>8, 'completed' =>8, 'initials' => 'MP', 'online' => true],
    ];
@endphp

<div class="w-full max-w-5xl mx-auto px-4 py-10">
    <x-ui.card size="none" class="rounded-ui">
        <div class="p-4 border-b border-border">
            <h3 class="font-semibold text-foreground">Team Performance</h3>
            <p class="text-xs text-muted-foreground">Current sprint overview</p>
        </div>
        <div class="divide-y divide-border">
            @foreach ($members as $member)
                <div class="flex items-center gap-3 p-4 hover:bg-muted/20 transition-colors">
                    <div class="relative shrink-0">
                        <x-ui.avatar-placeholder size="md" text="{{ $member['initials'] }}" variant="solid" intent="neutral" class="rounded-full" />
                        <span class="absolute -bottom-0.5 -right-0.5 size-3 rounded-full {{ $member['online'] ? 'bg-success' : 'bg-muted-foreground/30' }} ring-2 ring-background"></span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-foreground truncate">{{ $member['name'] }}</p>
                        <p class="text-xs text-muted-foreground">{{ $member['role'] }}</p>
                    </div>
                    <div class="text-right shrink-0">
                        <p class="text-sm font-medium text-foreground">{{ $member['completed'] }}/{{ $member['tasks'] }}</p>
                        <div class="w-20 mt-1">
                             <x-ui.progress size="sm" max="{{ $member['tasks'] }}" value="{{ $member['completed'] }}" class="text-success" />
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </x-ui.card>
</div>