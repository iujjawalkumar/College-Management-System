@extends('school.layouts.main')
@section('main-container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Page for Website</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Page</li>
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
          <div class="col-md-10" style="float:none;margin:auto;">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Add New Page</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="addpage" method="POST" enctype= "multipart/form-data">
                @csrf
                <div class="card-body">

                  @if (\Session::has('success'))
                  <div class="alert alert-success">
                      {!! \Session::get('success') !!}
                  </div>
              @endif

                  <div class="form-group">
                    <label for="exampleInputEmail1">Page Name / Title</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : About Us, etc..">
                  </div>
               

                @if ($errors->has('name'))
                <p class="text-danger">{{$errors->first('name')}}</p>
                @endif


                <div class="form-group">
                  <label for="exampleInputEmail1">Select Menu</label>
                  <select class="form-control" name="page_menu">
                    <option value="3">Admission</option>
                    <!-- <option value="1">About</option>
                    <option value="2">Activities</option> -->
                    <!-- <option value="3">Admission</option> -->
                    <!-- <option value="4">Facilities & Infra</option>
                    <option value="5">Gallery</option>
                    <option value="6">Student Zone</option> -->
                  </select>
                
                </div>
             

              @if ($errors->has('page_menu'))
              <p class="text-danger">{{$errors->first('page_menu')}}</p>
              @endif


              <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <textarea class="form-control" id="editor" name="des" placeholder="Description of the Page"></textarea>
             
              </div>
           

            @if ($errors->has('des'))
            <p class="text-danger">{{$errors->first('des')}}</p>
            @endif
             
    
                
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success swalDefaultSuccess">Create Page</button>
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




<script>
    CKEDITOR.replace( 'editor' );
</script>



@endsection