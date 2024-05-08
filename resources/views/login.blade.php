



<form action="{{url('/login')}}" method="POST">
    @csrf


<div>
    <label for="">email</label>
    <input type="email" name="email">
</div>

<div>
    <label for="">password</label>
    <input type="password" name="password">
</div>

<button type="submit" > register</button>

{{-- <div>
    <a href="{{url('/login')}}">already have an account. go to Login page</a>
</div> --}}

</form>



@if(Session::has('error'))

<h2> {{Session::get('error')}} </h2>

@endif