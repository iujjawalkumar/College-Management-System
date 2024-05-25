<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Form</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('admin')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('admin')}}/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->

    <!-- Left navbar links -->

        
        
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h3 class="widget-user-username">{{$data2->name}}</h3>
                <h5 class="widget-user-desc">Class : {{ App\Models\Class_section_Model::getClassNameByID($data2->cclass) }} | Section : {{ App\Models\Section_Model::getSectionNameByID($data2->section) }}</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="{{asset('storage/student/'.substr($data2->file_image, 15))}}" alt="Student">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">Application No.</h5>
                      <span class="description-text">{{$data2->adm_no}}</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">Aadhar Card No.</h5>
                      <span class="description-text">{{$data2->aadhar_card}}</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">Religion</h5>
                      <span class="description-text">{{$data2->religion}}</span>
                    </div>
                    <!-- /.description-block -->
                    
                  </div>
                  <!-- /.col -->
                  
                  <div class="card-body">
                    <table class="table table-bordered">
                    
            
                        <tr>
                            <th>Name</th>
                            <td>{{$data2->name}}</td>
                            <th>Date of Birth / Gender</th>
                            <td>{{$data2->ddate}} / {{$data2->gender}}</td>
                          </tr>

                          <tr>
                            <th>Father Name</th>
                            <td>{{$data2->father_name}}</td>
                            <th>Mother Name</th>
                            <td>{{$data2->mother_name}}</td>
                          </tr>

                          <tr>
                            <th>Father Occupation</th>
                            <td>{{$data2->father_occupation}}</td>
                            <th>Mother Occupation</th>
                            <td>{{$data2->mother_occupation}}</td>
                          </tr>

                          <tr>
                            <th>Education of Father</th>
                            <td>{{$data2->education_of_father}}</td>
                            <th>Education of Mother</th>
                            <td>{{$data2->education_of_mother}}</td>
                          </tr>

                          <tr>
                            <th>Mobile No. 1 / Whatsapp No.</th>
                            <td>{{$data2->mobile1}}</td>
                            <th>Mobile No. 2</th>
                            <td>{{$data2->mobile2}}</td>
                          </tr>

                          <tr>
                            <th>E-Mail</th>
                            <td>{{$data2->email}}</td>
                            <th>Address</th>
                            <td>{{$data2->address}}</td>
                          </tr>

                          <tr>
                            <th>Religion</th>
                            <td>{{$data2->religion}}</td>
                            <th>Nationality</th>
                            <td>{{$data2->nationality}}</td>
                          </tr>
                    
                    </table>
                    <br>
                    <div class="row no-print">
                        <div class="col-12">
                          <a href="javascript:window.print();" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                      
                        </div>
                      </div>

          <!-- /.col -->
      
      
<!-- jQuery -->
<script src="{{url('admin')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{url('admin')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{url('admin')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('admin')}}/dist/js/demo.js"></script>


</body>
</html>
