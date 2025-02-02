<x-slot:header>
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clientes') }}
        </h2>

        <a wire:navigate href="{{ route('clients.create') }}">
            <x-primary-button>
                Nuevo cliente
            </x-primary-button>
        </a>
    </div>
</x-slot:header>

<div class="py-12 h-page-content">
    <div class="max-w-7xl h-full mx-auto sm:px-6 lg:px-8">
        <div class="h-full bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="h-full p-6 text-gray-900 overflow-y-auto">
                <table class="w-full h-auto text-left table-fixed min-w-max text-slate-800">
                    <thead>
                        <tr class="text-slate-500 border-b border-slate-300 bg-slate-50">
                            <th class="p-4">
                                <p class="text-sm leading-none font-normal">
                                    Nombre
                                </p>
                            </th>
                            <th class="p-4">
                                <p class="text-sm leading-none font-normal">
                                    Ubicación
                                </p>
                            </th>
                            <th class="p-4">
                                <p class="text-sm leading-none font-normal">
                                    Email
                                </p>
                            </th>
                            <th class="p-4">
                                <p class="text-sm leading-none font-normal">
                                    Teléfono
                                </p>
                            </th>
                            <th class="p-4">
                                <p></p>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y-[1px]">
                        @foreach ($clientes as $cliente)
                            <tr wire:key="{{ $cliente->id }}" class="hover:bg-slate-50">
                                <td class="p-4">
                                    <p class="text-sm font-bold truncate">
                                        {{ $cliente->nombre }}
                                    </p>
                                </td>
                                <td class="p-4">
                                    <p class="text-sm truncate">
                                        {{ $cliente->ubicacion }}
                                    </p>
                                </td>
                                <td class="p-4">
                                    <p class="text-sm">
                                        {{ $cliente->email }}
                                    </p>
                                </td>
                                <td class="p-4">
                                    <p class="text-sm">
                                        {{ $cliente->telefono }}
                                    </p>
                                </td>
                                <td class="p-4">
                                    <a wire:navigate href="{{ route('clients.edit', $cliente->id) }}">
                                        <x-primary-button >
                                            Editar
                                        </x-primary-button>
                                    </a>
                                    <x-secondary-button
                                        title="Eliminar cliente"
                                        wire:click="deleteClient({{ $cliente->id }})" >
                                        X
                                    </x-secondary-button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
