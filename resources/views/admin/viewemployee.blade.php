@extends('admin.layouts.main')
@section('main-container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee's Records</h1>
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

  

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">All the Employee's Records in the Database</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Sr. No.</th>
              <th>Name</th>
              <th>Designation</th>
              <th>Qualification</th>
              <th>Experience</th>
              <th>Date of Joining</th>
              <th>Date of Birth</th>
              <th>Mob</th>
              <th>E-Mail</th>
              <th>Address</th>
              <th>UID</th>
              <th>Pan Card</th>
              <th>Bank Acc No.</th>
              <th>IFSC</th>
             
              <th>Action</th>
         
            </tr>
            </thead>
            <tbody>

              @foreach ($data2 as $emp)
            <tr>
              <td>{{$loop->index+1}}
             </td>
        
              <td>{{$emp->name}}
              </td>
             
            <td>{{$emp->desi}}
            </td>

            <td>{{$emp->qualification}}
            </td>
           
            <td>{{$emp->exp}}
            </td>
            <td>{{$emp->doj}}
            </td>
            <td>{{$emp->dob}}
            </td>
            <td>{{$emp->mob}}
            </td>
            <td>{{$emp->email}}
            </td>
            <td>{{$emp->address}}
            </td>
            <td>{{$emp->uid}}
            </td>
            <td>{{$emp->pan}}
            </td>
            <td>{{$emp->accno}}
            </td>
            <td>{{$emp->ifsc}}
            </td>
            
              <td> 
               
                <a class="btn btn-app" href="employee_edit/{{$emp->id}}">
                    <i class="fas fa-edit"></i> Edit
                  </a>

                  <a class="btn btn-app" href="employee_salary_data/{{$emp->id}}">
                    <i class='fa fa-rupee'></i> Salary
                  </a>
     
              <a class="btn btn-app" onclick="return confirm('Are you sure?')" href="employee_delete/{{$emp->id}}">
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

  <script>
    function view_student(id) {
        // JS function to open a new window(not "New Tab"), e.g: here, we are
        // opening the new window in youtube.com 
       
       var myWindow = window.open("view_form/"+id, width = "200px", height = "100px");
    }
</script>

@endsection