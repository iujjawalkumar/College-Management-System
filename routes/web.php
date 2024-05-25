<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Login;
use App\Http\Controllers\Backend\Dashboard;
use App\Http\Controllers\Backend\Sessions;
use App\Http\Controllers\Backend\School;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\School\Erp_login;
use App\Http\Controllers\School\Notice;
use App\Http\Controllers\School\Gallery;
use App\Http\Controllers\School\Soy;
use App\Http\Controllers\School\Class_section;
use App\Http\Controllers\School\Subjects;
use App\Http\Controllers\School\Student;
use App\Http\Controllers\School\Fee;
use App\Http\Controllers\School\Library;
use App\Http\Controllers\School\ELibrary;
use App\Http\Controllers\School\Assign_Book;
use App\Http\Controllers\School\Expenses;
use App\Http\Controllers\School\Vehicle_Expenses;


use App\Http\Controllers\School\Routes;
use App\Http\Controllers\School\Vehicle;
use App\Http\Controllers\School\Driver;
use App\Http\Controllers\School\Employee;
use App\Http\Controllers\School\Employee_Salary;

use App\Http\Controllers\Backend\AEmployee;
use App\Http\Controllers\Backend\AEmployee_Salary;
use App\Http\Controllers\Backend\ASalary;

use App\Http\Controllers\School\Student_Vehicle;
use App\Http\Controllers\School\Salary;
use App\Http\Controllers\School\Class_Time_Table;
use App\Http\Controllers\School\Holiday_List;
use App\Http\Controllers\School\Tour_List;
use App\Http\Controllers\School\Exam_List;
use App\Http\Controllers\School\Exam_Schedule;
use App\Http\Controllers\School\Exam_Result;
use App\Http\Controllers\School\User_Role;

use App\Http\Controllers\School\Invoice;
use App\Http\Controllers\School\Enquiry;
use App\Http\Controllers\School\Custom_page;
use App\Http\Controllers\Website\Home;
use App\Models\Section_Model;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});


Route::get('/contact', [Home::class, 'contact']);

Route::get('/gallery', [Home::class, 'gallery']);

Route::get('/', [Home::class, 'website_index']);
Route::get('/index', [Home::class, 'website_index']);
Route::get('/about', [Home::class, 'website_index']);

Route::get('/page/{id}', [Home::class, 'custom_page']);
Route::get('/inspire', [Home::class, 'inspire']);

Route::get('/founder', [Home::class, 'founder']);
Route::get('/principal', [Home::class, 'md']);
Route::get('/director', [Home::class, 'director']);

Route::get('/events', [Home::class, 'events']);
Route::get('/cbse', [Home::class, 'cbse']);
Route::get('/video', [Home::class, 'video']);
Route::get('/idcard_print/{id}', [Student::class, 'idcard_print']); 
Route::get('/tc_print/{id}', [Student::class, 'tc_print']); 
Route::post('/check_tc', [Student::class, 'check_tc2']); 
Route::get('/print_exam_result/{id}/{eid}', [Student::class, 'print_exam_result']); 


Route::get('/soy', [Student::class, 'website_soy']);


Route::group(['middleware'=>'guest'],function()
{
Route::get('/admin/login', [AuthController::class, 'index'])->name('login');
Route::get('/check_tc', [Student::class, 'check_tc'])->name('check_tc');
Route::post('/admin/login', [AuthController::class, 'login'])->name('login')->middleware('throttle:3,1');
});

Route::group(['middleware' => 'erp_guest'], function () {

Route::get('/erp/login', [Erp_login::class, 'index'])->name('login');
Route::get('/check_tc', [Student::class, 'check_tc'])->name('check_tc');
Route::post('/erp/login', [Erp_login::class, 'login'])->name('login')->middleware('throttle:3,1');
});



Route::group(['middleware' => 'erp_auth'], function () {
  

        Route::get('/erp/home', [Erp_login::class, 'home'])->name('home');
        Route::get('/erp/logout', [Erp_login::class, 'logout'])->name('logout');
        Route::get('/school/sessions', [Sessions::class, 'view']);
        Route::post('/school/selectsessions', [Sessions::class, 'update_session']);

        Route::get('/school/notice', [Notice::class, 'index']);
        Route::post('/school/addnotice', [Notice::class, 'create']);
        Route::get('/school/notice_edit/{id}', [Notice::class, 'edit']);  
        Route::put('/school/notice_update/{id}', [Notice::class, 'update']);   
        Route::get('/school/notice_delete/{id}', [Notice::class, 'distory']);   

        Route::get('/school/gallery', [Gallery::class, 'index']);
        Route::post('/school/addgallery', [Gallery::class, 'create']);
        Route::get('/school/viewgallery', [Gallery::class, 'view']);  
        Route::get('/school/gallery_delete/{id}', [Gallery::class, 'distory']); 

        Route::get('/school/soy', [Soy::class, 'index']);
        Route::post('/school/addsoy', [Soy::class, 'create']);
        Route::get('/school/viewsoy', [Soy::class, 'view']);  
        Route::get('/school/soy_delete/{id}', [Soy::class, 'distory']); 

        Route::get('/school/profile', [School::class, 'profile']);
        Route::put('/school/profile', [School::class, 'update_profile']);
        Route::get('/school/idcard', [Student::class, 'idcard']); 
        Route::get('/school/select_exam', [Student::class, 'select_exam']); 
        Route::get('/school/select_exam2', [Student::class, 'select_exam2']); 
        Route::put('/school/admitcard', [Student::class, 'admitcard']); 
        Route::put('/school/result_update', [Student::class, 'result_update']); 
        Route::get('/admitcard_print/{id}/{eid}', [Student::class, 'admitcard_print']); 

        Route::get('/school/logo', [School::class, 'logo']);
        Route::put('/school/logo', [School::class, 'update_logo']);

        Route::get('/school/password', [School::class, 'password']);
        Route::put('/school/password', [School::class, 'update_password']);

        Route::get('/school/class_section', [Class_section::class, 'index']);
        Route::put('/school/addclass', [Class_section::class, 'create_class']);
        Route::put('/school/addsection', [Class_section::class, 'create_section']); 
        Route::get('/school/class_delete/{id}', [Class_section::class, 'distory']);   
        Route::get('/school/view_section/{id}', [Class_section::class, 'view_section']);  
        Route::get('/school/section_delete/{id}', [Class_section::class, 'distory_section']); 

        Route::get('/school/subject', [Subjects::class, 'index']);
        Route::put('/school/addsubject', [Subjects::class, 'create']);
        Route::post('school/fetch-section', [Subjects::class, 'fetchSection']);
        Route::post('school/fetch-student', [Subjects::class, 'fetchStudent']);
        Route::post('school/fetch-fee', [Subjects::class, 'fetchFee']);
        Route::get('/school/subject_delete/{id}', [Subjects::class, 'distory']); 


        Route::get('/school/class_time_table', [Class_Time_Table::class, 'index']);
        Route::put('/school/add_class_time_table', [Class_Time_Table::class, 'create']);
        Route::post('school/fetch-subject', [Class_Time_Table::class, 'fetchSubject']);
        Route::get('/school/class_time_table_delete/{id}', [Class_Time_Table::class, 'distory']); 

        Route::get('/school/holiday', [Holiday_List::class, 'index']);
        Route::put('/school/addholiday', [Holiday_List::class, 'create']);
        Route::get('/school/holiday_delete/{id}', [Holiday_List::class, 'distory']); 


        Route::get('/school/tour', [Tour_List::class, 'index']);
        Route::put('/school/addtour', [Tour_List::class, 'create']);
        Route::get('/school/tour_delete/{id}', [Tour_List::class, 'distory']); 


        Route::get('/school/exam', [Exam_List::class, 'index']);
        Route::put('/school/addexam', [Exam_List::class, 'create']);
        Route::get('/school/exam_delete/{id}', [Exam_List::class, 'distory']); 
        Route::get('/school/view_exam', [Exam_List::class, 'view']);

        Route::get('/school/add_exam_schedule/{id}', [Exam_Schedule::class, 'index']);
        Route::put('/school/addexam_schedule/{id}', [Exam_Schedule::class, 'create']);
        Route::get('/school/view_exam_schedule/{id}', [Exam_Schedule::class, 'view']);
        Route::get('/school/exam_schedule_delete/{id}', [Exam_Schedule::class, 'distory']); 


        Route::get('/school/add_exam_result/{id}/{eid}', [Exam_Result::class, 'index']);
        Route::put('/school/addexam_result/{id}/{eid}', [Exam_Result::class, 'create']);
        Route::get('/school/view_exam_result/{id}', [Exam_Result::class, 'view']);
        Route::get('/school/exam_result_delete/{id}', [Exam_Result::class, 'distory']); 

        Route::get('/school/enquiry', [Enquiry::class, 'index']);
        Route::put('/school/addenquiry', [Enquiry::class, 'create']);
        Route::get('/school/viewenquiry', [Enquiry::class, 'view']); 
        Route::get('/school/enquiry_edit/{id}', [Enquiry::class, 'edit']);  
        Route::put('/school/enquiry_update/{id}', [Enquiry::class, 'update']); 
        Route::get('/school/enquiry_delete/{id}', [Enquiry::class, 'distory']); 


        Route::get('/school/student', [Student::class, 'index']);
        Route::put('/school/addstudent', [Student::class, 'create']);
        Route::get('/school/viewstudent', [Student::class, 'view']); 
        Route::get('/school/student_edit/{id}', [Student::class, 'edit']);  
        Route::get('/school/tc/{id}', [Student::class, 'tc']);  
        Route::put('/school/student_update/{id}', [Student::class, 'update']); 
        Route::put('/school/tc_update/{id}', [Student::class, 'tc_update']); 
        Route::get('/school/student_delete/{id}', [Student::class, 'distory']); 
        Route::get('/school/transfer_delete/{id}', [Student::class, 'transfer_distory']); 
        Route::get('/school/view_form/{id}', [Student::class, 'view_form']);  
        Route::get('/school/student_photo_edit/{id}', [Student::class, 'logo']);
        Route::put('/school/student_photo_edit', [Student::class, 'update_logo']);
        Route::get('/school/student_doc/{id}', [Student::class, 'doc']);
        Route::put('/school/student_doc_edit', [Student::class, 'update_doc']);
        Route::put('/school/student_tc_edit', [Student::class, 'upload_tc']);
        Route::get('/school/import_student', [Student::class, 'import_student']);
        Route::put('/school/import_stu', [Student::class, 'import_stu']);
        Route::put('/school/add_stuent_enq', [Student::class, 'add_enq']);
        Route::get('/school/viewenquiry', [Student::class, 'viewenquiry']); 
        Route::get('/school/enq_edit/{id}', [Student::class, 'edit_enq']); 
        Route::put('/school/student_enq_update/{id}', [Student::class, 'update_enq']);  

        Route::get('/school/fee', [Fee::class, 'index']);
        Route::post('/school/addfee', [Fee::class, 'create']);
        Route::get('/school/fee_edit/{id}', [Fee::class, 'edit']);  
        Route::post('/school/fee_update/{id}', [Fee::class, 'update']);   
        Route::get('/school/fee_delete/{id}', [Fee::class, 'distory']);   

        Route::get('/school/expense', [Expenses::class, 'index']);
        Route::post('/school/addexpense', [Expenses::class, 'create']);
        Route::get('/school/expense_edit/{id}', [Expenses::class, 'edit']);  
        Route::post('/school/expense_update/{id}', [Expenses::class, 'update']);   
        Route::get('/school/expense_delete/{id}', [Expenses::class, 'distory']);  
        Route::get('/school/expenses_report', [Expenses::class, 'expenses_report']); 
        Route::get('/school/get_expenses_report', [Expenses::class, 'get_expenses_report']);  

        Route::get('/school/vexpenses', [Driver::class, 'view_driver']);
        Route::get('/school/vehicle_expense/{vid}/{did}', [Vehicle_Expenses::class, 'index']);
        Route::post('/school/addvehicleexpense', [Vehicle_Expenses::class, 'create']);
        Route::get('/school/vehicle_expense_edit/{id}', [Vehicle_Expenses::class, 'edit']);  
        Route::post('/school/vehicle_expense_update/{id}', [Vehicle_Expenses::class, 'update']);   
        Route::get('/school/vehicle_expense_delete/{id}', [Vehicle_Expenses::class, 'distory']); 
        Route::get('/school/vehicle_report', [Vehicle_Expenses::class, 'vehicle_report']); 
        Route::get('/school/get_vehicle_report', [Vehicle_Expenses::class, 'get_vehicle_report']);     

        Route::get('/school/routes', [Routes::class, 'index']);
        Route::post('/school/addroutes', [Routes::class, 'create']);
        Route::get('/school/routes_edit/{id}', [Routes::class, 'edit']);  
        Route::post('/school/routes_update/{id}', [Routes::class, 'update']);   
        Route::get('/school/routes_delete/{id}', [Routes::class, 'distory']);  
        
        Route::get('/school/vehicle', [Vehicle::class, 'index']);
        Route::post('/school/addvehicle', [Vehicle::class, 'create']);
        Route::get('/school/vehicle_edit/{id}', [Vehicle::class, 'edit']);  
        Route::post('/school/vehicle_update/{id}', [Vehicle::class, 'update']);   
        Route::get('/school/vehicle_delete/{id}', [Vehicle::class, 'distory']);   


        Route::get('/school/driver', [Driver::class, 'index']);
        Route::post('/school/adddriver', [Driver::class, 'create']);
        Route::get('/school/driver_edit/{id}', [Driver::class, 'edit']);  
        Route::post('/school/driver_update/{id}', [Driver::class, 'update']);   
        Route::get('/school/driver_delete/{id}', [Driver::class, 'distory']); 


        Route::get('/school/student_vehicle', [Student_Vehicle::class, 'index']);
        Route::get('/school/add_student_vehicle', [Student_Vehicle::class, 'create']);
        Route::get('/school/student_vehicle_delete/{id}', [Student_Vehicle::class, 'distory']); 
        
        Route::get('/school/employee', [Employee::class, 'index']);
        Route::post('/school/addemployee', [Employee::class, 'create']);
        Route::get('/school/viewemployee', [Employee::class, 'view']); 
        Route::get('/school/employee_edit/{id}', [Employee::class, 'edit']);  
        Route::get('/school/employee_salary_data/{id}', [Employee_Salary::class, 'view']);  
        Route::post('/school/employee_update/{id}', [Employee::class, 'update']);   
        Route::get('/school/employee_delete/{id}', [Employee::class, 'distory']);  
        Route::get('/school/view_employee', [Employee::class, 'view_exp']); 
        Route::get('/school/offer_letter/{id}', [Employee::class, 'offer_letter']);  
        Route::get('/school/exp_letter/{id}', [Employee::class, 'exp_letter']);  

        Route::get('/school/view_employees', [Employee::class, 'view_salary']); 


        Route::get('/school/user_role', [Employee::class, 'user_role']); 
        
        
        Route::get('/school/select_role/{id}', [User_Role::class, 'index']);  
        Route::post('/school/update_role/{id}', [User_Role::class, 'update']);   
        Route::get('/school/role_delete/{id}', [User_Role::class, 'distory']); 

        Route::get('/school/pay_salary/{id}', [Salary::class, 'index']);  
        Route::post('/school/update_salary/{id}', [Salary::class, 'update']);   
        Route::get('/school/salary_delete/{id}', [Salary::class, 'distory']); 
        Route::get('/school/salary_slip/{id}', [Salary::class, 'view']);  


        Route::get('/school/employee_salary', [Employee_Salary::class, 'index']); 
        Route::post('/school/addemployee_salary', [Employee_Salary::class, 'create']);
        Route::get('/school/viewemployee_salary', [Employee_Salary::class, 'view']); 
        Route::get('/school/employee_salary_edit/{id}', [Employee_Salary::class, 'edit']);  
        Route::post('/school/employee_salary_update/{id}', [Employee_Salary::class, 'update']);   
        Route::get('/school/employee_salary_delete/{id}', [Employee_Salary::class, 'distory']);  
        Route::get('/school/salary_report', [Salary::class, 'salary_report']); 
        Route::get('/school/get_salary_report', [Salary::class, 'get_salary_report']);   

        Route::get('/school/fee_report', [Invoice::class, 'fee_report']);
        Route::get('/school/get_fee_report', [Invoice::class, 'get_fee_report']);  
        Route::get('/school/get_fee_details/{stu_id}', [Invoice::class, 'get_fee_details']);  
        Route::get('/school/step1', [Invoice::class, 'index']);
        Route::get('/school/step2', [Invoice::class, 'create_invoice']);  
        Route::get('/school/step22/{id}', [Invoice::class, 'create_invoice2']); 
        Route::post('/school/add_transport_fee/{tid}/{stu_id}', [Invoice::class, 'add_transport_fee']); 
        Route::post('/school/addfees', [Invoice::class, 'addfees']);
        Route::get('/school/fee_record_delete/{id}', [Invoice::class, 'distory_fee']); 
        Route::post('/school/addpayment', [Invoice::class, 'addpayment']);
        Route::get('/school/transaction_record_delete/{id}', [Invoice::class, 'distory_transaction']); 
        Route::get('/school/print_invoice/{id}', [Invoice::class, 'print_invoice']); 
        Route::get('/school/print_invoice_today/{id}', [Invoice::class, 'print_invoice_today']); 
        Route::get('/school/mob_invoice/{id}', [Invoice::class, 'mob_invoice']); 
        Route::get('/school/mob_invoice_today/{id}', [Invoice::class, 'mob_invoice_today']); 

        Route::get('/school/custom_page', [Custom_page::class, 'index']);
        Route::post('/school/addpage', [Custom_page::class, 'create']);
        Route::get('/school/viewpage', [Custom_page::class, 'view']);  
        Route::get('/school/page_delete/{id}', [Custom_page::class, 'distory']); 
        Route::get('/school/page_edit/{id}', [Custom_page::class, 'edit']);  
        Route::put('/school/page_update/{id}', [Custom_page::class, 'update']);   

        Route::get('/school/library', [Library::class, 'index']);
        Route::post('/school/addlibrary', [Library::class, 'create']);
        Route::get('/school/library_edit/{id}', [Library::class, 'edit']);  
        Route::post('/school/library_update/{id}', [Library::class, 'update']);   
        Route::get('/school/library_delete/{id}', [Library::class, 'distory']); 

        Route::get('/school/elibrary', [ELibrary::class, 'index']);
        Route::post('/school/addelibrary', [ELibrary::class, 'create']);
        Route::get('/school/elibrary_edit/{id}', [ELibrary::class, 'edit']);  
        Route::post('/school/elibrary_update/{id}', [ELibrary::class, 'update']);   
        Route::get('/school/elibrary_delete/{id}', [ELibrary::class, 'distory']);
        
        Route::get('/school/assign_book', [Assign_Book::class, 'index']);
        Route::get('/school/select_book/{id}', [Assign_Book::class, 'select_book']); 
        Route::get('/school/issue_book/{id}/{sid}', [Assign_Book::class, 'issue_book']); 
        Route::get('/school/return_book/{id}/{sid}', [Assign_Book::class, 'return_book']); 

        Route::get('/school/balancesheet', [Invoice::class, 'balancesheet']);  

});



Route::group(['middleware'=>'auth'],function()
{

Route::get('/admin/register', [AuthController::class, 'register_view'])->name('register');
Route::post('/admin/register', [AuthController::class, 'register'])->name('register')->middleware('throttle:3,1');

Route::get('/admin/home', [AuthController::class, 'home'])->name('home');
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/home', [AuthController::class, 'home'])->name('home');



Route::get('/admin/sessions', [Sessions::class, 'index']);
Route::post('/admin/addsessions', [Sessions::class, 'create']);
Route::get('/admin/session_edit/{id}', [Sessions::class, 'edit']);  
Route::put('/admin/session_update/{id}', [Sessions::class, 'update']);   
Route::get('/admin/session_delete/{id}', [Sessions::class, 'distory']);    


Route::get('/admin/school', [School::class, 'index']);
Route::post('/admin/addschool', [School::class, 'upload']);
Route::get('/admin/viewschool', [School::class, 'view']);
Route::get('/admin/school_edit/{id}', [School::class, 'edit']);  
Route::put('/admin/school_update/{id}', [School::class, 'update']);   
Route::get('/admin/school_delete/{id}', [School::class, 'distory']); 


Route::get('/admin/employee', [AEmployee::class, 'index']);
Route::post('/admin/addemployee', [AEmployee::class, 'create']);
Route::get('/admin/viewemployee', [AEmployee::class, 'view']); 
Route::get('/admin/employee_edit/{id}', [AEmployee::class, 'edit']);  
Route::get('/admin/employee_salary_data/{id}', [AEmployee_Salary::class, 'view']);  
Route::post('/admin/employee_update/{id}', [AEmployee::class, 'update']);   
Route::get('/admin/employee_delete/{id}', [AEmployee::class, 'distory']);  
Route::get('/admin/view_employee', [AEmployee::class, 'view_exp']); 
Route::get('/admin/offer_letter/{id}', [AEmployee::class, 'offer_letter']);  
Route::get('/admin/exp_letter/{id}', [AEmployee::class, 'exp_letter']);  
Route::get('/admin/view_employees', [AEmployee::class, 'view_salary']); 

Route::get('/admin/pay_salary/{id}', [ASalary::class, 'index']);  
Route::post('/admin/update_salary/{id}', [ASalary::class, 'update']);   
Route::get('/admin/salary_delete/{id}', [ASalary::class, 'distory']); 
Route::get('/admin/salary_slip/{id}', [ASalary::class, 'view']);  


Route::get('/admin/employee_salary', [AEmployee_Salary::class, 'index']); 
Route::post('/admin/addemployee_salary', [AEmployee_Salary::class, 'create']);
Route::get('/admin/viewemployee_salary', [AEmployee_Salary::class, 'view']); 
Route::get('/admin/employee_salary_edit/{id}', [AEmployee_Salary::class, 'edit']);  
Route::post('/admin/employee_salary_update/{id}', [AEmployee_Salary::class, 'update']);   
Route::get('/admin/employee_salary_delete/{id}', [AEmployee_Salary::class, 'distory']);  
Route::get('/admin/salary_report', [ASalary::class, 'salary_report']); 
Route::get('/admin/get_salary_report', [ASalary::class, 'get_salary_report']); 



});






/*Route::get('/admin_login', function () {
    return view('admin.login');
});*/