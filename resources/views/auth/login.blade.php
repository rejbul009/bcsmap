<!DOCTYPE html>
<html lang="en">
@include('user.inc.head')

<body>
  @include('user.inc.topbar')
  @include('user.inc.nav')

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-sm">
          <div class="card-header text-white" style="background-color:#00976b;">{{ __('Login') }}</div>
          <div class="card-body p-4">
            <form method="POST" action="{{ route('login') }}">
              @csrf

              <!-- Email Address -->
              <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                @error('email')
                  <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <!-- Password -->
              <div class="mb-3">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password">
                @error('password')
                  <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <!-- Remember Me -->
              <div class="form-check mb-3">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
              </div>

              <div class="d-flex justify-content-between align-items-center mb-4">
                @if (Route::has('password.request'))
                <a class="text-sm" href="{{ route('password.request') }}" style="color:#00976b;">{{ __('Forgot your password?') }}</a>
                @endif

                <button type="submit" class="btn text-white" style="background-color:#00976b;">{{ __('Log in') }}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <p class="text-center">Need an account? <a href="{{ route('register') }}" style="color:#00976b;">{{ __('Sign up') }}</a>


  @include('user.inc.footer')
  @include('user.inc.script')

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
