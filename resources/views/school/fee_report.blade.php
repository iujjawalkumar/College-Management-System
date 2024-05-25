@extends('school.layouts.main')
@section('main-container')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Filter Fee Report by Date, Class & Section</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Fee</li>
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

  

      <div class="card">

        <div class="col-md-6" style="float:none;margin:auto;">
            <!-- general form elements -->
            <div class="card card-success">
             
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('school')}}/get_fee_report" method="get">
                @csrf
               
                <div class="card-body">

                  @if (\Session::has('success'))
                  <div class="alert alert-success">
                      {!! \Session::get('success') !!}
                  </div>
              @endif

              <div class="form-group">
                <label for="exampleInputEmail1">From Date</label>
                <input type="date" name="from_date" value="{{old('from_date')}}" class="form-control" id="exampleInputEmail1">
              </div>
            @if ($errors->has('from_date'))
            <p class="text-danger">{{$errors->first('from_date')}}</p>
            @endif

            <div class="form-group">
                <label for="exampleInputEmail1">To Date</label>
                <input type="date" name="to_date" value="{{old('to_date')}}" class="form-control" id="exampleInputEmail1">
              </div>
            @if ($errors->has('to_date'))
            <p class="text-danger">{{$errors->first('to_date')}}</p>
            @endif


              <div class="form-group">
                <label for="exampleInputEmail1">Select Class</label>
                <select value="{{old('cclass')}}" class="form-control" name="cclass" id="cclass">
                    <option value="All">--Select Class--</option>
                    <option value="All">All</option>
                    @foreach ($data_class as $row)
                    <option value="{{$row->id}}">{{$row->name}}</option>
                    @endforeach
                   
                </select>
          
 
            <div class="form-group">
                <label for="exampleInputEmail1">Select Section</label>
                <select value="{{old('section')}}" class="form-control" name="section" id="section">
                    <option value="All">--Select Section--</option>
                   
                </select>
                  
            </div>

  

                

                <div class="card-footer">
                  <button type="submit" class="btn btn-success swalDefaultSuccess">Get Fee Report &#8377;</button>
                </div>
              </form>
            </div>
        </div>

        </div>
      </div>
 

    </section>
    <!-- /.content -->
  </div>

  <script>
    function view_student(id) {
        // JS function to open a new window(not "New Tab"), e.g: here, we are
        // opening the new window in youtube.com 
       
       var myWindow = window.open("view_form/"+id, width = "200px", height = "100px");
    }
</script>


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
                    $('#section').html('<option value="">-- Select Section --</option><option value="All">All</option>');
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
        $('#section').on('change', function () {
            var idsection = this.value;
            $("#student_id").html('');
            $.ajax({
                url: "{{url('school/fetch-student')}}",
                type: "POST",
                data: {
                    section_id: idsection,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $('#student_id').html('<option value="">-- Select Student --</option>');
                    $.each(res.student, function (key, value) {
                        $("#student_id").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });

    });
</script>



@endsection