<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
class AuthController extends Controller
{
    public function getToken($user){
        $token = $user->createToken(str()->random(40))->plainTextToken;
        $data = [
            'user' => $user,
            'token' => $token,
            'token_type' => 'Bearer',
            'role' => $user->role->name,
        ];
        return response()->json($data, 200);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'password' => 'required',
        ]);    
        
        if($validator->fails()){
            return response()->json([
                'message' => 'Gagal Login',
                'error' => $validator->errors()
                 ], 422);
        }
        if(!Auth::attempt($validator->validated())){
            return response()->json([
                'message' => 'Nomor telepon atau password salah'
                 ], 401);
        }
        return $this->getToken(Auth::user());
    }
    
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required',
        ]);    
        
        if($validator->fails()){
            return response()->json([
                'message' => 'Gagal Registrasi',
                'error' => $validator->errors()
                 ], 422);
        }
        $validated = $validator->validated();
        $validated['password'] = bcrypt($validated['password']);     
        $user = new User();
        $user->fill($validated);
        $user['role_id'] = 1;
        $user->save();        
        return response()->json([
            'message' => 'Berhasil Registrasi User', 'data' => $user
        ]);        
    }

    public function logout(){
        Auth::user()->tokens()->delete();
        return response()->json([
            'message' => 'You have successfully logout and token deleted'
        ]);
    }
}
