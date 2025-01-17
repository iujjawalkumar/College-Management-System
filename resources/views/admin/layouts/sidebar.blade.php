
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/admin/home')}}" class="brand-link">
      <img src="{{url('admin')}}/dist/img/AdminLTELogo.png" alt="Swadeshi ERP Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Administration</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('admin')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{url('/admin/logout')}}" class="d-block">Kelly Jong (Logout)</a>
        </div>
      </div>



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
                <a href="./index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Home</p>
                </a>
              </li>
             
            </ul>
          </li>


          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Contact
               
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Session Record's
                <i class="fas fa-angle-left right"></i>
            
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/sessions')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add / View Session</p>
                </a>
              </li>           
            
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                School Record's
                <i class="fas fa-angle-left right"></i>
            
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/school')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Schools</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/viewschool')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Schools</p>
                </a>
              </li>
           
            
            </ul>
          </li>


          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class='fas fa-user-tie'></i>
              <p>
                Employee Record
                <i class="fas fa-angle-left right"></i>
            
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                 <a href="{{url('/admin/employee')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Employee</p>
                </a>
              </li>

              <li class="nav-item">
                  <a href="{{url('/admin/viewemployee')}}" class="nav-link">
                
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Employee</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('/admin/employee_salary')}}" class="nav-link">
                
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Salary</p>
                </a>
              </li>
              
              <li class="nav-item">
                 <a href="{{url('/admin/view_employee')}}" class="nav-link">
                
                  <i class="far fa-circle nav-icon"></i>
                  <p>Offer Letter / Exp Letter</p>
                </a>
              </li>

        
            
            </ul>
          </li>

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
                 <a href="{{url('/admin/view_employees')}}" class="nav-link">
               
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Salary</p>
                </a>
              </li>

           
            </ul>
          </li> -->


       
      
        
          <li class="nav-header">MULTI LEVEL EXAMPLE</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>

        
      
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>