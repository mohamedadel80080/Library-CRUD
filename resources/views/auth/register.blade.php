@extends('layout')
@section( 'title')
create Account
@endsection
@section('content')
{{-- inc.error It is used to display the error to the user --}}
@include('inc.errors')
<form method="POST" action="{{route('auth.handleRegister')}}">
@csrf

<div class="mb-3">
{{--use Old from laravel to save input after relode page or Or there is a mistake --}}
    <label class="form-label">name</label>
    <input type="text" name="name" class="form-control" placeholder=" name " value="{{old('name')}}">

</div>

<div class="mb-3">
    {{--use Old from laravel to save input after relode page or Or there is a mistake --}}
        <label class="form-label">Email</label>
        <input type="text" name="email" class="form-control" placeholder=" email " value="{{old('email')}}">
        
    </div>

    
    <div class="mb-3">
        {{--use Old from laravel to save input after relode page or Or there is a mistake --}}
            <label class="form-label">Password</label>
            <input type="Password" name="pass" class="form-control" placeholder=" password " value="{{old('pass')}}">
            
        </div>
        




<div class="mb-3">
    <br>
{{-- Button Submit use to push date in detabase|cancel to back home page --}}
    <button class="btn btn-primary" type="submit">Register NOW</button>
    <a href="{{route('books.index')}}"><button type="button" class="btn btn-dark">cancel</button>
</div>



</form>
@endsection