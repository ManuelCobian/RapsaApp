<x-admin-layout title="Gastos" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],

    [
        'name' => 'Gastos',
    ],
]">
@php
     $user = auth()->user();
@endphp
    <x-slot name="action">
       
           <x-wire-button href="{{ route('admin.expenses.create') }}" blue>
            <i class="fa-solid fa-plus"></i> Nuevo
        </x-wire-button>     
    
    </x-slot>

    @livewire('admin.datatables.expense-table')

</x-admin-layout>
