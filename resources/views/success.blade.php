@extends('layouts.app')

@section('content')
<div class="container">

    <div style="border-radius:50%;width:500px;height:500px;outline: #b2c8e2 solid 10px;text-align:center" class="circle m-auto">


        <div class="tulisan" style="padding-top:210px">
            @if(session()->has('submit'))

                <h2>{{ session()->get('submit') }}</h2>

                <a class href="/home">click here to "Home"</a>

            @endif

            @if(session()->has('save'))

                <h2>{{ session()->get('save') }}</h2>

                <a class href="/home">click here to "Home"</a>

            @endif

            @if(session()->has('logout'))

                <h2>{{ session()->get('logout') }}</h2>

            @endif


        </div>


    </div>

</div>
@endsection
