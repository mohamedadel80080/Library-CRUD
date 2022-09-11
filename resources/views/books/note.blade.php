@extends('layout')
@section( 'title')
create note
@endsection
@section('content')
{{-- inc.error It is used to display the error to the user --}}
@include('inc.errors')
<form method="POST" action="{{route('note.store')}}" >
@csrf

<div class="mb-3">
{{--use Old from laravel to save input after relode page or Or there is a mistake --}}
    <label class="form-label">content</label>
    <input type="text" name="content" class="form-control" placeholder=" content " value="{{old('content')}}">
</div>

{{-- Button Submit use to push date in detabase|cancel to back home page --}}
    <button class="btn btn-primary" type="submit">Submit form</button>
    <a href="{{route('books.index')}}"><button type="button" class="btn btn-dark">cancel</button>
</div>



</form>
@endsection
