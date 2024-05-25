@extends('school.layouts.main')
@section('main-container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Expenses</h1>
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

      <div class="container-fluid">
        <div class="row">

          <!-- left column -->
          <div class="col-md-6" style="float:none;margin:auto;">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Add General Expenses</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="addexpense" method="POST">
                @csrf
                <div class="card-body">

                  @if (\Session::has('success'))
                  <div class="alert alert-success">
                      {!! \Session::get('success') !!}
                  </div>
              @endif

             
                  <div class="form-group">
                    <label for="exampleInputEmail1">Expense Type</label>
                    <input type="text" name="expense_type" value="{{old('expense_type')}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Board, Cleaning, Bills, etc...">
                  </div>
              
                @if ($errors->has('expense_type'))
                <p class="text-danger">{{$errors->first('expense_type')}}</p>
                @endif


                <div class="form-group">
                  <label for="exampleInputEmail1">Select Category</label>
                  <select class="form-control" name="category" id="category">
                      <option>--Select Section--</option>
                      <option>Library Books</option>
                      <option>Painting & Stationery</option>
                      <option>Sports Expenses</option>
                      <option>Furniture</option>
                      <option>Repairing</option>
                      <option>Refreshment for Staff</option>
                      <option>Transport fare for Staff</option>
                      <option>Other</option>
                  </select>     
              </div>


                <div class="form-group">
                    <label for="exampleInputEmail1">Amount</label>
                    <input type="text" name="amount" value="{{old('amount')}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : 200, 1000, etc..">
                  </div>
                @if ($errors->has('amount'))
                <p class="text-danger">{{$errors->first('amount')}}</p>
                @endif

                <div class="form-group">
                    <label for="exampleInputEmail1">Date</label>
                    <input type="date" name="date" value="{{old('date')}}" class="form-control" id="exampleInputEmail1">
                  </div>
                @if ($errors->has('date'))
                <p class="text-danger">{{$errors->first('date')}}</p>
                @endif
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
      </div>

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">All the General Expenses Records in the Database</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Sr. No.</th>
              <th>Expense Type</th>
              <th>Category</th>
              <th>Amount</th>
              <th>Date</th>
              <th>Action</th>
         
            </tr>
            </thead>
            <tbody>

              @foreach ($data2 as $da)
            <tr>
              <td>{{$loop->index+1}}</td>
              
            <td>{{$da->expense_type}}
            </td>
            <td>{{$da->category}}
            </td>
            <td>{{$da->amount}} &#8377;
            </td>
              <td>{{$da->ddate}}
            </td>
          
              <td width="200px">  <a class="btn btn-app" href="expense_edit/{{$da->id}}">
                <i class="fas fa-edit"></i> Edit
              </a>
              <a class="btn btn-app" onclick="return confirm('Are you sure?')" href="expense_delete/{{$da->id}}">
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