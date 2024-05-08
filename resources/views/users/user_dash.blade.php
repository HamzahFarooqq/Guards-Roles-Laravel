

{{'this is user dashboard'}}
<hr>

@php
    $auth = Auth::user();

@endphp

{{'Welcome'.'  '. $auth->email}}



<form action="{{url('/user/logout')}}" method="POST">

    @csrf
    
        <div>
            <button type="submit">logout</button>
        </div>
        
</form>

    





{{-- {{ dd(Session::get('error')) }} --}}





@if(session()->has('user_data'))

    @php
        $user = session('user_data');
    @endphp

<p>Welcome to the dashboard.</p>

<p>{{ $user->email }} !</p>
    
@endif
