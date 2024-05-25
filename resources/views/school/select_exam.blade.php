@extends('school.layouts.main')
@section('main-container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Select Exam</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Exam</li>
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

       
          <div class="col-md-12">

            <!-- left column -->
            <div class="col-md-6" style="float:none;margin:auto;">
              <!-- general form elements -->
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Select Exam</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="admitcard" method="POST">
                  @csrf
                  @method('put')
                  <div class="card-body">
  
  
                <div class="form-group">
                    <label for="exampleInputEmail1">Select Exam</label>
                   <select class="form-control" name="exam_id">
                    <option>--Select Exam--</option>

                    @foreach ($data2 as $row)
                    <option value="{{$row->id}}">{{$row->title}}</option>
                    @endforeach
                    
                   </select>
                  </div>
             
              
                <!-- /.card-body -->
       
                      <input type="hidden" name="section" value="{{old('section')}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : A,B,C, etc..">
             
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-success swalDefaultSuccess">Click to Next</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
  


    </div>
    <!-- /.col -->
  </div>

 

    </section>
    <!-- /.content -->
  </div>

@endsection