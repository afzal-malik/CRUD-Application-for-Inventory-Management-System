<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{


    public function login(Request $request){
        $upcomingData = $request->validate([
           'loginname' => 'required',
           'loginpassword' => 'required'
        ]);
 
         if(auth()->attempt(['name' => $upcomingData['loginname'], 'password' => $upcomingData['loginpassword']])){
         $request->session()->regenerate();
     }
 
          return redirect('/');
     }
     

     public function logout(){
         auth()->logout();
         return redirect('/');
     }


    public function register(Request $request){
        $upcomingData = $request->validate([
            'name' => ['required', 'min: 3', 'max: 255', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min: 3', 'max: 255']
        ]);

        $upcomingData['password'] = bcrypt($upcomingData['password']);
        $user = User::create($upcomingData);
        auth()->login($user);
        return redirect('/');
    }
}
