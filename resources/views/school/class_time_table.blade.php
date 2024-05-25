@extends('school.layouts.main')
@section('main-container')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Class Schedule</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Time Table</li>
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
                <h3 class="card-title">Assign Teacher & Period for Classes</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="add_class_time_table" method="POST">
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
                    <option value="0">--Select Class--</option>
                    @foreach ($data_class as $row)
                    <option value="{{$row->id}}">{{$row->name}}</option>
                    @endforeach
                   
                </select>
                  
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Select Section</label>
                <select value="{{old('section')}}" class="form-control" name="section" id="section">
                    <option value="0">--Select Section--</option>
                   
                </select>
                  
            </div>
    

            <div class="form-group">
                <label for="exampleInputEmail1">Select Subject</label>
                <select value="{{old('subject')}}" class="form-control" name="subject" id="subject">
                    <option value="0">--Select Subject--</option>
                   
                </select>
                  
            </div>
    

            <div class="form-group">
                <label for="exampleInputEmail1">Select Teacher</label>
                <select value="{{old('teacher')}}" class="form-control" name="teacher">
                    <option value="0">--Select Teacher--</option>
                    @foreach ($teacher as $row_tech)
                    <option value="{{$row_tech->id}}">{{$row_tech->name}} ({{$row_tech->desi}})</option>
                    @endforeach
                   
                </select>
                  
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Select Period</label>
                <select value="{{old('period')}}" class="form-control" name="period">
                    <option value="0">--Select Period--</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                   
                </select>
                  
            </div>
    
                <div class="card-footer">
                  <button type="submit" class="btn btn-success swalDefaultSuccess">Click to Create</button>
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
          <h3 class="card-title">All the Records in the Database</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Sr. No.</th>
              <th>Class</th>
              <th>Section</th>
              <th>Subject</th>
              <th>Teacher</th>
               <th>Period</th>
              <th>Action</th>
         
            </tr>
            </thead>
            <tbody>

              @foreach ($data_class_time as $da)
            <tr>
              <td>{{$loop->index+1}}</td>
              <td>
                {{ App\Models\Class_section_Model::getClassNameByID($da->cclass) }}
              </td>
              <td>{{ App\Models\Section_Model::getSectionNameByID($da->section) }}
            </td>
            <td>{{ App\Models\Subject_Model::getSubject($da->subject) }}
            </td>
            <td>{{ App\Models\Employee_Model::getName($da->teacher) }}
            </td>
            <td>{{$da->period}}
            </td>
         
         
              <td width="200px"> 
              <a class="btn btn-app" onclick="return confirm('Are you sure?')" href="class_time_table_delete/{{$da->id}}">
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

