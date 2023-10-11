<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
class UsersController extends Controller
{
    public function index()
    {
        // return response()->json([
        //     'message' => 'Berhasil mendapatkan data user',
        //     'data' => Users::all()->map(function ($user) {
        //         return [
        //             'id' => $user->id,
        //             'name' => $user->name,
        //             'email' => $user->email,
        //             'password' => $user->email,
        //             'role' => $user->role->name,
        //         ];
        //     })
        // ]);
        $contacts = Contact::all;
        return view('dashboard', compact('contacts'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:255'],
            'password'=> ['required', 'min:8'],
        ]);    
        
        if($validator->fails()){
            return response()->json([
                'message' => 'Gagal Menambahkan Data User',
                'error' => $validator->errors()
                 ], 422);
        }
        $validated = $request->all();
        $validated['password'] = bcrypt($validated['password']);     
        $user = new Users();
        $user->fill($validated);
        $user['role_id'] = 1;
        $user->save();        
        return response()->json([
            'message' => 'Berhasil menambahkan user', 'data' => $user
        ])->setStatusCode(201);      
    }
    public function show(Users $user)
    {
        // name: 'Katarina Smith',
        // email: 'ajfijfea@gmail.com',
        // phoneNumber: '+40 777666555',
        // avatarUrl: '/icons/Shankara.svg',
        // isVerified: true,
        // role: 'admin',
        // age: 25,
        // password: ''
        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role->name,
        ];
        return response()->json([
            'message' => 'Berhasil menampilkan data user', 'data' => $data
        ]);
    }

    public function update(Request $request, Users $user)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:255'],
        ]);    
        
        if($validator->fails()){
            return response()->json([
                'message' => 'Gagal Mengubah Data User',
                'error' => $validator->errors()
                 ], 422);
        }
        $validated = $request->all();
        $user->fill($validated)->update();
        return response()->json([
            'message' => 'Berhasil mengubah data user', 'data' => $user
        ]);
    }

    public function destroy(Users $user)
    {
        $user->delete();
        return response()->json([
            'message' => 'Berhasil hapus user'
        ]);
    }
}
