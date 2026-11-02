<div class="grid w-full max-w-2xl gap-6 sm:grid-cols-2">
    <x-ui.tag-input label="Small" size="sm" name="small" :value="['alpha', 'beta']" />
    <x-ui.tag-input label="Disabled" name="disabled" :value="['design', 'api']" disabled />
    <x-ui.tag-input label="Reviewers" name="reviewers" :value="['alice', 'marc', 'sarah']" :max="3" />
    <x-ui.tag-input label="Invalid" name="invalid" :value="['seo']" invalid hint="Add at least two keywords." />
</div>
