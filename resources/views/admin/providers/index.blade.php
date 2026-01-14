<x-admin-layout title="Proveedores" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],

    [
        'name' => 'Proveedores',
    ],
]">
@php
     $user = auth()->user();
@endphp
  

    @livewire('admin.datatables.provider-table')


</x-admin-layout>
