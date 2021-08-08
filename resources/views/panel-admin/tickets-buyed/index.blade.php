<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}" class="link-secondary">{{$lottery->name}}</a> / {{ __('Boletos Comprados') }}
        </h2>
    </x-slot>

    @include('partials.session-status')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No. Boleto</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Apellido</th>
                                            <th scope="col">No. Whats</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Estatus</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ticketsBuyed as $ticketBuyed)
                                            <tr>
                                                <th scope="row">{{ $ticketBuyed->ticket }}</th>
                                                <td>{{ $ticketBuyed->name_client }}</td>      
                                                <td>{{ $ticketBuyed->lastname_client }}</td>                                      
                                                <td>{{ $ticketBuyed->whats_number }}</td>                                      
                                                <td>{{ $ticketBuyed->state }}</td>                                      
                                                <td>
                                                    @if($ticketBuyed->paid == 1)
                                                        <strong class="text-success">Pagado</strong> 
                                                    @else
                                                        <strong class="text-danger">No pagado</strong>     
                                                    @endif
                                                </td>                                      
                                                <td>
                                                    <a class="btn btn-outline-secondary btn-sm btn-block mb-1" href="{{ route('ticketsBuyed.edit', $ticketBuyed) }}" role="button">Editar</a>
                                                    <form method="POST" action="{{ route('ticketsBuyed.delete', $ticketBuyed) }}" class="">
                                                        @csrf
                                                        <button class="btn btn-outline-danger btn-sm btn-block">Eliminar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>            
                                </table>       
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
