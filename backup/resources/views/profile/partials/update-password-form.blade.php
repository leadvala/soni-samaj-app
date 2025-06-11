<section>
    <div class="card">
        <!-- Card Header -->
        <div class="card-header">
            <h3 class="card-title">{{ __('Update Password') }}</h3>
        </div>

        <!-- Card Body -->
        <div class="card-body">
            <p class="text-muted">
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
            </p>

            <!-- Update Password Form -->
            <form method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')

                <!-- Current Password -->
                <div class="form-group">
                    <label for="update_password_current_password">{{ __('Current Password') }}</label>
                    <input
                        type="password"
                        id="update_password_current_password"
                        name="current_password"
                        class="form-control @error('updatePassword.current_password') is-invalid @enderror"
                        autocomplete="current-password">
                    @error('updatePassword.current_password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- New Password -->
                <div class="form-group">
                    <label for="update_password_password">{{ __('New Password') }}</label>
                    <input
                        type="password"
                        id="update_password_password"
                        name="password"
                        class="form-control @error('updatePassword.password') is-invalid @enderror"
                        autocomplete="new-password">
                    @error('updatePassword.password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="update_password_password_confirmation">{{ __('Confirm Password') }}</label>
                    <input
                        type="password"
                        id="update_password_password_confirmation"
                        name="password_confirmation"
                        class="form-control @error('updatePassword.password_confirmation') is-invalid @enderror"
                        autocomplete="new-password">
                    @error('updatePassword.password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button and Status Message -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

                    @if (session('status') === 'password-updated')
                        <span class="text-success ml-3">
                            {{ __('Saved.') }}
                        </span>
                    @endif
                </div>
            </form>
        </div>
    </div>
</section>
