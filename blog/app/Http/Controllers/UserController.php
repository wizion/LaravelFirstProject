<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use DB;
use Auth;
use View;
use Hash;

class UserController extends Controller
{
    public function changeUserData(){

        return view('userdata.data');
    }
    
    public function saveData(Request $request){

        if(!empty($request->input('password'))){
            if($request->input('password') === $request->input('confirmpassword')){
                    DB::table('users')
                    ->where('id', $request->input('user_id'))
                    ->update(['password' => Hash::make($request->input('password'))]);
            }
        }
        
        
        DB::table('users')
            ->where('id', $request->input('user_id'))
            ->update([
                'name' => $request->input('name'), 
                'phone_number' => $request->input('phone_number'),
                'email' => $request->input('email'),
                'bornsdate' => $request->input('bornsdate')
            ]);
        return redirect("changemydata");
    }
    
}
