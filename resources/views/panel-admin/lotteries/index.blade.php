<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rifas') }}
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
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end p-3">
                                    <a class="btn btn-outline-primary btn-sm" href="{{ route('lotteries.create') }}">Crear nueva rifa</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Nombre de la rifa</th>
                                                <th scope="col">Cantidad de boletos</th>
                                                <th scope="col">Precio del boleto</th>
                                                <th scope="col">Último día de la rifa</th>
                                                <th scope="col">Rifa activa</th>
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($lotteries as $lottery)
                                                <tr>
                                                    <th scope="row">{{  $lottery->id }}</th>
                                                    <td>{{ $lottery->name }}</td>
                                                    <td>{{ $lottery->quantity_tickets }}</td>
                                                    <td>{{ $lottery->price_ticket }}</td>
                                                    <td>{{ $lottery->lastday_lottery }}</td>
                                                    <td>
                                                        @if($lottery->active == 1)
                                                            <strong class="text-success">Activa</strong>
                                                        @else
                                                            <strong class="text-danger">Desactivada</strong>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('prizes.index', $lottery) }}" class="link-info">Premios</a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('ticketsBuyed.index', $lottery) }}" class="link-info">
                                                            Boletos <br>
                                                            Comprados
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('saled.lottery', $lottery->id) }}" class="link-info">
                                                            Pagina <br>
                                                            Boletos vendidos
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-outline-secondary btn-sm btn-block mb-1" href="{{ route('lotteries.edit', $lottery) }}" role="button">Editar</a>

                                                        <form method="POST" action="{{ route('lotteries.delete', $lottery ) }}" class="">
                                                            @csrf
                                                            <button id="btn-{{$lottery->id}}" class="btn btn-outline-danger btn-sm btn-block mb-1 d-none">Eliminar</button>
                                                        </form>
                                                        <button data-id="{{$lottery->id}}" class="btn-delete btn btn-outline-danger btn-sm btn-block">Eliminar</button>
                                                        <a class="btn btn-outline-success btn-sm btn-block" href="{{ route('ticketsBuyed.fileExport', $lottery->id) }}"  role="button">Boletos Excel</a>
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
    </div>
    <script>
        $().ready(function(){
            $('.btn-delete').click(function(){
                let id = $(this).attr('data-id');
                if (confirm("Seguro que desea eliminar todos los boletos no pagados?")) {
                    $('#btn-' + id).click();
                }
            })
        })
    </script>
</x-app-layout>
