@extends('school.layouts.main')
@section('main-container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Select User Role</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
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
                <h3 class="card-title">Assign Role of Employee</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('school')}}/update_role/{{$data2->id}}" method="post">
                @csrf
                <div class="card-body">

                  @if (\Session::has('success'))
                  <div class="alert alert-success">
                      {!! \Session::get('success') !!}
                  </div>
              @endif


               
                <div class="form-group">
                    <label for="exampleInputEmail1">Select Role</label>
                    <select class="form-control" name="role" id="role">
                        <option>--Select Role--</option>
                        <option>Class / Section</option>
                        <option>Subject Records</option>
                        <option value disabled>——————Student's ——————</option>
                        <option>Add Student</option>
                        <option>Import Student's</option>
                        <option>View Student's</option>
                        <option value disabled>——————Employee Record's—————</option>
                        <option>Add New Employee</option>
                        <option>View Employee</option>
                        <option>Manage Salary</option>
                        <option>Offer Letter / Exp Letter</option>
                        <option value disabled>———————Account's——————</option>
                        <option>Fee Management</option>
                        <option>Invoice / Billing (Fee)</option>
                        <option>Employee Salary</option>
                        <option>General Expenses</option>
                        <option>Vehicle Expenses</option>
                        <option value disabled>———————Transport——————</option>
                        <option>Add / View Route</option>
                        <option>Add / View Vehicle</option>
                        <option>Add / View Driver</option>
                        <option>Student Vehicle</option>
                        <option value disabled>———————Library——————</option>
                        <option>Add / View Books</option>
                        <option>Add / View E-Books</option>
                        <option>Assign Book</option>
                        <option value disabled>———————Book Store——————</option>
                        <option>Purchase</option>
                        <option>Sale (Invoice)</option>
                        <option>Sales Records</option>
                        <option value disabled>———————Time Table——————</option>
                        <option>Class Schedule</option>
                        <option>Holidays List</option>
                        <option>Tour List</option>
                        <option>Examination Table</option>
                        <option value disabled>—————E-Identity Card—————</option>
                        <option>Generate & Print ID Card</option>
                        <option value disabled>————Examination & Result————</option>
                        <option>View Examination</option>
                        <option>Generate Admit Card</option>
                        <option>Result</option>
                        <option value disabled>———————Website Update——————</option>
                        <option>Notice Board</option>
                        <option>Add Gallery & Event's</option>
                        <option>View Gallery & Event's</option>
                        <option>Add Student of the Year</option>
                        <option>View Student of the Year</option>
                        <option>Add Page on Site</option>
                        <option>View Page on Site</option>
                        <option value disabled>———————Setting——————</option>
                        <option>Select Session</option>
                        <option>Profile Update</option>
                        <option>Logo Update</option>
                        <option>Password Update</option>
                        <option value disabled>———————Report's——————</option>
                        <option>Fee Reports</option>
                        <option>Sales Reports</option>
                        <option>Purchase Reports</option>
                        <option>Expenses Reports</option>
                        <option>Salary Reports</option>
                        <option>Vehicle Reports</option>
                        <option value disabled>—————————————</option>
                        <option>Balance Sheet</option>
                        <option>User Management</option>
                        <option>Contact</option>
         
                    </select>     
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-success swalDefaultSuccess">Click to Assign</button>
                 <a href="{{url('school')}}/user_role" class="btn btn-warning"> Back</a>
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
          <h3 class="card-title">All the User Role Records in the Database</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Sr. No.</th>
              <th>Role</th>
              <th>Date</th>
              <th>Action</th>
         
            </tr>
            </thead>
            <tbody>

              @foreach ($role as $da)
            <tr>
              <td>{{$loop->index+1}}</td>
   
            </td>
            <td>{{$da->role}}
            </td>
       
              <td>{{$da->created_at->format('d/m/Y')}}
            </td>
           
              <td>  
              <a class="btn btn-app" onclick="return confirm('Are you sure?')" href="{{url('school')}}/role_delete/{{$da->id}}">
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


 

@endsection