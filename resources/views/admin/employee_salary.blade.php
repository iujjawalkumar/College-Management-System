@extends('admin.layouts.main')
@section('main-container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee Salary</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Salary</li>
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
                <h3 class="card-title">Add Employee Salary Records</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="addemployee_salary" method="POST">
                @csrf
                <div class="card-body">

                  @if (\Session::has('success'))
                  <div class="alert alert-success">
                      {!! \Session::get('success') !!}
                  </div>
              @endif

              <div class="form-group">
                <label for="exampleInputEmail1">Select Employee</label>
                <select class="form-control" name="emp_id">
                    <option>-- Select --</option>
                    @foreach ($data2 as $emp)
                
                    <option value="{{$emp->id}}">{{$emp->name}} ({{$emp->desi}}) | UID : {{$emp->uid}}</option>

                    @endforeach
                    
                </select>
              </div>
          

                <div class="form-group">
                    <label for="exampleInputEmail1">Basic Salary</label>
                    <input type="text" name="basic" value="{{old('basic')}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : 2000, 10000, etc..">
                  </div>
                @if ($errors->has('basic'))
                <p class="text-danger">{{$errors->first('basic')}}</p>
                @endif

                
                <div class="form-group">
                    <label for="exampleInputEmail1">Dearness Allowance</label>
                    <input type="text" name="da" value="{{old('da')}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : 200, 1000, etc..">
                  </div>
                @if ($errors->has('da'))
                <p class="text-danger">{{$errors->first('da')}}</p>
                @endif

                
                <div class="form-group">
                    <label for="exampleInputEmail1">House Rent Allowance</label>
                    <input type="text" name="hra" value="{{old('hra')}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : 200, 1000, etc..">
                  </div>
                @if ($errors->has('hra'))
                <p class="text-danger">{{$errors->first('hra')}}</p>
                @endif

                
                <div class="form-group">
                    <label for="exampleInputEmail1">Conveyance Allowance</label>
                    <input type="text" name="ca" value="{{old('ca')}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : 200, 1000, etc..">
                  </div>
                @if ($errors->has('ca'))
                <p class="text-danger">{{$errors->first('ca')}}</p>
                @endif

                
                <div class="form-group">
                    <label for="exampleInputEmail1">Medical Allowance</label>
                    <input type="text" name="ma" value="{{old('ma')}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : 200, 1000, etc..">
                  </div>
                @if ($errors->has('ma'))
                <p class="text-danger">{{$errors->first('ma')}}</p>
                @endif

                
                <div class="form-group">
                    <label for="exampleInputEmail1">Special Allowance</label>
                    <input type="text" name="sa" value="{{old('sa')}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : 200, 1000, etc..">
                  </div>
                @if ($errors->has('sa'))
                <p class="text-danger">{{$errors->first('sa')}}</p>
                @endif


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