<?php

namespace App\Http\Controllers;
use App\Models\Notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class NotesController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Berhasil mendapatkan data catatan',
            'data' => Notes::all()->map(function ($note) {
                return [
                    'id' => $note->id,
                    'title' => $note->title,
                    'description' => $note->description,
                    
                ];
            })
        ]);
    }

    public function create()
    {
        return view('notes.create');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'max:255'],
            'description'=> ['required', 'min:10'],
        ]);    
        
        if($validator->fails()){
            return response()->json([
                'message' => 'Gagal Menambahkan Data Catatan',
                'error' => $validator->errors()
                 ], 422);
        }
        $validated = $request->all();
        $validated['password'] = bcrypt($validated['password']);     
        $note = new Notes();
        $note->fill($validated);
        $note->save();        
        return response()->json([
            'message' => 'Berhasil menambahkan catatan', 'data' => $note
        ])->setStatusCode(201);      
    }
    public function show(Notes $note)
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
            'title' => $note->title,
            'description' => $note->description,
           
        ];
        return response()->json([
            'message' => 'Berhasil menampilkan data catatan', 'data' => $data
        ]);
    }

    public function update(Request $request, Notes $note)
    {

        $validator = Validator::make($request->all(), [
            'title' => ['required', 'max:255'],
            'description'=> ['required', 'min:10'],
        ]);    
        
        if($validator->fails()){
            return response()->json([
                'message' => 'Gagal Mengubah Catatan',
                'error' => $validator->errors()
                 ], 422);
        }
        $validated = $request->all();
        $note->fill($validated)->update();
        return response()->json([
            'message' => 'Berhasil mengubah catatan', 'data' => $note
        ]);
    }

    public function destroy(Notes $note)
    {
        $note->delete();
        return response()->json([
            'message' => 'Berhasil hapus catatan'
        ]);
    }
}
