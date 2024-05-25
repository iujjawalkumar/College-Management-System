@extends('school.layouts.main')
@section('main-container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dynamic Pages of the Website</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Page</li>
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
          <h3 class="card-title">All the Dynamic Pages of the Webaite</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Sr. No.</th>
              <th>Name / Title</th>
              <th>Action</th>
         
            </tr>
            </thead>
            <tbody>

              @foreach ($data2 as $school)
            <tr>
              <td>{{$loop->index+1}}</td>
              <td>{{$school->name}}
              </td>
            
              <td width="200px"> 

                <a class="btn btn-app" href="page_edit/{{$school->id}}">
                    <i class="fas fa-edit"></i> Edit
                  </a>

              <a class="btn btn-app" onclick="return confirm('Are you sure?')" href="page_delete/{{$school->id}}">
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