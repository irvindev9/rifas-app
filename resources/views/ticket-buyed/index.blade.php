@extends('layouts.lottery-app')

@section('content')

    <div class="container">
        <buy-ticket-component lottery="{{$lottery}}" ticket="{{$ticket}}" />
    </div>


    @include('home.contact-us')

    @include('home.notice-of-privacity')

@endsection
