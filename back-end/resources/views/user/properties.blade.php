@extends('user.cover')
@section('content')

@php
    use App\Models\Car;
    $cars=Car::paginate(1);
@endphp
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

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            
            @if (session('success'))
                <div class="alert bg-success" style="text-align: center;"> <button style="position:relative;margin-top: -5px;margin-right:-3px;" aria-hidden="true" data-dismiss="alert" class="close text-white" type="button">&times;</button>
                    {{session('success')}}
                </div>
            @endif
            
            @if ($errors->any())
                <div class="alert bg-danger" style="text-align: center;"> <button style="position:relative;margin-top: -5px;margin-right:-3px;" aria-hidden="true" data-dismiss="alert" class="close text-white" type="button">&times;</button>
                    <ul style="list-style-type:decimal;">
                        @foreach ($errors->all() as $error)
                            <li><strong>{{ $error }}</strong></li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
        <div class="col-md-4"></div>
    </div>

    <div class="card">
        <div class="card-header">

            <h5>manage car's booking</h5>
            <div class="card-header-right">
                <ul class="list-unstyled card-option">
                    <li><i class="fa fa-chevron-left"></i></li>
                    <li><i class="fa fa-window-maximize full-card"></i></li>
                    <li><i class="fa fa-minus minimize-card"></i></li>
                    <li><i class="fa fa-refresh reload-card"></i></li>
                    <!-- <li><i class="fa fa-times close-card"></i></li> -->
                </ul>
            </div>
        </div>
        <div class="card-block p-0  tabs-card">
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
                            
                            @foreach($cars as $data)
                                <tr>
                                    <td><img src="{{asset('assets/images/admin/car/'.$data->image)}}" alt="prod img" class="img-fluid" style="width:50px;height:50px"></td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->description}}</td>
                                    <td>{{$data->plate}}</td>
                                    <td><span class="label label-warning">Pending</span></td>
                                    <td>{{$data->counts}}</td>
                                </tr>
                            @endforeach
                            
                        </table>
                    </div>
                    <div class="text-center">
                        <button style="border:none;">
                            {{$cars->links()}}
                        </button>
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
                               <form method="POST" action="{{route('Post_New_Car')}}" enctype="multipart/form-data">
                                @csrf
                                  <div class="row">
                                    <div class="col-md-6">
                                      <label>name of car</label>
                                      <input type="text" name="name" class="form-control" placeholder="Enter name of car ex:Rav 4" value="{{old('name')}}" required>

                                      <label>Description</label>
                                 
       								  <textarea rows="5" placeholder="Typing message  . . . " name="description" class="form-control" required>
       								  </textarea>

                                      <label>Period of rent</label>
                                      <select name="period" class="form-control" required>
                                            <option>Select period</option>
                                            <option value='Day'>Day</option>
                                            <option value='Week'>Week</option>
                                            <option value='Month'>Month</option>
                                      </select>

                                    </div>
                                    <div class="col-md-6" id="div_btn">

                                      <label>Price</label>
                                      <input type="text" name="price" class="form-control" placeholder="Enter price" value="{{old('price')}}" required>
                                          
                                      <label>Image</label>
                                      <input type="file" name="image" class="form-control" multiple value="{{old('image')}}" required>

                                      <label>Plate number</label>
                                      <input type="text" name="plate" class="form-control" placeholder="Enter plate number" value="{{old('plate')}}" required>

                                      <label>Count</label>
                                      <input type="text" name="counts" class="form-control" placeholder="add number of cars in store ex:5"  value="{{old('counts')}}" required>
                                    </div>

                                    <div class="col-md-12 text-center mt-3">
                                        <button class="btn btn-primary" type="submit" name="edit_info" style="border-radius:20px;"><i class="fa fa-save"></i>&nbsp;&nbsp;Save</button>
                                    </div>
                                  </div>
                                </form>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <!--end of edit modal-->

@endsection