@extends('school.layouts.main')
@section('main-container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Vehicle Records</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Vehicle</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      @if (\Session::has('warning'))
      <div class="alert alert-danger">
          {!! \Session::get('warning') !!}
      </div>
  @endif

      <div class="container-fluid">
        <div class="row">

          <!-- left column -->
          <div class="col-md-6" style="float:none;margin:auto;">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Update Vehicle</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('school')}}/vehicle_update/{{$data2->id}}" method="POST">
                @csrf
                <div class="card-body">

                  @if (\Session::has('success'))
                  <div class="alert alert-success">
                      {!! \Session::get('success') !!}
                  </div>
              @endif

             
                  <div class="form-group">
                    <label for="exampleInputEmail1">Vehicle Name</label>
                    <input type="text" name="vehicle_name" value="{{$data2->vehicle_name}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Hans Vahini, 01, 02, etc...">
                  </div>
              
                @if ($errors->has('vehicle_name'))
                <p class="text-danger">{{$errors->first('vehicle_name')}}</p>
                @endif

                <div class="form-group">
                    <label for="exampleInputEmail1">Vehicle Type</label>
                    <select class="form-control" name="vehicle_type">
                        <option>{{$data2->vehicle_type}}</option>
                        <option>-- Select --</option>
                        <option>Bus</option>
                        <option>Cab / Taxi</option>
                        <option>E-Riksha</option>
                        <option>Riksha</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Route</label>
                    <select class="form-control" name="routes">
                        <option value="{{$data2->routes}}">{{ App\Models\Routes_Model::getRouteNameByID($data2->routes) }}</option>
                        <option>-- Select --</option>
                       
                       @foreach ($routes as $routes)
                    
                        <option value="{{$routes->id}}">{{$routes->route_name}}</option>

                        @endforeach
        
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Amount (&#8377;)</label>
                    <input type="text" name="amount" value="{{$data2->amount}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : 500, 600, etc...">
                  </div>
              
                @if ($errors->has('amount'))
                <p class="text-danger">{{$errors->first('amount')}}</p>
                @endif

 
                <div class="card-footer">
                  <button type="submit" class="btn btn-success swalDefaultSuccess">Click to Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
      </div>

  
    <!-- /.col -->
  </div>


    </section>
    <!-- /.content -->
  </div>


  

@endsection