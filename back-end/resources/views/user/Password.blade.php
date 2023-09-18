@extends('user.cover')
@section('content')
<style>
    /* CSS for the loading state */
    #submitButton.loading {
        background-color: red; /* Gray out the button */
        cursor: not-allowed;   /* Change cursor to not-allowed */
    }
</style>
	<div class="page-body">
        <div class="row">
            <div class="col-md-2 col-xl-4"></div>
            <div class="col-md-2 col-xl-4">

                @if ($errors->any())
                    <div class="alert bg-danger" style="text-align: center;"> <button style="position:relative;margin-top: -5px;margin-right:-3px;" aria-hidden="true" data-dismiss="alert" class="close text-white" type="button">&times;</button>
                        <ul style="list-style-type:decimal;">
                            @foreach ($errors->all() as $error)
                                <li><strong>{{ $error }}</strong></li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('status'))
                    <div class="alert bg-success" style="text-align: center;"> <button aria-hidden="true" data-dismiss="alert" class="close text-white" type="button">&times;</button>
                      <strong>{{session('status')}}</strong>
                    </div><br>
                @endif
                
                <div class="card">
                    <div class="card-header text-center" style="box-shadow:0px 4px 8px 0px rgba(0, 0, 0, 0.2);">Manage your pasword <i class="fa fa-key"></i> </div>
                    <div class="card-body text-center">
                        <form action="{{route('Post_Password')}}" method="POST" id="myForm">
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
                                    
                            <button class="btn btn-primary" type="submit" name="submit" style="border-radius:10px;" id="submitButton"><i class="fa fa-save"></i>&nbsp; Save chenge</button>
                        </form>

                    </div>
                </div>

            <div class="col-md-2 col-xl-4"></div>
        </div>
    </div>

     <script>

        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('myForm');
            const submitButton = document.getElementById('submitButton');

            form.addEventListener('submit', function (e) {
                e.preventDefault(); // Prevent the form from submitting

                // Add loading state
                submitButton.disabled = true;    // Disable the button
                submitButton.innerText = 'Loading...'; // Change the button text
                submitButton.classList.add('loading'); // Add loading class (optional)

                // Perform your asynchronous task here (e.g., AJAX request)
                // Once the task is complete, you can reset the button's state
                // Example:
                setTimeout(function () {
                    // Reset the button state
                    submitButton.disabled = false;
                    submitButton.innerText = 'Submit';
                    submitButton.classList.remove('loading'); // Remove loading class (optional)
                }, 2000); // Simulate a 2-second loading delay (replace with your actual task)
            });
        });

        //old_password hiding/show
        function old_ShowPswdFn1(){
          var x=document.getElementById('old_pswdid1');

          if (x.type === "password") {
            x.type = "text";
            document.getElementById('old_ShowPswdSlash1').style.display="block";
            document.getElementById('old_ShowPswd1').style.display="none";
          }else{
            x.type="password";
          }

        }

        function old_ShowPswdFn11(){
          var x=document.getElementById('old_pswdid1');

          if (x.type === "text") {
            x.type = "password";
            document.getElementById('old_ShowPswdSlash1').style.display="none";
            document.getElementById('old_ShowPswd1').style.display="block";
          }else{
            x.type="password";
          }

        }

        //New password hiding/show
        function new_ShowPswdFn1(){
          var x=document.getElementById('new_pswdid1');

          if (x.type === "password") {
            x.type = "text";
            document.getElementById('new_ShowPswdSlash1').style.display="block";
            document.getElementById('new_ShowPswd1').style.display="none";
          }else{
            x.type="password";
          }

        }

        function new_ShowPswdFn11(){
          var x=document.getElementById('new_pswdid1');

          if (x.type === "text") {
            x.type = "password";
            document.getElementById('new_ShowPswdSlash1').style.display="none";
            document.getElementById('new_ShowPswd1').style.display="block";
          }else{
            x.type="password";
          }

        }

        //Confirm New password hiding/show
        function conf_new_ShowPswdFn1(){
          var x=document.getElementById('conf_new_pswdid1');

          if (x.type === "password") {
            x.type = "text";
            document.getElementById('conf_new_ShowPswdSlash1').style.display="block";
            document.getElementById('conf_new_ShowPswd1').style.display="none";
          }else{
            x.type="password";
          }

        }

        function conf_new_ShowPswdFn11(){
          var x=document.getElementById('conf_new_pswdid1');

          if (x.type === "text") {
            x.type = "password";
            document.getElementById('conf_new_ShowPswdSlash1').style.display="none";
            document.getElementById('conf_new_ShowPswd1').style.display="block";
          }else{
            x.type="password";
          }

        }

    </script>
@endsection