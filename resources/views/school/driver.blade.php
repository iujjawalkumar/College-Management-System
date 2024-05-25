@extends('school.layouts.main')
@section('main-container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Assign Vehicle to Driver</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Driver</li>
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
                <h3 class="card-title">Assign Vehicle</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="adddriver" method="POST">
                @csrf
                <div class="card-body">

                  @if (\Session::has('success'))
                  <div class="alert alert-success">
                      {!! \Session::get('success') !!}
                  </div>
              @endif

             
                <div class="form-group">
                    <label for="exampleInputEmail1">Select Driver</label>
                    <select class="form-control" name="driver_id">
                        <option>-- Select --</option>
                        @foreach ($emp as $emp)
                    
                        <option value="{{$emp->id}}">{{$emp->name}}</option>

                        @endforeach
     
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Vehicle</label>
                    <select class="form-control" name="vehicle_id">
                        <option>-- Select --</option>
                       
                       @foreach ($vehicle as $vehicle)
                    
                        <option value="{{$vehicle->id}}">{{$vehicle->vehicle_name}} ({{$vehicle->vehicle_type}})</option>

                        @endforeach
        
                    </select>
                  </div>

 
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
          <h3 class="card-title">All the Assigned Vehicle Records in the Database</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Sr. No.</th>
              <th>Vehicle Name</th>
              <th>Vehicle Type</th>
              <th>Driver Name</th>
 
              <th>Mobile No.</th>
              <th>Create at</th>
              <th>Updated at</th>
              <th>Action</th>
         
            </tr>
            </thead>
            <tbody>

              @foreach ($data2 as $da)
            <tr>
              <td>{{$loop->index+1}}</td>
              <td>{{ App\Models\Vehicle_Model::getVehicle($da->vehicle_id) }}
            </td>
            <td>{{ App\Models\Vehicle_Model::getVehicle_type($da->vehicle_id) }}
            </td>
            <td>{{ App\Models\Employee_Model::getName($da->driver_id) }}
            </td>
        
            <td>{{ App\Models\Employee_Model::getMob($da->driver_id) }}
            </td>
            <td>{{$da->created_at}}
            </td>
            <td>{{$da->updated_at}}
            </td>
  
              <td width="200px"> 
              <a class="btn btn-app" onclick="return confirm('Are you sure?')" href="driver_delete/{{$da->id}}">
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