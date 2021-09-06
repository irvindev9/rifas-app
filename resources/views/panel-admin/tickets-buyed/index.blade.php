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
                        <div class="row text-right my-2">
                            <div class="col-12 col-md-4">
                                <a class="text-success" href="/boletos/{{$lottery->id}}">Ver todos los boletos</a>
                            </div>
                            <div class="col-12 col-md-4">
                                <a class="text-danger" href="#!" onclick="myFunction()">Eliminar boletos no pagados</a>
                            </div>
                            <script>
                                function myFunction() {
                                    if (confirm("Seguro que desea eliminar todos los boletos no pagados?")) {
                                        window.location.replace("/boletos/{{$lottery->id}}/delete");
                                    }
                                }
                            </script>
                            <div class="col-12 col-md-4">
                                <a href="/boletos/{{$lottery->id}}?no_paid">Ver boletos NO pagados</a>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No. Boleto</th>
                                            <th scope="col">Boletos extra</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Apellido P</th>
                                            <th scope="col">Apellido M</th>
                                            <th scope="col">No. Whats</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Fecha pagado</th>
                                            <th scope="col">Estatus</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ticketsBuyed as $ticketBuyed)
                                            <tr>
                                                <th scope="row">{{ str_pad($ticketBuyed->ticket, 4, "0", STR_PAD_LEFT) }}</th>
                                                <th>
                                                    @foreach ($ticketBuyed->otherTicketsBuyed as $item)
                                                        {{ str_pad($item->ticket, 4, "0", STR_PAD_LEFT) }}
                                                    @endforeach
                                                </th>
                                                <td>{{ $ticketBuyed->name_client }}</td>
                                                <td>{{ $ticketBuyed->lastname_client }}</td>
                                                <td>{{ $ticketBuyed->lastname_M_client }}</td>
                                                <td>{{ $ticketBuyed->whats_number }}</td>
                                                <td>{{ $ticketBuyed->state }}</td>
                                                <td>{{ $ticketBuyed->date_buyed }}</td>
                                                <td>
                                                    @if($ticketBuyed->paid == 1)
                                                        <strong class="text-success">Pagado</strong>
                                                    @else
                                                        <strong class="text-danger">No pagado</strong>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a class="btn btn-outline-secondary btn-sm btn-block mb-1" href="{{ route('ticketsBuyed.edit', $ticketBuyed) }}" role="button">Editar</a>
                                                    <a class="btn btn-outline-info btn-sm btn-block mb-1" href="/comprar/rifa/{{$lottery->id}}/generar-boleto?ticket={{$ticketBuyed->ticket}}" role="button">Ticket</a>
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
