@extends('user.cover')
@section('content')
<style>
  div#online-indicator_attendant {
/*        display: inline-block;*/
        position: absolute;
        z-index:20;
        width: 20px;
        height: 20px;
        margin-left:72px;
        background-color:skyblue;
        border-radius: 50%;
        margin-top: 80px;
      }

      div#online-indicator_attendant:hover{
        cursor:alias;
      }
      span.blink_attendant {
        display: block;
        width: 20px;
        height: 20px;
        background-color:blue;
        opacity: 0.7;
        border-radius: 50%;
        animation: blink 1s linear infinite;
      }

      /*Animations*/
      @keyframes blink {
        100% { transform: scale(2, 2); 
                opacity: 0;
              }
      }
</style>
	<div class="page-body">
        <div class="row">

            <!-- order-card start -->
            <div class="col-md-2 col-xl-4"></div>
            <div class="col-md-2 col-xl-4">
            	@if(session('profile_changed'))
            		<p class="text-success">
            			{{session('profile_changed')}}
            		</p>
            	@endif
                <div class="card user-card">
                    <div class="card-header">
                        <h5>Profile</h5>
                    </div>
                    <div class="card-block">
                        <div class="usre-image">
                            <img src="../assets/images/{{auth()->guard('admin')->user()->image}}" class="img-radius" alt="User-Profile-Image" style="width:100px;height:100px;">
                            <div id='online-indicator_attendant' title='Online'>
                                <span class='blink_attendant'></span>
                            </div>
                        </div>
                        <h6 class="f-w-600 m-t-25 m-b-10">{{auth()->guard('admin')->user()->firstname}} {{auth()->guard('admin')->user()->lastname}}</h6>                                
                        <hr/>
                        <button class="btn btn-info" style="border-radius:10px;box-shadow:0px 3px 6px 0px rgba(0, 0, 0, 0.2);" data-target="#ProfileModal" data-toggle="modal"><i class="fa fa-edit"></i>&nbsp; Edit</button>
                                                        
                        <!-- <div class="row justify-content-center user-social-link">
                                                            
                        </div> -->
                    </div>
                </div>
            </div>
             	<!--start of Profile modal -->
                      <div class="modal" id="ProfileModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-sm text-center">
                          <div class="modal-content">
                            <div class="modal-body">
                              <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                              <h4><i class="fa fa-image"></i>&nbsp;Profile picture</h4>
                            </div>
                            <div class="modal-body">
                              <div class="actionsBtns">
                                <form enctype="multipart/form-data" method="POST" action="{{route('Submit_Profile')}}">
                                	@csrf
                                      <img id="blah" style="width:130px;height:150px;" src="../assets/images/{{auth()->guard('admin')->user()->image}}" /><br>
                                         
                                      <br>
                                      <input name="profile_picture" type="file" accept="image/*" id="imgInp" class="form-control" required><br>
                                      <button class="btn btn-primary" type="submit" name="SubmitProfilePicture" style="border-radius:10px;"><i class="fa fa-save"></i> Save change</button>
                                  
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <!--end of profile modal-->

            <div class="col-md-2 col-xl-4"></div>
        </div>
    </div>

      <script type="text/javascript">
                imgInp.onchange = evt => {
                  const [file] = imgInp.files
                  if (file) {
                    blah.src = URL.createObjectURL(file)
                  }
                }
            </script>
@endsection