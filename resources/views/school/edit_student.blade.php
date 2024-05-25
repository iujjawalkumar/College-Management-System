@extends('school.layouts.main')
@section('main-container')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Update Student Registration Form</h1>
          </div>
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Student</li>
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

<form method="post" action="{{url('school')}}/student_update/{{$data2->id}}" enctype="multipart/form-data">
    @csrf
    @method('put')
              <div class="card-body">

                <div class="form-group">
                  <label for="exampleInputEmail1">Student Type</label>
                  <select value="{{old('stype')}}" class="form-control" name="stype" id="stype">
                      <option>{{$data2->stype}}</option>
                      <option value="Old">Old</option>
                      <option value="New">New</option>
                     
                  </select>
                  </div>

                <div class="form-group">
                <label for="exampleInputEmail1">Select Class</label>
                <select value="{{old('cclass')}}" class="form-control" name="cclass" id="cclass">
                    <option value="{{$data2->cclass}}">{{ App\Models\Class_section_Model::getClassNameByID($data2->cclass) }}</option>
                 
                    @foreach ($data_class as $row)
                    <option value="{{$row->id}}">{{$row->name}}</option>
                    @endforeach
                   
                </select>
                </div>
 
            <div class="form-group">
                <label for="exampleInputEmail1">Select Section</label>
                <select value="{{old('section')}}" class="form-control" name="section" id="section">
                    <option value="{{$data2->section}}">{{ App\Models\Section_Model::getSectionNameByID($data2->section) }}</option>
                    
                   
                </select>
                  
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" value="{{$data2->name}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Student Name">
              </div>
            @if ($errors->has('name'))
            <p class="text-danger">{{$errors->first('name')}}</p>
            @endif

            <div class="form-group">
                <label for="exampleInputEmail1">Date of Birth</label>
                <input type="date" name="ddate" value="{{$data2->ddate}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Date">
              </div>
            @if ($errors->has('ddate'))
            <p class="text-danger">{{$errors->first('ddate')}}</p>
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
                <label for="exampleInputEmail1">Father Occupation</label>
                <input type="text" name="father_occupation" value="{{$data2->father_occupation}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Father Occupation">
              </div>
            @if ($errors->has('father_occupation'))
            <p class="text-danger">{{$errors->first('father_occupation')}}</p>
            @endif

            <div class="form-group">
                <label for="exampleInputEmail1">Mather Occupation</label>
                <input type="text" name="mother_occupation" value="{{$data2->mother_occupation}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Mother Occupation">
              </div>
            @if ($errors->has('mother_occupation'))
            <p class="text-danger">{{$errors->first('mother_occupation')}}</p>
            @endif

            <div class="form-group">
                <label for="exampleInputEmail1">Education of Father</label>
                <input type="text" name="education_of_father" value="{{$data2->education_of_father}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Education of Father">
              </div>
            @if ($errors->has('education_of_father'))
            <p class="text-danger">{{$errors->first('education_of_father')}}</p>
            @endif

            <div class="form-group">
                <label for="exampleInputEmail1">Education of Mother</label>
                <input type="text" name="education_of_mother" value="{{$data2->education_of_mother}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Education of Mother">
              </div>
            @if ($errors->has('education_of_mother'))
            <p class="text-danger">{{$errors->first('education_of_mother')}}</p>
            @endif


              </div>

       
          </div>
          <!-- /.card -->
        </div>
 
         <div class="col-sm-6">



   <!-- general form elements -->
          <div class="card card-info" align="left">
            <div class="card-header">
              <h3 class="card-title">Communication Details</h3>
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
                <label for="exampleInputEmail1">Mobile No. 1 / Whatsapp No.</label>
                <input type="text" name="mobile1" value="{{$data2->mobile1}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Mobile No. 1 | Whatsapp No.">
              </div>
            @if ($errors->has('mobile1'))
            <p class="text-danger">{{$errors->first('mobile1')}}</p>
            @endif

            <div class="form-group">
                <label for="exampleInputEmail1">Mobile No. 2</label>
                <input type="text" name="mobile2" value="{{$data2->mobile2}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Mobile No. 2">
              </div>
            @if ($errors->has('mobile2'))
            <p class="text-danger">{{$errors->first('mobile2')}}</p>
            @endif

            <div class="form-group">
                <label for="exampleInputEmail1">E-Mail ID</label>
                <input type="text" name="email" value="{{$data2->email}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : E-Mail Address">
              </div>
            @if ($errors->has('email'))
            <p class="text-danger">{{$errors->first('email')}}</p>
            @endif

            <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <textarea name="address" value="{{$data2->address}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Communication Address">{{$data2->address}}</textarea>
                     </div>
            @if ($errors->has('address'))
            <p class="text-danger">{{$errors->first('address')}}</p>
            @endif

            <div class="form-group">
                <label for="exampleInputEmail1">Aadhar Card. No.</label>
                <input type="text" name="aadhar_card" value="{{$data2->aadhar_card}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Aadhar Card. No.">
              </div>
            @if ($errors->has('aadhar_card'))
            <p class="text-danger">{{$errors->first('aadhar_card')}}</p>
            @endif

            <div class="form-group">
              <label for="exampleInputEmail1">Gender</label>
              <select name="gender" value="{{$data2->gender}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Gender">
                  <option>--Select Gender<--</option>
                  <option>Male</option>
                  <option>Female</option>
                  <option>Other</option>
              </select>
                </div>
   

            <div class="form-group">
                <label for="exampleInputEmail1">Religion</label>
                <select name="religion" value="{{$data2->religion}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Religion">
                    <option value="{{$data2->religion}}">{{$data2->religion}}</option>
                    <option>--Select Religion--</option>
                    <option>Hindu</option>
                    <option>Muslim</option>
                    <option>Sikh</option>
                    <option>Christian</option>
                    <option>Buddhist</option>
                    <option>Jain</option>
                    <option>Other</option>
                </select>
                  </div>
            @if ($errors->has('religion'))
            <p class="text-danger">{{$errors->first('religion')}}</p>
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

        
            <br>
          
              <div class="card-footer" align="center">
             
                  <input type='submit' name="upload" class="btn btn-info" value='Click here for Update'/>
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