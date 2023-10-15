<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
class AuthController extends Controller
{
    // public function getToken($user){
    //     $token = $user->createToken(str()->random(40))->plainTextToken;
    //     $data = [
    //         'user' => $user,
    //         'token' => $token,
    //         'token_type' => 'Bearer',
    //         'role' => $user->role->name,
    //     ];
    //     return response()->json($data, 200);
    // }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required|min:8',
        ]);     
        
        if(Auth::attempt($validated)){
           $request->session()->regenerate();
           return redirect()->intended('/dashboard'); 
        }
        return back()->with('login-error', 'Login failed');
    }
    
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:8',
        ]);   
 
        // if($validator->fails()){
        //     return response()->json([
        //         'message' => 'Gagal Menambahkan Data Catatan',
        //         'error' => $validator->errors()
        //          ], 422);
        // }
        // $validated = $request->all();
        $validated['password'] = bcrypt($validated['password']); 
        $validated['role_id'] = 1;
        Users::create($validated);  
        return redirect('/login')->with('success', 'Your account has been created');
       
    }

    public function logout(){
        Auth::logout();
 
        request()->session()->invalidate();
 
        request()->session()->regenerateToken();
 
        return redirect('/');
    }
}
