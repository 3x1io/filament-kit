@props(['tool'])

<x-filament::card :heading="$tool->getLabel()" class="col-span-{{ $tool->getColumnSpan() }}">
    <x-filament::form wire:submit.prevent="callToolSubmitAction({{ json_encode($tool->getId()) }})">
        @if($tool->hasView())
            {{ $tool->getView() }}
        @else
            {{ $this->getCachedForm($tool->getId()) }}

            <x-filament::button type="submit">
                {{ $tool->getSubmitButtonLabel() }}
            </x-filament::button>
        @endif
    </x-filament::form>
</x-filament::card>
