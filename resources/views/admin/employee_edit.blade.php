@extends('admin.layouts.main')
@section('main-container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee</li>
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
                <h3 class="card-title">Update Employee Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('admin')}}/employee_update/{{$data2->id}}" method="POST">
                @csrf
                <div class="card-body">

                  @if (\Session::has('success'))
                  <div class="alert alert-success">
                      {!! \Session::get('success') !!}
                  </div>
              @endif

            

                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" value="{{$data2->name}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Ram Singh">
                  </div>
                @if ($errors->has('name'))
                <p class="text-danger">{{$errors->first('name')}}</p>
                @endif


                <div class="form-group">
                    <label for="exampleInputEmail1">Qualification</label>
                    <input type="text" name="qualification" value="{{$data2->qualification}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : B.Ed, TET, CTET, etc.">
                  </div>
                @if ($errors->has('qualification'))
                <p class="text-danger">{{$errors->first('qualification')}}</p>
                @endif

                
                <div class="form-group">
                    <label for="exampleInputEmail1">Work Experience</label>
                    <input type="text" name="exp" value="{{$data2->exp}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : 2,3,5 Years">
                  </div>
                @if ($errors->has('exp'))
                <p class="text-danger">{{$errors->first('exp')}}</p>
                @endif

                <div class="form-group">
                    <label for="exampleInputEmail1">Aadhaar Card No.</label>
                    <input type="text" name="uid" value="{{$data2->uid}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : 9215 2568 4525">
                  </div>
                @if ($errors->has('uid'))
                <p class="text-danger">{{$errors->first('uid')}}</p>
                @endif

                <div class="form-group">
                    <label for="exampleInputEmail1">Pan Card No.</label>
                    <input type="text" name="pan" value="{{$data2->pan}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : DOUPS2343P">
                  </div>
                @if ($errors->has('pan'))
                <p class="text-danger">{{$errors->first('pan')}}</p>
                @endif




                <div class="form-group">
                    <label for="exampleInputEmail1">Date of Birth</label>
                    <input type="date" name="dob" value="{{$data2->dob}}" class="form-control" id="exampleInputEmail1">
                  </div>
                @if ($errors->has('dob'))
                <p class="text-danger">{{$errors->first('dob')}}</p>
                @endif
                <!-- /.card-body -->

                <div class="form-group">
                    <label for="exampleInputEmail1">Mobile No.</label>
                    <input type="text" name="mob" value="{{$data2->mob}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : 7233999001">
                  </div>
                @if ($errors->has('mob'))
                <p class="text-danger">{{$errors->first('mob')}}</p>
                @endif

                <div class="form-group">
                    <label for="exampleInputEmail1">E-Mail Id</label>
                    <input type="text" name="email" value="{{$data2->email}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : abcd@gmail.com">
                  </div>
                @if ($errors->has('email'))
                <p class="text-danger">{{$errors->first('email')}}</p>
                @endif

                <div class="form-group">
                    <label for="exampleInputEmail1">Full Address</label>
                    <input type="text" name="address" value="{{$data2->address}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Golghar, Gorakhpur, 273001">
                  </div>
                @if ($errors->has('address'))
                <p class="text-danger">{{$errors->first('address')}}</p>
                @endif

                <div class="form-group">
                    <label for="exampleInputEmail1">Bank Acc. No.</label>
                    <input type="text" name="accno" value="{{$data2->accno}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : 302875681">
                  </div>
                @if ($errors->has('accno'))
                <p class="text-danger">{{$errors->first('accno')}}</p>
                @endif

                <div class="form-group">
                    <label for="exampleInputEmail1">IFS Code</label>
                    <input type="text" name="ifsc" value="{{$data2->ifsc}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : SBIN000234">
                  </div>
                @if ($errors->has('ifsc'))
                <p class="text-danger">{{$errors->first('ifsc')}}</p>
                @endif

                <div class="form-group">
                    <label for="exampleInputEmail1">Date of Joining</label>
                    <input type="date" name="doj" value="{{$data2->doj}}" class="form-control" id="exampleInputEmail1">
                  </div>
                @if ($errors->has('doj'))
                <p class="text-danger">{{$errors->first('doj')}}</p>
                @endif

                <div class="form-group">
                    <label for="exampleInputEmail1">Designation</label>
                    <select class="form-control" name="desi">
                        <option>{{$data2->desi}}</option>
                        <option>-- Select --</option>
                        <option>Principal</option>
                        <option>Teacher</option>
                        <option>Office Staff</option>
                        <option>Cleaning Staff</option>
                        <option>Service Staff</option>
                        <option>Security Staff</option>
                        <option>Driver</option>
                        <option>Lab Staff</option>
                     
                        <option>Other</option>
     
                    </select>
                  </div>



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
                      $('#section').html('<option value="">-- Select Section --</option> <option value="all">All</option>');
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
          $('#state-dropdown').on('change', function () {
              var idState = this.value;
              $("#city-dropdown").html('');
              $.ajax({
                  url: "{{url('api/fetch-cities')}}",
                  type: "POST",
                  data: {
                      state_id: idState,
                      _token: '{{csrf_token()}}'
                  },
                  dataType: 'json',
                  success: function (res) {
                      $('#city-dropdown').html('<option value="">-- Select City --</option>');
                      $.each(res.cities, function (key, value) {
                          $("#city-dropdown").append('<option value="' + value
                              .id + '">' + value.name + '</option>');
                      });
                  }
              });
          });

      });
  </script>
  

@endsection