<x-slot:header>
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Actualizar cliente') }}
        </h2>

        <a wire:navigate href="{{ route('clients') }}">
            <x-secondary-button>
                Clientes
            </x-secondary-button>
        </a>
    </div>
</x-slot:header>

<div class="py-12">
    <div class="max-w-7xl mx-auto flex flex-col gap-y-6 items-center sm:px-6 lg:px-8">
        <div class="w-full bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <form wire:submit.prevent="udpateClient" class="flex flex-col gap-y-4">
                    <fieldset class="flex flex-col gap-y-4">
                        <legend class="mb-4">
                            Información del cliente
                        </legend>

                        <div class="w-full min-w-[200px]">
                            <div class="relative">
                                <x-text-input
                                    class="peer w-full bg-transparent placeholder:text-transparent text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                                    placeholder="Nombre del cliente"
                                    wire:model="nombre" />
                                <label
                                    class="absolute cursor-text bg-white px-1 peer-placeholder-shown:left-2.5 peer-placeholder-shown:top-2.5 text-slate-500 peer-placeholder-shown:text-sm transition-all transform origin-left -top-2 left-2.5 text-xs scale-90 peer-focus:-top-2 peer-focus:left-2.5 peer-focus:text-xs peer-focus:text-slate-500 peer-focus:scale-90">
                                    Nombre del cliente
                                </label>
                            </div>

                            @error('nombre')
                                <x-input-error :messages="$errors->get('nombre')" class="mt-2 pl-3" />
                            @enderror
                        </div>

                        <div class="w-full min-w-[200px]">
                            <div class="relative">
                                <x-text-input
                                    class="peer w-full bg-transparent placeholder:text-transparent text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                                    placeholder="Nombre del cliente"
                                    wire:model="ubicacion" />
                                <label
                                    class="absolute cursor-text bg-white px-1 peer-placeholder-shown:left-2.5 peer-placeholder-shown:top-2.5 text-slate-500 peer-placeholder-shown:text-sm transition-all transform origin-left -top-2 left-2.5 text-xs scale-90 peer-focus:-top-2 peer-focus:left-2.5 peer-focus:text-xs peer-focus:text-slate-500 peer-focus:scale-90">
                                    Ubicación
                                </label>
                            </div>

                            @error('ubicacion')
                                <x-input-error :messages="$errors->get('ubicacion')" class="mt-2 pl-3" />
                            @enderror
                        </div>
                    </fieldset>

                    <fieldset class="flex gap-x-4">
                        <legend class="mb-4">
                            Contacto
                        </legend>

                        <div class="w-full min-w-[200px]">
                            <div class="relative">
                                <x-text-input
                                    class="peer w-full bg-transparent placeholder:text-transparent text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                                    placeholder="Nombre del cliente"
                                    wire:model="email" />
                                <label
                                    class="absolute cursor-text bg-white px-1 peer-placeholder-shown:left-2.5 peer-placeholder-shown:top-2.5 text-slate-500 peer-placeholder-shown:text-sm transition-all transform origin-left -top-2 left-2.5 text-xs scale-90 peer-focus:-top-2 peer-focus:left-2.5 peer-focus:text-xs peer-focus:text-slate-500 peer-focus:scale-90">
                                    Email
                                </label>
                            </div>

                            @error('email')
                                <x-input-error :messages="$errors->get('email')" class="mt-2 pl-3" />
                            @enderror
                        </div>

                        <div class="w-full min-w-[200px]">
                            <div class="relative">
                                <x-text-input
                                    type="tel"
                                    class="peer w-full bg-transparent placeholder:text-transparent text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                                    placeholder="Nombre del cliente"
                                    wire:model="telefono" />
                                <label
                                    class="absolute cursor-text bg-white px-1 peer-placeholder-shown:left-2.5 peer-placeholder-shown:top-2.5 text-slate-500 peer-placeholder-shown:text-sm transition-all transform origin-left -top-2 left-2.5 text-xs scale-90 peer-focus:-top-2 peer-focus:left-2.5 peer-focus:text-xs peer-focus:text-slate-500 peer-focus:scale-90">
                                    Telefono
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    @error('form.title')
                        <p class="pl-3 pt-2 text-sm text-red-600" x-data="{ show: $wire.entangle('errors') != null }" x-init="setTimeout(() => show = false, 5000)"
                            x-show="show" x-transition:leave.duration.300ms>{{ $message }}</p>
                    @enderror

                    <div class="w-full max-w-full min-w-[200px] mt-8">
                        <x-primary-button>
                            Editar cliente
                        </x-primary-button>
                    </div>
                </form>
            </div>

        </div>

        @if (session('success'))
            <div class="w-full" x-data="{ show: false }">
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                    x-init="$watch('show', setTimeout(() => show = false, 5000));
                    setTimeout(() => show = true, 200);" x-show="show" x-transition:enter.duration.300ms
                    x-transition:leave.duration.300ms role="alert">
                    <div class="flex">
                        <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                            </svg></div>
                        <div>
                            <p class="font-bold">{{ 'Nuevo cliente' }}</p>
                            <p class="text-sm">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>