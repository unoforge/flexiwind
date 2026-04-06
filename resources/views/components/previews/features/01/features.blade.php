@php

    $features = [
        [
            'icon' => 'ph--gauge',
            'title' => 'Real-Time Dashboard',
            'description' =>
                'Monitor your business metrics in real time with an intuitive dashboard that gives you instant visibility into performance, usage, and growth.',
        ],
        [
            'icon' => 'ph--users-three',
            'title' => 'Team Collaboration',
            'description' =>
                'Work seamlessly with your team using shared workspaces, role-based permissions, and real-time updates that keep everyone aligned.',
        ],
        [
            'icon' => 'ph--gear-six',
            'title' => 'Automated Workflows',
            'description' =>
                'Streamline repetitive tasks with powerful automation tools that save time, reduce errors, and boost overall productivity.',
        ],
        [
            'icon' => 'ph--cloud',
            'title' => 'Cloud-Based Access',
            'description' =>
                'Access your data securely from anywhere in the world. Our fully cloud-hosted platform ensures reliability, scalability, and 99.9% uptime.',
        ],
        [
            'icon' => 'ph--shield-check',
            'title' => 'Enterprise-Grade Security',
            'description' =>
                'Protect your data with advanced encryption, secure authentication, and compliance-ready infrastructure built for peace of mind.',
        ],
        [
            'icon' => 'ph--chart-line-up',
            'title' => 'Advanced Analytics & Insights',
            'description' =>
                'Make smarter decisions with detailed reports, actionable insights, and predictive analytics designed to help you scale confidently.',
        ],
    ];
@endphp
<section class="py-20 lg:py-32">
    <div class="px-5 sm:px-10 md:px-12 lg:px-5 lg:max-w-7xl mx-auto w-full">
        <div class="flex flex-col md:flex-row md:justify-between md:items-end">
            <div class="max-w-lg space-y-4">
                <span class="block w-max border border-border shadow-sm text-fg rounded-ui px-2 py-0.5">
                    Why us
                </span>
                <h1 class="font-semibold text-fg-title text-3xl md:text-4xl/tight">
                    Choose the perfect SEO partner for your business growth
                </h1>
            </div>
            <div class="max-w-sm">
                <p class="text-fg-muted">
                    We help businesses rank higher, grow organic traffic, and dominate search engines through tailored
                    SEO strategies.
                </p>
            </div>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-16">
            @foreach ($features as $feature)
                <x-previews.features.01.feature-card :icon="$feature['icon']" :title="$feature['title']" :description="$feature['description']" />
            @endforeach
        </div>
    </div>
</section>
