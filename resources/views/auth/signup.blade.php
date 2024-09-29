<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CSS -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Display success message -->
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <!-- Sign Up Form -->
                    <form action="{{ route('actionregister') }}" method="POST">
                        @csrf

                        <!-- Name input -->
                        <div class="form-outline mb-3">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control form-control-lg"
                                placeholder="Enter a valid name" required />
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-3">
                            <label class="form-label" for="email">Email address</label>
                            <input type="email" id="email" name="email" class="form-control form-control-lg"
                                placeholder="Enter a valid email address" required />
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control form-control-lg"
                                placeholder="Enter password" required />
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password Confirmation input -->
                        <div class="form-outline mb-3">
                            <label class="form-label" for="password_confirmation">Re-type Password</label>
                            <input id="password_confirmation" type="password"
                                class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation" placeholder="Re-enter password" required>
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Sign Up</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Do you have an account? <a
                                    href="{{ route('login') }}" class="link-danger">Login</a></p>
                        </div>
                    </form>

                    <!-- Resend Verification Email -->
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
</body>

</html>
