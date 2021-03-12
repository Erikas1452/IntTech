@extends('layouts.app')

@section('content')
    <form>
      <div class="container">
        <h1>Register</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>

        <div class="register-box">
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" id="email" required>
        
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
        
            <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
        </div>

        <hr>
        <div class="register-button-container">
            <button type="submit" class="registerbtn">Register</button>
        </div>
    
      </div>
    </form>
@endsection