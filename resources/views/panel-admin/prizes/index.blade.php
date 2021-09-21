<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}" class="link-secondary">{{$lottery->name}}</a> / {{ __('Premios') }}
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
                                    <a class="btn btn-outline-primary btn-sm" href="{{ route('prizes.create', $lottery) }}">Crear nuevo Premio</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Premio</th>
                                                <th scope="col">Día de la rifa</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($prizes as $prize)
                                                <tr>
                                                    <th scope="row">{{  $prize->id }}</th>
                                                    <td>{{ $prize->prize }}</td>
                                                    <td>{{ $prize->date_lottery_prize }}</td>
                                                    <td>
                                                        <a class="btn btn-outline-secondary btn-sm btn-block mb-1" href="{{ route('prizes.edit', $prize) }}" role="button">Editar</a>
                                                        <form method="POST" action="{{ route('prizes.delete', $prize ) }}" class="">
                                                            @csrf
                                                            <button id="btn-{{$prize->id}}"  class="d-none btn btn-outline-danger btn-sm btn-block">Eliminar</button>
                                                        </form>
                                                        <button data-id="{{$prize->id}}" class="btn-delete btn btn-outline-danger btn-sm btn-block">Eliminar</button>
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
