<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ID Card</title>

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

        <div class="row" id="printableArea">
            <div class="col-md-12" align="center">
          <div class="col-md-3" align="left">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                       
             
              
                <h5 class="widget-user-username">{{$data->name}}</h5>
                 <p class="widget-user-desc"><i class="fa fa-phone" aria-hidden="true"></i> {{$data->mobile}}</p>
            
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="{{asset('storage/student/'.substr($data2->file_image, 15))}}" alt="{{$data2->name}}">
              </div>
        @php
                  $urls=url('idcard_print').'/'.$data2->id;  
                @endphp
          
                {!! QrCode::size(50)->generate($urls) !!}

              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 border-right">
                    <div class="description-block">
                      <h5 class="description-header">Class</h5>
                      <span class="description-text">{{ App\Models\Class_section_Model::getClassNameByID($data2->cclass) }}</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">Section</h5>
                      <span class="description-text">{{ App\Models\Section_Model::getSectionNameByID($data2->section) }}</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">ID Card No</h5>
                      <span class="description-text">{{1000+$data2->id}}</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->


                </div>
                <!-- /.row -->
                  <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Name</b> <a class="float-right">{{$data2->name}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Date of Birth</b> <a class="float-right">{{$data2->ddate}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>UID</b> <a class="float-right">{{$data2->aadhar_card}}</a>
                  </li>
                  <li class="list-group-item">
                   <center> <i class="fa fa-map-marker" aria-hidden="true"></i> <b>{{$data->address}}</b>  </li> 
                  </li>
                </ul>
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
            </div>
        
        <!-- /.row -->
        </div>
    
                <div class="col-md-12" align="center">
              <a href=" " onclick="printDiv('printableArea')" class="btn btn-info"><i class="fas fa-print"></i> Print</a>
              <a class="btn btn-warning" href="{{url('school')}}/idcard"><i class="fa fa-arrow-left"></i>Back to Student</a> 
        
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
