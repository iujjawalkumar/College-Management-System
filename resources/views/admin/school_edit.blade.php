@extends('admin.layouts.main')
@section('main-container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update School</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">School</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      @if (\Session::has('warning'))
      <div class="alert alert-danger">
          {!! \Session::get('warning') !!}
      </div>
  @endif

      <div class="container-fluid">
        <div class="row">

          <!-- left column -->
          <div class="col-md-6" style="float:none;margin:auto;">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Update School</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('admin')}}/school_update/{{$school->id}}" method="POST" enctype= "multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">

                  @if (\Session::has('success'))
                  <div class="alert alert-success">
                      {!! \Session::get('success') !!}
                  </div>
              @endif

                  <div class="form-group">
                    <label for="exampleInputEmail1">School ID</label>
                    <input type="text" value="{{$school->school_id}}" name="school_id" class="form-control" id="exampleInputEmail1" placeholder="Exp : SERP20220901">
                  </div>
               

                @if ($errors->has('school_id'))
                <p class="text-danger">{{$errors->first('school_id')}}</p>
                @endif

                <div class="form-group">
                    <label for="exampleInputEmail1">School Name</label>
                    <input type="text" name="name" value="{{$school->name}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : ABC School">
                </div>

                @if ($errors->has('name'))
                <p class="text-danger">{{$errors->first('name')}}</p>
                @endif



                <div class="form-group">
                <label for="exampleInputEmail1">Mobile No.</label>
                    <input type="text" name="mobile" value="{{$school->mobile}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : 7233999001">
                 

                @if ($errors->has('mobile'))
                <p class="text-danger">{{$errors->first('mobile')}}</p>
                @endif
                </div>


                <div class="form-group">
                    <label for="exampleInputEmail1">E-Mail</label>
                        <input type="text" name="email" value="{{$school->email}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : info@softnickindia.com">
                     
    
                    @if ($errors->has('email'))
                    <p class="text-danger">{{$errors->first('email')}}</p>
                    @endif
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                            <input type="text" name="address" value="{{$school->address}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Uttar Pradesh">
                         
        
                        @if ($errors->has('address'))
                        <p class="text-danger">{{$errors->first('address')}}</p>
                        @endif
                        </div>
    
 
                
                        <div class="form-group">
                          <label for="exampleInputEmail1">Status (1 - Active | 0 - Deactive)</label>
                                  <select class="form-control" name="status">
                                    <option value="{{$school->status}}">{{$school->status}}</option>     
                        
                            <option value="0">De-Active</option>
                            <option value="1">Active</option>
                           </select>

          
                          </div>
                
                
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success swalDefaultSuccess">Click here for Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

    


    </section>
    <!-- /.content -->
  </div>

@endsection