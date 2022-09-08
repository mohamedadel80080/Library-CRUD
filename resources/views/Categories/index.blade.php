@extends('layout')
@section('content')
<h1>All category</h1>
{{-- create button is continuous with BookController | method 'create' use to create New book --}}
<a href="{{route('Categories.create')}}"><button type="button" class="btn btn-success">create</button></a>
<a href="{{route('books.index')}}"><button type="button" class="btn btn-success">Books</button></a>
<a href="{{route('auth.register')}}"><button type="button" class="btn btn-success">register</button></a>

{{-- foreach use to loop on divs to display all books --}}
@foreach($category as $Category)
<hr>
<div>
    <h1>{{$Category->id}}</h1>
    <p>{{$Category->name}}</p>
</div>

{{-- button 'Update|Show|DELETE' Use to carry out operations |continuous with BookController method 'Update|Show|DELETE'
--}}

<div class="btn-group" role="group" aria-label="Basic mixed styles example  ">
    <a href="{{route('Categories.edit',$Category->id)}}"><button type="button" class="btn btn-warning ">UPDATE</button></a>
    <a href="{{route('Categories.show',$Category->id)}}}"><button type="button" class="btn btn-success">SHOW</button></a>
</div>

@auth
@if (Auth::user()->is_admin)
    <a href="{{route('Categories.delete',$Category->id)}}}"><button type="button" class="btn btn-danger">DELETE</button></a>
@endif
@endauth

@endforeach
<br>
<br>
<center>
    x</center>
@endsection
