@extends('layout')
@section( 'title')
Login
@endsection
@section('content')
{{-- inc.error It is used to display the error to the user --}}
@include('inc.errors')
<form method="POST" action="{{route('auth.handleLogin')}}">
@csrf



<div class="mb-3">
    {{--use Old from laravel to save input after relode page or Or there is a mistake --}}
        <label class="form-label">Email</label>
        <input type="text" name="email" class="form-control" placeholder=" email " value="{{old('email')}}">
        
    </div>

    
    <div class="mb-3">
        {{--use Old from laravel to save input after relode page or Or there is a mistake --}}
            <label class="form-label">password</label>
            <input type="password" name="password" class="form-control" placeholder=" password " value="{{old('password')}}">
            
        </div>
        




<div class="mb-3">
    <br>
{{-- Button Submit use to push date in detabase|cancel to back home page --}}
    <button class="btn btn-primary" type="submit">Login</button>
    <a href="{{route('books.index')}}"><button type="button" class="btn btn-dark">cancel</button>
</div>



</form>
@endsection