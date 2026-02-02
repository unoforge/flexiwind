@props(['groupedHeadings'])

<nav
  id="table-of-contents"
  aria-label="Table Of Contents"
  class="ml-1 pt-3 text-fg-muted w-full text-sm xl:pt-0 border-l border-border-strong border-dashed"
>
  <ol class="space-y-2">
    @foreach ($groupedHeadings as $item)
      <x-molecules.table-of-content-heading
        :heading="$item['heading']"
        :subheadings="$item['subheadings']"
      />
    @endforeach
  </ol>
</nav>
