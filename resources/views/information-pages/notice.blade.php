@extends('layouts.lottery-app')

@section('content')

    <div id="notices" class="row d-flex justify-content-center mt-5">
        @isset($image)
        <div class="col-12 col-md-6 col-lg-4 py-5">
            <img src="{{asset('img/prizes/'.$image)}}" alt="saled">
        </div>
        @else
            <div class="col-12 col-md-6 col-lg-4 py-5">
                {!! $notice !!}
            </div>
        @endif
    </div>
@endsection
