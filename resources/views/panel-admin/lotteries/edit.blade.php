<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}" class="link-secondary">{{$lottery->name}}</a> / {{ __('Rifas') }}
        </h2>
    </x-slot>

    @if($errors->any())
        {!! implode('', $errors->all('<small class="text-danger">:message</small><br>')) !!}
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <h3>Editar rifa</h3>

                                <form method="POST" action="{{ route('lotteries.update', $lottery) }}" enctype="multipart/form-data">
                                    @csrf
                                    @include('panel-admin.lotteries._form',['btnText'=>'Actualizar'])
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
