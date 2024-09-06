<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="wrapper">
        <div class="title">
            SignUp Form
        </div>
        <form action="/signUp" method="POST">
            @csrf
            <div class="field">
                <input type="text" placeholder="Name" name="name" value="{{old('name')}}">
            </div>
            @error('name')
                <p style="color: red; margin-left: 20px">{{ $message }}</p>
            @enderror
            <div class="field">
                <input type="text" placeholder="Email" name="email" value="{{old('email')}}">
            </div>
            @error('email')
                <p style="color: red; margin-left: 20px">{{ $message }}</p>
            @enderror
            <div class="field">
                <input type="password" placeholder="password" name="password" value="{{old('password')}}">
            </div>
            @error('password')
                <p style="color: red; margin-left: 20px">{{ $message }}</p>
            @enderror
            <div class="field">
                <input type="submit" value="SignUp">
            </div>
            <div class="signup-link">
                Already have an account? <a href="/login">signIn now</a>
            </div>
        </form>
    </div>
</body>

</html>
