<x-filament::page>
    <div class="grid grid-cols-1 gap-1">
        <x-filament::card>
            <div id="app">
                <browser :collection="{{ json_encode([
                    "folders" => $folders,
                    "files" => $files
                ]) }}" :url="'{{ url('admin/browser') }}'" inline-template>
                    <div>
                        <div class="flex justify-start py-4 space-x-2">
                            <button @click="goHome()"
                                class="inline-flex items-center justify-center font-medium tracking-tight transition rounded-lg focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700 h-9 px-4 text-white shadow focus:ring-white">
                                {{ __('Home') }}
                            </button>
                            <button @click="goBack()"
                                class="inline-flex items-center justify-center font-medium tracking-tight transition rounded-lg focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700 h-9 px-4 text-white shadow focus:ring-white">
                                {{ __('Back') }}
                            </button>
                        </div>
                        <div class="grid md:grid-cols-8 gap-1 sm:grid-cols-2">
                            <div class="border rounded flex flex-col items-center p-4"
                                v-for="(folder, key) in collection.folders" @key="key">
                                <a @click="getFolder(folder)">
                                    <x-heroicon-s-folder class="w-20 h-20  item-center" />
                                    <a href=""
                                        class="block font-medium mt-4 text-center">@{{ folder.name.substring(0,20) }}</a>
                                </a>
                            </div>
                            <div class="border rounded flex flex-col items-center p-4"
                                v-for="(file, key) in collection.files" @key="key">
                                <a @click="getFile(file)">
                                    <x-heroicon-o-document-text class="w-20 h-20  item-center" />
                                    <a href=""
                                        class="block font-medium mt-4 text-center">@{{ file.name.substring(0,20) }}</a>
                                </a>
                            </div>

                        </div>
                    </div>
                </browser>
            </div>
    </div>
    </div>
    </x-filament::card>

    </div>

</x-filament::page>


@push('scripts')
<script src="{{ mix('js/app.js') }}"></script>
@endpush
