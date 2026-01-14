<div x-data="data()">
    <x-wire-datetime-picker wire:model.live="dateSearch" name="date_created" label="Fecha para Filtrar"
        placeholder="Fecha que se realizo" display-format="DD/MM/YYYY" />

    <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-3">
        <a href="#" class="group">
            <div
                class="flex items-center gap-4 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition
               hover:-translate-y-0.5 hover:shadow-md">
                <div
                    class="h-11 w-11 rounded-xl border border-blue-600/20 bg-blue-600/10 text-blue-900 flex items-center justify-center">
                    <i class="fa-solid fa-money-bill"></i>
                </div>
                <div>
                    <div class="font-extrabold text-slate-900">Ingresos $ {{ number_format($totalIncome, 2) }}</div>

                </div>
                <div class="ml-auto text-slate-400 group-hover:text-slate-600">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
        </a>

        <a href="#" class="group">
            <div
                class="flex items-center gap-4 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition
               hover:-translate-y-0.5 hover:shadow-md">
                <div
                    class="h-11 w-11 rounded-xl border border-emerald-600/20 bg-emerald-600/10 text-emerald-700 flex items-center justify-center">
                    <i class="fa-solid fa-money-bill"></i>
                </div>
                <div>
                    <div class="font-extrabold text-slate-900">Gastos $ {{ number_format($totalExpense, 2) }}</div>
                </div>
                <div class="ml-auto text-slate-400 group-hover:text-slate-600">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
        </a>

        <a href="#" class="group">
            <div
                class="flex items-center gap-4 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition
               hover:-translate-y-0.5 hover:shadow-md">
                <div
                    class="h-11 w-11 rounded-xl border border-emerald-600/20 bg-emerald-600/10 text-emerald-700 flex items-center justify-center">
                    <i class="fa-solid fa-money-bill"></i>
                </div>
                <div>
                    <div class="font-extrabold text-slate-900">Utilidad $ {{ number_format($total, 2) }}</div>
                </div>
                <div class="ml-auto text-slate-400 group-hover:text-slate-600">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
        </a>
    </div>

    <br>
    <br>
@livewire('admin.datatables.provider-full-table', [
    'date' => $dateSearch
])

</div>
