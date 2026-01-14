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
  <section
    class="relative overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm p-5 sm:p-8"
    aria-label="Bienvenida a REPSA"
  >
    {{-- decor (blobs) --}}
    <div class="pointer-events-none absolute -top-24 -left-24 h-72 w-72 rounded-full bg-blue-600/10 blur-2xl"></div>
    <div class="pointer-events-none absolute -bottom-28 -right-28 h-80 w-80 rounded-full bg-emerald-600/10 blur-2xl"></div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center relative">
      {{-- text --}}
      <div class="lg:col-span-7">
        <span
          class="inline-flex items-center gap-2 rounded-full border border-blue-600/20 bg-blue-600/10 px-3 py-1 text-xs sm:text-sm font-bold text-blue-900"
        >
          <i class="fas fa-hand-sparkles"></i> Bienvenido a tu panel
        </span>

        <h2 class="mt-3 text-2xl sm:text-3xl font-black tracking-tight text-slate-900 leading-tight">
          Sistema de Control de Ingresos y Egresos
          <span class="block text-lg sm:text-xl font-extrabold text-blue-800">(REPSA)</span>
        </h2>

        <p class="mt-2 text-slate-600 max-w-2xl">
          Administra tu operación de forma rápida: usuarios, roles y permisos desde un solo lugar.
        </p>

        {{-- Buttons --}}
        <div class="mt-5 flex flex-wrap gap-3">
          {{-- Ajusta estas rutas a las tuyas --}}
          <a
            href="{{ route('admin.roles.index') }}"
            class="inline-flex items-center gap-2 rounded-full bg-blue-600 px-5 py-2.5 text-sm font-bold text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600/40"
          >
            <i class="fas fa-user-shield"></i> Ir a Roles
          </a>

          <a
            href="{{ route('admin.users.index') }}"
            class="inline-flex items-center gap-2 rounded-full border-2 border-emerald-600 px-5 py-2.5 text-sm font-bold text-emerald-700 hover:bg-emerald-50 focus:outline-none focus:ring-2 focus:ring-emerald-600/30"
          >
            <i class="fas fa-users"></i> Ir a Usuarios
          </a>
        </div>
      </div>

      {{-- logo --}}
      <div class="lg:col-span-5 flex justify-center lg:justify-end">
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-[0_10px_24px_rgba(2,6,23,.08)]">
          <img
            src="{{ Vite::asset('resources/images/logo-repsa.png') }}"
            alt="Logo REPSA"
            class="h-24 sm:h-28 w-auto"
          />
        </div>
      </div>
    </div>
  </section>


@livewire('admin.dashboard')
 

  
