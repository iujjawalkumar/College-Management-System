@extends('school.layouts.main')
@section('main-container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Vehicle Records</h1>
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
                <h3 class="card-title">Add Vehicle</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="addvehicle" method="POST">
                @csrf
                <div class="card-body">

                  @if (\Session::has('success'))
                  <div class="alert alert-success">
                      {!! \Session::get('success') !!}
                  </div>
              @endif

             
                  <div class="form-group">
                    <label for="exampleInputEmail1">Vehicle Name & No.</label>
                    <input type="text" name="vehicle_name" value="{{old('vehicle_name')}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Hans Vahini, 01, 02, etc...">
                  </div>
              
                @if ($errors->has('vehicle_name'))
                <p class="text-danger">{{$errors->first('vehicle_name')}}</p>
                @endif

                <div class="form-group">
                    <label for="exampleInputEmail1">Vehicle Type</label>
                    <select class="form-control" name="vehicle_type">
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
                        <option>-- Select --</option>
                       
                       @foreach ($routes as $routes)
                    
                        <option value="{{$routes->id}}">{{$routes->route_name}}</option>

                        @endforeach

                    </select>
                    <p align="right"> <a href="{{url('/school/routes')}}">Create Route</a></p>
                  </div>
                 
                 

                  <div class="form-group">
                    <label for="exampleInputEmail1">Amount (&#8377;)</label>
                    <input type="text" name="amount" value="{{old('amount')}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : 500, 600, etc...">
                  </div>
              
                @if ($errors->has('amount'))
                <p class="text-danger">{{$errors->first('amount')}}</p>
                @endif

 
                <div class="card-footer">
                  <button type="submit" class="btn btn-success swalDefaultSuccess">Click to Save</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
      </div>

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">All the Vehicle Records in the Database</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Sr. No.</th>
              <th>Vehicle Name</th>
              <th>Vehicle Type</th>
              <th>Route Name</th>
              <th>Amount</th>
              <th>Create at</th>
              <th>Updated at</th>
              <th>Action</th>
         
            </tr>
            </thead>
            <tbody>

              @foreach ($data2 as $da)
            <tr>
              <td>{{$loop->index+1}}</td>
              <td>{{$da->vehicle_name}}
            </td>
            <td>{{$da->vehicle_type}}
            </td>
            <td>{{ App\Models\Routes_Model::getRouteNameByID($da->routes) }}
            </td>
            <td>{{$da->amount}}
            </td>
            <td>{{$da->created_at}}
            </td>
            <td>{{$da->updated_at}}
            </td>
  
              <td width="200px">  <a class="btn btn-app" href="vehicle_edit/{{$da->id}}">
                <i class="fas fa-edit"></i> Edit
              </a>
              <a class="btn btn-app" onclick="return confirm('Are you sure?')" href="vehicle_delete/{{$da->id}}">
                <i class='fa fa-window-close'></i> Delete
              </a>
            </td>
            </tr>
            @endforeach
            </tbody>
         
          </table>
        </div>
        <!-- /.card-body -->

      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>


    </section>
    <!-- /.content -->
  </div>


  

@endsection