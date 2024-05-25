@extends('school.layouts.main')
@section('main-container')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Check Enquiry</h1>
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
                    <th>Name</th>
                    <th>Class</th>
                  
                    <th>Mobile</th>
                  
                    <th>Address</th>
                    <th>Re-Marks</th>
                    <th>Action</th>
               
                  </tr>
                  </thead>
                  <tbody>
      
                    @foreach ($data2 as $school)
                  <tr>
                    <td>{{$loop->index+1}}</td>
                  
                    <td>{{$school->name}}
                    </td>
                    <td>
                      {{ App\Models\Class_section_Model::getClassNameByID($school->cclass) }}
                    </td>
                  
                 
                  <td>{{$school->mobile1}},
                {{$school->mobile2}}
                  </td>
                 
                <td>{{$school->address}}
                </td>
                <td>{{$school->remarks}}
                </td>
                  
                    <td width="300px"> 
                      <a class="btn btn-app" href="enq_edit/{{$school->id}}">
                          <i class="fa fa-eye" aria-hidden="true"></i>Edit Remarks
                        </a>
                      <a class="btn btn-app" href="{{url('school')}}/step22/{{$school->id}}">
                          <i class='fa fa-rupee'></i> Pay
                        </a>
                        <a class="btn btn-app" href="{{url('school')}}/print_invoice/{{$school->id}}">
                          <i class='fas fa-print'></i> Print
                        </a>
                        <a class="btn btn-app" onclick="return confirm('Are you sure?')" href="student_delete/{{$school->id}}">
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

