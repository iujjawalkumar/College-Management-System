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
                    <small class="float-right">Date: {{date('d/m/y')}}</small>
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
         

              <div class="col-12">
         
                <div class="row">
                    <div class="col-6 table-responsive">
                        <br>
                        <center><h5><u>Fee Records of {{$data_stu->name}}</u></h5></center>
                        
          
                        <table class="table table-bordered">
                         
                            <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Fee Type</th>
                                <th>Fee</th>
                                <th>Date</th>
                            
                            </tr>
                            </thead>
                            <tbody>
                      
                            @php
                            $fee=0;
                            @endphp
    
                            @foreach ($data_fees as $row)
                <tr>
                  <td>{{$loop->index+1}}</td>
                 
                <td>
                    {{ App\Models\Fee_Model::getFeeNameById($row->fee_type) }} 
                </td>

                <td>
                    {{$row->amount}} <span>&#8377;</span>
                </td>

                <td>
                    {{$row->created_at->format('d/m/Y')}}
                </td>
            
                @php
                    $fee=$fee+$row->amount;
                @endphp
                </tr>
                @endforeach
        
                         
                            </tbody>
                          </table>
                          <center><h5>Total Fee : {{$fee}} <span>&#8377;</span></h5></center>
    
              </div>

              <div class="col-6 table-responsive">
                <br>
                <center><h5><u>Payment Records by Transaction </u></h3></center>
                
  
                <table class="table table-bordered">
                 
                    <thead>
                    <tr>
                        <th>|</th>
                        <th>Sr. No.</th>
                        <th>Amount</th>
                        <th>Mode</th>
                        <th>Date</th>
                      
                    </tr>
                    </thead>
                    <tbody>
              
                    @php
                    $trans=0;
                    $dis=0;
                    @endphp

                    @foreach ($data_transaction as $row2)
        <tr>

            <th>|</th>
            <td>{{$loop->index+1}}</td>
         
        <td>
            {{$row2->final_amount}} <span>&#8377;</span>
        </td>

        <td>
            {{$row2->mode}}
        </td>

        <td>
            {{$row2->created_at->format('d/m/Y')}}
        </td>
        @php
        $trans=$trans+$row2->final_amount;
        $dis=$dis+$row2->discount;
    @endphp
        
        </tr>
        @endforeach

                 
                    </tbody>
                  </table>

                  <center><h5>Total Paid Amount : {{$trans}} <span>&#8377;</span></h5>|<h5>Discount : {{$dis}} <span>&#8377;</span></h5></center>

      </div>
              
            </div>
       
       

                    <br><br>
                    
                @php
                $st="";
                    if($fee-$trans<0)
                    $st="Advance Payment";
                @endphp
                    <center><h5>Dues Fee by {{$data_stu->name}} - {{$fee-($trans+$dis)}} <span>&#8377;</span> ({{$st}})</h5></center>
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