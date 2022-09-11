<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Category;




class BookController extends Controller
{

//First Function use to view all books use filtration id , desc to view new Books in top page and old books down

public function index()
    {
        $books =Book::orderBY ('id','desc')-> paginate(8);
        return view ('books/index', compact('books'));
    }

//Function use to view Book Detiles | useing ID number to verification book

public function show($id)
    {
        $book= Book::findOrFail($id);
            return view ('books/show', compact('book'));
    }

//Function use to create New Book

public function create()
    {
        $category = Category::all();
            return view('books.create' ,compact('category')) ;
    }
//Function use to create New Book | and validate request use Validation Rules on laravel https://laravel.com/docs/9.x/validation#available-validation-rules
public function store(Request $request)
    {
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
        $book->categories()->sync($request->category_ids);
            return redirect(route('books.index'));
    }
//EDIT Method use to edit Book and use ID number as a kay to validate Book

public function edit($id)
    {
        $book= Book::findOrFail($id);
            return view ('books/edit', compact('book'));
    }
//after get Books by 'ID'| Mack validate Consonant or No

public function update(Request $request , $id)
    {

        $request->validate([
                'title'=>'required|string|max:100',
                'desc'=>'required|string',
                'img'=>'nullable|image|mimes:jpg,jpeg,png'
           ]);

// if you need to ubdate img uncomment tihs function
        // if($request ->hasFile('img')){
        //     $img =$request->file('img');
        //     $ext= $img ->getClientOriginalExtension();
        //     $name="Book-".uniqid().".$ext";
        //     $img->move(public_path('uplodes/books', $name));
        // }


// or uncomment this function
        // $book= Book::findOrFile($id);
        // $old_name= $book->img;

        // if ($request->hasFile('img'))
        // {
        //     if ($name !== null)
        //     {
        //         unlink( public_path('uploads/books').$name);
        //     }
        //     $img =$request->file('img');
        //     $ext= $img ->getClientOriginalExtension();
        //     $name="Book-".uniqid().".$ext";
        //     $img->move(public_path('uplodes/books', $name));


        // }


//after validate | Make Update process

        Book::findOrFail($id)->update([
            'title'=>$request->title,
            'desc'=>$request->desc,
            // 'img'=>$name
                                      ]);
        return redirect(route('books.edit',$id));
    }
//delete Method use to delete Book and use ID number as a kay to validate Book

public function delete($id)
    {

        $book = Book::findOrFail($id);
        $book->categories()->sync([]);
        $book->delete();
        return back();


// if you need delete img after delete book uncomment this function
//  $book = Book::findOrFail($id);
//      if($book->img !== null)
    //     {
    //         unlink( public_path('uploads/books').$book->img);
    //     }
// $book->delete();
// return back();

    }
}
