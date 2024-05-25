@extends('school.layouts.main')
@section('main-container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Filter Expenses Report by Date</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Expenses</li>
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

        <div class="col-md-6" style="float:none;margin:auto;">
            <!-- general form elements -->
            <div class="card card-success">
             
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('school')}}/get_expenses_report" method="get">
                @csrf
               
                <div class="card-body">

                  @if (\Session::has('success'))
                  <div class="alert alert-success">
                      {!! \Session::get('success') !!}
                  </div>
              @endif

              <div class="form-group">
                <label for="exampleInputEmail1">From Date</label>
                <input type="date" name="from_date" value="{{old('from_date')}}" class="form-control" id="exampleInputEmail1">
              </div>
            @if ($errors->has('from_date'))
            <p class="text-danger">{{$errors->first('from_date')}}</p>
            @endif

            <div class="form-group">
                <label for="exampleInputEmail1">To Date</label>
                <input type="date" name="to_date" value="{{old('to_date')}}" class="form-control" id="exampleInputEmail1">
              </div>
            @if ($errors->has('to_date'))
            <p class="text-danger">{{$errors->first('to_date')}}</p>
            @endif


                <div class="card-footer">
                  <button type="submit" class="btn btn-success swalDefaultSuccess">Get Expenses Report &#8377;</button>
                </div>
              </form>
            </div>
        </div>

        </div>
      </div>
 

    </section>
    <!-- /.content -->
  </div>




@endsection