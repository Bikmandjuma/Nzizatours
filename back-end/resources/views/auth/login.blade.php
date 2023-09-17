@extends('auth.cover')
@section('content')
    <section class="login p-fixed d-flex bg-primary common-img-bg">
        <div class="container">
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="login-card card-block auth-body mr-auto ml-auto">
                        <form class="md-float-material" action="{{route('LoginPost')}}" method="POST">
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
                                    @csrf
                                   
                                <div class="input-group mb-3">
                                    <span class="input-group-addon" id="email"><i class="icofont icofont-envelope"></i></span>
                                    <input type="text" class="form-control" placeholder="Enter your email" title="Enter your email" data-toggle="tooltip" name="email" value="{{old('email')}}">
                                </div>
                                <span class="text-danger"> @error('email') {{ $message }}@enderror</span>
                                    <div class="input-group mb-3">
                                        <span class="input-group-addon" id="password"><i class="icofont icofont-key"></i></span>
                                        <input type="password" class="form-control" placeholder="Enter your password" title="Enter your email" data-toggle="tooltip" name="password" value="{{old('password')}}" id="pswdid1">
                                        <span class="input-group-addon">
                                            <i class="fas fa-eye-slash" id="ShowPswd1" onclick="ShowPswdFn1()"></i>
                                            <i class="fas fa-eye" id="ShowPswdSlash1" onclick="ShowPswdFn11()" style="display:none;"></i>
                                        </span>

                                        
                                    </div>
                                    <span class="text-danger m-b-2"> @error('password') {{ $message }}@enderror</span>
                                    <div class="row m-t-30">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" id="login_btn" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20 mx-auto"> Login <i class="fa fa-lock-open"></i> </button>
                                        </div>
                                    </div>
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
        function ShowPswdFn1(){
          var x=document.getElementById('pswdid1');

          if (x.type === "password") {
            x.type = "text";
            document.getElementById('ShowPswdSlash1').style.display="block";
            document.getElementById('ShowPswd1').style.display="none";
          }else{
            x.type="password";
          }

        }

        function ShowPswdFn11(){
          var x=document.getElementById('pswdid1');

          if (x.type === "text") {
            x.type = "password";
            document.getElementById('ShowPswdSlash1').style.display="none";
            document.getElementById('ShowPswd1').style.display="block";
          }else{
            x.type="password";
          }

        }

    </script>
@endsection
