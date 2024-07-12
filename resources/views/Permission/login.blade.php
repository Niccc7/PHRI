@extends('template.main')
@section('content')
    @push('style')
        <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    @endpush
    <div class="box">
        <div class="login">
            <div class="left">
                <img src="{{ asset('assets/img/PTK.jpg') }}" alt="">
            </div>
            <div class="box2">
                <form method="POST" action="{{ route('login.load') }}">
                    @csrf
                    <div class="logo"><img src="{{ asset('assets/img/Logo.png') }}" alt=""></div>
                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">Email: </label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" required autofocus
                                placeholder="example@gmail.com" style="border-radius: 5px;">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                        <div class="col-md-6">
                            <div class="content">
                                <input class="password" type="password" placeholder="Password" name="password"
                                    id="password" required>
                                <span class="show-hide">
                                    <i class="fa-solid fa-eye" id="show-hide-password"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <p>
                        Belum Punya Akun? <a href="{{ route('register') }}" style="color: blue">Daftar</a>
                    </p>
                    <button type="submit">Masuk</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        const passwordInput = document.getElementById("password");
        const showHidePassword = document.getElementById("show-hide-password");

        showHidePassword.addEventListener("click", function() {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                showHidePassword.classList.remove("fa-eye");
                showHidePassword.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                showHidePassword.classList.remove("fa-eye-slash");
                showHidePassword.classList.add("fa-eye");
            }
        });
    </script>
@endsection
