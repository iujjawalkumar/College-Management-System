@extends('school.layouts.main')
@section('main-container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile Update</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6" style="float:none;margin:auto;">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Update Profile</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('school')}}/profile" method="POST">
                @csrf
                @method('put')
                <div class="card-body">

                  @if (\Session::has('success'))
                  <div class="alert alert-success">
                      {!! \Session::get('success') !!}
                  </div>
              @endif

                  <div class="form-group">
                    <label for="exampleInputEmail1">School Name</label>
                    <input type="text" name="name" value="{{$data->name}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Name" required>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">E-Mail</label>
                    <input type="text" name="email" value="{{$data->email}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : E-Mail" required>
                  </div>

                  @if ($errors->has('email'))
                  <p class="text-danger">{{$errors->first('email')}}</p>
                  @endif

                  <div class="form-group">
                    <label for="exampleInputEmail1">Mobile No.</label>
                    <input type="text" name="mobile" value="{{$data->mobile}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Mobile" required>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" name="address" value="{{$data->address}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Mobile" required>
                  </div>
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success swalDefaultSuccess">Update Now</button>
                  <a class="btn btn-info" href="../erp/home">Back</a>
                </div>
              </form>
            </div>
            <!-- /.card -->

          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

    

    </section>
    <!-- /.content -->
  </div>

@endsection