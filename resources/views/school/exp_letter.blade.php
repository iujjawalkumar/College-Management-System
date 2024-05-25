@extends('school.layouts.main')
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
                    <center><h3><u>TO WHOM IT MAY CONCERN</u></h3></center>
                    
                    <br>I hereby certify that the person named “<b>{{$data2->name}}</b> ” was employed by our organization, <b>{{$data->name}}</b> , during the period starting from <b>{{$data2->doj}}</b>  to _________________.
                    <br><br>
                    He/She started in our organization at the position of a “<b>{{$data2->desi}}</b> ”, but with his/her excellent performance and good abilities, he/she quickly got officially employed as a full time employee for us, he/she demonstrated as a diligent and truthful person. His/Her leadership skills were outstanding and very helpful and highly appraised by our staff. 
                    <br><br>
                    Anyway, all of us wish him/her the best in his/her career path and future and would like to thank him/her for his/her excellent contribution.
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

            
          

      
              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                    <br><br>
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