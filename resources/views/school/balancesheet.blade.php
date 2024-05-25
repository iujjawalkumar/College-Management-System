@extends('school.layouts.main')
@section('main-container')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Balance Sheet</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Balance Sheet</li>
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
              This page has been enhanced for printing. Click the print button at the bottom of the Balance Sheet to Print.
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
                
              </div>
              <!-- /.row -->
         
              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                    <br>
                    <center><h3><u>Receipts and Payments Account for the year {{$data->year}}</u></h3></center>
                    
                   <table class="table table-bordered">
                    <tr>
                        <td><b>Dr.</b></td>
                        <td align="right"><b>Cr.</b></td>
                    </tr>
                   </table>
                    <table class="table table-bordered">
                     
                        <thead>
                        <tr>
                            <th>Receipt's #</th>
                            <th>Amount <span>&#8377;</span></th>
                            <th>Payment's #</th>
                            <th>Amount <span>&#8377;</span></th>
                        </tr>
                        </thead>
                        <tbody>
                  
                        @php
                        $t1=0;
                        $t2=0;
                       
                        $lib=0;
                        $paint=0; 
                        $sports=0; 
                        $fur=0; 
                        $repair=0;
                         $ref=0; 
                         $tran=0;
                          $other=0;
                          $total=0;
                        $s1=0;
                        $s2=0;
                        $f1=0;
                        $f2=0;
                            foreach ($transaction as  $trans)
                         {

                            if ($trans->mode=="Cash")
                            {
                              
                                $t1=$t1+$trans->final_amount;
                             
                            }
                            else {
                                $t2=$t2+$trans->final_amount;      
                            }         
                        }
                        $fuel=0;$rent=0;$vrepair=0;$f_reading=0;$t_reading=0;
                        foreach ($vexpenses as  $vexp)
                         {
                              $fuel=$fuel+$vexp->fuel;
                              $rent=$rent+$vexp->rent;
                              $vrepair=$vrepair+$vexp->repair;
                              $f_reading=$f_reading+$vexp->f_reading;
                              $t_reading=$t_reading+$vexp->t_reading;
                            }



                        foreach ($expenses as  $exp)
                         {
                          if(stripos($exp->category, "Library Books") !== FALSE){
                              
                              $lib=$lib+$exp->amount;
                            }

                            if(stripos($exp->category, "Painting & Stationery") !== FALSE){
                              
                              $paint=$paint+$exp->amount;
                            }

                            if(stripos($exp->category, "Sports Expenses") !== FALSE){
                              
                              $sports=$sports+$exp->amount;
                            }

                            if(stripos($exp->category, "Furniture") !== FALSE){
                              
                              $fur=$fur+$exp->amount;
                            }

                            if(stripos($exp->category, "Repairing") !== FALSE){
                              
                              $repair=$repair+$exp->amount;
                            }

                            if(stripos($exp->category, "Refreshment for Staff") !== FALSE){
                              
                              $ref=$ref+$exp->amount;
                            }

                            if(stripos($exp->category, "Transport fare for Staff") !== FALSE){
                              
                              $tran=$tran+$exp->amount;
                            }

                            if(stripos($exp->category, "Other") !== FALSE){
                              
                              $other=$other+$exp->amount;
                            }                                
                        }

                       
                 
                        $total=$lib+$paint+$sports+$fur+$repair+$ref+$other+$tran+$fuel+$rent+$vrepair;

                        foreach ($salary as  $sal)
                         {
                            if ($sal->mode=="Cash")
                            {
                            $s1=$s1+$sal->salary;
                            }
                            else {
                                $s2=$s2+$sal->salary;      
                            }         
                        }



                        foreach ($fees as  $fee)
                         {
                            
                          if(stripos($fee->fee_type, "Transport Fee") !== FALSE){
                              
                                $f1=$f1+$fee->amount;
                              }
                              else {
                                $f2=$f2+$fee->amount;
                              }
        
                        }



                        @endphp
    
                        <tr>
                          <td>To Balance b/d <br>
                            Cash in Hand <br>
                            Cash in Bank <br>
                            Outstanding Fee<br>
                            To Transport Fee,<br>
                            (To Admission Fee,<br>
                            To Monthly Fee,<br>
                            To Annual Fee,<br>
                            To Exam Fee,<br>
                           
                            To Library Fee,<br>
                            & More....)
                        </td>
                          <td>
                            <br>
                            {{$t1}} <span>&#8377;</span>
                            <br>
                            {{$t2}} <span>&#8377;</span><br>
                            {{$f2+$f1-($t1+$t2)}} <span>&#8377;</span><br>
                            {{$f1}} <span>&#8377;</span><br>
                            .<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>.<br>
                            <hr>
                            <b>Total Income by Receipts:</b> {{($f1+$t1+$t2)+($f2-($t1+$t2))}} <span>&#8377;</span>
                            <hr>
                        </td>
                            
                          <td>By Salary<br>
                            Cash in Hand<br>
                            Cash in Bank<br>
                            <u>Vehicle Expenses</u><br>
                            Fuel Expenses<br>
                            Vehicle Rent<br>
                            Vehicle Repairing<br>
                            <u>General Expenses</u><br>
                            by Library Books<br>
                            by Painting & Stationery<br>
                            by Sports Expenses<br>
                            by Furniture <br>
                            by Repairing<br>
                            by Refreshment for Staff <br>
                            by Transport fare for Staff<br>
                            by Other (Canteen, Bike, etc..)<br>   
                        </td>
                        <td>
                            <br>
                            {{$s1}} <span>&#8377;</span> 
                            <br>
                            {{$s2}} <span>&#8377;</span><br><br>
                            {{$fuel}} <span>&#8377;</span><br>
                            {{$rent}} <span>&#8377;</span><br>
                            {{$vrepair}} <span>&#8377;</span><br>
                            <br>
                            {{$lib}} <span>&#8377;</span><br>
                            {{$paint}} <span>&#8377;</span><br>
                            {{$sports}} <span>&#8377;</span><br>
                            {{$fur}} <span>&#8377;</span><br>
                            {{$repair}} <span>&#8377;</span><br>
                            {{$ref}} <span>&#8377;</span><br>
                            {{$tran}} <span>&#8377;</span><br>
                            {{$other}} <span>&#8377;</span><br>
                            <hr>
                            <b>Total Credit :</b> {{$s1+$s2+$total}} <span>&#8377;</span>
                            <hr>
                        </td>
                       
                        </tr>

                
    
                     
                        </tbody>
                      </table>

                    <br><br>
                    
              
                    Income by Transport Fee: <span>&#8377;</span> {{$f1}}/- | Expenses by Vehicle : <span>&#8377;</span> {{$fuel+$rent+$vrepair}}/- |  Net Profit & Loss in Transport : <span>&#8377;</span> {{$f1-($fuel+$rent+$vrepair)}}/-<br>
                    Remaining Fee from Student's (Fee & Transport Included): <span>&#8377;</span> {{$f1+$f2-($t1+$t2)}}/- | Profit & Loss Balancesheet by Receipt's: <span>&#8377;</span> {{($f1+$f2)-($s1+$s2+$total)}}/-
                     <br><br>

                   
                    
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