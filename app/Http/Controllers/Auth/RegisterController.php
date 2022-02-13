<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::login;

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function input(Request $request)
    {

        $request->validate([
            // 'role' => ['required'],
            // 'gender_id' => ['required'],
            // 'first_name' => ['required', 'string', 'max:25'],
            // 'middle_name' => ['required', 'string', 'max:25'],
            // 'last_name' => ['required', 'string', 'max:25'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:account'],
            // 'password' => ['required', 'string'],
            // 'image' => ['required', 'file', 'image'],

        ]);


        dd($request);
        $file = $request->file('image');
            $imageName = time().'_'.$file->getClientOriginalName();

            Storage::putFileAs('public/images',$file, $imageName);
            // $path = $validated['image']->storeAs('public/images', $imageName);
            $imagePath = 'images/'.$imageName;

        if($request['role'] == 'Admin'){
            $fk_role=1;
        }
        else{
            $fk_role=2;
        }

        if($request['gender'] =='Male'){
            $fk_gender=1;
        }
        else{
            $fk_gender=2;
        }
        return User::create([
            'name' => $request['name'],
            'role' => $fk_role,
            'gender_id' => $fk_gender,
            'first_name' => $request['first_name'],
            'middle_name' => $request['middle_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($data['password']),
            'display_picture_link' => $imagePath,
        ]);

    }

}
