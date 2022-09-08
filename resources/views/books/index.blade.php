@extends('layout')
@section('content')
<h1>All books</h1>
{{-- create button is continuous with BookController | method 'create' use to create New book --}}
<a href="{{route('books.create')}}"><button type="button" class="btn btn-success">create</button></a>
<a href="{{route('Categories.index')}}"><button type="button" class="btn btn-success">Categories</button></a>

{{-- foreach use t o loop on divs to display all books  --}}
@foreach($books as $book) 
<hr>
<div>
    <h1>{{$book->title}}</h1>
    <p>{{$book->desc}}</p>
</div>

{{-- button 'Update|Show|DELETE' Use to carry out operations |connected with BookController method 'Update|Show|DELETE' --}}
<div class="btn-group" role="group" aria-label="Basic mixed styles example  ">
    <a href="{{route('books.edit',$book->id)}}"><button type="button"class="btn btn-warning ">UPDATE</button></a>
    <a href="{{route('books.show',$book->id)}}}"><button type="button" class="btn btn-success">SHOW</button></a>
    <a href="{{route('books.delete',$book->id)}}}"><button type="button" class="btn btn-danger">DELETE</button></a>
</div>

@endforeach
<br>    
<br>
<center>  
{{$books->render()}}
</center>  
@endsection