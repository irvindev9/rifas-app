<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('ticketsBuyed.index', $lottery) }}" class="link-secondary">{{$lottery->name}}</a> / {{ __('Edición Boleto Extra') }}
        </h2>
    </x-slot>

    @include('partials.validation-errors')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <h3>Editar Boleto</h3>

                                <form method="POST" action="{{route("ticketsBuyed.update_extra",[$OtherTicketBuyed])}}">
                                    @csrf
                                    @include('panel-admin.ticket-buyed-extra._form')
                                </form>
                                <form method="POST" action="{{ route('ticketsBuyed.delete_extra', $OtherTicketBuyed ) }}">
                                    @csrf
                                    <button id="btn-{{$OtherTicketBuyed->id}}" class="btn btn-outline-danger btn-sm btn-block mb-1 d-none">Eliminar</button>
                                </form>

                                <script>
                                    $().ready(function(){
                                        $('.btn-delete').click(function(){
                                            let id = $(this).attr('data-id');
                                            if (confirm("Seguro que desea eliminar el boleto extra? No hay manera de revertir el cambio")) {
                                                $('#btn-' + id).click();
                                            }
                                        })
                                    })
                                </script>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
