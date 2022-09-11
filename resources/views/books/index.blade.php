@extends('layout')
@section('content')


@auth
<h1>Your notes {{Auth::user()->name}}:</h1>
<a href="{{route('note.create')}}"><button type="button" class="btn btn-success">Create note</button></a>

@foreach ( Auth::user()->notes as $note )
<hr>
    <p>{{$note->content}}</p>
    <a href="{{route('notes.delete',$note->id)}}}"><button type="button" class="btn btn-danger">DELETE</button></a>


@endforeach
@endauth
<hr>
<h1>All books</h1>
{{-- create button is continuous with BookController | method 'create' use to create New book --}}
@guest
    <a href="{{route('auth.register')}}"><button type="button" class="btn btn-success">register</button></a>
    <a href="{{route('auth.login')}}"><button type="button" class="btn btn-success">Login</button></a>
    @endguest
    @auth
    <a href="{{route('books.create')}}"><button type="button" class="btn btn-success">create</button></a>
    <a href="{{route('Categories.index')}}"><button type="button" class="btn btn-success">Categories</button></a>
    <a href="{{route('auth.logout')}}"><button type="button" class="btn btn-danger">logout</button></a>
@endauth

{{-- foreach use t o loop on divs to display all books  --}}
@foreach($books as $book)
<hr>

<div>
    <h1>{{$book->title}}</h1>
    <p>{{$book->desc}}</p>
</div>

{{-- button 'Update|Show|DELETE' Use to carry out operations |connected with BookController method 'Update|Show|DELETE' --}}
{{-- @auth  --}}
<div class="btn-group" role="group" aria-label="Basic mixed styles example  ">
    <a href="{{route('books.edit',$book->id)}}"><button type="button"class="btn btn-warning ">UPDATE</button></a>
    <a href="{{route('books.show',$book->id)}}"><button type="button" class="btn btn-success">SHOW</button></a>
    <a href="{{route('books.delete',$book->id)}}"><button type="button" class="btn btn-danger">DELETE</button></a>
</div>
{{-- @endauth --}}
@endforeach
<br>
<br>

<center>
{{$books->render()}}
</center>
@endsection
