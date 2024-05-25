@extends('admin.layouts.main')
@section('main-container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>School Records</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">School</li>
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
          <h3 class="card-title">All the Session Records in the Database</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Sr. No.</th>
              <th>Image</th>
              <th>Name</th>
              <th>SID</th>
              <th>Mobile</th>
              <th>E-Mail</th>
              <th>Address</th>
              <th>Action</th>
         
            </tr>
            </thead>
            <tbody>

              @foreach ($school as $school)
            <tr>
              <td>{{$loop->index+1}}</td>
              <td><a href="{{url('../storage/app/'.$school->school_image)}}"><img src="{{url('../storage/app/'.$school->school_image)}}" alt="{{$school->name}}" width="50px" height="50px"></a>
            </td>
              <td>{{$school->name}}
              </td>
              <td>{{$school->school_id}}
              </td>
              <td>{{$school->mobile}}
              </td>
              <td>{{$school->email}}
              </td>
              <td>{{$school->address}}
              </td>
              <td width="200px">  <a class="btn btn-app" href="school_edit/{{$school->id}}">
                <i class="fas fa-edit"></i> Edit
              </a>
              <a class="btn btn-app" onclick="return confirm('Are you sure?')" href="school_delete/{{$school->id}}">
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