@extends('school.layouts.main')
@section('main-container')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
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
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to Print | Thermal Printer  <a class="btn btn-app" href="{{url('school')}}/mob_invoice_today/{{$data_stu->id}}"><i class="fas fa-print"></i>Today</a><a class="btn btn-app" href="{{url('school')}}/mob_invoice/{{$data_stu->id}}"><i class="fas fa-print"></i>All</a>.
            </div>
 
            <!-- Main content -->
            <div class="invoice p-3 mb-3" id="printableArea">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                   </i><img src="{{asset('storage/images/'.substr($data->school_image, 14))}}" alt=" " class="" width=100 height=100>
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
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                   
                    <strong>{{$data_stu->name}}</strong><br>
                    <span>{{$data_stu->address}}</span>
                  
                    <br>
             
                    Mobile: (+91) {{$data_stu->mobile1}} | {{$data_stu->mobile2}}<br>
                    Email: {{$data_stu->email}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice No. #{{$data_stu->id+1000}}</b><br>
                   <b>Adm / Reg No. : {{$data_stu->adm_no}}</b><br>
               
                  <b>Session:</b> {{$data_stu->year}}<br>
                
                  <b>Class & Section :</b> {{ App\Models\Class_section_Model::getClassNameByID($data_stu->cclass) }}-{{ App\Models\Section_Model::getSectionNameByID($data_stu->section) }}<br>
              
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
         
              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Sr. No. #</th>
                      <th>Fee Type #</th>
                      <th>Dues Date #</th>
                      <th>Amount #</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($fee_data as  $fee_data)

                    <tr>
                      <td>{{$loop->index+1}}</td>
                      <td>{{ App\Models\Fee_Model::getFeeNameByID($fee_data->fee_type) }}</td>
                      <td>{{$fee_data->due_date}}</td>
                      <td>{{$fee_data->amount}} <span>&#8377;</span></td>
                   
                    </tr>
               
                    @endforeach

                 
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="{{url('admin')}}/dist/img/credit/visa.png" alt="Visa">
                  <img src="{{url('admin')}}/dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="{{url('admin')}}/dist/img/credit/american-express.png" alt="American Express">
                  <img src="{{url('admin')}}/dist/img/credit/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                  1) This is System Generated bill for {{$data->name}}.<br>
                  2) Payment Mode Cash / Cheque / Bank / UPI / GoolgePay / PhonePay<br>
                  3) Payment not refund in case of Cancel Admission.
                  </p>

                    <div class="table-responsive">
                    <table class="table">
                      <tr>
     
                        @foreach ($transaction_data as $transaction_data)

                        <th>Payment Record:</th>
                        <td>{{$transaction_data->final_amount}}<span>&#8377;</span> on {{$transaction_data->created_at->format('d/m/Y')}} by {{$transaction_data->mode}}</td>
                      </tr>
                      @endforeach
                    </table>
                  </div>

                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due on {{date('d/m/y')}}</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>

                        <th style="width:50%">Fee Amount:</th>
                        <td>{{$amount}} <span>&#8377;</span></td>
                      </tr>
                        <tr>
                        <th>Discount:</th>
                        <td>{{$dis}} <span>&#8377;</span></td>
                      </tr>

        
                      <tr>
                        <th>Total Fee:</th>
                        <td>{{$amount-$dis}} <span>&#8377;</span></td>
                      </tr>


                         <tr>
                        <th>Paid:</th>
                        <td>{{$deposit}} <span>&#8377;</span></td>
                      </tr>
                         <tr>
                        <th>Due Amount:</th>
                        @php
                         $st="";
                        if($fee_total<0)
                        $st="Advance Payment";
                    @endphp
                        <td>{{$fee_total}} <span>&#8377;</span> ({{$st}})</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
          

      
              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href=" " onclick="printDiv('printableArea')" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <a href=" " onclick="printDiv2('printableArea')" class="btn btn-default"><i class="fas fa-print"></i> Print 2 Copies</a>
              
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

    function printDiv2(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents+printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
    </script>

@endsection