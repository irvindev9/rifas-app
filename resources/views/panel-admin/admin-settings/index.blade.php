<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajustes') }}
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
                                    <a class="btn btn-outline-primary btn-sm" href="{{ route('settings.create') }}">Crear un nuevo ajuste</a>
                                </div>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Tipo</th>
                                            <th scope="col">Contenido</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($settings as $setting)
                                            <tr>
                                                <th scope="row">{{  $setting->id }}</th>
                                                <td>{{ $setting->code }}</td>
                                                <td>{!! $setting->content !!}</td>
                                                <td>
                                                    <a class="btn btn-outline-secondary btn-sm btn-block mb-1" href="{{ route('settings.edit', $setting) }}" role="button">Editar</a>
                                                    <form method="POST" action="{{ route('settings.delete', $setting) }}" class="">
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
