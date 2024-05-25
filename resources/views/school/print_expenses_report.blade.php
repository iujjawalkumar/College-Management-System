@extends('school.layouts.main')
@section('main-container')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Expenses Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Expenses Report</li>
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
              This page has been enhanced for printing. Click the print button at the bottom of the Expenses Report to Print.
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
                    <center><h3><u>Expenses Report from {{$from_date}} to {{$to_date}}</u></h3></center>
            
      
                    <table class="table table-bordered">
                     
                        <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Expense</th>
                            <th>Category</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Sys Date</th>
                        </tr>
                        </thead>
                        <tbody>
                  
                        @php
                      
                        $amount=0;
                 
                        @endphp

                        @foreach ($exp_data as $row)
            <tr>
              <td>{{$loop->index+1}}</td>
             
            <td>{{ $row->expense_type}} 
            </td>
              <td>{{ $row->category}}
              </td>
 
            <td>{{ $row->amount}} <span>&#8377;</span>
            </td>
            <td>{{ $row->ddate}} 
            </td>
            <td>{{ $row->created_at->format('d/m/Y')}} 
            </td>
            
             
            </tr>

            @php
              $amount=$amount+$row->amount; 
  
            @endphp
            @endforeach
    
                     
                        </tbody>
                      </table>

                    <br><br>
                    
                    <center><h5>Total Expenses from {{$from_date}} to {{$to_date}} is <b> {{$amount}} <span>&#8377;</span></b> </h5></center><br>
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