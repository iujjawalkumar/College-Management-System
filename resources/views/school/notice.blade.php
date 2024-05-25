@extends('school.layouts.main')
@section('main-container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Notice Board</h1>
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
                <h3 class="card-title">Add Notice</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="addnotice" method="POST">
                @csrf
                <div class="card-body">

                  @if (\Session::has('success'))
                  <div class="alert alert-success">
                      {!! \Session::get('success') !!}
                  </div>
              @endif

                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" name="title" value="{{old('title')}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Admission Open">
                  </div>
                @if ($errors->has('title'))
                <p class="text-danger">{{$errors->first('title')}}</p>
                @endif
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success swalDefaultSuccess">Click to Save</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">All the Notice Board Records in the Database</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Sr. No.</th>
              <th>Title</th>
              <th>Create at</th>
              <th>Update at</th>
              <th>Action</th>
         
            </tr>
            </thead>
            <tbody>

              @foreach ($data2 as $da)
            <tr>
              <td>{{$loop->index+1}}</td>
              <td>{{$da->title}}
              </td>
              <td>{{$da->created_at}}
            </td>
            <td>{{$da->updated_at}}
            </td>
              <td width="200px">  <a class="btn btn-app" href="notice_edit/{{$da->id}}">
                <i class="fas fa-edit"></i> Edit
              </a>
              <a class="btn btn-app" onclick="return confirm('Are you sure?')" href="notice_delete/{{$da->id}}">
                <i class='fa fa-window-close'></i> Delete
              </a>
            </td>
            </tr>
            @endforeach
            </tbody>
         
          </table>
        </div>
        <!-- /.card-body -->

        {{$data2->links()}}
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>


    </section>
    <!-- /.content -->
  </div>

@endsection