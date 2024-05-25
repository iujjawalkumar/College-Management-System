@extends('school.layouts.main')
@section('main-container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Notification Update</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Notice</li>
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
                <h3 class="card-title">Update Notification</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('school')}}/notice_update/{{$data2->id}}" method="POST">
                @csrf
                @method('put')
                <div class="card-body">

                  @if (\Session::has('success'))
                  <div class="alert alert-success">
                      {!! \Session::get('success') !!}
                  </div>
              @endif

                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" name="title" value="{{$data2->title}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Noticse">
                  </div>
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success swalDefaultSuccess">Update Now</button>
                  <a class="btn btn-info" href="../notice">Back</a>
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