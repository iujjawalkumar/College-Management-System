@extends('admin.layouts.main')
@section('main-container')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Offer Letter</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Offer Letter</li>
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
              This page has been enhanced for printing. Click the print button at the bottom of the Offer Letter to Print.
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
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                   
                    <strong>{{$data2->name}}</strong><br>
                    <span>{{$data2->address}}</span>
                  
                    <br>
             
                    Mobile: (+91) {{$data2->mob}}<br>
                    Email: {{$data2->email}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Job Ref No. #{{$data2->id+1000}}</b><br>
                  <b>Designation:</b> {{$data2->desi}}<br>
                  <b>Date of Joining:</b> {{$data2->doj}}<br>
                 
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
         
              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                    <br>
                    <center><h3><u>Letter of Appointment</u></h3></center>
                    
                    <br>Regarding your application for a job with {{$data->name}} as well as the subsequent interviews you held with us. We are pleased to offer you a position as a Computer Operator with our organization.
                    <br><br>
                    Appointment: Your appointment as <b>{{$data2->desi}}</b> began on <b>{{$data2->doj}}</b>, and you will be on probation for six (6) months following your appointment.
                    <br><br> 
                    Remuneration: Your monthly remuneration is Rs <b>{{$data3->total}}</b>/-.
                     <br><br>
                    Workplace: Your first assignment will be at the Organization’s Unit in {{$data->address}}, India. You may, however, be relocated to another place due to organizational requirements.
                    <br><br>
                    We warmly welcome you to the {{$data->name}} family and wish you every success in your work with us.
                     <br><br><br><br><br>
                    
                    
                    Sincerely,
                     <br><br><br><br>
                    
                    
                    For________________,<br>
                    Authorized Signatory<br>
                    Declaration and Acceptance<br>
                   
                    
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
            <br>
                  <img src="{{url('admin')}}/dist/img/certi.jpg" alt="Certified" width="120" height="40">
              

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    I thus recognize and agree to the terms and conditions of this Letter, and I further affirm and declare that I will comply with the terms and conditions set out above.
                  
                  </p>

           

                </div>
                <!-- /.col -->
                <div class="col-6">
                 <br>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>

                        <th style="width:50%">Basic Salary:</th>
                        <td>{{$data3->basic}} <span>&#8377;</span></td>
                      </tr>
                        <tr>
                        <th>Dearness Allowance</th>
                        <td>{{$data3->da}} <span>&#8377;</span></td>
                      </tr>

        
                      <tr>
                        <th>House Rent Allowance</th>
                        <td>{{$data3->hra}} <span>&#8377;</span></td>
                      </tr>


                         <tr>
                        <th>Conveyance Allowance</th>
                        <td>{{$data3->ca}} <span>&#8377;</span></td>
                      </tr>
                         <tr>
                        <th>Medical Allowance</th>
                        <td>{{$data3->ma}} <span>&#8377;</span></td>
                      </tr>

                      <tr>
                        <th>Special Allowance</th>
                        <td>{{$data3->sa}} <span>&#8377;</span></td>
                      </tr>

                      <tr>
                        <th>Total Payable Salary</th>
                        <td>{{$data3->total}} <span>&#8377;</span></td>
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