@extends('school.layouts.main')
@section('main-container')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Fee Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Fee Report</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the Fee Report to Print.
            </div>
 
            <!-- Main content -->
            <div class="invoice p-3 mb-3" id="printableArea">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                   </i><img src="{{asset('storage/images/'.substr($data->school_image, 14))}}" alt=" " class="" width=200 height=70>
                    <small class="float-right">Date: {{date('d/m/Y')}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>{{$data->name}}</strong><br>
                    {{$data->address}}<br>
                    Mobile: {{$data->mobile}}<br>
                    Email: {{$data->email}}
                  </address>
                </div>
                <!-- /.col -->
                
              </div>
              <!-- /.row -->
         
              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                    <br>
                    <center><h3><u>Fee Report from {{$from_date}} to {{$to_date}}</u></h3></center>
                    @php
                      $total_fee=0;
                      $total_paid=0;
                      $total_dues=0;
                    @endphp
      
                    <table class="table table-bordered">
                     
                        <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Adm No.</th>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Section</th>
                            <th>Fee</th>
                            <th>Discount</th>
                            <th>Paid</th>
                            <th>Dues</th>
                            <th>Mobile</th>
                            <th>Date</th>
                         
                            <th>Details</th>
                        </tr>
                        </thead>
                        <tbody>
                  
                        @php
                        $final_amount=0;
                        $amount=0;
                        $discount=0;
                        @endphp

                        @foreach ($fee_data as $row)
            
            <tr>
              <td>{{$loop->index+1}}</td>
             
            <td>{{ App\Models\Student_Model::getAdmByID($row->stu_id) }} 
            </td>
              <td>{{ App\Models\Student_Model::getNameByID($row->stu_id) }} 
              </td>
              <td>
                {{ App\Models\Student_Model::getClassByID($row->stu_id) }} 
              </td>
              <td>{{ App\Models\Student_Model::getSectionByID($row->stu_id) }} 
            </td>
     

            <td>{{ $row->amount}} <span>&#8377;</span>
            </td>
            <td>{{ $row->discount}} <span>&#8377;</span>
            </td>
            <td>{{ $row->final_amount}} <span>&#8377;</span>
            </td>

            <td>{{ $row->amount-($row->discount+$row->final_amount)}} <span>&#8377;</span>
            </td>

            <td>{{ App\Models\Student_Model::getMobileByID($row->stu_id) }} 
            </td>

            <td>{{ $row->created_at->format('d/m/Y')}} 
            </td>
            
              <td width="100px"> 
   
                  <a class="btn btn-app" href="{{url('school')}}/get_fee_details/{{$row->stu_id}}">
                    <i class='fas fa-print'></i> Get
                  </a>
           
            </td>
            </tr>

            @php
              $final_amount=$final_amount+$row->final_amount; 
              $discount=$discount+$row->discount; 
              $amount=$amount+$row->amount; 
            @endphp
            
            @endforeach
    
                     
                        </tbody>
                      </table>

                    <br><br>
                    
                    <center><h5>Total Fee Collection from {{$from_date}} to {{$to_date}} is {{$final_amount}} <span>&#8377;</span> | (General Expenses : {{$exp_data}} <span>&#8377;</span>) | (Vehicle Expenses : {{$fuel+$rent+$repair}} <span>&#8377;</span>) </h5></center><br>
                    <center><h5>Remaining Balance : <b>{{$final_amount-$exp_data-($fuel+$rent+$repair)}} <span>&#8377;</span></b></h5>
                    <br><br>
               

                   
                    
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

            
          

      
              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href=" " onclick="printDiv('printableArea')" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
              
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
    </script>

@endsection