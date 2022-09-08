@extends('layout')
@section( 'title')
create category
@endsection
@section('content')
{{-- inc.error It is used to display the error to the user --}}
@include('inc.errors')
<form method="POST" action="{{route('Categories.store')}}" enctype="multipart/form-data">
@csrf

<div class="mb-3">
{{--use Old from laravel to save input after relode page or Or there is a mistake --}}
    <label class="form-label">name</label>
    <input type="text" name="name" class="form-control" placeholder=" name " value="{{old('name')}}">
</div>

<div class="mb-3">
    <br>
{{-- Button Submit use to push date in detabase|cancel to back home page --}}
    <button class="btn btn-primary" type="submit">Submit form</button>
    <a href="{{route('books.index')}}"><button type="button" class="btn btn-dark">cancel</button>
</div>



</form>
@endsection