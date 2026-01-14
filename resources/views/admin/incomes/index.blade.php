<x-admin-layout title="Ingresos" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],

    [
        'name' => 'Ingresos',
    ],
]">
@php
     $user = auth()->user();
@endphp
    <x-slot name="action">
       
           <x-wire-button href="{{ route('admin.incomes.create') }}" blue>
            <i class="fa-solid fa-plus"></i> Nuevo
        </x-wire-button>     
    
    </x-slot>

    @livewire('admin.datatables.income-table')

</x-admin-layout>
