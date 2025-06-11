<section>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Profile Information') }}</h3>
        </div>
        <div class="card-body">
            <p class="text-muted">
                {{ __("Update your account's profile information and email address.") }}
            </p>

            <!-- Verification Form -->
            <form id="send-verification" method="post" action="{{ route('verification.send') }}" style="display: none;">
                @csrf
            </form>

            <!-- Profile Update Form -->
            <form method="post" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')

                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <input type="text"
                           id="name"
                           name="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name', $user->name) }}"
                           required
                           autofocus
                           autocomplete="name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">{{ __('Email') }}</label>
                    <input type="email"
                           id="email"
                           name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email', $user->email) }}"
                           readonly
                           required
                           autocomplete="username">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div class="mt-2">
                            <p class="text-sm text-muted">
                                {{ __('Your email address is unverified.') }}
                                <button form="send-verification"
                                        class="btn btn-link p-0 text-primary">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="text-success text-sm mt-2">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

                    @if (session('status') === 'profile-updated')
                        <span class="text-success ml-2">
                            {{ __('Saved.') }}
                        </span>
                    @endif
                </div>
            </form>
        </div>
    </div>
</section>
