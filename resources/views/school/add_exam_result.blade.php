@extends('school.layouts.main')
@section('main-container')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Exam Result - {{ App\Models\Exam_List_Model::getName($exam_id) }} | {{$data3->name}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Exam</li>
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
                <h3 class="card-title">Update Exam Results</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('school')}}/addexam_result/{{$stu_id}}/{{$exam_id}}" method="POST">
                @csrf
                @method('put')
                <div class="card-body">

                  @if (\Session::has('success'))
                  <div class="alert alert-success">
                      {!! \Session::get('success') !!}
                  </div>
              @endif

              <div class="form-group">
                <label for="exampleInputEmail1">Select Subject</label>
                <select class="form-control" name="sub_id">
                    <option value="0">--Select Subject--</option>
                    @foreach ($exam as $row)
                    <option value="{{$row->subject}}">{{ App\Models\Subject_Model::getSubject($row->subject) }}</option>
                    @endforeach
                   
                </select>
                  
            </div>

    
            <div class="form-group">
                <label for="exampleInputEmail1">Obtain Marks</label>
                <input type="text" name="obtain_marks" value="{{old('obtain_marks')}}" class="form-control" placeholder="40,50,70, etc...">
             
              </div>
              @if ($errors->has('obtain_marks'))
              <p class="text-danger">{{$errors->first('obtain_marks')}}</p>
              @endif

              <div class="form-group">
                <label for="exampleInputEmail1">Maximum Marks</label>
                <input type="text" name="maximum_marks" value="{{old('maximum_marks')}}" class="form-control" placeholder="100, etc...">
       
              </div>
              @if ($errors->has('maximum_marks'))
              <p class="text-danger">{{$errors->first('maximum_marks')}}</p>
              @endif
    
                <div class="card-footer">
                  <button type="submit" class="btn btn-success swalDefaultSuccess">Click to Update</button>
              
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
          <h3 class="card-title">All the Marks Records of {{$data3->name}} in the Database</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Sr. No.</th>
              <th>Subject</th>
              <th>Obtain Marks</th>
              <th>Maximum Marks</th>
              
              <th>Action</th>
         
            </tr>
            </thead>
            <tbody>

              @foreach ($data2 as $da)
            <tr>
              <td>{{$loop->index+1}}</td>
              <td>
                {{ App\Models\Subject_Model::getSubject($da->sub_id) }}
              </td>
              <td>{{$da->om}}
            </td>
            <td>
                {{$da->mm}}
            </td>
      
         
              <td width="200px"> 
              <a class="btn btn-app" onclick="return confirm('Are you sure?')" href="{{url('school')}}/exam_result_delete/{{$da->id}}">
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

