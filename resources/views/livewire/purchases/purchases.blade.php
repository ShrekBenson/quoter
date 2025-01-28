<x-slot:header>
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Compras') }}
        </h2>

        <a wire:navigate href="{{ route('purchases.create') }}">
            <x-primary-button>
                Nueva compra
            </x-primary-button>
        </a>
    </div>
</x-slot:header>

<div class="py-12 h-page-content">
    <div class="max-w-7xl h-full mx-auto sm:px-6 lg:px-8">
        <div class="h-full bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="h-full p-6 text-gray-900 overflow-y-auto">
                <table class="w-full h-auto text-left table-auto min-w-max text-slate-800">
                    <thead>
                        <tr class="text-slate-500 border-b border-slate-300 bg-slate-50">
                            <th class="p-4">
                                <p class="text-sm leading-none font-normal">
                                    Producto
                                </p>
                            </th>
                            <th class="p-4">
                                <p class="text-sm leading-none font-normal">
                                    Precio
                                </p>
                            </th>
                            <th class="p-4">
                                <p class="text-sm leading-none font-normal">
                                    Cantidad
                                </p>
                            </th>
                            <th class="p-4">
                                <p class="text-sm leading-none font-normal">
                                    Total
                                </p>
                            </th>
                            <th class="p-4">
                                <p class="text-sm leading-none font-normal">
                                    Registro
                                </p>
                            </th>
                            <th class="p-4">
                                <p></p>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y-[1px]">
                        @foreach ($compras as $compra)
                            <tr wire:key="{{ $compra->id }}" class="hover:bg-slate-50">
                                <td class="p-4">
                                    <p class="text-sm font-bold">
                                        {{ $compra->producto }}
                                    </p>
                                </td>
                                <td class="p-4">
                                    <p class="text-sm">
                                        {{ $compra->precio }}
                                    </p>
                                </td>
                                <td class="p-4">
                                    <p class="text-sm">
                                        {{ $compra->cantidad }}
                                    </p>
                                </td>
                                <td class="p-4">
                                    <p class="text-sm">
                                        {{ $compra->total }}
                                    </p>
                                </td>
                                <td class="p-4">
                                    <p class="text-sm">
                                        {{ $compra->created_at }}
                                    </p>
                                </td>
                                <td class="p-4">
                                    <a wire:navigate href="{{ route('purchases.edit', $compra->id) }}">
                                        <x-secondary-button >
                                            Editar
                                        </x-secondary-button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
