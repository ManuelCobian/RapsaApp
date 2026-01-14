{{-- TailwindCSS version (sin <style>) --}}
<div class="px-4 sm:px-6 lg:px-8 py-6">

    {{-- Header --}}
    <div class="mb-4">
        <h1 class="text-xl sm:text-2xl font-extrabold text-slate-900 flex items-center gap-2">
            <i class="fas fa-rocket text-slate-700"></i>
            Sistema de Control de Ingresos y Egresos
        </h1>
        <p class="text-sm text-slate-500">Panel principal</p>
    </div>

    {{-- HERO --}}
    <section class="relative overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm p-5 sm:p-8"
        aria-label="Bienvenida a REPSA">
        {{-- decor (blobs) --}}
        <div class="pointer-events-none absolute -top-24 -left-24 h-72 w-72 rounded-full bg-blue-600/10 blur-2xl"></div>
        <div class="pointer-events-none absolute -bottom-28 -right-28 h-80 w-80 rounded-full bg-emerald-600/10 blur-2xl">
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center relative">
            {{-- text --}}
            <div class="lg:col-span-7">
                <span
                    class="inline-flex items-center gap-2 rounded-full border border-blue-600/20 bg-blue-600/10 px-3 py-1 text-xs sm:text-sm font-bold text-blue-900">
                    <i class="fas fa-hand-sparkles"></i> Bienvenido a tu panel
                </span>

                <h2 class="mt-3 text-2xl sm:text-3xl font-black tracking-tight text-slate-900 leading-tight">
                    Sistema de Control de Ingresos y Egresos
                    <span class="block text-lg sm:text-xl font-extrabold text-blue-800">(REPSA)</span>
                </h2>



                {{-- Buttons --}}

            </div>

            {{-- logo --}}
            <div class="lg:col-span-5 flex justify-center lg:justify-end">
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-[0_10px_24px_rgba(2,6,23,.08)]">
                    <img src="{{ Vite::asset('resources/images/logo-repsa.png') }}" alt="Logo REPSA"
                        class="h-24 sm:h-28 w-auto" />
                </div>
            </div>
        </div>
    </section>

      

    <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-3">
        <a href="{{ route('admin.incomes.index') }}" class="group">
            <div
                class="flex items-center gap-4 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition
               hover:-translate-y-0.5 hover:shadow-md">
                <div
                    class="h-11 w-11 rounded-xl border border-blue-600/20 bg-blue-600/10 text-blue-900 flex items-center justify-center">
                    <i class="fa-solid fa-money-bill"></i>
                </div>
                <div>
                    <div class="font-extrabold text-slate-900">Ingresos </div>
                    <div class="text-sm text-slate-500">Crea, edita y asigna de ingresos.</div>
                </div>
                <div class="ml-auto text-slate-400 group-hover:text-slate-600">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
        </a>

        <a href="{{ route('admin.expenses.index') }}" class="group">
            <div
                class="flex items-center gap-4 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm transition
               hover:-translate-y-0.5 hover:shadow-md">
                <div
                    class="h-11 w-11 rounded-xl border border-emerald-600/20 bg-emerald-600/10 text-emerald-700 flex items-center justify-center">
                    <i class="fa-solid fa-money-bill"></i>
                </div>
                <div>
                    <div class="font-extrabold text-slate-900">Gastos</div>
                    <div class="text-sm text-slate-500">Altas, bajas y control de gastos.</div>
                </div>
                <div class="ml-auto text-slate-400 group-hover:text-slate-600">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
        </a>
    </div>
    <br>
    <br>

    @livewire('admin.datatables.provider-full-table')

</div>
