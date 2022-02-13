<?php

namespace App\Http\Controllers;

use App\Models\orderModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App;
use Illuminate\Support\Facades\Route;

class PageController extends Controller
{
    public function input(Request $request)
    {

        if($request->middle_name == NULL){
            $request->validate([
                // 'role' => ['required'],
                // 'gender_id' => ['required'],
                'first_name' => ['required', 'alpha', 'max:25'],
                'last_name' => ['required', 'alpha', 'max:25'],
                'email' => ['required', 'string', 'email'],
                'password' => ['required', 'string','min:8','regex:/^(?=.*\d).+$/'],
                'image' => ['required', 'file', 'image'],

            ]);
        }

        else{

            $request->validate([
                // 'role' => ['required'],
                // 'gender_id' => ['required'],
                'first_name' => ['required', 'alpha', 'max:25'],
                'middle_name' => ['alpha', 'max:25'],
                'last_name' => ['required', 'alpha', 'max:25'],
                'email' => ['required', 'string', 'email'],
                'password' => ['required', 'string','min:8','regex:/^(?=.*\d).+$/'],
                'image' => ['required', 'file', 'image'],

            ]);

        }


        // dd($request);
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

        DB::table('users')->insert([
            'role_id' => $fk_role,
            'gender_id' => $fk_gender,
            'first_name' => $request['first_name'],
            'middle_name' => $request['middle_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'display_picture_link' => $imagePath,

        ]);


        return redirect('/login');
    }

    public function check_user_login(Request $request){
        $credentials = [
            'email' =>$request->email,
            'password'=>$request->password,
        ];



        $lang = App::getlocale();


        if(Auth::attempt($credentials)){

            if(Auth::user()->delete_flag == 1){
                Auth::logout();

                return redirect('login');
            }

            return redirect('/home/en');
        }

        return redirect('login');
    }

    public function user_logout(Request $request){
        Auth::logout();

        return redirect('/success')->with('logout','Log Out Success!');
    }

    public function show_ebook(){
       $data = DB::table('ebook')->get();

       return view('home',compact('data'));
    }


    public function show_ebook2($lang){
        $data = DB::table('ebook')->get();

        App::setlocale($lang);


        return view('home',compact('data'));
     }

    public function ebook_detail($id){
        $data = DB::table('ebook')
        ->where('ebook.id',$id)
        ->get();

        return view('ebookdetail',compact('data'));
    }

    public function ebook_detail2($id,$lang){
        $data = DB::table('ebook')
        ->where('ebook.id',$id)
        ->get();

        App::setlocale($lang);

        return view('ebookdetail',compact('data'));
    }

    public function rent_book($id){
       $data=DB::table('ebook')
        ->where('ebook.id',$id)
        ->first();

        DB::table('order')->insert([

            'account_id' => Auth::user()->id,
            'ebook_id' => $data->id,
            'order_date' => date('Y-m-d H:i:s'),
        ]);

        return redirect('/home');
    }

    public function cart(){
        $data=orderModel::where('order.account_id','=',Auth::user()->id)
        ->get();



        return view('/cart',compact('data'));
    }

    public function cart2($lang){
        $data=orderModel::where('order.account_id','=',Auth::user()->id)
        ->get();

        App::setlocale($lang);

        return view('/cart',compact('data'));
    }

    public function delete_order($id){
        DB::table('order')->where('order.id',$id)
        ->delete();

        return redirect('/cart');
    }

    public function submitorder(){

        $data=orderModel::where('order.account_id','=',Auth::user()->id)
        ->get();

        foreach($data as $d){
            orderModel::where('order.account_id','=',Auth::user()->id)
            ->where('order.id','=',$d->id)
            ->delete();
        }

        return redirect('/success')->with('submit','Success!');
    }

    public function profile(){

        $data=DB::table('users')->where('users.id',Auth::user()->id)
        ->get();

        return view('/profile',compact('data'));
    }

    public function profile2($lang){

        $data=DB::table('users')->where('users.id',Auth::user()->id)
        ->get();

        App::setlocale($lang);

        return view('/profile',compact('data'));
    }

    public function save(Request $request){

        $pass = $request->password;
        $flag_num =0;
        for($i=0;$i<strlen($pass);$i++){
            if(is_numeric($pass[$i])){
                $flag_num++;
            }

        }
        // dd($flag_num);
        if($request->middle_name == NULL){



            $request->validate([

                'first_name' => ['required', 'alpha', 'max:25'],
                'last_name' => ['required', 'alpha', 'max:25'],
                'email' => ['required', 'string', 'email'],
                'password' => ['required', 'string','min:8','regex:/^(?=.*\d).+$/'],
                'image' => ['required', 'file', 'image'],

            ]);
            // dd($request);
        }
        else{

            $request->validate([
                'first_name' => ['required', 'alpha', 'max:25'],
                'middle_name' => ['alpha', 'max:25'],
                'last_name' => ['required', 'alpha', 'max:25'],
                'email' => ['required', 'string', 'email'],
                'password' => ['required', 'string','min:8'],
                'image' => ['required', 'file', 'image'],

            ]);
        }




        $file = $request->file('image');
        $imageName = time().'_'.$file->getClientOriginalName();

        Storage::putFileAs('public/images',$file, $imageName);
        // $path = $validated['image']->storeAs('public/images', $imageName);
        $imagePath = 'images/'.$imageName;


    if($request['gender'] =='Male'){
        $fk_gender=1;
    }
    else{
        $fk_gender=2;
    }

        DB::table('users')->where('users.id',Auth::user()->id)->update([
            'gender_id' => $fk_gender,
            'first_name' => $request['first_name'],
            'middle_name' => $request['middle_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'display_picture_link' => $imagePath,

        ]);


        return redirect('/success')->with('save','Saved!');

    }

    public function manageacc(){
        $data=User::where('users.id','!=',Auth::user()->id)
        ->where('delete_flag',NULL)
        ->get();



        return view('manageaccount',compact('data'));
    }

    public function manageacc2($lang){
        $data=User::where('users.id','!=',Auth::user()->id)
        ->where('delete_flag',NULL)
        ->get();

        App::setLocale($lang);

        return view('manageaccount',compact('data'));
    }

    public function deleteacc($id){
        DB::table('users')->where('users.id',$id)
        ->update([
            'delete_flag' =>1,
        ]);


        return redirect('/allAccount');
    }

    public function updaterole($id){
        $data=DB::table('users')->
        where('users.id',$id)->get();


        return view('updaterole',compact('data'));
    }


    public function updatedrole(Request $request){

        if($request['role'] == 'Admin'){
            $fk_role=1;
        }
        else{
            $fk_role=2;
        }
        if(Auth::user()->middle_name != NULL ){
            $modifby_name = Auth::user()->first_name +" "+Auth::user()->middle_name +" "+Auth::user()->last_name;
        }
        else{
            $modifby_name = Auth::user()->first_name ." ".Auth::user()->last_name;
        }


        DB::table('users')->
        where('users.id',$request->id)->update([
            'role_id' =>$fk_role,
            'modified_by' =>$modifby_name,
            'modified_at' =>date('Y-m-d H:i:s'),
        ]);


        return redirect('/allAccount');
    }

    public function change_lang(){

        App::setlocale('id');

        if(App::getLocale() == 'id'){
            App::setlocale(session('en'));
        }
        else{
            App::setlocale(session('id'));
        }

        dd(Route::current());


        return redirect()->back();
    }


}
