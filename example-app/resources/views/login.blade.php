<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <form method="POST" action="{{'login'}}">
        @csrf
        <label for="">Email: </label><input name="email"><br>
        @if ($errors->has('email')) {{$errors->first('email')}}<br>@endif
        <label for="">Password: </label><input name="password"><br>
        @if ($errors->has('password')) {{$errors->first('password')}}<br>@endif
        <label for="">Remember <input type="checkbox" name="remember"></label>
        <input type="submit">
    </form>
</body>
</html>


