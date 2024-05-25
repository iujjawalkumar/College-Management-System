@extends('school.layouts.main')
@section('main-container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Select Student for Assign Vehicle</h1>
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

        <div class="col-md-6" style="float:none;margin:auto;">
            <!-- general form elements -->
            <div class="card card-success">
             
              <!-- /.card-header -->
              <!-- form start -->
              <form action="add_student_vehicle" method="GET">
                @csrf
               
                <div class="card-body">

                  @if (\Session::has('success'))
                  <div class="alert alert-success">
                      {!! \Session::get('success') !!}
                  </div>
              @endif

              <div class="form-group">
                <label for="exampleInputEmail1">Select Class</label>
                <select value="{{old('cclass')}}" class="form-control" name="cclass" id="cclass">
                    <option value="0">--Select Class--</option>
                    @foreach ($data_class as $row)
                    <option value="{{$row->id}}">{{$row->name}}</option>
                    @endforeach
                   
                </select>
          
 
            <div class="form-group">
                <label for="exampleInputEmail1">Select Section</label>
                <select value="{{old('section')}}" class="form-control" name="section" id="section">
                    <option value="0">--Select Section--</option>
                   
                </select>
                  
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Select Student</label>
                <select value="{{old('student_id')}}" class="form-control" name="student_id" id="student_id">
                    <option value="0">--Select Student--</option>
                   
                </select>
                  
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Select Vehicle</label>
                <select class="form-control" name="vehicle_id">
                    <option>-- Select --</option>
                   
                   @foreach ($vehicle as $vehicle)
                
                    <option value="{{$vehicle->id}}">{{$vehicle->vehicle_name}} ({{$vehicle->vehicle_type}}) - {{ App\Models\Routes_Model::getRouteNameById($vehicle->routes) }} </option>

                    @endforeach
    
                </select>
              </div>

                

                <div class="card-footer">
                  <button type="submit" class="btn btn-success swalDefaultSuccess">Assign Vehicle</button>
                </div>
              </form>
            </div>
        </div>

        </div>
      </div>
        <div class="card-header">
          <h3 class="card-title">All the Assign Student's Records in the Database</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Sr. No.</th>
              <th>Student Name</th>
              <th>Class</th>
              <th>Section</th>
              <th>Vehicle</th>
           
              <th>Action</th>
         
            </tr>
            </thead>
            <tbody>

              @foreach ($data2 as $da)
            <tr>
              <td>{{$loop->index+1}}</td>

              <td>  {{ App\Models\Student_Model::getNameByID($da->student_id) }}
              </td>
              <td>
                {{ App\Models\Class_section_Model::getClassNameByID($da->class_id) }}
              </td>
              <td>{{ App\Models\Section_Model::getSectionNameByID($da->section_id) }}
            </td>
            <td>{{ App\Models\Vehicle_Model::getVehicle($da->vehicle_id) }}
            </td>
          
            
              <td> 
 
                <a class="btn btn-app" onclick="return confirm('Are you sure?')" href="student_vehicle_delete/{{$da->id}}">
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

  <script>
    function view_student(id) {
        // JS function to open a new window(not "New Tab"), e.g: here, we are
        // opening the new window in youtube.com 
       
       var myWindow = window.open("view_form/"+id, width = "200px", height = "100px");
    }
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {


        $('#cclass').on('change', function () {
            var idClass = this.value;
            $("#state-dropdown").html('');
            $.ajax({
                url: "{{url('school/fetch-section')}}",
                type: "POST",
                data: {
                    class_id: idClass,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#section').html('<option value="">-- Select Section --</option>');
                    $.each(result.section, function (key, value) {
                        $("#section").append('<option value="' + value
                            .id + '">' + value.section + '</option>');
                    });
                   
                 
                }
            });
        });

        /*------------------------------------------
        --------------------------------------------
        State Dropdown Change Event
        --------------------------------------------
        --------------------------------------------*/
        $('#section').on('change', function () {
            var idsection = this.value;
            $("#student_id").html('');
            $.ajax({
                url: "{{url('school/fetch-student')}}",
                type: "POST",
                data: {
                    section_id: idsection,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $('#student_id').html('<option value="">-- Select Student --</option>');
                    $.each(res.student, function (key, value) {
                        $("#student_id").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });

    });
</script>



@endsection