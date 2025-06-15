<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('tickets.store') }}">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                :value="old('title')" required autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description"
                                :value="old('description')" required autofocus autocomplete="description" />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                        <input type="hidden" name="user_id" value={{ Auth::id() }} />
                        <div class="mb-3">
                            <label for="delivery_method" class="form-label">Delivery Method</label>
                            <select class="form-select form-select-sm" name="delivery_method" id="delivery_method">
                                @if (Auth::user()->hasRole('business'))
                                    <option value="technician_office">
                                        Technician office
                                    </option>
                                @else
                                    <option value="courier_delivery">
                                        Courier Delivery
                                    </option>
                                    <option value="drop_off">
                                        Drop Off
                                    </option>
                                @endif
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Add') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
</x-app-layout>
