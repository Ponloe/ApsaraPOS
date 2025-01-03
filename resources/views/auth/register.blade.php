<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="icon" href="{{ asset('assets/img/apsara.jpg') }}" type="image/x-icon">
</head>
<body>
    <section class="bg-light py-3 py-md-5 d-flex align-items-center" style="min-height: 100vh;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="card border border-light-subtle rounded-3 shadow-sm">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="text-center mb-3">
                                <a href="#!">
                                    <img src="{{ asset('assets/img/apsara.jpg') }}" alt="apsaralogo" width="175" height="57" class="mx-auto d-block">
                                </a>
                            </div>
                            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Create an Account</h2>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row gy-2 overflow-hidden">
                                    <!-- Name -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ old('name') }}" required autofocus autocomplete="name">
                                            <label for="name">Name</label>
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>
                                    </div>
                                    <!-- Email -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="username">
                                            <label for="email">Email</label>
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                    </div>
                                    <!-- Password -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required autocomplete="new-password">
                                            <label for="password">Password</label>
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                    </div>
                                    <!-- Confirm Password -->
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                        </div>
                                    </div>
                                    <!-- Register Button -->
                                    <div class="col-12">
                                        <div class="d-grid my-3">
                                            <button class="btn btn-primary btn-lg" type="submit">Register</button>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <p class="m-0 text-secondary">Already registered? <a href="{{ route('login') }}" class="link-primary text-decoration-none">Log in</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
