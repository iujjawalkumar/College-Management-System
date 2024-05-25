@extends('admin.layouts.main')
@section('main-container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pay Salary</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pay Salary</li>
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
                <h3 class="card-title">Pay Salary of Employee</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('admin')}}/update_salary/{{$data2->id}}" method="post">
                @csrf
                <div class="card-body">

                  @if (\Session::has('success'))
                  <div class="alert alert-success">
                      {!! \Session::get('success') !!}
                  </div>
              @endif


                  <div class="form-group">
                    <label for="exampleInputEmail1">Salary</label> &nbsp;&nbsp;(Note : Change if Other) 
                    <input type="text" name="salary" value="{{$emp_salary->total}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : 5000..">
               <br>
               <input type="hidden" name="emp_id" value="{{$emp_salary->emp_id}}" class="form-control" id="exampleInputEmail1"">
             
                    <b>Basic :</b> {{$emp_salary->basic}}
                    <b>DA :</b> {{$emp_salary->da}}
                        <b>HRA :</b> {{$emp_salary->hra}}
                            <b>CA :</b> {{$emp_salary->ca}}
                                <b>MA :</b> {{$emp_salary->ma}}
                                    <b>SA :</b> {{$emp_salary->sa}} 
                </div>
              
                @if ($errors->has('salary'))
                <p class="text-danger">{{$errors->first('salary')}}</p>
                @endif

                <div class="form-group">
                    <label for="exampleInputEmail1">Date</label>
                    <input type="date" name="date" value="{{old('date')}}" class="form-control" id="exampleInputEmail1">
                  </div>
                @if ($errors->has('date'))
                <p class="text-danger">{{$errors->first('date')}}</p>
                @endif
                <!-- /.card-body -->

                <div class="form-group">
                    <label for="exampleInputEmail1">Payment Mode</label>
                    <select class="form-control" name="mode" id="mode">
                        <option>--Select Section--</option>
                        <option>Cash</option>
                        <option>Bank Transfer</option>
                        <option>Cheque</option>
                    </select>     
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-success swalDefaultSuccess">Click to Pay</button>
                 <a href="{{url('admin')}}/view_employees" class="btn btn-warning"> Back</a>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">All the Salary Records in the Database</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Sr. No.</th>
              <th>Salary</th>
              <th>Payment Mode</th>
              <th>Date</th>
              <th>Action</th>
         
            </tr>
            </thead>
            <tbody>

              @foreach ($salary as $da)
            <tr>
              <td>{{$loop->index+1}}</td>
   
            </td>
            <td>{{$da->salary}} &#8377;
            </td>
            <td>{{$da->mode}} 
            </td>
              <td>{{$da->date}}
            </td>
           
              <td>  
              <a class="btn btn-app" onclick="return confirm('Are you sure?')" href="{{url('school')}}/salary_delete/{{$da->id}}">
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