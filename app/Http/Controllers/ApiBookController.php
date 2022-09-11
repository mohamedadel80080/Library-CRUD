<?php
// ApiBook is use to display books and create and deleted| this is route-> 'yourdomain/handle-Register'

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;

class ApiBookController extends Controller
{
// index function is use to display books | this is route-> 'http://yourdomain/api/books'
public function index()
    {
        $books=Book::get();
        return response()->json($books);
    }
// show function is use to display Book use Id | this is route-> 'http://yourdomain/api/show'
public function show($id)
    {
        $book = Book::findOrFail($id);
        return response()->json($book);
    }

// store function is use to validate date and| create Book | this is route-> 'http://yourdomain/api/show'
public function store(Request $request)
    {
//validate date

    $request->validate([
            'title'=>'required|string|max:100',
            'desc'=>'required|string',
            'img'=>'required|image|mimes:jpg,jpeg,png',
            'category_ids'=> 'required',
            'category_ids.*'=> 'exists  :categories,id'
                       ]);
// validate request img

            $img =$request->file('img');
            $ext= $img ->getClientOriginalExtension();
            $name="Book-".uniqid().".$ext";
            $img->move(public_path('uplodes/books', $name));
//After validate | create Book

   $book = Book::create([
            'title'=>$request->title,
            'desc'=>$request->desc
                        ]);
//after validate all date syne request category_ids to sign book in category

    $book->categories()->sync($request->category_ids);
    $success= "book created successfully";
    return response()->json($success);
    }

// update function is use to validate date and| update Book | this is route-> 'http://yourdomain/api/update/{id}'

public function update(Request $request , $id)
    {
    $validator = Validator::make($request->all(), [
            'title'=>'required|string|max:100',
            'desc'=>'required|string',
                        ]);

    if ($validator->fails())
        {
            $errors = $validator->errors();
            return response()->json($errors);
        }

    Book::findOrFail($id)->update([
            'title'=>$request->title,
            'desc'=>$request->desc,
                                ]);
        $success= "book update successfully";
        return response()->json($success);
    }

// delete function is use to validate ID  and| delete Book And delete on colom categories | this is route-> 'http://yourdomain/api/update/{id}'

public function delete($id)
    {
        $book = Book::findOrFail($id);
        $book->categories()->sync([]);
        $book->delete();
        $success= "book deleted successfully";
        return response()->json($success);
    }

}
