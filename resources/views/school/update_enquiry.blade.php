@extends('school.layouts.main')
@section('main-container')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Enquiry</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Enquiry</li>
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
                <h3 class="card-title">Update Student (Enquiry Form)</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{url('school')}}/student_enq_update/{{$data2->id}}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">

                  @if (\Session::has('success'))
                  <div class="alert alert-success">
                      {!! \Session::get('success') !!}
                  </div>
              @endif

              <div class="form-group">
                <label for="exampleInputEmail1">Select Class</label>
                <select value="{{old('cclass')}}" class="form-control" name="cclass" id="cclass">
                    <option value="{{$data2->cclass}}">{{ App\Models\Class_section_Model::getClassNameByID($data2->cclass) }}</option>
                 
                    <option value="0">--Select Class--</option>
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
            <label for="exampleInputEmail1">Mobile No. 1 / Whatsapp No.</label>
            <input type="text" name="mobile1" value="{{$data2->mobile1}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Mobile No. 1 | Whatsapp No.">
          </div>
        @if ($errors->has('mobile1'))
        <p class="text-danger">{{$errors->first('mobile1')}}</p>
        @endif

        <div class="form-group">
          <label for="exampleInputEmail1">Address</label>
          <textarea name="address" value="{{$data2->address}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Communication Address">{{$data2->address}}</textarea>
               </div>
      @if ($errors->has('address'))
      <p class="text-danger">{{$errors->first('address')}}</p>
      @endif

      <div class="form-group">
        <label for="exampleInputEmail1">Remarks</label>
        <textarea name="remarks" value="{{$data2->remarks}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Remarks by Student or Parents">{{$data2->remarks}}</textarea>
             </div>
    @if ($errors->has('remarks'))
    <p class="text-danger">{{$errors->first('remarks')}}</p>
    @endif

    <div class="form-group">
        <label for="exampleInputEmail1">Transfer for Admission</label>
        <select class="form-control" name="status" id="status">
          
            <option value="0">No</option>
            <option value="1">Yes</option>
           
        </select>
        </div>
    

                <div class="card-footer">
                  <button type="submit" class="btn btn-success swalDefaultSuccess">Click here to Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->




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
                      $('#section').html('<option value="">-- Select Section --</option>');
                      $.each(result.section, function (key, value) {
                          $("#section").append('<option value="' + value
                              .id + '">' + value.section + '</option>');
                      });
                     
                   
                  }
              });
          });

        
          $('#section').on('change', function () {
              var idSection = this.value;
              $("#subject").html('');
              $.ajax({
                  url: "{{url('school/fetch-subject')}}",
                  type: "POST",
                  data: {
                      section_id: idSection,
                      _token: '{{csrf_token()}}'
                  },
                  dataType: 'json',
                  success: function (result) {
                      $('#subject').html('<option value="">-- Select Subject --</option>');
                      $.each(result.section, function (key, value) {
                          $("#subject").append('<option value="' + value
                              .id + '">' + value.subject + '</option>');
                      });
                  }
              });
          });

      });
  </script>
  

@endsection
