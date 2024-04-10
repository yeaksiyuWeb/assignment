@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:100px; margin-bottom:100px;">
  <div class="row justify-content-center align-items-center" >
    <div class="col-md-6">
      <div class="card" >
        
        <div class="card-header" > {{ isset($url) ? ucwords($url) : ""}} {{ __('Login') }}</div>
       
          <div class="card-body">
          <form method="POST" action='{{ url("login/$url") }}'>
            @if (session('status'))
              <div id="status-popup" class="alert alert-success">
                  {{ session('status') }}
              </div>
            @endif
          @csrf
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          @if($url == 'admin')
          <div class="form-group row mb-3">
            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
            <div class="col-md-6">
              <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"  autofocus></input>
              @error('username')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          @elseif($url == 'student')
          <div class="form-group row mb-3">
            <label for="regNo" class="col-md-4 col-form-label text-md-right">{{ __('Registration No') }}</label>
            <div class="col-md-6">
              <input id="regNo" type="text" class="form-control @error('regNo') is-invalid @enderror" name="regNo" value="{{ old('regNo') }}"  autofocus></input>
              @error('regNo')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          @endif
          <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
            <div class="col-md-6">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" >
              @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6 offset-md-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                  {{ __('Remember Me') }}
                </label>
              </div>
            </div>
          </div>

          <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
              <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
              </button>
              @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
                </a>
              @endif
            </div>
          </div>
          
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var statusPopup = document.getElementById('status-popup');
    
    if (statusPopup) {
      // Show the pop-up
      statusPopup.style.opacity = '1';

      // Set a timer to fade out the pop-up after 3 seconds
      setTimeout(function() {
        fadeOut(statusPopup);
      }, 2000);
    }
  });

  function fadeOut(element) {
    var opacity = 1;
    var interval = setInterval(function() {
      if (opacity <= 0.1) {
        clearInterval(interval);
        element.style.display = 'none';
      }
      element.style.opacity = opacity;
      opacity -= opacity * 0.1;
    }, 100);
  }
</script>
