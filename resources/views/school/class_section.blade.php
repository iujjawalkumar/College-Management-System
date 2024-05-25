@extends('school.layouts.main')
@section('main-container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Class & Section</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">CS</li>
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
        <div class="row">

            <div class="col-md-6">

          <!-- left column -->
          <div class="col-md-6" style="float:none;margin:auto;">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Add Class</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="addclass" method="POST">
                @csrf
                @method('put')
                <div class="card-body">

               
                  <div class="form-group">
                    <label for="exampleInputEmail1">Class</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : 1,2,3 etc.">
                  </div>
                @if ($errors->has('name'))
                <p class="text-danger">{{$errors->first('name')}}</p>
                @endif
                </div>
            
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success swalDefaultSuccess">Click to Add</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
            </div>

          <div class="col-md-6">

            <!-- left column -->
            <div class="col-md-6" style="float:none;margin:auto;">
              <!-- general form elements -->
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Add Section</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="addsection" method="POST">
                  @csrf
                  @method('put')
                  <div class="card-body">
  
  
                <div class="form-group">
                    <label for="exampleInputEmail1">Select Class</label>
                   <select class="form-control" name="cclass">
                    <option>--Select Class--</option>

                    @foreach ($data2 as $row)
                    <option value="{{$row->id}}">{{$row->name}}</option>
                    @endforeach


                    
                   </select>
                  </div>
                @if ($errors->has('cclass'))
                <p class="text-danger">{{$errors->first('cclass')}}</p>
                @endif
              
                <!-- /.card-body -->
       

                    <div class="form-group">
                      <label for="exampleInputEmail1">Section</label>
                      <input type="text" name="section" value="{{old('section')}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : A,B,C, etc..">
                    </div>
                  @if ($errors->has('section'))
                  <p class="text-danger">{{$errors->first('section')}}</p>
                  @endif
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-success swalDefaultSuccess">Click to Add</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
  


    </div>
    <!-- /.col -->
  </div>

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">All the Classes Records in the Database</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Sr. No.</th>
          <th>Class</th>
          <th>Create at</th>
 
          <th>Action</th>
     
        </tr>
        </thead>
        <tbody>

          @foreach ($data2 as $da)
        <tr>
          <td>{{$loop->index+1}}</td>
          <td>{{$da->name}}
          </td>
          <td>{{$da->created_at}}
        </td>
  
          <td width="200px">  <a class="btn btn-app" href="view_section/{{$da->id}}">
            <i class="fa fa-eye" aria-hidden="true"></i> View Section
          </a>
          <a class="btn btn-app" onclick="return confirm('Are you sure?')" href="class_delete/{{$da->id}}">
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