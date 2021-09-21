@extends('layouts.lottery-app')

@section('content')

    <div id="notices" class="row d-flex justify-content-center mt-5">
        <div class="col-12 col-md-6 col-lg-4 py-5">
            {!! $notice !!}
        </div>
    </div>



@endsection
