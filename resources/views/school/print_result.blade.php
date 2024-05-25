<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exam Results</title>

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



        <div class="row" id="printableArea">
            <div class="col-md-12" align="center">
          <div class="col-md-6" align="left">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h5 class="widget-user-username">{{$data->name}}</h5>
                 <p class="widget-user-desc"><i class="fa fa-phone" aria-hidden="true"></i> {{$data->mobile}}</p>
                             </div>
          
          
              <div class="widget-user-image">
                @php
                  $urls=url('print_exam_result').'/'.$data2->id.'/'.$eid;  
                @endphp
            
                {!! QrCode::size(100)->generate($urls) !!}
                </div>


              <div class="card-footer">
      
                <div class="row">
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                          <h5 class="description-header">Name</h5>
                          <span class="description-text">{{$data2->name}}</span>
                        </div>
                    </div>
                  <div class="col-sm-2 border-right">
                    <div class="description-block">
                      <h5 class="description-header">Class</h5>
                      <span class="description-text">{{ App\Models\Class_section_Model::getClassNameByID($data2->cclass) }}</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-2 border-right">
                    <div class="description-block">
                      <h5 class="description-header">Section</h5>
                      <span class="description-text">{{ App\Models\Section_Model::getSectionNameByID($data2->section) }}</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3">
                    <div class="description-block">
                      <h5 class="description-header">Exam </h5>
                      <span class="description-text">{{$exam_name->title}}</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->


                </div>
                <!-- /.row -->
                <table class="table" border="1">
                    <tr bgcolor="orange">
                        <th width="100px">Sr. No.</th>
                        <th>Subject</th>
                        <th>Obtain Marks</th>
                        <th>Maximum Marks</th>
                    </tr>
                    @php
                        $om=0;
                        $mm=0;
                    @endphp
                    @foreach ($exam as $exam_row)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{ App\Models\Subject_Model::getSubject($exam_row->sub_id) }}</td>
                        <td>{{$exam_row->om}}</td>
                        <td>{{$exam_row->mm}}</td>
                    </tr>
                    @php
                        $om=$om+$exam_row->om;
                        $mm=$mm+$exam_row->mm;
  
                    @endphp
                    
                    @endforeach

                    @php
                        $per=($om*100)/$mm;
                        $cgpa=$per/9.5;
              

                        if ($per<33)
                    
                           $grade="Fail";
                       

                        if ($per>=33 && $per<=49)
                            $grade="C & Pass";
                       

                        if ($per>=50 && $per<=59)
                            $grade="B & Pass";
                     

                        if ($per>=60 && $per<=69)
                            $grade="A & Pass";
                       

                        if ($per>=70 && $per<=100)
                            $grade="A+ & Pass";
                 

                    @endphp

                    <tr>
                        <td></td>
                        <td><b>Total Marks</b></td>
                        <td><i>Obtain -</i> {{$om}}</td>
                        <td><i>Maximum - </i>{{$mm}}</td>
                    </tr>
                </table>


                <table class="table" border="1" style="color: white">
                    <tr bgcolor="green">
                        <th>CGPA & Percentage</th>
                        <td>{{number_format($cgpa,1)}} & {{number_format($per,1)}}%</td>
                        <th>Grade & Result</th>
                        <td>{{$grade}}</td>
                    </tr>
                    @php
                        $om=0;
                        $mm=0;
                    @endphp
    
                    
      
                 
                </table>
            <br><br>
                <p align="right">Seal & Sign<br> <br>....................<br>
            {{$data->name}}</p>
<hr color="blue">
                <p>This is System Generated E-Results | all rights by {{$data->name}}</p>
              </div>

            </div>
            <!-- /.widget-user -->
          </div>
            </div>
        
        <!-- /.row -->
        </div>
    
                <div class="col-md-12" align="center">
              <a href=" " onclick="printDiv('printableArea')" class="btn btn-info"><i class="fas fa-print"></i> Print</a>
           
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
