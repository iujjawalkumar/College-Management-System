@extends('school.layouts.main')
@section('main-container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Book's Records</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Library</li>
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
                <h3 class="card-title">Update Library Books Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('school')}}/library_update/{{$data2->id}}" method="POST">
                @csrf
         
                <div class="card-body">

                  @if (\Session::has('success'))
                  <div class="alert alert-success">
                      {!! \Session::get('success') !!}
                  </div>
              @endif

              <div class="form-group">
                <label for="exampleInputEmail1">Select Class</label>
                <select value="{{old('cclass')}}" class="form-control" name="cclass" id="cclass">
                  <option value="{{$data2->cclass}}">{{ App\Models\Class_section_Model::getClassNameByID($data2->cclass) }}</option>
                    @foreach ($data_class as $row)
                    <option value="{{$row->id}}">{{$row->name}}</option>
                    @endforeach
                   
                </select>
                </div>
 
            <div class="form-group">
                <label for="exampleInputEmail1">Select Section</label>
                <select value="{{old('section')}}" class="form-control" name="section" id="section">
                   
                  <option value="{{$data2->section}}">{{ App\Models\Section_Model::getSectionNameByID($data2->section) }}</option>
                    
                   
                </select>
                  
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Subject / Book Name</label>
                <input type="text" name="book_name" value="{{$data2->book_name}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Hindi, English, etc..">
              </div>
          
            @if ($errors->has('book_name'))
            <p class="text-danger">{{$errors->first('book_name')}}</p>
            @endif


            <div class="form-group">
                <label for="exampleInputEmail1">Author / Publisher</label>
                <input type="text" name="author" value="{{$data2->author}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Sumita Arora, BPB Publication, etc..">
              </div>
            @if ($errors->has('author'))
            <p class="text-danger">{{$errors->first('author')}}</p>
            @endif

            <div class="form-group">
              <label for="exampleInputEmail1">Quantity</label>
              <input type="text" name="quantity" value="{{$data2->qty}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : 1,2,3, etc..">
            </div>
          @if ($errors->has('quantity'))
          <p class="text-danger">{{$errors->first('quantity')}}</p>
          @endif

                <div class="card-footer">
                  <button type="submit" class="btn btn-success swalDefaultSuccess">Click to Update</button>
                  <a class="btn btn-info" href="../library">Back</a>
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


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
      $(document).ready(function () {


          $('#cclass').on('change', function () {
              var idClass = this.value;
              $("#state-dropdown").html('');
              $.ajax({
                  url: "{{url('school/fetch-section')}}",
                  type: "POST",
                  data: {
                      class_id: idClass,
                      _token: '{{csrf_token()}}'
                  },
                  dataType: 'json',
                  success: function (result) {
                      $('#section').html('<option value="">-- Select Section --</option> <option value="all">All</option>');
                      $.each(result.section, function (key, value) {
                          $("#section").append('<option value="' + value
                              .id + '">' + value.section + '</option>');
                      });
                     
                   
                  }
              });
          });

          /*------------------------------------------
          --------------------------------------------
          State Dropdown Change Event
          --------------------------------------------
          --------------------------------------------*/
          $('#state-dropdown').on('change', function () {
              var idState = this.value;
              $("#city-dropdown").html('');
              $.ajax({
                  url: "{{url('api/fetch-cities')}}",
                  type: "POST",
                  data: {
                      state_id: idState,
                      _token: '{{csrf_token()}}'
                  },
                  dataType: 'json',
                  success: function (res) {
                      $('#city-dropdown').html('<option value="">-- Select City --</option>');
                      $.each(res.cities, function (key, value) {
                          $("#city-dropdown").append('<option value="' + value
                              .id + '">' + value.name + '</option>');
                      });
                  }
              });
          });

      });
  </script>
  

@endsection