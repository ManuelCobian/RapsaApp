<x-admin-layout title="Editar Usuario" :breadcrumbs="[
    [
        'name' => 'Nuevo Rol',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Gastos',
        'href' => route('admin.incomes.index'),
    ],
    [
        'name' => 'Editar Gasto',
    ],
]">



    <x-wire-card>
        <form action="{{ route('admin.expenses.update', $expense) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-4">

                <div class="grid lg:grid-cols-2 gap-4">

                    <x-wire-input label="Concepto" name="concept" title="Correo Concepto"
                        placeholder="Ingrese Concepto del ingreso" value="{{ old('concept', $expense->concept) }}"
                        required />

                    <x-wire-textarea label="Descripcion" name="description"
                        placeholder="Ingrese Descripcion del ingreso" required>
                        {{ old('description', $expense->description) }}
                    </x-wire-textarea>

                    <x-wire-input label="Cantidad" type="number" name="amount" step="0.01" min="0"
                        placeholder="0.00" value="{{ old('amount', $expense->amount) }}" required />

                    <x-wire-datetime-picker wire:model.live="model3" name="date" value="{{ old('date') }}"
                        label="Fecha" placeholder="Fecha que se realizo" display-format="DD/MM/YYYY" />
                    {{-- DNI  --}}

                </div>


                <div class="flex justify-end mt-5">
                    <x-wire-button type="submit">Guardar</x-wire-button>
                </div>
            </div>
        </form>
    </x-wire-card>

</x-admin-layout>
