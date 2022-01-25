<x-filament::page>
    <div class="grid grid-cols-1 md:grid-cols-6 lg:grid-cols-12">
        @foreach($this->tools as $tool)
            <x-filament-tools::tool :tool="$tool" />
        @endforeach
    </div>
</x-filament::page>
