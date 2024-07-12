@extends('template.main')
@section('content')
    @push('style')
        <link rel="stylesheet" href="{{ asset('assets/css/register-user.css') }}">
    @endpush
    <div class="box">
        <div class="login">
            <div class="left">
                <img src="{{ asset('assets/img/PTK.jpg') }}" alt="">
            </div>
            <div class="box2">
                <form method="POST" id="form_store">
                    @csrf
                    <div class="logo"><img src="{{ asset('assets/img/Logo.png') }}" alt=""></div>
                    <label for="name">Name</label>
                    <input type="text" placeholder="Name" name="name" id="name">
                    <label for="username">Username</label>
                    <input type="text" placeholder="Username" name="username" id="username">
                    <label for="email">Email</label>
                    <input type="email" placeholder="Example@gmail.com" name="email" id="email">
                    <label for="password">Password</label>
                    <div class="content">
                        <input class="password" type="password" placeholder="Password" name="password" id="password" required>
                        <span class="show-hide">
                            <i class="fa-solid fa-eye" id="show-hide-password"></i>
                        </span>
                    </div>
                    <p>
                        Sudah Punya Akun? <a href="{{ route('login') }}" style="color: blue">Login</a>
                    </p>
                    <button>Daftar</button>
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
        
        $(function() {
            $(document).on('submit', '#form_store', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ route('register.load') }}",
                    data: new FormData(this),
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == true) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: response.pesan,
                                icon: "success"
                            }).then(() => {
                                window.location.href = "{{ route('login') }}";
                            }, 1000);
                        } else {
                            Swal.fire({
                                title: "Error!",
                                text: response.error,
                                icon: "error"
                            });
                        }
                    }
                });
            });
        })
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