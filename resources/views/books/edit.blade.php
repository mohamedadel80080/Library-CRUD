@extends('layout')
@section('title')edit book-{{$book->title}}@endsection
@section('content')
{{-- inc.error It is used to display the error to the user --}}
@include('inc.errors')


<form method="POST" action="{{route('books.update',$book->id)}}">
@csrf    
<div class="mb-3">
    {{-- in title input use title from Database colame $book->title| And use Old from laravel to save input after relode page or Or there is a mistake --}}
    <label class="form-label">Title</label>
    <input type="text" name="title" class="form-control" placeholder=" title " value="{{old('title') ?? $book->title}}">
</div>

<div class="mb-3">
    {{-- in description input use description from Database colame $book->desc| And use Old from laravel to save input after relode page or Or there is a mistake --}}
    <label class="form-label">description</label>
    <input type="text" class="form-control" name="desc" placeholder="desc" value="{{old('desc')??$book->desc}}"> 

<br>
    {{-- Button Submit use to push date in detabase|cancel to back home page --}}
    <button class="btn btn-primary" type="submit">Submit form</button>
    <a href="{{route('books.index')}}"><button type="button" class="btn btn-dark">cancel</button>
</div>

</form>


@endsection