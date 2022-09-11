<?php

namespace App\Http\Controllers;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NoteController extends Controller
{


    public function create()
    {
        return view('books.note');
    }



    public function store (Request $request)
    {
    $request->validate([
        'content'=>'required',
                    ]);

//After validate | create category

Note::create([
            'content'=>$request->content,
            'user_id'=>Auth::user()->id
            ]);

    return redirect(route('books.index'));

    }
public function delete($id){

        $note = Note::findOrFail($id);
        $note->delete();
        return back();

        }
}
