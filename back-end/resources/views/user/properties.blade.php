@extends('user.cover')
@section('content')
<style>
	.icon-container {
		font-size: 20px; /* Adjust the font size as needed */
	}

	.icon-container #cars_id{
		margin-left:-15px;
	}
	
	#myTextarea {
		width: 100%;
		height: 300px;
	}

</style>
<!-- tabs card start -->
<div class="col-sm-12">
    <button class="btn btn-info mb-2" style="border-radius: 20px;" data-toggle="modal" data-target="#NewCarModal">
        <span class="icon-container">
			<i class="fas fa-plus"></i>
			<i class="fas fa-car" id="cars_id"></i>
		</span>
        Add new car in store
    </button>

    <div class="card tabs-card">
        <div class="card-block p-0">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs md-tabs" role="tablist">
                
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home3" role="tab"><i class="fa fa-car"></i>All Cars in store&nbsp;<span class="badge badge-success">0</span> </a>
                    <div class="slide"></div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#profile3" role="tab"><i class="fa fa-list"></i>Cars Booked&nbsp;<span class="badge badge-info">0</span> </a>
                    <div class="slide"></div>
                </li>
                                                            
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#settings3" role="tab"><i class="fa fa-car"></i>Not Booked yet&nbsp;<span class="badge badge-primary">0</span></a>
                    <div class="slide"></div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#messages3" role="tab"><i class="fas fa-arrow-right"></i>Pending Bookings&nbsp;<span class="badge badge-danger">0</span></a>
                    <div class="slide"></div>
                </li>

            </ul>
                                                        <!-- Tab panes -->
                                                        <div class="tab-content card-block">
                                                            <div class="tab-pane active" id="home3" role="tabpanel">

                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <tr>
                                                                            <th>Image</th>
                                                                            <th>Product Code</th>
                                                                            <th>Customer</th>
                                                                            <th>Purchased On</th>
                                                                            <th>Status</th>
                                                                            <th>Transaction ID</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><img src="../assets/images/product/prod2.jpg" alt="prod img" class="img-fluid"></td>
                                                                            <td>PNG002344</td>
                                                                            <td>John Deo</td>
                                                                            <td>05-01-2017</td>
                                                                            <td><span class="label label-danger">Faild</span></td>
                                                                            <td>#7234486</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><img src="../assets/images/product/prod3.jpg" alt="prod img" class="img-fluid"></td>
                                                                            <td>PNG002653</td>
                                                                            <td>Eugine Turner</td>
                                                                            <td>04-01-2017</td>
                                                                            <td><span class="label label-success">Delivered</span></td>
                                                                            <td>#7234417</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><img src="../assets/images/product/prod4.jpg" alt="prod img" class="img-fluid"></td>
                                                                            <td>PNG002156</td>
                                                                            <td>Jacqueline Howell</td>
                                                                            <td>03-01-2017</td>
                                                                            <td><span class="label label-warning">Pending</span></td>
                                                                            <td>#7234454</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <div class="text-center">
                                                                    <button class="btn btn-outline-primary btn-round btn-sm">Pagination</button>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="profile3" role="tabpanel">

                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <tr>
                                                                            <th>Image</th>
                                                                            <th>Product Code</th>
                                                                            <th>Customer</th>
                                                                            <th>Purchased On</th>
                                                                            <th>Status</th>
                                                                            <th>Transaction ID</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><img src="../assets/images/product/prod3.jpg" alt="prod img" class="img-fluid"></td>
                                                                            <td>PNG002653</td>
                                                                            <td>Eugine Turner</td>
                                                                            <td>04-01-2017</td>
                                                                            <td><span class="label label-success">Delivered</span></td>
                                                                            <td>#7234417</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><img src="../assets/images/product/prod4.jpg" alt="prod img" class="img-fluid"></td>
                                                                            <td>PNG002156</td>
                                                                            <td>Jacqueline Howell</td>
                                                                            <td>03-01-2017</td>
                                                                            <td><span class="label label-warning">Pending</span></td>
                                                                            <td>#7234454</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <div class="text-center">
                                                                    <button class="btn btn-outline-primary btn-round btn-sm">Pagination</button>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="messages3" role="tabpanel">

                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <tr>
                                                                            <th>Image</th>
                                                                            <th>Product Code</th>
                                                                            <th>Customer</th>
                                                                            <th>Purchased On</th>
                                                                            <th>Status</th>
                                                                            <th>Transaction ID</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><img src="../assets/images/product/prod1.jpg" alt="prod img" class="img-fluid"></td>
                                                                            <td>PNG002413</td>
                                                                            <td>Jane Elliott</td>
                                                                            <td>06-01-2017</td>
                                                                            <td><span class="label label-primary">Shipping</span></td>
                                                                            <td>#7234421</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><img src="../assets/images/product/prod4.jpg" alt="prod img" class="img-fluid"></td>
                                                                            <td>PNG002156</td>
                                                                            <td>Jacqueline Howell</td>
                                                                            <td>03-01-2017</td>
                                                                            <td><span class="label label-warning">Pending</span></td>
                                                                            <td>#7234454</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <div class="text-center">
                                                                    <button class="btn btn-outline-primary btn-round btn-sm">Pagination</button>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="settings3" role="tabpanel">

                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <tr>
                                                                            <th>Image</th>
                                                                            <th>Product Code</th>
                                                                            <th>Customer</th>
                                                                            <th>Purchased On</th>
                                                                            <th>Status</th>
                                                                            <th>Transaction ID</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><img src="../assets/images/product/prod1.jpg" alt="prod img" class="img-fluid"></td>
                                                                            <td>PNG002413</td>
                                                                            <td>Jane Elliott</td>
                                                                            <td>06-01-2017</td>
                                                                            <td><span class="label label-primary">Shipping</span></td>
                                                                            <td>#7234421</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><img src="../assets/images/product/prod2.jpg" alt="prod img" class="img-fluid"></td>
                                                                            <td>PNG002344</td>
                                                                            <td>John Deo</td>
                                                                            <td>05-01-2017</td>
                                                                            <td><span class="label label-danger">Faild</span></td>
                                                                            <td>#7234486</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <div class="text-center">
                                                                    <button class="btn btn-outline-primary btn-round btn-sm">Pagination</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- tabs card end -->

<!--start of edit modal -->
                    <div class="modal" id="NewCarModal" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-body text-center">
                            <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4>Add new car in store &nbsp;&nbsp; <i class="fa fa-car"></i></h4>
                          </div>
                          <div class="modal-body">
                            <div class="actionsBtns">
                               <form method="POST" action="{{route('Post_MyInfo')}}">
                                @csrf
                                  <div class="row">
                                    <div class="col-md-6">

                                      <label>name</label>
                                      <input type="text" name="firstname" value="{{auth()->guard('admin')->user()->firstname}}" class="form-control" required>

                                      <label>Lastname</label>
                                 

       									<textarea id="myTextarea" placeholder="Typing message  . . . " name="message" required>
       									</textarea>


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

<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<script>
  ClassicEditor
    .create(document.querySelector('#myTextarea'), {
      toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'undo', 'redo']
    })
    .catch(error => {
      console.error(error);
    });
</script>


@endsection