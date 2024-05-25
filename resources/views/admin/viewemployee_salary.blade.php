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
              <th>Basic</th>
              <th>Dearness Allowance</th>
              <th>House Rent Allowance</th>
              <th>Conveyance Allowance</th>
              <th>Medical Allowance</th>
              <th>Special Allowance</th>
              <th>Total</th>
              <th>Action</th>
         
            </tr>
            </thead>
            <tbody>

              @foreach ($data2 as $emp)
            <tr>
              <td>{{$loop->index+1}}
             </td>
        
              <td>{{$emp->basic}} &#8377;
              </td>
             
            <td>{{$emp->da}} &#8377;
            </td>

            <td>{{$emp->hra}} &#8377;
            </td>
           
            <td>{{$emp->ca}} &#8377;
            </td>
            <td>{{$emp->ma}} &#8377;
            </td>
            <td>{{$emp->sa}} &#8377;
            </td>
            <td>{{$emp->total}} &#8377;
            </td>
          
              <td> 
     
              <a class="btn btn-app" onclick="return confirm('Are you sure?')" href="{{url('/school/employee_salary_delete')}}/{{$emp->id}}">
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