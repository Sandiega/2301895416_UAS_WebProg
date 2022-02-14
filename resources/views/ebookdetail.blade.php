@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">
            <h2>E-book Detail</h2>
            <br>
            @foreach ($data as $d)
            <span>{{__('isi.Title')}}: {{$d->title}}</span>
            <br>
            <br>
            <span>{{__('isi.Author')}}: {{$d->author}}</span>
            <br>
            <br>
            <span>{{__('isi.Description')}}: {{$d->description}}</span>
            <br>


        </div>
    </div>
    <div class="bgauth ml-2" style="text-align:right;">
        <a class="p-2" style="color: black;background-color:orange" href="/rentbook/{{$d->id}}">
            <span class="text-end p-2" style="font-weight: bold">{{ __('isi.Rent') }}</span>
        </a>
    </div>
    @endforeach
</div>

@endsection
