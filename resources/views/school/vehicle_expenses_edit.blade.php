@extends('school.layouts.main')
@section('main-container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Vehicle Expenses</h1>
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
                <h3 class="card-title">Update Vehicle Expenses</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('school')}}/vehicle_expense_update/{{$data2->id}}" method="POST">
                @csrf
                <div class="card-body">

                  @if (\Session::has('success'))
                  <div class="alert alert-success">
                      {!! \Session::get('success') !!}
                  </div>
              @endif

             
                  <div class="form-group">
                    <label for="exampleInputEmail1">Vehicle Meter Reading (From KM)</label>
                    <input type="text" name="from_reading" value="{{$data2->from_reading}}" class="form-control" id="from_reading" placeholder="Exp : 12568, etc...">
                  
                
                </div>
              
                @if ($errors->has('from_reading'))
                <p class="text-danger">{{$errors->first('from_reading')}}</p>
                @endif

                <div class="form-group">
                    <label for="exampleInputEmail1">Vehicle Meter Reading (To KM)</label>
                    <input type="text" name="to_reading" value="{{$data2->to_reading}}" class="form-control" id="to_reading" placeholder="Exp : 12568, etc...">
                  </div>
              
                @if ($errors->has('to_reading'))
                <p class="text-danger">{{$errors->first('to_reading')}}</p>
                @endif


                <div class="form-group">
                    <label for="exampleInputEmail1">Running KM (in KM)</label>
                    <input type="text" name="reading2" value="{{$data2->reading}}" class="form-control" id="reading" disabled>
                    <input type="hidden" name="reading" value="{{$data2->reading}}" class="form-control" id="reading2">
              
                 
                </div>
              
     

              
                <div class="form-group">
                    <label for="exampleInputEmail1">Fuel Expenses (&#8377;)</label>
                    <input type="text" name="fuel" value="{{$data2->fuel}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : 200, 1000, etc..">
                  </div>
                @if ($errors->has('fuel'))
                <p class="text-danger">{{$errors->first('fuel')}}</p>
                @endif

                <div class="form-group">
                    <label for="exampleInputEmail1">Vehicle Rent (&#8377;)</label>
                    <input type="text" name="rent" value="{{$data2->rent}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : 200, 1000, etc..">
                  </div>
                @if ($errors->has('rent'))
                <p class="text-danger">{{$errors->first('rent')}}</p>
                @endif

                <div class="form-group">
                    <label for="exampleInputEmail1">Repairing Expenses (&#8377;)</label>
                    <input type="text" name="repair" value="{{$data2->repair}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : 200, 1000, etc..">
                  </div>
                @if ($errors->has('repair'))
                <p class="text-danger">{{$errors->first('repair')}}</p>
                @endif

                <div class="form-group">
                    <label for="exampleInputEmail1">Date</label>
                    <input type="date" name="date" value="{{$data2->ddate}}" class="form-control" id="exampleInputEmail1">
                  </div>
                @if ($errors->has('date'))
                <p class="text-danger">{{$errors->first('date')}}</p>
                @endif
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success swalDefaultSuccess">Click to Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
      </div>


      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>


    </section>
    <!-- /.content -->
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).on("change keyup blur", "#to_reading", function() {
        var from = $('#from_reading').val();
        var to = $('#to_reading').val();
 
        var reading = (to - from);

       $('#reading').val(reading);
       $('#reading2').val(reading);
        
    });
</script>
  

@endsection