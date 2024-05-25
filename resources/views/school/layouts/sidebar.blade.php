

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/admin/home')}}" class="brand-link">
      <img src="{{url('admin')}}/dist/img/AdminLTELogo.png" alt="Swadeshi ERP Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
     @if (session('user_type')=="admin")
     <span class="brand-text font-weight-light">Administration</span>
     @else
     <span class="brand-text font-weight-light">Employee</span>
     @endif
      
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('storage/images/'.substr($data->school_image, 14))}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{url('/erp/logout')}}" class="d-block">C-Year : {{$data->year}} (Logout)</a>
        </div>
      </div> -->



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/home')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Home</p>
                </a>
              </li>        
            </ul>
          </li>




          <li class="nav-item">
            @if (App\Models\User_Role_Model::getRole(session('eid'),"Class / Section")=="1" or session('user_type')=="admin")

            <a href="{{url('/school/class_section')}}" class="nav-link">  
            @else
            <a href="#" class="nav-link">  
              @endif
            
              <i class='fa fa-codiepie'></i>
              <p>Class / Section</p>
            </a>
          </li>


          <li class="nav-item">
            @if (App\Models\User_Role_Model::getRole(session('eid'),"Subject Records")=="1" or session('user_type')=="admin")
            <a href="{{url('/school/subject')}}" class="nav-link">
              @else
              <a href="#" class="nav-link">  
                @endif
              <i class='fas fa-book-open'></i>
              <p>
                Subject Records
               
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class='fa fa-users'></i>
              <p>
                Student's 
                <i class="fas fa-angle-left right"></i>
            
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @if (App\Models\User_Role_Model::getRole(session('eid'),"Add Student")=="1" or session('user_type')=="admin")
                <a href="{{url('/school/student')}}" class="nav-link">
                  @else
                  <a href="#" class="nav-link">  
                    @endif
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Student</p>
                </a>
              </li>     
              
              <!-- <li class="nav-item">
                @if (App\Models\User_Role_Model::getRole(session('eid'),"Import Student's")=="1" or session('user_type')=="admin")
                <a href="{{url('/school/import_student')}}" class="nav-link">
                  @else
                  <a href="#" class="nav-link">  
                    @endif
                  <i class="far fa-circle nav-icon"></i>
                  <p>Import Student's</p>
                </a>
              </li>   -->

              <li class="nav-item">
                @if (App\Models\User_Role_Model::getRole(session('eid'),"View Student's")=="1" or session('user_type')=="admin")
                <a href="{{url('/school/viewstudent')}}" class="nav-link">
                  @else
                  <a href="#" class="nav-link">  
                    @endif
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Student's</p>
                </a>
              </li>  
            
            </ul>
          </li>


          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class='fas fa-user-tie'></i>
              <p>
                Employee Record's
                <i class="fas fa-angle-left right"></i>
            
              </p>
            </a>
            <ul class="nav nav-treeview"> -->
              <!-- <li class="nav-item">
                @if (App\Models\User_Role_Model::getRole(session('eid'),"Add New Employee")=="1" or session('user_type')=="admin")
                <a href="{{url('/school/employee')}}" class="nav-link">
                  @else
                  <a href="#" class="nav-link">  
                    @endif
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Employee</p>
                </a>
              </li> -->

              <!-- <li class="nav-item">
                @if (App\Models\User_Role_Model::getRole(session('eid'),"View Employee")=="1" or session('user_type')=="admin")
                <a href="{{url('/school/viewemployee')}}" class="nav-link">
                  @else
                  <a href="#" class="nav-link">  
                    @endif
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Employee</p>
                </a>
              </li> -->

              <!-- <li class="nav-item">
                @if (App\Models\User_Role_Model::getRole(session('eid'),"Manage Salary")=="1" or session('user_type')=="admin")
                <a href="{{url('/school/employee_salary')}}" class="nav-link">
                  @else
                  <a href="#" class="nav-link">  
                    @endif
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Salary</p>
                </a>
              </li> -->
              
              <!-- <li class="nav-item">
                @if (App\Models\User_Role_Model::getRole(session('eid'),"Offer Letter / Exp Letter")=="1" or session('user_type')=="admin")
                <a href="{{url('/school/view_employee')}}" class="nav-link">
                  @else
                  <a href="#" class="nav-link">  
                    @endif
                  <i class="far fa-circle nav-icon"></i>
                  <p>Offer Letter / Exp Letter</p>
                </a>
              </li> -->

        
            
            <!-- </ul>
          </li> -->

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class='fas fa-file-invoice'></i>
              <p>
                &nbsp;Account's
                <i class="fas fa-angle-left right"></i>
            
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @if (App\Models\User_Role_Model::getRole(session('eid'),"Fee Management")=="1" or session('user_type')=="admin")
                <a href="{{url('/school/fee')}}" class="nav-link">
                  @else
                  <a href="#" class="nav-link">  
                    @endif
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fee Management</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                @if (App\Models\User_Role_Model::getRole(session('eid'),"Invoice / Billing (Fee)")=="1" or session('user_type')=="admin")
                <a href="{{url('/school/step1')}}" class="nav-link">
                  @else
                  <a href="#" class="nav-link">  
                    @endif
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice / Billing (Fee)</p>
                </a>
              </li>
              
              <li class="nav-item">
                @if (App\Models\User_Role_Model::getRole(session('eid'),"Employee Salary")=="1" or session('user_type')=="admin")
                <a href="{{url('/school/view_employees')}}" class="nav-link">
                  @else
                  <a href="#" class="nav-link">  
                    @endif
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Salary</p>
                </a>
              </li>

              <li class="nav-item">
                @if (App\Models\User_Role_Model::getRole(session('eid'),"General Expenses")=="1" or session('user_type')=="admin")
                <a href="{{url('/school/expense')}}" class="nav-link">
                  @else
                  <a href="#" class="nav-link">  
                    @endif
                  <i class="far fa-circle nav-icon"></i>
                  <p>General Expenses</p>
                </a>
              </li>

              
              <li class="nav-item">
                @if (App\Models\User_Role_Model::getRole(session('eid'),"Vehicle Expenses")=="1" or session('user_type')=="admin")
                <a href="{{url('/school/vexpenses')}}" class="nav-link">
                  @else
                  <a href="#" class="nav-link">  
                    @endif
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vehicle Expenses</p>
                </a>
              </li> -->

            </ul>
          </li>


      

          <!-- <li class="nav-header">Webite & ERP Setting</li> -->

          

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class='fa fa-window-maximize'></i>
              <p>
                Website Update 
                <i class="fas fa-angle-left right"></i>
            
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @if (App\Models\User_Role_Model::getRole(session('eid'),"Notice Board")=="1" or session('user_type')=="admin")
                <a href="{{url('/school/notice')}}" class="nav-link">
                  @else
                  <a href="#" class="nav-link">  
                    @endif
                  <i class="far fa-circle nav-icon"></i>
                  <p>Notice Board</p>
                </a>
              </li>     
              
              <li class="nav-item">
                @if (App\Models\User_Role_Model::getRole(session('eid'),"Add Gallery & Event's")=="1" or session('user_type')=="admin")
                <a href="{{url('/school/gallery')}}" class="nav-link">
                  @else
                  <a href="#" class="nav-link">  
                    @endif
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Gallery & Event's</p>
                </a>
              </li>  

              <li class="nav-item">
                @if (App\Models\User_Role_Model::getRole(session('eid'),"View Gallery & Event's")=="1" or session('user_type')=="admin")
                <a href="{{url('/school/viewgallery')}}" class="nav-link">
                  @else
                  <a href="#" class="nav-link">  
                    @endif
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Gallery & Event's</p>
                </a>
              </li>  

              <!-- <li class="nav-item">
                @if (App\Models\User_Role_Model::getRole(session('eid'),"Add Student of the Year")=="1" or session('user_type')=="admin")
                <a href="{{url('/school/soy')}}" class="nav-link">
                  @else
                  <a href="#" class="nav-link">  
                    @endif
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Student of the Year</p>
                </a>
              </li>   -->

              <!-- <li class="nav-item">
                @if (App\Models\User_Role_Model::getRole(session('eid'),"View Student of the Year")=="1" or session('user_type')=="admin")
                <a href="{{url('/school/viewsoy')}}" class="nav-link">
                  @else
                  <a href="#" class="nav-link">  
                    @endif
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Student of the Year</p>
                </a>
              </li>   -->


              <li class="nav-item">
                @if (App\Models\User_Role_Model::getRole(session('eid'),"Add Page on Site")=="1" or session('user_type')=="admin")
                <a href="{{url('/school/custom_page')}}" class="nav-link">
                  @else
                  <a href="#" class="nav-link">  
                    @endif
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Page on Site</p>
                </a>
              </li>  

              <li class="nav-item">
                @if (App\Models\User_Role_Model::getRole(session('eid'),"View Page on Site")=="1" or session('user_type')=="admin")
                <a href="{{url('/school/viewpage')}}" class="nav-link">
                  @else
                  <a href="#" class="nav-link">  
                    @endif
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Page on Site</p>
                </a>
              </li>  


            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-cog"></i>
              <p>
                Setting 
                <i class="fas fa-angle-left right"></i>
            
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                @if (App\Models\User_Role_Model::getRole(session('eid'),"Select Session")=="1" or session('user_type')=="admin")
                <a href="{{url('/school/sessions')}}" class="nav-link">
                  @else
                  <a href="#" class="nav-link">  
                    @endif
                  <i class="far fa-circle nav-icon"></i>
                  <p>Select Session</p>
                </a>
              </li>      -->
              
              <li class="nav-item">
                @if (App\Models\User_Role_Model::getRole(session('eid'),"Profile Update")=="1" or session('user_type')=="admin")
                <a href="{{url('/school/profile')}}" class="nav-link">
                  @else
                  <a href="#" class="nav-link">  
                    @endif
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile Update</p>
                </a>
              </li>  

              <li class="nav-item">
                @if (App\Models\User_Role_Model::getRole(session('eid'),"Logo Update")=="1" or session('user_type')=="admin")
                <a href="{{url('/school/logo')}}" class="nav-link">
                  @else
                  <a href="#" class="nav-link">  
                    @endif
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logo Update</p>
                </a>
              </li>  

              <li class="nav-item">
                <a href="{{url('/school/password')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Password Update</p>
                </a>
              </li>  

          

            </ul>
          </li>


      

          <!-- <li class="nav-item">
            @if (App\Models\User_Role_Model::getRole(session('eid'),"Balance Sheet")=="1" or session('user_type')=="admin")
            <a href="{{url('/school/balancesheet')}}" class="nav-link">
              @else
              <a href="#" class="nav-link">  
                @endif
              <i class='fa fa-balance-scale'></i>
              <p>
                Balance Sheet
               
              </p>
            </a>
          </li> -->


          <!-- <li class="nav-item">
            @if (App\Models\User_Role_Model::getRole(session('eid'),"User Management")=="1" or session('user_type')=="admin")
            <a href="{{url('/school/user_role')}}" class="nav-link">
              @else
              <a href="#" class="nav-link">  
                @endif
              <i class='fas fa-user-tie'></i>
              <p>
                User Management
               
              </p>
            </a>
          </li> -->


        
       
          <li class="nav-item">
            <a href="{{url('/erp/logout')}}" class="nav-link">
             <i class='fa fa-sign-out'></i>
              <p>Logout</p>
            </a>
          </li>

          <br><br>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>