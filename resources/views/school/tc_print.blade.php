<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Transfer Certificate</title>

  <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{url('admin')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>  
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('admin')}}/dist/css/adminlte.min.css">

   
    <link rel="stylesheet" href="{{url('admin')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{url('admin')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{url('admin')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->

      <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{url('admin')}}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{url('admin')}}/plugins/toastr/toastr.min.css">
  </head>


<body class="hold-transition sidebar-mini">

    <style type="text/css">
 

                         /* style sheet for "letter" printing */
                         @media print and (width: 2in) and (height: 11in) {
                             @page {
                                 margin: 1in;
                             }
                         }

   </style> 

          <!-- Main content -->
          <div class="invoice p-3 mb-3" id="printableArea">
            <!-- title row -->
   
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-2 invoice-col">
              

              <img src="{{asset('storage/images/'.substr($data->school_image, 14))}}" alt=" " class="" width=100 height=100>
                
              
              </div>
              <!-- /.col -->
              <div class="col-sm-8 invoice-col">
              <center>
                  <address>
                    <h2>{{$data->name}}</h2>
                    {{$data->address}}<br>
                    Mobile: {{$data->mobile}}<br>
                    Email: {{$data->email}}
                      <hr>
                    <h5>स्थानांतरण प्रमाणपत्र / Transfer Certificate</h5>
                      <hr>
                  </address>
              </center>
                </div>
                <!-- /.col -->
                <div class="col-sm-2 invoice-col">
                  @php
                  $urls=url('tc_print').'/'.$data2->id;  
                @endphp
          
                {!! QrCode::size(100)->generate($urls) !!}
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">

                  <table class="table table-striped table-dark">
                      <thead>
                      <tr>
                        <th>School / Affiliation No.</th>
                        <th>Book No.</th>
                        <th>S.R. / Ref. No.</th>
                        <th>Admission No</th>
                      </tr>
                      </thead>
                      <tbody>
                       
  
                      <tr>
                        <td>{{$data->school_id}}</td>
                        <td>1</td>
                        <td>{{$data2->id}}</td>
                        <td>{{$data2->adm_no}}</td>
                     
                      </tr>
         
                      </tbody>
                    </table>

                    <table class="table table-striped table-dark">
                      <thead>
                      <tr>
                        <th>Registration No. of the candidate (in case Class IX to X) </th>
                        <th>Class from</th>
                        <th>Class till now</th>
                       
                      </tr>
                      </thead>
                      <tbody>
                       
  
                      <tr>
                        <td>{{$data2->regno}}</td>
                        <td>{{$data2->from_class}}</td>
                        <td>{{$data2->to_class}}</td>
                     
                      </tr>
         
                      </tbody>
                    </table>

              
<p style="line-height: 2em; /* 1em = 12px in this case. 20/12 == 1.666666  */">
  1.	छात्र का नाम / Name of the Pupil : <b>{{$data2->name}}</b><br>
  2.	माता का नाम / Mother’s Name : <b>{{$data2->mother_name}}</b><br>
  3.	पिता का नाम / Father’s Name : <b>{{$data2->father_name}}</b><br>
  4.	राष्ट्रीयता / Nationality : <b>{{$data2->nationality}}</b><br>
  5.	क्या छात्र अनुसूचित जाति/अनुसूचित जनजाति/अन्य पिछड़ा वर्ग से संबंधित है / Whether the pupil belong to SC/ST/OBC Category : <b>{{$data2->category}}</b><br>
  6.	प्रवेश रजिस्टर के अनुसार जन्म तिथि / Date of Birth according to the Admission Register : <b>{{$data2->dob}}</b><br>
  7.	क्या विद्यार्थी अनुत्तीर्ण है / Whether the Student is failed : <b>{{$data2->failed}}</b><br>
  8.	विषय की पेशकश की / Subject Offered : <b>{{$data2->subject}}</b><br>
  9.	वह कक्षा जिसमें छात्र ने अंतिम बार अध्ययन किया था (शब्दों में) / Class in which the pupil last studied (in words) : <b>{{$data2->last_study}}</b><br>
  10.	स्कूल/बोर्ड की अंतिम बार ली गई वार्षिक परीक्षा परिणाम के साथ / School / Board Annual examination last taken with result : <b>{{$data2->results}}</b><br>
  11.	क्या अगली उच्च कक्षा में प्रोन्नति के योग्य हैं / Whether qualified for promotion to the next higher class : <b>{{$data2->promotion}}</b><br>
  12.	क्या छात्र ने स्कूल की सभी फीस का भुगतान किया है / Whether the pupil paid all fees of school : <b>{{$data2->fees}}</b><br>
  13.	क्या छात्र को शुल्क में कोई रियायत दी गई थी, यदि हां, तो रियायत की प्रकृति / Whether the pupil was granted any fee concession, if so, the nature of concession : <b>{{$data2->concession}}</b><br>
  14.	क्या छात्र एनसीसी कैडेट/ब्वॉय स्काउट/गर्ल गाइड है (विवरण दें) / Whether the pupil NCC Cadet/Boy Scout / Girl Guide (give details) : <b>{{$data2->ncc}}</b><br>
  15.	स्कूल छोड़ने का कारण / Reason for leaving the school : <b>{{$data2->reason}}</b><br>
  16.	अंतिम तिथि तक उपस्थितियो की कुल संख्या  / No. of meetings  up to Date : <b>{{$data2->meeting}}</b><br>
  17.	विद्यार्थी की विद्यालय दिवसों की कुल उपस्थितिया  / No. of days the pupil at ended : <b>{{$data2->ended}}</b><br>
  18.	सामान्य आचरण / General Conduct : <b>{{$data2->conduct}}</b><br>
  19.	कोई अन्य टिप्पणी / Any other remarks : <b>{{$data2->remarks}}</b><br>
  20.	प्रमाण पत्र जारी करने की तिथि / Date of issue of certificate : <b>{{$data2->doc}}</b><br>
  
</p>
<br><br><br><br>
<table class="table">
 
  <tr>
    <th>Prepared by <br> <font size="2px">(Name & Designation)</font></th>
    <th>Checked by <br> <font size="2px">(Name & Designation)</font></th>
    <th>Sign of Principal with official Seal</th>
   
  </tr>

</table>
<hr>
<b>
  <center><b>Note :</b> If, this T.C. is issued by the officiating / incharge Principal, in variable countersigned by the manager
  </center>
  </p>

              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

     
    
            <!-- this row will not appear when printing -->
            <dv class="row no-print">
              <div class="col-12">
                <a href=" " onclick="printDiv('printableArea')" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
             
              </div>
            </dv>
          </div>


<!-- jQuery -->
<script src="{{url('admin')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{url('admin')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{url('admin')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('admin')}}/dist/js/demo.js"></script>

<script type="text/javascript">
    function printDiv(divName) {

        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
    </script>




</body>
</html>
