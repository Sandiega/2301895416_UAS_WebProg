@extends('layouts.app')

@section('content')
@if(App::getLocale() == 'id')

                    <form action="/cart/en" method="get" class="pt-2">
                        {{-- <input type="hidden" name="lang" value="{{App::getLocale()}}"> --}}
                        <button type="submit" class="btn btn-primary">English</button>
                    </form>

                @else
                    <form action="/cart/id" method="get" class="pt-2">
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
                    <th scope="col">{{__('isi.Title')}}</th>
                    <th scope="col"></th>
                  </tr>
                </thead>

                <tbody>
                    @foreach ($data as $d)
                  <tr>
                    <td>{{$d->ebook->title}}</td>
                    <td><a href="/orderdelete/{{$d->id}}">Delete</a></td>

                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="bgauth ml-2" style="text-align:right;">
                <a class="p-2" style="color: black;background-color:orange" href="/submitorder">
                    <span class="text-end p-2" style="font-weight: bold">{{ __('Submit') }}</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
