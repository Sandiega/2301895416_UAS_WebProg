@extends('layouts.app')

@section('content')
@if(App::getLocale() == 'id')

                    <form action="/home/en" method="get" class="pt-2">
                        {{-- <input type="hidden" name="lang" value="{{App::getLocale()}}"> --}}
                        <button type="submit" class="btn btn-primary">English</button>
                    </form>

                @else
                    <form action="/home/id" method="get" class="pt-2">
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
                    <th scope="col">{{__('isi.Author')}}</th>
                    <th scope="col">{{__('isi.Title')}}</th>
                  </tr>
                </thead>

                <tbody>
                    @foreach ($data as $d)
                  <tr>
                    <td>{{$d->author}}</td>
                    <td><a href="/ebookdetail/{{$d->id}}/{{App::getlocale()}}">{{$d->title}}</a></td>

                  </tr>
                  @endforeach
                </tbody>
              </table>

        </div>
    </div>
</div>
@endsection
