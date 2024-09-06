<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login</title>
      <link rel="stylesheet" href="style.css">
   </head>
   <body>

      <link rel="stylesheet" href="css/style.css">
   </head>
   <body>
    @if (session('berhasil'))
        <script>
            alert("{{session('berhasil')}}")
        </script>
    @endif
      <div class="wrapper">
         <div class="title">
            Login Form
         </div>
         <form action="#">
            <div class="field">
               <input type="text" required>
               <label>Email Address</label>
            </div>
            <div class="field">
               <input type="password" required>
               <label>Password</label>
            </div>
         <form action="/signIn" method="POST">
            @csrf
            <div class="field">
               <input type="text" placeholder="Email" name="email" value="{{old('email')}}">
            </div>
            @error('email')
                <p style="color: red; margin-left: 20px">{{$message}}</p>
            @enderror
            <div class="field">
               <input type="password" placeholder="password" name="password">
            </div>
            @error('password')
                <p style="color: red; margin-left: 20px">{{$message}}</p>
            @enderror
            <div class="content">
               <div class="checkbox">
                  <input type="checkbox" id="remember-me">
                  <label for="remember-me">Remember me</label>
               </div>
               <div class="pass-link">
                  <a href="#">Forgot password?</a>
               </div>
            </div>
            <div class="field">
               <input type="submit" value="Login">
            </div>
            <div class="signup-link">
               Not a member? <a href="#">Signup now</a>
            </div>
         </form>

               Not a member? <a href="/register">Signup now</a>
            </div>
         </form>
         @if (session('error'))
             <script>
                alert("{{session('error')}}")
             </script>
         @endif
      </div>
   </body>
</html>
