@extends('user.cover')
@section('content')
<style>
    
    #my_data{
        display: flex;
    }

    img:hover{
        cursor: pointer;
    }

    #div_btn button{
      display:absolute;margin-top:25px;border-radius:10px;align-items: center;justify-content: center;justify-items: center;
    }

</style>
	<div class="page-body">
        <div class="row">

            <!-- order-card start -->
            <div class="col-md-2 col-xl-2"></div>

            <div class="col-md-8 col-xl-8">
                @if(session('success'))
                  <p class="text-success">
                    {{session('success')}}
                  </p>
                @endif
                <div class="card">
                  <div class="card-header text-center" style="box-shadow:0 4px 8px 0 rgb(0, 0, 0, 0.2);"><h4><i class="fa fa-address-card"></i>&nbsp;My information</h4></div>
                  <div class="card-body" style="overflow: auto;">

                    <div class="row">
                        <div class="col-md-6 text-center">
                            <img src="../assets/images/{{auth()->guard('admin')->user()->image}}" class="img-circle elevation-2" alt="User Image" style="width:100px;height:100px;border-radius:50%;border:1px solid skyblue;z-index: 1;display: relative;margin-top:5px; " onclick="window.location.href='{{route("Profile")}}'">
                        </div>

                        <div class="col-sm-6">
                            <hr>

                            <div class="row">
                              <div class="col-md-12">
                                <span id="my_data"><p><b>Firstname :&nbsp;</b></p><p class="text-info"><b>{{auth()->guard('admin')->user()->firstname}}</b></p></span>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-12">
                                <span id="my_data"><p><b>Lastname :&nbsp;</b></p><p class="text-info"><b>{{auth()->guard('admin')->user()->lastname}}</b></p></span>
                               </div>
                            </div>
                      
                        </div>
                    </div>
                    
                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                          <span id="my_data"><p><b>Gender :&nbsp;</b></p><p class="text-info"><b>{{auth()->guard('admin')->user()->gender}}</b></p></span>
                        </div>

                        <div class="col-md-6">
                          <span id="my_data"><p><b>Phone :&nbsp;</b></p><p class="text-info"><b>{{auth()->guard('admin')->user()->phone}}</b></p></span>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                      <div class="col-md-6">
                        <span id="my_data"><p><b>Email :&nbsp;</b></p><p class="text-info"><b>{{auth()->guard('admin')->user()->email}}</b></p></span>
                      </div>

                      <div class="col-md-6">
                        <span id="my_data"><p><b>Role :&nbsp;</b></p><p class="text-info"><b><?php echo "Admin";?></b></p></span>
                      </div>
                    </div>

                    <hr>

                    <div class="row">
                      <div class="col-md-12">

                        <button class="btn btn-info float-right" data-toggle="modal" data-target="#EditInfoModal" style="border-radius: 10px;"><i class="fa fa-edit"></i>&nbsp;Edit</button>

                      </div>
                    </div>
                  
                  </div>
                </div>
                <!--end of card-->

                <!--start of edit modal -->
                    <div class="modal" id="EditInfoModal" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="modal-body text-center">
                            <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4><u>Edit information&nbsp;<i class="fa fa-edit"></i></u></h4>
                          </div>
                          <div class="modal-body">
                            <div class="actionsBtns">
                               <form method="POST" action="{{route('Post_MyInfo')}}">
                                @csrf
                                  <div class="row">
                                    <div class="col-md-6">

                                      <label>Firstname</label>
                                      <input type="text" name="firstname" value="{{auth()->guard('admin')->user()->firstname}}" class="form-control" required>

                                      <label>Lastname</label>
                                      <input type="text" name="lastname" value="{{auth()->guard('admin')->user()->lastname}}" class="form-control" required>

                                      <label>Gender</label>
                                      <select name="gender" class="form-control" required>
                                        <?php
                                          if (auth()->guard('admin')->user()->gender == 'male') {
                                            ?>
                                                <option value='male' selected>Male</option>
                                                <option value='female'>Female</option>
                                            <?php
                                          }else{
                                            ?>
                                                <option value='female' selected>Female</option>
                                                <option value='male'>Male</option>
                                            <?php
                                          }
                                        ?>
                                      </select>

                                    </div>
                                    <div class="col-md-6" id="div_btn">

                                      <label>Phone</label>
                                      <input type="text" name="phone" value="{{auth()->guard('admin')->user()->phone}}" class="form-control" required>
                                          
                                      <label>Email</label>
                                      <input type="text" name="email" value="{{auth()->guard('admin')->user()->email}}" class="form-control" required>

                                      <button class="btn btn-primary" type="submit" name="edit_info"><i class="fa fa-save"></i>&nbsp;&nbsp;Save change</button>

                                    </div>
                                  </div>
                                </form>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <!--end of edit modal-->
            </div>
            <div class="col-md-2 col-xl-2"></div>
            
        </div>
    </div>
@endsection