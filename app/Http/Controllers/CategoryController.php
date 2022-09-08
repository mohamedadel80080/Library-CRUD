<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
//First Function use to view all books use filtration id , desc to view new Books in top page and old books down

public function index()
    {
        $category =Category::all();
        return view ('Categories/index', compact('category'));
    }

//Function use to view Book Detiles | useing ID number to verification book

public function show($id)
    {
        $category= Category::findOrFail($id);
        return view ('Categories.show', compact('category'));
    }

//Function use to create New Book

public function create()
    {
        return view('categories.create');
    }

//Function use to create New Book | and validate request use Validation Rules on laravel https://laravel.com/docs/9.x/validation#available-validation-rules

public function store(Request $request)
    {
    $request->validate([
        'name'=>'required|string|max:100',
                    ]);
 
//After validate | create category

    Category::create([
            'name'=>$request->name,
                ]);
        return redirect(route('Categories.index'));
 
    }

//EDIT Method use to edit Category and use ID number as a kay to validate Book 

public function edit($id)
    {  
        $category= Category::findOrFail($id);
        return view ('Categories.edit', compact('category'));
    }
//after get Category by 'ID'| Mack validate Consonant or No
 
public function update(Request $request , $id)
    {

    $request->validate([
            'name'=>'required|string|max:100',
           ]);


           
//after validate | Make Update process 
  
    $category= Category::findOrFail($id);
        
    $category->update([

        'name'=>$request->name
    ]);
    
 
        return redirect(route('Categories.edit',$id));
    }
//delete Method use to delete Category and use ID number as a kay to validate Book 
public function delete($id){

    $category = Category::findOrFail($id);
    $category->delete();
    return back();

    }
}

