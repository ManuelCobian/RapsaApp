<x-admin-layout title="Nuevo Gasto" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],

    [
        'name' => 'Gastos',
        'href' => route('admin.incomes.index'),
    ],

    [
        'name' => 'Nuevo Gasto',
    ],
]">

    <x-wire-card>

        <form action="{{ route('admin.expenses.store') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <div class="grid lg:grid-cols-2 gap-4">

                    <x-wire-input label="Concepto" name="concept" title="Correo Concepto"
                        placeholder="Ingrese Concepto del ingreso" value="{{ old('concept') }}" required />

                    <x-wire-textarea label="Descripcion" name="description" title="Descripcion"
                        placeholder="Ingrese Descripcion del ingreso" value="{{ old('description') }}" required />

                    <x-wire-input label="Cantidad" type="number" name="amount" step="0.01" min="0"
                        placeholder="0.00" value="{{ old('amount') }}" />


                    <x-wire-datetime-picker wire:model.live="model3" name="date_created" value="{{ old('date') }}"
                        label="Fecha" placeholder="Fecha que se realizo" display-format="DD/MM/YYYY" />
                    {{-- DNI  --}}

                </div>

                <div class="flex justify-end mt-5">

                    <x-wire-button type="submit"> Guardar</x-wire-button>
                </div>

            </div>


        </form>

    </x-wire-card>


</x-admin-layout>
