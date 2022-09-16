<?php

namespace App\Http\Controllers;

use App\Mail\resetPassword;
use App\Mail\WelcomeMail;
use App\Models\Activity;
use App\Models\CheckOut;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    //
    public function index(){
        return view('users.login');
    }

    public function redirect(){
        return view('users.register');
    }

    public function register(Request $request){
        //dd($request);
        $user = $request->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users','email')],
            'password' => ['required', 'min:6']
        ]);

        //encrypt password
        $user['password'] = bcrypt($user['password']);

        //create user account
        $account = User::create($user);

        
        auth()->login($account);
        
        Activity::create([
            'user_id' => auth()->id(),
            'activity' => auth()->user()->first_name . " " . 'account created'
        ]);
        
        Mail::to(auth()->user()->email)->send(new WelcomeMail);

        Activity::create([
            'user_id' => auth()->id(),
            'activity' => auth()->user()->first_name . " " . 'signed in'
        ]);

        return redirect('/')->with('message', 'Account successfully created');
    }

    public function store(Request $request){
        //dd($request);
        $user = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($user)){
            if(auth()->user()->role == 1){
                $request->session()->regenerate();
                Activity::create([
                    'user_id' => auth()->id(),
                    'admin_activity' => 'Admin logged in'
                ]);
                return redirect('/admin')->with('message', 'Welcome Administrator');
            }else{
                $request->session()->regenerate();
                Activity::create([
                    'user_id' => auth()->id(),
                    'activity' => auth()->user()->first_name . " " . 'signed in'
                ]);
                return redirect('/')->with('message', 'Welcome' . " " .auth()->user()->first_name);
            }
        }else{
            return back()->withErrors(['email' => 'invalid credentials'])->onlyInput('email');
        }
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/')->with('message', 'Successfully Logged Out');
    }

    public function forgotRedirect(){
        
        return view('users.forgotPassword');
    }

    public function forgotPassword(Request $request){
        //dd($request);
        Mail::to($request->forgotemail)->send(new resetPassword);
        return back();
    }

    public function mailReset(){
        return view('users.resetPassword');
    }

    public function mailUpdate(Request $request){
        dd($request);
    }

    public function profile(){
        if(Auth::check()){
            return view('profile.index');
        }else{
            return redirect('/login')->with('message','Please Login');
        }
        
    }

    public function order(){
        $id = auth()->id();
        return view('components.profile-orders', [
            'orders' => CheckOut::where('user_id',$id)->get()
        ]);
    }

    public function account(){
        if(Auth::check()){
            return view('components.profile-account');
        }else{
            return redirect('/login')->with('message','Please Login');
        }
    }


    public function passwordReset(){
        return view('components.profile-password');
    }

    public function resetPassword(Request $request){
        //dd($request);
        $user = Auth::user();

        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => ['required', 'min:6'],
            'newPassword2' => ['required', 'min:6']
        ]);

        if($request->oldPassword == $request->oldPassword2){
            if(!Hash::check($request->oldPassword, $user->password)){
                return back()->with('message', 'Incorrect Old Password');
            }
        }
        /*$update = [
            'password' => Hash::make($request->newPassword)
        ];*/

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->newPassword)
        ]);

        return redirect('/')->with('message','Password successfully Updated');
        
        //User::update($update);
    }




}


