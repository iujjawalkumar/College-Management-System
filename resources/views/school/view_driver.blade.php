@extends('school.layouts.main')
@section('main-container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List of Vehicle Records</h1>
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

   
     
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">All the Vehicle & Driver Records in the Database</h3>
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
         
  
              <td> 
              <a class="btn btn-app" onclick="return confirm('Are you sure?')" href="{{url('/school/vehicle_expense')}}/{{$da->vehicle_id}}/{{$da->driver_id}}">
                <i class='fa fa-bus'></i> Click Me
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