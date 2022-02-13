@extends('layouts.app')

@section('content')
@if(App::getLocale() == 'id')

                    <form action="/allAccount/en" method="get" class="pt-2">
                        {{-- <input type="hidden" name="lang" value="{{App::getLocale()}}"> --}}
                        <button type="submit" class="btn btn-primary">English</button>
                    </form>

                @else
                    <form action="/allAccount/id" method="get" class="pt-2">
                        {{-- <input type="hidden" name="lang" value="{{App::getLocale()}}"> --}}
                        <button type="submit" class="btn btn-primary">Bahasa Indonesia</button>
                    </form>
                @endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">{{__('isi.Account')}}</th>
                    <th scope="col">{{__('isi.Action')}}</th>
                  </tr>
                </thead>

                <tbody>
                    @foreach ($data as $d)
                  <tr>

                    <td>{{$d->first_name}} {{$d->middle_name}} {{$d->last_name}} - {{$d->role->role_desc}}</td>
                    <td>
                        <a class="mr-3" href="/manage/updaterole/{{$d->id}}">Update Role</a>
                        <a href="/manage/delete/{{$d->id}}">Delete</a>
                    </td>

                  </tr>
                  @endforeach
                </tbody>
              </table>

        </div>
    </div>
</div>
@endsection
