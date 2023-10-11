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
        // return response()->json([
        //     'message' => 'Berhasil mendapatkan data catatan',
        //     'data' => Notes::where('user_id', auth()->user()->id)->get()->map(function ($note) {
        //         return [
        //             'id' => $note->id,
        //             'title' => $note->title,
        //             'description' => $note->description,
        //         ];
        //     })
        // ]);
        $notes = Notes::where('user_id', auth()->user()->id)->get();
        return view('dashboard', compact('notes'));
    }

    public function create()
    {
        return view('notes.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description'=> 'required|min:10',
        ]);   
 
        // if($validator->fails()){
        //     return response()->json([
        //         'message' => 'Gagal Menambahkan Data Catatan',
        //         'error' => $validator->errors()
        //          ], 422);
        // }
        // $validated = $request->all();
        $validated['user_id'] = auth()->user()->id;   
        Notes::create($validated);  
        return redirect('/dashboard')->with('success', 'New notes has been added');
        // return response()->json([
        //     'message' => 'Berhasil menambahkan catatan', 'data' => $note
        // ])->setStatusCode(201);      
    }
    public function edit(Notes $note)
    {
        // name: 'Katarina Smith',
        // email: 'ajfijfea@gmail.com',
        // phoneNumber: '+40 777666555',
        // avatarUrl: '/icons/Shankara.svg',
        // isVerified: true,
        // role: 'admin',
        // age: 25,
        // password: ''
        return view('Notes.edit',[
            'notes' => $note,
        ]);
    }

    public function update(Request $request, Notes $note)
    {

        $validated = $request->validate([
            'title' => 'required|max:255',
            'description'=> 'required|min:10',
        ]);   
 
        $validated['user_id'] = auth()->user()->id;   
        Notes::where('id',$request->id)
            ->update($validated);
        return redirect('/dashboard')->with('success', 'Notes has been Updated');
    }

    public function destroy(Notes $note)
    {
        Notes::destroy($note->id);
        return redirect('/dashboard')->with('success', 'Notes has been Deleted');
       
    }
}
