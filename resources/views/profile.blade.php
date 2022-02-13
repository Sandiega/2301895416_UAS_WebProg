@extends('layouts.app')

@section('content')
@if(App::getLocale() == 'id')

                    <form action="/profile/en" method="get" class="pt-2">
                        {{-- <input type="hidden" name="lang" value="{{App::getLocale()}}"> --}}
                        <button type="submit" class="btn btn-primary">English</button>
                    </form>

                @else
                    <form action="/profile/id" method="get" class="pt-2">
                        {{-- <input type="hidden" name="lang" value="{{App::getLocale()}}"> --}}
                        <button type="submit" class="btn btn-primary">Bahasa Indonesia</button>
                    </form>
                @endif

            <form method="POST" action="/save" enctype="multipart/form-data">
                @csrf
                @foreach ($data as $d)
                <div class="container">
                    <div class="row pt-4">
                        <div>
                            <img width="200px" height="250px" src="{{Storage::url($d->display_picture_link)}}" alt="Not Found">
                        </div>
                      <div class="col">
                        <div class="form-group row">
                            <label for="text" class="col-4 col-form-label">{{__('isi.First Name')}}:</label>
                            <div class="col-8">
                              <input id="text" name="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" value="{{$d->first_name}}" required="required">

                              @error('first_name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="text1" class="col-4 col-form-label">{{__('isi.Last Name')}}:</label>
                            <div class="col-8">
                              <input id="text1" name="last_name" type="text" value="{{$d->last_name}}" class="form-control @error('last_name') is-invalid @enderror" required="required">

                              @error('last_name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-4">{{__('isi.Gender')}}:</label>
                            <div class="col-8">
                                @if($d->gender_id == 1)
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input name="gender" id="radio_0" type="radio" class="custom-control-input" value="Male" required="required" checked>
                                    <label for="radio_0" class="custom-control-label">Male</label>
                                  </div>
                                  <div class="custom-control custom-radio custom-control-inline">
                                    <input name="gender" id="radio_1" type="radio" class="custom-control-input" value="Female">
                                    <label for="radio_1" class="custom-control-label">Female</label>
                                  </div>
                                @else
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input name="gender" id="radio_0" type="radio" class="custom-control-input" value="Male">
                                    <label for="radio_0" class="custom-control-label">Male</label>
                                  </div>
                                  <div class="custom-control custom-radio custom-control-inline">
                                    <input name="gender" id="radio_1" type="radio" class="custom-control-input" value="Female" required="required" checked>
                                    <label for="radio_1" class="custom-control-label">Female</label>
                                  </div>
                                @endif


                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="password" class="col-4 col-form-label">Password:</label>
                            <div class="col-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{$d->password}}">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                          </div>
                      </div>
                      <div class="col">
                        <div class="form-group row">
                            <label for="text" class="col-4 col-form-label">{{__('isi.Middle Name')}}:</label>
                            <div class="col-8">
                              <input id="text" name="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" value="{{$d->middle_name}}">

                              @error('middle_name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="text1" class="col-4 col-form-label">{{__('isi.Email Address')}}:</label>
                            <div class="col-8">
                              <input id="text1" name="email" type="text" class="form-control @error('email') is-invalid @enderror" required="required" value="{{$d->email}}">

                              @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror

                            </div>
                          </div>
                          <div class="form-group row">
                            <span class="col-4 col-form-label">Role:</span>
                            <div class="col-8">
                                @if($d->role_id == '1')
                                <span class="form-control" style="background-color: gray;width:max-content">
                                    Admin
                                </span>
                              @else
                              <span class="form-control" style="background-color: gray;width:max-content">
                                User
                            </span>
                              @endif


                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="image" class="col-4 col-form-label">{{__('isi.Display Picture')}}:</label>
                            <div class="col-8">
                                <input type="file" name="image" class="@error('image') is-invalid @enderror" value="">

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                          </div>

                      </div>
                    </div>

                  <div class="form-group row">
                    <div class="col text-center">
                      <button name="submit" type="submit" class="btn btn-warning" style="padding-left: 20px; padding-right:20px">Save</button>
                    </div>
                </div>
            </div>
            @endforeach
            </form>

@endsection
