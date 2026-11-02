{{--
    Une réponse : qui l'on répond en haut, le texte, puis la barre en bas
    avec le compteur, Discard en discret et Send en action principale.
    Ctrl+Entrée envoie ; 1 000 caractères au plus.
--}}
<form class="flex w-full max-w-xl flex-col gap-2.5" x-on:submit.prevent>
    <div class="flex items-center gap-2 text-xs text-muted-foreground">
        <x-ui.avatar-placeholder size="xs" variant="soft" intent="primary" text="IL" />
        <span>Replying to <span class="font-medium text-title-foreground">Ines Laurent</span> · Re: Q4 launch plan</span>
    </div>
    <x-ui.rich-text name="reply" placeholder="Write your reply…" submit-on="mod-enter" :max="1000">
        <x-ui.rich-text.content class="min-h-24" />
        <x-ui.rich-text.toolbar position="bottom">
            <x-ui.rich-text.button command="bold" />
            <x-ui.rich-text.button command="italic" />
            <x-ui.rich-text.button command="bullet-list" />
            <x-ui.rich-text.button command="link" />
            <x-ui.rich-text.count class="me-2" />
            <x-ui.button type="reset" size="sm" variant="ghost" intent="gray">Discard</x-ui.button>
            <x-ui.button type="submit" size="sm" class="gap-1.5">Send<x-ui.kbd size="xs" variant="outline" class="hidden opacity-80 sm:inline-flex">⌘↵</x-ui.kbd></x-ui.button>
        </x-ui.rich-text.toolbar>
    </x-ui.rich-text>
</form>
