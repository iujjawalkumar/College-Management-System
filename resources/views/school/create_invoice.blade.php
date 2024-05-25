@extends('school.layouts.main')
@section('main-container')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Step 2</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
     <center>
 <div class="col-sm-12 row">
  <div class="col-sm-6">

     <!-- general form elements -->
            <div class="card card-info" align="left">
              <div class="card-header">
                <h3 class="card-title">Add Fee | Name :{{$data_stu->name}} | {{ App\Models\Class_section_Model::getClassNameByID($data_stu->cclass) }}-{{ App\Models\Section_Model::getSectionNameByID($data_stu->section) }}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->



     
                <div class="card-body">
                    @if (\Session::has('success'))
                    <div class="alert alert-success">
                        {!! \Session::get('success') !!}
                    </div>
                @endif

                @if (\Session::has('warning'))
                <div class="alert alert-danger">
                    {!! \Session::get('warning') !!}
                </div>
            @endif

            @if ($errors->has('months'))
            <p class="text-danger">{{$errors->first('months','Please Select minimum One Month...')}}</p>
            @endif
                
               @if ($data_vehicle->vehicle_id>0)
               
            
            <div class="form-group">
              <label for="exampleInputEmail1"> Transport Fee :  </label>
        
        
               {{ App\Models\Vehicle_Model::getVehicle($data_vehicle->vehicle_id)}}
                ({{ App\Models\Vehicle_Model::getVehicle_type($data_vehicle->vehicle_id) }}) -
                 <i class='fa fa-rupee'></i> 
                 {{ App\Models\Vehicle_Model::getVehicle_amount($data_vehicle->vehicle_id) }}/-
                <br>
                <form method="Post" action="{{url('school')}}/add_transport_fee/{{$data_vehicle->vehicle_id}}/{{$data_stu->id}}" enctype="multipart/form-data">
                  @csrf
            
                  <table class="table">
                    <tr class="table-warning">
                      <td><input type="checkbox" name="months[]" value="Apr" {{ App\Models\Fees_Model::getMonthById($data_stu->id, "Apr")==true ? 'disabled': '' }}> Apr</td>
                      <td><input type="checkbox" name="months[]" value="May" {{ App\Models\Fees_Model::getMonthById($data_stu->id, "May")==true ? 'disabled': '' }}> May</td>
                      <td><input type="checkbox" name="months[]" value="Jun" {{ App\Models\Fees_Model::getMonthById($data_stu->id, "Jun")==true ? 'disabled': '' }}> Jun</td>
                      <td><input type="checkbox" name="months[]" value="Jul" {{ App\Models\Fees_Model::getMonthById($data_stu->id, "Jul")==true ? 'disabled': '' }}> Jul</td>
                      <td><input type="checkbox" name="months[]" value="Aug" {{ App\Models\Fees_Model::getMonthById($data_stu->id, "Aug")==true ? 'disabled': '' }}> Aug</td>
                      <td><input type="checkbox" name="months[]" value="Sep" {{ App\Models\Fees_Model::getMonthById($data_stu->id, "Sep")==true ? 'disabled': '' }}> Sep</td>
                    </tr>
                    <tr class="table-success">
                      <td><input type="checkbox" name="months[]" value="Oct" {{ App\Models\Fees_Model::getMonthById($data_stu->id, "Oct")==true ? 'disabled': '' }}> Oct</td>
                      <td><input type="checkbox" name="months[]" value="Nov" {{ App\Models\Fees_Model::getMonthById($data_stu->id, "Nov")==true ? 'disabled': '' }}> Nov</td>
                      <td><input type="checkbox" name="months[]" value="Dec" {{ App\Models\Fees_Model::getMonthById($data_stu->id, "Dec")==true ? 'disabled': '' }}> Dec</td>
                      <td><input type="checkbox" name="months[]" value="Jan" {{ App\Models\Fees_Model::getMonthById($data_stu->id, "Jan")==true ? 'disabled': '' }}> Jan</td>
                      <td><input type="checkbox" name="months[]" value="Feb" {{ App\Models\Fees_Model::getMonthById($data_stu->id, "Feb")==true ? 'disabled': '' }}> Feb</td>
                      <td><input type="checkbox" name="months[]" value="Mar" {{ App\Models\Fees_Model::getMonthById($data_stu->id, "Mar")==true ? 'disabled': '' }}> Mar</td>
                    </tr>
                  </table>
                  
   
     <input type="submit" value="Click to Add" class="btn btn-info">   
   
            </form>
            </div>
            @endif
        

            <form method="Post" action="{{url('school')}}/addfees" enctype="multipart/form-data">
              @csrf
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Fee Type</label>
                   
                     <select name="fee_type" class="form-control" id="fees">
                        <option  value="0">-- Select Fee Type --</option>
                        @foreach ($data_fee as $row)
                        <option  value="{{$row->id}}">{{$row->fee_type}}</option>
                        @endforeach
                     
   
                    </select>
             
                  </div>

             

                  <div class="form-group">
                    <label for="exampleInputEmail1">Amount</label>
                    <input type="text" class="form-control" id="fees_amount_txt" name="fees_amount_txt" disabled>
                    <input type="hidden" class="form-control" id="fees_amount" name="fees_amount">
                    <input type="hidden" class="form-control" name="stu_id" value="{{$data_stu->id}}">
             
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Due Date</label>
                    <input type="text" class="form-control" id="due_date_txt" name="due_date_txt" disabled>
                    <input type="hidden" class="form-control" id="due_date" name="due_date">
                  </div>

       
                <div class="card-footer" align="center">
               
                    <input type='submit' name="upload" class="btn btn-info" value='Add Fee'/>
                </div>
              </form>
            </div>
            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">List of Fee Added Records in Invoice</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Sr. No.</th>
                      <th>Fee Type</th>
                       <th>Amount</th>
               
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($fee_data as $fee_data)
                        <tr>
                           <td>{{$loop->index+1}}</td>
                          <td>
                            {{ App\Models\Fee_Model::getFeeNameByID($fee_data->fee_type) }}
                          </td>
                          <td>{{$fee_data->amount}}
                        </td>
                        <td width="100px"> 
                            <a class="btn btn-app" onclick="return confirm('Are you sure?')" href="{{url('school')}}/fee_record_delete/{{$fee_data->id}}">
                              <i class='fa fa-window-close'></i> Delete
                            </a>
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                
                  </table>
    
    
                </div>
       
              </div>


          </div>
        </div>
           <div class="col-sm-6">

<!-- alert message for payment>

     <!-- general form elements -->
            <div class="card card-info" align="left">
              <div class="card-header">
                <h3 class="card-title">Add Payment Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="Post" action="{{url('school')}}/addpayment" enctype="multipart/form-data">
                @csrf
                 
                            <div class="card-body">
                                @if (\Session::has('success2'))
                                <div class="alert alert-success">
                                    {!! \Session::get('success2') !!}
                                </div>
                            @endif
            
                            @if (\Session::has('warning2'))
                            <div class="alert alert-danger">
                                {!! \Session::get('warning2') !!}
                            </div>
                        @endif

                   <div class="form-group">
                    <label for="exampleInputEmail1">Dues Amount</label>
                    <input type="text" class="form-control" name="amt" value="{{$fee_total}}" id="cBalance" disabled>
                    <input type="hidden" class="form-control" name="stu_id" value="{{$data_stu->id}}">
                    <input type="hidden" class="form-control" name="amount" value="{{$fee_total}}">

            
                  </div>

                     <div class="form-group">
                    <label for="exampleInputEmail1">Discount (in Rs.)</label>
                    <input type="text" class="form-control" value="0" name="discount" id="chDiscount">
                   
            
                  </div>

                     <div class="form-group">
                    <label for="exampleInputEmail1">Paid Amount</label>
           
                    <input type="text" class="form-control" name="final_amount" value="{{$fee_total}}" id="result">
                
            
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Payment Mode</label>
                     <select name="mode" class="form-control">
                      <option>Cash</option>
                      <option>Cheque</option>
                      <option>Net Banking</option>
                      <option>GooglePay</option>
                      <option>Phonepe</option>
                      <option>Paytm</option>
                      <option>UPI</option>
                      <option>Other</option>
                    </select>
             
                  </div>


                <div class="card-footer" align="center">
               
                    <input type='submit' name="upload" class="btn btn-info" value='Click here for Pay'/>
                <br><br>
                        <div class="row">
                          <a href="{{url('school')}}/print_invoice_today/{{$data_stu->id}}" class="btn btn-block btn-outline-primary"><i class="fas fa-print"></i> Print Todays Invoice</a>
                          <a href="{{url('school')}}/print_invoice/{{$data_stu->id}}" class="btn btn-block btn-outline-primary"><i class="fas fa-print"></i> Print Full Invoice</a>
            
                        </div>
                        <br>
                     
                </div>
                
          
              </form>
            </div>
            <!-- /.card -->
          </div>

          <table class="table table-bordered table-striped">
                <thead>
                <tr>
                   <th>Sr. No.</th>
                  <th>Deposit Amount</th>
                  <th>Mode</th>
                   <th>Date</th>
           
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($transaction_data as $transaction_data)
                <tr>
                   <td>{{$loop->index+1}}</td>
                  <td>
                    {{$transaction_data->final_amount}}
                  </td>
                  <td>{{$transaction_data->mode}}
                </td>
                <td>{{$transaction_data->created_at}}
                </td>
                <td width="100px"> 
                    <a class="btn btn-app" onclick="return confirm('Are you sure?')" href="{{url('school')}}/transaction_record_delete/{{$transaction_data->id}}">
                      <i class='fa fa-window-close'></i> Delete
                    </a>
                  </td>
                </tr>
                @endforeach
                </tbody>

            
              </table>

        </div>
        </center>

    

       
          
    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>
  <!-- /.content-wrapper -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
      $(document).ready(function () {


          $('#fees').on('change', function () {
              var idFee = this.value;
              $("#state-dropdown").html('');
              $.ajax({
                  url: "{{url('school/fetch-fee')}}",
                  type: "POST",
                  data: {
                      fee_id: idFee,
                      _token: '{{csrf_token()}}'
                  },
                  dataType: 'json',
                  success: function (result) {

        
                      $.each(result.fee, function (key, value) {

                        $('#due_date').val(value.ddate);
                        $('#fees_amount').val(value.amount);

                        $('#due_date_txt').val(value.ddate);
                        $('#fees_amount_txt').val(value.amount);

                      });
                     
                   
                  }
              });
          });

          /*------------------------------------------
          --------------------------------------------
          State Dropdown Change Event
          --------------------------------------------
          --------------------------------------------*/
          $('#state-dropdown').on('change', function () {
              var idState = this.value;
              $("#city-dropdown").html('');
              $.ajax({
                  url: "{{url('api/fetch-cities')}}",
                  type: "POST",
                  data: {
                      state_id: idState,
                      _token: '{{csrf_token()}}'
                  },
                  dataType: 'json',
                  success: function (res) {
                      $('#city-dropdown').html('<option value="">-- Select City --</option>');
                      $.each(res.cities, function (key, value) {
                          $("#city-dropdown").append('<option value="' + value
                              .id + '">' + value.name + '</option>');
                      });
                  }
              });
          });

      });
  </script>

   <script>
        $(document).on("change keyup blur", "#chDiscount", function() {
            var main = $('#cBalance').val();
            var dis = $('#chDiscount').val();
           // var dec = (disc / 100).toFixed(2); //its convert 10 into 0.10
           // var mult = main * dec; // gives the value for subtract from main value
           // var discont = (main - mult);
            var discont = (main - dis);
           $('#result').val(Math.round(discont));

            
        });
    </script>



@endsection