@extends('user.cover')
@section('content')
	<div class="page-body">
        <div class="row">
            <div class="col-md-2 col-xl-4"></div>
            <div class="col-md-2 col-xl-4">

                @if(session('status'))
                    <div class="alert bg-success" style="text-align: center;"> <button aria-hidden="true" data-dismiss="alert" class="close text-white" type="button">&times;</button>
                      <strong>{{session('status')}}</strong>
                    </div><br>
                @endif
                
                <div class="card">
                    <div class="card-header text-center" style="box-shadow:0px 4px 8px 0px rgba(0, 0, 0, 0.2);">Manage your pasword <i class="fa fa-key"></i> </div>
                    <div class="card-body text-center">
                        <form action="{{route('Post_Password')}}" method="POST">
                        @csrf            
                            <div class="input-group mb-3">        
                                <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" placeholder="Old Password" value="{{old('old_password')}}" id="old_pswdid1">
                                <span class="input-group-addon">
                                    <i class="fas fa-eye-slash" id="old_ShowPswd1" onclick="old_ShowPswdFn1()"></i>
                                    <i class="fas fa-eye" id="old_ShowPswdSlash1" onclick="old_ShowPswdFn11()" style="display:none;"></i>
                                </span>
                               <!--  @if(session('error'))<span style="color:red;">{{session('error')}}</span> @endif
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror -->
                            </div>
                            <div class="input-group mb-3">
                                <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" placeholder="New Password" id="new_pswdid1">
                                <!-- @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror -->
                                <span class="input-group-addon">
                                    <i class="fas fa-eye-slash" id="new_ShowPswd1" onclick="new_ShowPswdFn1()"></i>
                                    <i class="fas fa-eye" id="new_ShowPswdSlash1" onclick="new_ShowPswdFn11()" style="display:none;"></i>
                                </span>
                            </div>
                            <div class="input-group mb-3">
                                <input name="new_password_confirmation" type="password" class="form-control" placeholder="Confirm New Password" id="conf_new_pswdid1">
                                 <span class="input-group-addon">
                                    <i class="fas fa-eye-slash" id="conf_new_ShowPswd1" onclick="conf_new_ShowPswdFn1()"></i>
                                    <i class="fas fa-eye" id="conf_new_ShowPswdSlash1" onclick="conf_new_ShowPswdFn11()" style="display:none;"></i>
                                </span>
                            </div>
                                    
                            <button class="btn btn-primary" type="submit" name="submit" style="border-radius:10px;"><i class="fa fa-save"></i>&nbsp; Save chenge</button>
                        </form>

                    </div>
                </div>

            <div class="col-md-2 col-xl-4"></div>
        </div>
    </div>
@endsection