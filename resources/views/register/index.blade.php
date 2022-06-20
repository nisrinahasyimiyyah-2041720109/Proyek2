@extends('layout.login')
@section('content')

<div class="login-dark" style="height: 695px;">
    <form action="/register" method="post">
        @csrf
        <h2 class="sr-only">Register Form</h2>
        <div class="illustration"><i class="icon ion-ios-filing-outline"></i></div>
        
        <div class="form-group">
          <input type="text" id="name" class="form-control @error('name') is-invalid 
                        @enderror" name="name" placeholder="Name" value="{{ old('name') }}"/>
            
                        @error('name')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                        @enderror
        </div>
        <div class="form-group">
            <input type="phone" id="phone" class="form-control @error('phone') is-invalid                        
                        @enderror" name="phone"  placeholder="Phone Number" value="{{ old('phone') }}"/>
                    
                        @error('phone')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
        </div>
        <div class="form-group">
            <input type="email" id="email" class="form-control @error('email') is-invalid                        
                        @enderror" name="email"  placeholder="Email" value="{{ old('email') }}"/>
                    
                        @error('email')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
        </div>
        <div class="form-group">
            <input type="password" id="password" class="form-control @error('password') is-invalid                        
                        @enderror" name="password"  placeholder="Password" />
                    
                        @error('password')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Register</button>
        </div>
        <a class="forgot" href="/login">Have any account?</a></form>
</div>
    
@endsection