@extends('school.layouts.main')
@section('main-container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Section of the Class</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Section</li>
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

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">All the Section Records of Class in the Database</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Sr. No.</th>
          <th>Section</th>
          <th>Create at</th>

          <th>Action</th>
     
        </tr>
        </thead>
        <tbody>

          @foreach ($data2 as $da)
        <tr>
          <td>{{$loop->index+1}}</td>
          <td>{{$da->section}}
          </td>
          <td>{{$da->created_at}}
        </td>
    
          <td width="200px"> 
          <a class="btn btn-app" onclick="return confirm('Are you sure?')" href="{{url('/school/section_delete')}}/{{$da->id}}">
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