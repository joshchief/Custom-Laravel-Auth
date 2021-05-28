@extends('layouts.app')

@section('content')
  <form action="" method="POST">
    @csrf
      <div class="card">        
          @include('messages.alert')          
          <div class="card-header">
            <h2>Login</h2>
          </div>
          <div class="card-body">
      
              <label for="email"> <strong>Email Address</strong> :</label>
              <input
                type="text"
                id="email"
                name="email"
                placeholder="Enter email"
                
              />
              <label for="password"> <strong>Password</strong> :</label>
              <input
                type="password"
                id="password"
                name="password"
                placeholder="Enter password"
                required
              />


            <button id="reg-btn">Login</button>
            <label>
              <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
            <span class="psw float-right">Forgot <a href="#">password?</a></span>
            <div class="container signin">
              <p>Don't have an account? <a href="/register">Sign up</a>.</p>
            </div>
          </div>
        </div>
  </form>
@endsection
