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
          <div class="card-header text-white" style="background-color:#00976b;">{{ __('Register') }}</div>
          <div class="card-body p-4">
            <form method="POST" action="{{ route('register') }}">
              @csrf

              <!-- Name -->
              <div class="mb-3">
                <label for="name" class="form-label">{{ __('Name') }}</label>
                <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                @error('name')
                  <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <!-- Email Address -->
              <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                @error('email')
                  <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <!-- Password -->
              <div class="mb-3">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
                @error('password')
                  <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <!-- Confirm Password -->
              <div class="mb-3">
                <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
                @error('password_confirmation')
                  <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
              </div>

              <div class="d-flex justify-content-between align-items-center mb-4">
                <a class="text-sm" href="{{ route('login') }}" style="color:#00976b;">{{ __('Already registered?') }}</a>
                <button type="submit" class="btn text-white ms-4" style="background-color:#00976b;">{{ __('Register') }}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  @include('user.inc.footer')
  @include('user.inc.script')

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
