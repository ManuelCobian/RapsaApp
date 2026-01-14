<x-admin-layout title="Dashboard" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
]"> 
   
     
   @if (auth()->user()->hasRole('SuperUsuario')) 

        @include('layouts.paneladmin')
  
   @else
    @include('layouts.panelprovee')
       
   @endif

  
</x-admin-layout>
