@extends('layouts.app')

@section('content')
  <form action="/register" method="POST">
    @csrf
    
      <div class="card">
        @include('messages.alert')
          <div class="card-header">
            <h2>Register</h2>
          </div>
          <div class="card-body">
              <label for="name"> <strong>Name</strong> :</label>
              <input
                type="text"
                id="name"
                name="name"
                placeholder="Enter your name"
                required
              /> 
              <label for="email"> <strong>Email Address</strong> :</label>
              <input
                type="email"
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
              <label for="password_confirmation"> <strong>Confirm Password</strong> :</label>
              <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                placeholder="Confirm password"
                required
              />
              <p>By creating an account you agree to our <a href="#"> Terms & Policy</a></p>
            <button id="reg-btn">Register</button>
            <div class="container signin">
              <p>Already have an account? <a href="/login">Sign in</a>.</p>
            </div>
          </div>
        </div>
  </form>
@endsection