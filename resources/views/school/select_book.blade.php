@extends('school.layouts.main')
@section('main-container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Library Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Library</li>
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


  @if (\Session::has('success'))
  <div class="alert alert-success">
      {!! \Session::get('success') !!}
  </div>
@endif

      <div class="container-fluid">
        <div class="row">


      <div class="card">
        <div class="card-header">
          <h3 class="card-title">All the Books Records in the Library Database</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Sr. No.</th>
              <th>Class</th>
              <th>Section</th>
              <th>Sub / Book Name</th>
              <th>Author / Publisher</th>
              <th>Issue</th>
              <th>Return</th>
              <th>Action</th>
         
            </tr>
            </thead>
            <tbody>

              @foreach ($data3 as $da)
            <tr>
              <td>{{$loop->index+1}}</td>
              <td>
                {{ App\Models\Class_section_Model::getClassNameByID($da->cclass) }}
              </td>
              <td>{{ App\Models\Section_Model::getSectionNameByID($da->section) }}
            </td>
            <td>{{$da->book_name}}
            </td>
            <td>{{$da->author}} 
            </td>
              <td>{{ App\Models\Assign_Book_Model::getData($da->id) }}
            </td>
            <td>{{ App\Models\Assign_Book_Model::getData2($da->id) }}
            </td>
              <td width="200px"> 
                <a class="btn btn-app" onclick="return confirm('Are you sure?')" href="{{url('school')}}/issue_book/{{$da->id}}/{{$data2->id}}">
                <i class="fa fa-hand-paper-o black"></i> Issue
              </a>
              <a class="btn btn-app" onclick="return confirm('Are you sure?')" href="{{url('school')}}/return_book/{{$da->id}}/{{$data2->id}}">
                <i class='fa fa-reply-all black'></i> Return
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