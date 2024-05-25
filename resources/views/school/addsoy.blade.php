@extends('school.layouts.main')
@section('main-container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Student of the Year</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">SOY</li>
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
                <h3 class="card-title">Add Students of the year</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="addsoy" method="POST" enctype= "multipart/form-data">
                @csrf
                <div class="card-body">

                  @if (\Session::has('success'))
                  <div class="alert alert-success">
                      {!! \Session::get('success') !!}
                  </div>
              @endif

                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Student Name">
                  </div>
               

                @if ($errors->has('name'))
                <p class="text-danger">{{$errors->first('name')}}</p>
                @endif


                <div class="form-group">
                  <label for="exampleInputEmail1">Class & Section</label>
                  <input type="text" name="class_section" value="{{old('class_section')}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : 2 (A)">
                </div>
             

              @if ($errors->has('class_section'))
              <p class="text-danger">{{$errors->first('class_section')}}</p>
              @endif


              <div class="form-group">
                <label for="exampleInputEmail1">Rank in the School</label>
                <input type="text" name="rank" value="{{old('rank')}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : 1st, 2nd, 3rd etc...">
              </div>
           

            @if ($errors->has('rank'))
            <p class="text-danger">{{$errors->first('rank')}}</p>
            @endif
             
    
              
                     <input type="file" class="form-control" name="file_image">
             
                          @if ($errors->has('file_image'))
                          <p class="text-danger">{{$errors->first('file_image')}}</p>
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

    


    </section>
    <!-- /.content -->
  </div>

@endsection