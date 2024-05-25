@extends('school.layouts.main')
@section('main-container')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->




    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">


                <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h4>Fee</h4>

                <p>Bill & Invoice</p>
              </div>
              <div class="icon">
                <i class="fa fa-inr"></i>
              </div>
              @if (App\Models\User_Role_Model::getRole(session('eid'),"Invoice / Billing (Fee)")=="1" or session('user_type')=="admin")
              <a href="{{url('/school/step1')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              @else
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                @endif
            </div>
          </div> -->
          <!-- ./col -->
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h4>All</h4>

                <p>Student's Records</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              @if (App\Models\User_Role_Model::getRole(session('eid'),"View Student's")=="1" or session('user_type')=="admin")
              <a href="{{url('/school/viewstudent')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              @else
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                @endif
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h4>All</h4>

                <p>Employee's Reocrds</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-tie"></i>
              </div>
              @if (App\Models\User_Role_Model::getRole(session('eid'),"View Employee")=="1" or session('user_type')=="admin")
              <a href="{{url('/school/viewemployee')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              @else
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                @endif
            </div>
          </div>
          <div class="col-lg-3 col-6">
                      <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h4>Library</h4>
          
                <p>Library Records</p>
                </div>
                  <div class="icon">
                    <i class="fas fa-book"></i>
                  </div>
                        @if (App\Models\User_Role_Model::getRole(session('eid'),"Add / View Books")=="1" or session('user_type')=="admin")
                        <a href="{{url('/school/library')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        @else
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                          @endif
                </div>
          </div>
          <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-danger">
                        <div class="inner">
                          <h4>Photo's</h4>
          
                          <p>Gallery & Event's</p>
                        </div>
                        <div class="icon">
                          <i class='fas fa-photo-video'></i>
                        </div>
                        @if (App\Models\User_Role_Model::getRole(session('eid'),"View Gallery & Event's")=="1" or session('user_type')=="admin")
                        <a href="{{url('/school/viewgallery')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        @else
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                          @endif
                      </div>
                    </div>
          <!-- ./col -->
          <!-- <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h4>Transport</h4>

                <p>Bus | Cab | Riksha</p>
              </div>
              <div class="icon">
                <i class="fa fa-bus"></i>
              </div>
              @if (App\Models\User_Role_Model::getRole(session('eid'),"Student Vehicle")=="1" or session('user_type')=="admin")
              <a href="{{url('/school/student_vehicle')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              @else
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                @endif
            </div>
          </div> -->
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->


                   <!-- Small boxes (Stat box) -->
                   <div class="row">
                    <!-- <div class="col-lg-3 col-6">
                      <div class="small-box bg-info">
                        <div class="inner">
                          <h4>Sales</h4>
          
                          <p>Bill & Invoice</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-inr"></i>
                        </div>
                        @if (App\Models\User_Role_Model::getRole(session('eid'),"Sale (Invoice)")=="1" or session('user_type')=="admin")
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        @else
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                          @endif
                      </div>
                    </div> -->
                    <!-- ./col -->
                    <!-- <div class="col-lg-3 col-6">
                      <div class="small-box bg-success">
                        <div class="inner">
                          <h4>Library</h4>
          
                          <p>Library Records</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-book"></i>
                        </div>
                        @if (App\Models\User_Role_Model::getRole(session('eid'),"Add / View Books")=="1" or session('user_type')=="admin")
                        <a href="{{url('/school/library')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        @else
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                          @endif
                      </div>
                    </div> -->
                    <!-- ./col -->
                    <!-- <div class="col-lg-3 col-6">
                      <div class="small-box bg-warning">
                        <div class="inner">
                          <h4>Salary</h4>
          
                          <p>Employee's Salary</p>
                        </div>
                        <div class="icon">
                          <i class='fa fa-money'></i>
                        </div>
                        @if (App\Models\User_Role_Model::getRole(session('eid'),"Employee Salary")=="1" or session('user_type')=="admin")
                        <a href="{{url('/school/view_employees')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        @else
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                          @endif
                      </div> -->
                    </div>
                    <!-- ./col -->
                    
                    <!-- ./col -->
                  </div>
                  <!-- /.row -->
                  <!-- Main row -->


                             <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h4>All</h4>

                <p>General Expenses</p>
              </div>
              <div class="icon">
                <i class="fa fa-inr"></i>
              </div>
              @if (App\Models\User_Role_Model::getRole(session('eid'),"General Expenses")=="1" or session('user_type')=="admin")
              <a href="{{url('/school/expense')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              @else
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                @endif
            </div> 
          </div>-->
          <!-- ./col -->
          <!-- <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h4>Teacher</h4>

                <p>Class Time Table</p>
              </div>
              <div class="icon">          
                <i class='fas fa-chalkboard-teacher'></i>
              </div>
              @if (App\Models\User_Role_Model::getRole(session('eid'),"Class Schedule")=="1" or session('user_type')=="admin")
              <a href="{{url('/school/class_time_table')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              @else
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                @endif
            </div>
          </div> -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h4>Holiday</h4>

                <p>Holiday List</p>
              </div>
              <div class="icon">         
<i class='fas fa-chalkboard-teacher'></i>
              </div>
              @if (App\Models\User_Role_Model::getRole(session('eid'),"Holidays List")=="1" or session('user_type')=="admin")
              <a href="{{url('/school/holiday')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              @else
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                @endif
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h4>All</h4>

                <p>Notice Board</p>
              </div>
              <div class="icon">
                
<i class='fas fa-concierge-bell'></i>
              </div>
              @if (App\Models\User_Role_Model::getRole(session('eid'),"Notice Board")=="1" or session('user_type')=="admin")
              <a href="{{url('/school/notice')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              @else
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                @endif
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        

 
        
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  @endsection