


{{'this is admin index page , also called dashoard'}}
<hr>

@php
    $user = Auth::guard('admin')->user();   
    
@endphp


{{'Welcome'.'  '. $user->email}}



<form action="{{url('/admin/logout')}}" method="POST">
@csrf

    <div>
        <button type="submit">logout</button>
    </div>
    
</form>






{{-- {{ dd(Session::get('error')) }} --}}





@if(session()->has('admin_data'))
    @php
        $admin = session('admin_data');
    @endphp

<p>Welcome to the dashboard.</p>

<p>{{ $admin->email }} !</p>
    
@endif


