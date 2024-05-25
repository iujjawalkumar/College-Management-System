@extends('school.layouts.main')
@section('main-container')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Create TC of Student</h1>
          </div>
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">TC</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
   <center>
    @if (\Session::has('warning'))
    <div class="alert alert-danger">
        {!! \Session::get('warning') !!}
    </div>
@endif

@if (\Session::has('success'))
<div class="alert alert-success">
    {!! \Session::get('success') !!}
</div>
@endif
<div class="col-sm-12 row">


<div class="col-sm-6">


   <!-- general form elements -->
          <div class="card card-info" align="left">
            <div class="card-header">
              <h3 class="card-title">Student & Parents Data</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

<form method="post" action="{{url('school')}}/tc_update/{{$data2->id}}" enctype="multipart/form-data">
    @csrf
    @method('put')
              <div class="card-body">


                    <div class="form-group">
                        <label for="exampleInputEmail1"> Registration No. of the candidate (in case Class IX to X)</label>
                        <input type="text" name="regno" class="form-control" id="exampleInputEmail1" placeholder="Exp : Board Registration No. / NA">
                      </div>
                    @if ($errors->has('regno'))
                    <p class="text-danger">{{$errors->first('regno')}}</p>
                    @endif

                    <div class="form-group">
                        <label for="exampleInputEmail1">From Class & Year</label>
                        <input type="text" name="from_class" class="form-control" id="exampleInputEmail1" placeholder="Exp : 1st (2022)">
                      </div>
                    @if ($errors->has('from_class'))
                    <p class="text-danger">{{$errors->first('from_class')}}</p>
                    @endif

                    <div class="form-group">
                        <label for="exampleInputEmail1">To Class & Year</label>
                        <input type="text" name="to_class" class="form-control" id="exampleInputEmail1" placeholder="Exp : 2nd (2023)">
                      </div>
                    @if ($errors->has('to_class'))
                    <p class="text-danger">{{$errors->first('to_class')}}</p>
                    @endif
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" value="{{$data2->name}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Student Name">
              </div>
            @if ($errors->has('name'))
            <p class="text-danger">{{$errors->first('name')}}</p>
            @endif

            <div class="form-group">
                <label for="exampleInputEmail1">Date of Birth</label>
                <input type="date" name="dob" value="{{$data2->ddate}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Date">
              </div>
            @if ($errors->has('dob'))
            <p class="text-danger">{{$errors->first('dob')}}</p>
            @endif

            <div class="form-group">
                <label for="exampleInputEmail1">Father Name</label>
                <input type="text" name="father_name" value="{{$data2->father_name}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Father Name">
              </div>
            @if ($errors->has('father_name'))
            <p class="text-danger">{{$errors->first('father_name')}}</p>
            @endif

            <div class="form-group">
                <label for="exampleInputEmail1">Mother Name</label>
                <input type="text" name="mother_name" value="{{$data2->mother_name}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Mother Name">
              </div>
            @if ($errors->has('mother_name'))
            <p class="text-danger">{{$errors->first('mother_name')}}</p>
            @endif

            <div class="form-group">
                <label for="exampleInputEmail1">Nationality</label>
                <select name="nationality" value="{{old('nationality')}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Nationality">
                    <option value="{{$data2->nationality}}">{{$data2->nationality}}</option>
                    <option>--Select Nationality--</option>
                    <option>India</option>
                    <option>Nepal</option>
                    <option>Other</option>
                </select>
                  </div>
            @if ($errors->has('nationality'))
            <p class="text-danger">{{$errors->first('nationality')}}</p>
            @endif


            <div class="form-group">
                <label for="exampleInputEmail1">Whether the pupil belong to SC/ST/OBC Category</label>
                <input type="text" name="category" class="form-control" id="exampleInputEmail1" placeholder="Exp : YES / NO">
              </div>
      

            <div class="form-group">
                <label for="exampleInputEmail1">Whether the Student is failed</label>
                <input type="text" name="failed" class="form-control" id="exampleInputEmail1" placeholder="Exp : YES / NO">
              </div>
        

            <div class="form-group">
                <label for="exampleInputEmail1">Subject Offered</label>
                <input type="text" name="subject" class="form-control" id="exampleInputEmail1" placeholder="Exp : Math">
              </div>
   
            <div class="form-group">
                <label for="exampleInputEmail1">Class in which the pupil last studied (in words) :</label>
                <input type="text" name="last_study" class="form-control" id="exampleInputEmail1" placeholder="Exp : 1st">
              </div>
           


              </div>

       
          </div>
          <!-- /.card -->
        </div>
 
         <div class="col-sm-6">



   <!-- general form elements -->
          <div class="card card-info" align="left">
            <div class="card-header">
              <h3 class="card-title">TC Details</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">

            <div class="form-group">
                <label for="exampleInputEmail1">Admission No. / Form No.</label>
                <input type="text" name="adm_no" value="{{$data2->adm_no}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Application / Admission / Form No.">
              </div>
            @if ($errors->has('adm_no'))
            <p class="text-danger">{{$errors->first('adm_no')}}</p>
            @endif

            <div class="form-group">
                <label for="exampleInputEmail1">School / Board Annual examination last taken with result</label>
                <input type="text" name="result" class="form-control" id="exampleInputEmail1" placeholder="Exp : CBSE & 60%">
              </div>
       

            <div class="form-group">
                <label for="exampleInputEmail1">Whether qualified for promotion to the next higher class</label>
                <input type="text" name="promotion" class="form-control" id="exampleInputEmail1" placeholder="Exp : YES / NO">
              </div>
        
            <div class="form-group">
                <label for="exampleInputEmail1">Whether the pupil paid all fees of school</label>
                <input type="text" name="fees" class="form-control" id="exampleInputEmail1" placeholder="Exp : YES / NO">
              </div>
    

            <div class="form-group">
                <label for="exampleInputEmail1">Whether the pupil was granted any fee concession, if so, the nature of concession</label>
                <input type="text" name="concession" class="form-control" id="exampleInputEmail1" placeholder="Exp : YES / NO with Details">
              </div>


              <div class="form-group">
                <label for="exampleInputEmail1">Whether the pupil NCC Cadet/Boy Scout / Girl Guide (give details)</label>
                <input type="text" name="ncc" class="form-control" id="exampleInputEmail1" placeholder="Exp : YES / NO with Details">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Reason for leaving the school</label>
                <input type="text" name="reason" class="form-control" id="exampleInputEmail1" placeholder="Exp : Father Transfer etc..">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">No. of meetings up to Date</label>
                <input type="text" name="meeting" class="form-control" id="exampleInputEmail1" placeholder="Exp : 360, etc...">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">No. of days the pupil at ended</label>
                <input type="text" name="ended" class="form-control" id="exampleInputEmail1" placeholder="Exp : 360, etc...">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">General Conduct</label>
                <input type="text" name="conduct" class="form-control" id="exampleInputEmail1" placeholder="Exp : General Details / NA">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Any other remarks</label>
                <input type="text" name="remarks" class="form-control" id="exampleInputEmail1" placeholder="Exp : Remarks">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Date of issue of certificate</label>
                <input type="date" name="doc" class="form-control" id="exampleInputEmail1">
              </div>

   
           

        
            <br>
          
              <div class="card-footer" align="center">
             
                  <input type='submit' name="upload" class="btn btn-info" value='Click here to Generate'/>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>

       

      </div>
      </center>



</div>
<!-- /.content-wrapper -->
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