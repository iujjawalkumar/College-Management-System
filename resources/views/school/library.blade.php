@extends('school.layouts.main')
@section('main-container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Library Management</h1>
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
                <h3 class="card-title">Add Books in Library</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="addlibrary" method="POST">
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
                    <option value="0">--Select Class--</option>
                    @foreach ($data_class as $row)
                    <option value="{{$row->id}}">{{$row->name}}</option>
                    @endforeach
                   
                </select>
                </div>
 
            <div class="form-group">
                <label for="exampleInputEmail1">Select Section</label>
                <select value="{{old('section')}}" class="form-control" name="section" id="section">
                    <option value="0">--Select Section--</option>
                   
                </select>
                  
            </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Subject / Book Name</label>
                    <input type="text" name="book_name" value="{{old('book_name')}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Hindi, English, etc..">
                  </div>
              
                @if ($errors->has('book_name'))
                <p class="text-danger">{{$errors->first('book_name')}}</p>
                @endif


                <div class="form-group">
                    <label for="exampleInputEmail1">Author / Publisher</label>
                    <input type="text" name="author" value="{{old('author')}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : Sumita Arora, BPB Publication, etc..">
                  </div>
                @if ($errors->has('author'))
                <p class="text-danger">{{$errors->first('author')}}</p>
                @endif

                <div class="form-group">
                  <label for="exampleInputEmail1">Quantity (Stock)</label>
                  <input type="text" name="quantity" value="{{old('quantity')}}" class="form-control" id="exampleInputEmail1" placeholder="Exp : 1,2,3, etc..">
                </div>
              @if ($errors->has('quantity'))
              <p class="text-danger">{{$errors->first('quantity')}}</p>
              @endif


               

                <div class="card-footer">
                  <button type="submit" class="btn btn-success swalDefaultSuccess">Click to Add</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
      </div>

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">All the Books Records in the Library Database</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Sr. No.</th>
              <th>Class</th>
              <th>Section</th>
              <th>Sub / Book Name</th>
              <th>Author / Publisher</th>
              <th>Stock</th>
              <th>Create at</th>
              <th>Update at</th>
              <th>Action</th>
         
            </tr>
            </thead>
            <tbody>

              @foreach ($data2 as $da)
            <tr>
              <td>{{$loop->index+1}}</td>
              <td>
                {{ App\Models\Class_section_Model::getClassNameByID($da->cclass) }}
              </td>
              <td>{{ App\Models\Section_Model::getSectionNameByID($da->section) }}
            </td>
            <td>{{$da->book_name}}
            </td>
            <td>{{$da->author}} 
            </td>
            <td>{{$da->qty}} 
            </td>
              <td>{{$da->created_at}}
            </td>
            <td>{{$da->updated_at}}
            </td>
              <td width="200px">  <a class="btn btn-app" href="library_edit/{{$da->id}}">
                <i class="fas fa-edit"></i> Edit
              </a>
              <a class="btn btn-app" onclick="return confirm('Are you sure?')" href="library_delete/{{$da->id}}">
                <i class='fa fa-window-close'></i> Delete
              </a>
            </td>
            </tr>
            @endforeach
            </tbody>
         
          </table>
        </div>
        <!-- /.card-body -->

      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>


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