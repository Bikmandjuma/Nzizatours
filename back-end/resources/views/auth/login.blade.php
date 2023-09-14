@extends('auth.cover')
@section('content')
    <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
	
	<!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="login-card card-block auth-body mr-auto ml-auto">
                        <form class="md-float-material">
                            <div class="text-center">
                                <!-- <img src="assets/images/logo.png" alt="logo.png"> -->
                                <h2><i class="fas fa-car"></i>&nbsp;Nziza tours</h2>
                            </div>
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12 text-center">
                                        <h3 class="text-primary">Sign In</h3>
                                    </div>
                                </div>
                                <hr/>
                                <form>
		                            <div class="input-group">
		                                <input type="email" class="form-control" placeholder="Email or phone number">
		                                <span class="md-line"></span>
		                            </div>
		                            <div class="input-group">
		                                <input type="password" class="form-control" placeholder="Password">
		                                <span class="md-line"></span>
		                            </div>
		                            
		                            <div class="row m-t-30">
		                                <!-- <div class="col-md-12 text-center">
		                                    <button type="button" id=login_btn class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign in</button>
		                                </div> -->

		                                <div class="col-md-12 text-center">
										    <button type="button" id="login_btn" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20 mx-auto"> Login <i class="fa fa-lock-open"></i> </button>
										</div>

		                            </div>
		                        </form>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <a href="#" class="waves-effect text-center m-b-20 mx-auto"><i class="fa fa-key"></i> Forgot Password ?</a>
                                    </div>
                                </div>

                            </div>
                        </form>
                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
    </section>
@endsection