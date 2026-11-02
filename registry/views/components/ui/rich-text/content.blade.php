{{--
    La zone d'écriture. Sa taille vient de `class` : min-h-48, max-h-96…
    Au-delà de max-h, le texte défile dans la zone.

    <x-ui.rich-text.content class="min-h-60 max-h-[32rem]" />
    <x-ui.rich-text.content fade />  ← le texte s'estompe en bas
--}}
@props([
    'fade' => false,
])

<div data-slot="rich-text-content-wrapper"
    @class([
        'relative min-w-0 flex-1',
        'group-data-[variant=inset]/rich-text:rounded-[calc(var(--radius-ui)-1px)] group-data-[variant=inset]/rich-text:border group-data-[variant=inset]/rich-text:border-border group-data-[variant=inset]/rich-text:bg-background',
        'group-data-[variant=detached]/rich-text:rounded-ui group-data-[variant=detached]/rich-text:border group-data-[variant=detached]/rich-text:border-border-input group-data-[variant=detached]/rich-text:bg-background',
        'group-data-[variant=detached]/rich-text:has-[[data-rt-content]:focus]:border-(--ui-input-focus-outline) group-data-[variant=detached]/rich-text:has-[[data-rt-content]:focus]:ring-3 group-data-[variant=detached]/rich-text:has-[[data-rt-content]:focus]:ring-(--focus-ring)',
        'overflow-hidden' => $fade,
    ])>
    <div data-rt-content contenteditable="true" role="textbox" aria-multiline="true"
        x-bind:id="contentId" x-bind:contenteditable="disabled ? 'false' : 'true'" x-bind:aria-invalid="invalid ? 'true' : null"
        x-bind:aria-placeholder="placeholder || null"
        x-on:input="sync()" x-on:focus="focused = true" x-on:blur="focused = false; sync()"
        x-on:keydown="keydown($event)" x-on:beforeinput="beforeinput($event)" x-on:paste="paste($event)" x-on:click="pick($event)" x-on:scroll="image && placeImageBar()"
        {{ $attributes->class([
            'min-h-36 overflow-y-auto px-3.5 py-3 text-sm/relaxed text-foreground outline-none',
            'group-data-[variant=ghost]/rich-text:px-0 group-data-[variant=ghost]/rich-text:text-[15px]/relaxed',
            '[&>*+*]:mt-3 [&_strong]:font-semibold [&_strong]:text-title-foreground [&_u]:underline-offset-3 [&_mark]:rounded-sm [&_mark]:bg-amber-200 [&_mark]:px-0.5 [&_mark]:text-zinc-950',
            '[&_h1]:text-2xl/tight [&_h1]:font-semibold [&_h1]:tracking-tight [&_h1]:text-title-foreground [&_h2]:text-xl/tight [&_h2]:font-semibold [&_h2]:text-title-foreground [&_h3]:text-base [&_h3]:font-semibold [&_h3]:text-title-foreground',
            '[&_a]:font-medium [&_a]:text-primary [&_a]:underline [&_a]:underline-offset-3',
            '[&_ul]:list-disc [&_ol]:list-decimal [&_ul]:ps-5 [&_ol]:ps-5 [&_li]:ps-1 [&_li+li]:mt-1 [&_li::marker]:text-muted-foreground',
            '[&_blockquote]:border-s-2 [&_blockquote]:border-border-strong [&_blockquote]:ps-4 [&_blockquote]:text-muted-foreground [&_blockquote]:italic [&_blockquote>*+*]:mt-2',
            '[&_code]:rounded-[calc(var(--radius-ui)*0.5)] [&_code]:bg-muted [&_code]:px-1.5 [&_code]:py-0.5 [&_code]:font-mono [&_code]:text-[0.85em] [&_code]:text-title-foreground',
            '[&_pre]:overflow-x-auto [&_pre]:rounded-ui [&_pre]:bg-muted [&_pre]:px-4 [&_pre]:py-3 [&_pre]:font-mono [&_pre]:text-[13px]/relaxed [&_pre]:text-title-foreground [&_pre_code]:bg-transparent [&_pre_code]:p-0',
            '[&_hr]:my-5 [&_hr]:border-dashed [&_hr]:border-border-strong',
            '[&_figure]:my-4 [&_figure]:clear-both [&_img]:block [&_img]:max-w-full [&_img]:cursor-pointer [&_img]:rounded-ui [&_figcaption]:mt-2 [&_figcaption]:text-center [&_figcaption]:text-xs [&_figcaption]:text-muted-foreground',
            '[&_img[data-rt-selected]]:outline-2 [&_img[data-rt-selected]]:outline-offset-3 [&_img[data-rt-selected]]:outline-primary [&_figure[data-align=center]_img]:mx-auto [&_figure[data-align=wide]_img]:w-full',
            '[&_figure[data-align=left]]:float-left [&_figure[data-align=left]]:clear-none [&_figure[data-align=left]]:my-1 [&_figure[data-align=left]]:me-4 [&_figure[data-align=left]]:w-2/5',
            'after:clear-both after:table',
        ]) }}></div>

    <span aria-hidden="true" x-cloak x-show="empty" x-text="placeholder"
        class="pointer-events-none absolute start-3.5 top-3 text-sm text-(--ui-input-place-holder) group-data-[variant=ghost]/rich-text:start-0 group-data-[variant=ghost]/rich-text:text-[15px]"></span>

    @if ($fade)
        <span aria-hidden="true" class="pointer-events-none absolute inset-x-0 bottom-0 h-16 bg-linear-to-b from-transparent to-background"></span>
    @endif
</div>
