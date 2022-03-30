<x-filament::page>
    <div class="shadow-sm rounded-lg bg-white">
        <h1 class="text-center font-bold text-3xl py-3">{{ $name }}</h1>
        <hr>
        <div class="px-4 py-4 ">
            <form class="py-4 px-4 flex flex-col space-y-2">
                @foreach ($users as $user)
                <h1>{{ $user }}</h1>
                @endforeach
                <input name="name" wire:model='name' class="py-2 px-4 border shadow-sm rounded-lg w-full"
                    placeholder="Add Your Name">
                <button wire:click.prevent='onSubmit'
                    class="py-2 px-4 bg-primary-500 shadow-sm rounded-lg my-4">Submit</button>
            </form>
        </div>
    </div>
</x-filament::page>
