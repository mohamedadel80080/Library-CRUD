@extends('layout')
@section('title')edit category-{{$category->name}}@endsection
@section('content')
{{-- inc.error It is used to display the error to the user --}}
@include('inc.errors')


<form method="POST" action="{{route('Categories.update',$category->id)}}">
@csrf
<div class="mb-3">
    {{-- in title input use title from Database colame $book->title| And use Old from laravel to save input after relode page or Or there is a mistake --}}
    <label class="form-label">Name</label>
    <input type="text" name="name" class="form-control" placeholder=" name " value="{{old('name') ?? $category->name}}">
</div>
<div>
    <h1 >{{$category->name}}</h1>
</div>

<div class="mb-3">
<br>
    {{-- Button Submit use to push date in detabase|cancel to back home page --}}
    <button class="btn btn-primary" type="submit">Submit form</button>
    <a href="{{route('Categories.index')}}"><button type="button" class="btn btn-dark">cancel</button>
    <a href="{{route('Categories.show',$category->id)}}}"><button type="button" class="btn btn-success">SHOW Edit </button></a>

</div>

</form>


@endsection
