@extends('layouts.app')

@section('content')
<form method="POST" action="/user_login">
    @csrf
    <div class="container">
        <h1 style="text-decoration: underline">{{__('isi.Login')}}</h1>
        <div class="row pt-4">
            <div class="col">
                <div class="form-group row">
                    <label for="text1" class="col-4 col-form-label">{{__('isi.Email Address')}}:</label>
                    <div class="col-8">
                      <input id="text1" name="email" type="text" class="form-control" required="required">
                    </div>
                  </div>

                <div class="form-group row">
                    <label for="password" class="col-4 col-form-label">{{__('isi.Password')}}:</label>
                    <div class="col-8">
                        <input id="password" type="password" class="form-control" name="password">
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col text-center">
                      <button name="submit" type="submit" class="btn btn-warning" style="padding-left: 20px; padding-right:20px">Submit</button>
                      <br>
                      <a href="/register">{{__('isi.Click here')}}</a>
                    </div>
                  </div>
            </div>
            <div class="col">

            </div>
        </div>



    </div>



</form>
@endsection
