<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index page</title>
</head>
<body>

        <div>
            <div>this is an index page.</div>
            <hr>
            <div>
                <div><a href="{{url('/user/register')}}">register as a regular user</a></div>
                <div><a href="{{url('/admin/register')}}">register as a admin</a></div>               
            </div>

        </div>
    
</body>
</html>