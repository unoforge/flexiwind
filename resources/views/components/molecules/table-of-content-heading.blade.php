@props(['heading', 'subheadings'])

<li class="flex flex-col ml-4">
  <a
    href="#{{ $heading->slug }}"
    class="text-muted-foreground hover:text-foreground ease-linear duration-200"
  >
    {{ $heading->text }}
  </a>

  @if (!empty($subheadings))
    <ol class="pl-4 space-y-2 pt-2">
      @foreach ($subheadings as $sub)
        <li>
          <a
            href="#{{ $sub->slug }}"
            class="d-flex-items-center gap-x-1 text-muted-foreground hover:text-foreground ease-linear duration-200"
          >
            {{ $sub->text }}
          </a>
        </li>
      @endforeach
    </ol>
  @endif
</li>
