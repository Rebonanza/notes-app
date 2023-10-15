<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $notes = Notes::where('user_id', auth()->user()->id)->get();
        return view('Notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description'=> 'required|min:10',
        ]);   
 
        $validated['user_id'] = auth()->user()->id;   
        Notes::create($validated);  
        return redirect('/dashboard')->with('success', 'New notes has been added');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function show(Notes $notes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function edit(Notes $notes)
    {
        //
        return view('Notes.edit',[
            'notes' => $notes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notes $notes)
    {
        //
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description'=> 'required|min:10',
        ]);   
 
        $validated['user_id'] = auth()->user()->id;   
        Notes::where('id',$notes->id)
            ->update($validated);
        return redirect('/dashboard')->with('success', 'Notes has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notes $notes)
    {
        //
        Notes::destroy($notes->id);
        return redirect('/dashboard')->with('success', 'Notes has been Deleted');
    }
}
