@extends('layouts.app')

@section('content')

            <form method="POST" action="/user_register" enctype="multipart/form-data">
                @csrf

                <div class="container">
                    <h1 style="text-decoration: underline">Sign up</h1>
                    <div class="row pt-4">
                      <div class="col">
                        <div class="form-group row">
                            <label for="text" class="col-4 col-form-label ">First Name:</label>
                            <div class="col-8">
                              <input id="text" name="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" required="required">

                              @error('first_name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="text1" class="col-4 col-form-label ">Last Name:</label>
                            <div class="col-8">
                              <input id="text1" name="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" required="required">

                              @error('last_name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-4">Gender:</label>
                            <div class="col-8">
                              <div class="custom-control custom-radio custom-control-inline">
                                <input name="gender" id="radio_0" type="radio" class="custom-control-input" value="Male" required="required">
                                <label for="radio_0" class="custom-control-label">Male</label>
                              </div>
                              <div class="custom-control custom-radio custom-control-inline">
                                <input name="gender" id="radio_1" type="radio" class="custom-control-input" value="Female" required="required">
                                <label for="radio_1" class="custom-control-label">Female</label>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="password" class="col-4 col-form-label ">Password:</label>
                            <div class="col-8">
                                <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror" name="password">

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
                            <label for="text" class="col-4 col-form-label">Middle Name:</label>
                            <div class="col-8">
                              <input id="text" name="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror">

                              @error('middle_name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="text1" class="col-4 col-form-label">Email Address:</label>
                            <div class="col-8">
                              <input id="text1" name="email" type="text" class="form-control @error('email') is-invalid @enderror" required="required">

                              @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror

                            </div>
                          </div>
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
                            <label for="image" class="col-4 col-form-label">Display Picture:</label>
                            <div class="col-8">
                                <input type="file" name="image" value="" class="@error('image') is-invalid @enderror">

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
                      <button name="submit" type="submit" class="btn btn-warning" style="padding-left: 20px; padding-right:20px">Submit</button>
                      <br>
                      <a href="/login">Already have an account? click here to login</a>
                    </div>
                  </div>
            </form>

@endsection
