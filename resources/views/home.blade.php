@extends('layouts.app')

@section('content')

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
                    <td><a href="/ebookdetail/{{$d->id}}">{{$d->title}}</a></td>

                  </tr>
                  @endforeach
                </tbody>
              </table>

        </div>
    </div>
</div>
@endsection
