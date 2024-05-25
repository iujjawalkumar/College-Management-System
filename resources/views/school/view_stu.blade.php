@extends('school.layouts.main')
@section('main-container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Result Update & Print</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Student</li>
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
          <h3 class="card-title">All the Student's Records in the Database</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Sr. No.</th>
              <th>Image</th>
              <th>Name</th>
              <th>Class</th>
              <th>Section</th>
              <th>Mobile 1</th>
              <th>Mobile 2</th>
              <th>Action</th>
         
            </tr>
            </thead>
            <tbody>

              @foreach ($data2 as $school)
            <tr>
              <td>{{$loop->index+1}}
             </td>
              <td><a href="{{asset('storage/student/'.substr($school->file_image, 15))}}"><img src="{{asset('storage/student/'.substr($school->file_image, 15))}}" alt="{{$school->name}}" width="50px" height="50px"></a>
            </td>
              <td>{{$school->name}}
              </td>
              <td>
                {{ App\Models\Class_section_Model::getClassNameByID($school->cclass) }}
              </td>
              <td>{{ App\Models\Section_Model::getSectionNameByID($school->section) }}
            </td>
            <td>{{$school->mobile1}}
            </td>
            <td>{{$school->mobile2}}
            </td>
            
              <td width="200px"> 
             

                  <a class="btn btn-app" href="{{url('school')}}/add_exam_result/{{$school->id}}/{{$exam_id}}">
                    <i class="fas fa-edit"></i> Add Result
                  </a>

                  <a class="btn btn-app" href="{{url('print_exam_result')}}/{{$school->id}}/{{$exam_id}}">
                    <i class="fa fa-print" aria-hidden="true"></i> Print Result
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

@endsection