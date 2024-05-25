@extends('school.layouts.main')
@section('main-container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Upload Documents</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Documents</li>
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
                <h3 class="card-title">Upload Student Documents</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('school')}}/student_doc_edit" method="POST" enctype= "multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">

                  @if (\Session::has('success'))
                  <div class="alert alert-success">
                      {!! \Session::get('success') !!}
                  </div>
              @endif
             <p align="center">
                @if ($data2->file_doc==Null)
                <h3>Please Upload Documents</h3> 
                <br>   
                @endif
                @if ($data2->file_doc!=Null)
                <h3><a href="{{asset('storage/student/'.substr($data2->file_doc, 15))}}">View / Download </a> Uploaded Documents</h3> 
                <br>  
                @endif
                <input type="file" class="form-control" name="file_doc">
              <input type="hidden" class="form-control" name="stu_id" value="{{$data2->id}}">
             
              @if ($errors->has('file_doc'))
              <p class="text-danger">{{$errors->first('file_doc')}}</p>
              @endif
              </div>

                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success swalDefaultSuccess">Upload Now</button>
                  <a class="btn btn-info" href="../viewstudent">Back</a>
                </div>
              </form>
            </div>
            <!-- /.card -->

            <div class="col-md-6" style="float:none;margin:auto;">
              <!-- general form elements -->
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Upload Scanned TC Documents</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{url('school')}}/student_tc_edit" method="POST" enctype= "multipart/form-data">
                  @csrf
                  @method('put')
                  <div class="card-body">
  
                    @if (\Session::has('success2'))
                    <div class="alert alert-success">
                        {!! \Session::get('success2') !!}
                    </div>
                @endif
               <p align="center">
                  @if ($data2->tc_doc==Null)
                  <h3>Upload TC Documents</h3> 
                  <br>   
                  @endif
                  @if ($data2->tc_doc!=Null)
                  <h3><a href="{{asset('storage/student/'.substr($data2->tc_doc, 15))}}">View / Download </a> Uploaded Documents</h3> 
                  <br>  
                  @endif
                  <input type="file" class="form-control" name="file_doc">
                <input type="hidden" class="form-control" name="stu_id" value="{{$data2->id}}">
               
                @if ($errors->has('file_doc'))
                <p class="text-danger">{{$errors->first('file_doc')}}</p>
                @endif
                </div>
  
                  
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-success swalDefaultSuccess">Upload Now</button>
                    <a class="btn btn-info" href="../viewstudent">Back</a>
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