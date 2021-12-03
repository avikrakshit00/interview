<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function index()
    {
        return view ('welcome');
    }

    public function loginStore(Request $request)
    {
        $request->validate([
            'mobile' => 'required',
            'password' => 'required',

        ],
        [
            'mobile.required' => 'Mobile Number must be required',
            'password.required' => 'Password must be required',
        ]);

        $user = User::where('mobile','=',$request->mobile)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId', $user->id);
                Toastr::success('User Login Successfully. Welcome to User Dashboard.','Success');
                return redirect('dashboard');
            }
            else{
                Toastr::error('User Login Credential Are Not Matches. Please Try Again.','Error');
                return back();
            }
        }
        else{
            Toastr::error('Admin Login Credential Are Not Registered. Please Register.','Error');
            return back();
        }
    }


    public function register()
    {
        return view ('register');
    }

    public function registerStore(Request $request)
    {
        $request->validate([
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:users',
            'username' => 'required|min:3|max:20|regex:/^[a-zA-ZÑñ\s]+$/',
            'password' => 'required|min:8',

        ],

        [
            'username.required' => 'User Name must be required',
            'username.min' => 'User Name must be at least 3 charecters',
            'username.max' => 'User Name must be maximum 20 charecters',
            'username.regex' => 'Only Alphabates are allowed',

            'mobile.required' => 'Mobile Number must be required',
            'mobile.unique' => 'Mobile Number already exists',
            'mobile.regex' => 'Mobile Number format is not valid',

            'password.required' => 'Password must be required',
            'password.min' => 'Minimum 8 Charecters',

        ]);

            $user = new User;
            $user ->mobile = $request ->mobile;
            $user ->username = $request ->username;
            $user ->password = Hash::make($request->password);

            $res = $user->save();
            if($res){
                Toastr::success('User Registered Successfully !','Success');
                return redirect('/');
            }
            else{
                Toastr::error('User Registration Failed. Please Try Again!','Error');
                return back();
            }
    }

    public function logout()
    {
        if(Session::has('loginId')){
            Session::pull('loginId');
            Toastr::success('User Logout Successfully !','Success');
            return redirect('/');
        }
    }






    public function dashboard()
    {
        $list = User::paginate(15);
        $data = array();      //--------------- Have to solve ------------------------------
        if(Session::has('loginId')){
            $data = User::where('id','=',Session::get('loginId'))->first();
        }

        return view('dashboard', compact('list', 'data'));
    }

    public function daleteUser($id)
    {
        $del_user = User::find($id);
        $del_user ->delete();
        Toastr::success('User deleted successfully', 'Success');
        return redirect()->back();
    }
}
