@extends('school.layouts.main')
@section('main-container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Gallery & Event</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Gallery</li>
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
                <h3 class="card-title">Add Photos in Gallery</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="addgallery" method="POST" enctype= "multipart/form-data">
                @csrf
                <div class="card-body">

                  @if (\Session::has('success'))
                  <div class="alert alert-success">
                      {!! \Session::get('success') !!}
                  </div>
              @endif

                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" name="title" value="{{old('title')}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Title of the Event or Photos">
                  </div>
               

                @if ($errors->has('title'))
                <p class="text-danger">{{$errors->first('title')}}</p>
                @endif

             
    
            
                     <input type="file" class="form-control" name="file_image">
             
                          @if ($errors->has('file_image'))
                          <p class="text-danger">{{$errors->first('file_image')}}</p>
                          @endif
                    

                
                        <br>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Publish</label>
                            <select class="form-control" name="status">
                              <option value="1">Yes</option>
                              <option value="0">No</option>
      
                            </select>
                          
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