@extends('layouts.app')

@section('content')

            <form method="POST" action="/updatedrole" enctype="multipart/form-data">
                @csrf
                @foreach ($data as $d)
                <input type="hidden" name="id" value="{{$d->id}}">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h1 style="text-decoration: underline">{{$d->first_name}} {{$d->middle_name}} {{$d->last_name}}</h1>

                            <div class="form-group row">
                              <label for="select" class="col-4 col-form-label">Role:</label>
                              <div class="col-8">
                                <select id="select" name="role" class="custom-select" required="required">
                                  <option value="Admin">Admin</option>
                                  <option value="User">User</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group row">
                                <div class="col text-center">
                                  <button name="submit" type="submit" class="btn btn-warning" style="padding-left: 20px; padding-right:20px">Submit</button>
                                </div>
                              </div>
                        </div>
                        <div class="col">

                        </div>
                    </div>

                    </div>


            </form>
            @endforeach

@endsection
