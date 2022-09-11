@extends('layout')
@section( 'title')
create book
@endsection
@section('content')
{{-- inc.error It is used to display the error to the user --}}
@include('inc.errors')
<form method="POST" action="{{route('books.store')}}" enctype="multipart/form-data">
@csrf



<div class="mb-3">
{{--use Old from laravel to save input after relode page or Or there is a mistake --}}
    <label class="form-label">Title</label>
    <input type="text" name="title" class="form-control" placeholder=" title " value="{{old('title')}}">
</div>

<div class="mb-3">
    <label for="formFile" class="form-label">Image</label>
    <input class="form-control" type="file" name="img">
</div>
    <label class="form-label">choose category: </label>
@foreach ( $category as $Category )
<div class="form-check">
    <input class="form-check-input" type="checkbox" name="category_ids[]" value="{{$Category->id}}" id="flexCheckDefault">
    <label class="form-check-label" for="flexCheckDefault">{{$Category->name}}</label>
</div>

<br>
@endforeach

<div class="mb-3">
    <label class="form-label">description</label>
    <input type="text" class="form-control" name="desc" placeholder="description" value="{{old('desc')}}">
    <br>
{{-- Button Submit use to push date in detabase|cancel to back home page --}}
    <button class="btn btn-primary" type="submit">Submit form</button>
    <a href="{{route('books.index')}}"><button type="button" class="btn btn-dark">cancel</button>
</div>

</form>
@endsection
