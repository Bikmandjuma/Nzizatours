@extends('auth.cover')
@section('content')
    <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="login-card card-block auth-body mr-auto ml-auto">
                        <form class="md-float-material">
                            <div class="text-center">
                                <h2><i class="fas fa-car"></i>&nbsp;Nziza tours</h2>
                            </div>
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12 text-center">
                                        <h3 class="text-primary">Sign In</h3>
                                        @if(session('success'))
                                            <p  style="color:green;">{{session('success')}}</p>
                                        @endif

                                        @if(session('fail'))
                                            <p style="color:red;">{{session('fail')}}</p>
                                        @endif

                                    </div>
                                </div>
                                <hr/>
                                <form action="{{url('/Post-Login')}}" method="POST">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="email" class="form-control" placeholder="Email or phone number" name="email" value="{{old('email')}}">
                                        <span class="text-primary"> @error('email') {{ $message }}@enderror</span>

                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        </div>
                                        <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="{{old('password')}}">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="password-toggle">
                                                <i class="fas fa-eye" id="password-eye"></i>
                                            </span>
                                        </div>
                                        <span class="text-danger"> @error('password') {{ $message }}@enderror</span>

                                    </div>
                                    <div class="row m-t-30">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" id="login_btn" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20 mx-auto"> Login <i class="fa fa-lock-open"></i> </button>
                                        </div>
                                    </div>
                                </form>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <a href="{{url('/forgot-password')}}" class="waves-effect text-center m-b-20 mx-auto"><i class="fa fa-key"></i> Forgot Password ?</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function () {
            $("#password-toggle").click(function () {
                var passwordInput = $("#password");
                var passwordEye = $("#password-eye");

                if (passwordInput.attr("type") === "password") {
                    passwordInput.attr("type", "text");
                    passwordEye.removeClass("fa-eye").addClass("fa-eye-slash");
                } else {
                    passwordInput.attr("type", "password");
                    passwordEye.removeClass("fa-eye-slash").addClass("fa-eye");
                }
            });
        });
    </script>
@endsection
