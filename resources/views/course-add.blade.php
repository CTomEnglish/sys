@extends('master')

@section('head')
<title>DELI | Thêm dự án mới</title>
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@stop

@section('main')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>THÊM DỰ ÁN MỚI</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Thêm dự án mới</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      @if (count($errors) > 0)
      @foreach ($errors->all() as $error)
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Thất bại!</h4> {!! $error !!}
      </div>
      @endforeach
      @endif
      <form action="{{route('staff.course.add.post')}}" method="post">
        {{csrf_field()}}
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm dự án mới</h3>
              </div>
              <div class="card-body">
                <div class="col-md-12">
                  <div class="form-group col-md-12">
                    <label>Nội dung thiết kế</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                  </div>
                  <div class="form-group col-md-12">
                    <label>Mã thiết kế</label>
                    <input type="text" class="form-control" name="shortname" value="{{ old('shortname') }}" required autofocus>
                  </div>
                  <div class="form-group col-md-12">
                      <div class="custom-control custom-checkbox">
                        <input type='hidden' value='0' name='is_expected'>
                        <input class="custom-control-input" name="is_expected"  type="checkbox" id="customCheckbox1" value="1">
                        <label for="customCheckbox1" class="custom-control-label">Tick vào đây nếu đây là dự kiến</label>
                      </div>
                  </div>
                  <hr>
                  <div class="form-group col-md-12">
                    <label>Nhóm thiết kế</label>
                    <select name="course_group_id" class="select2" data-placeholder="Select a State" style="width: 100%;">
                      @foreach($course_groups as $data)
                      <option value="{{$data->id}}">{{$data->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-12">
                    <label>Thời gian thiết kế</label>
                    <input type="number" class="form-control" name="lesson" value="{{ old('lesson') }}" required>
                  </div>
                  <div class="form-group col-md-12">
                    <label>Ngày nhận thiết kế</label>
                    <!--<input type="date" min="2018-01-01" class="form-control" name="opening_at" value="{{ old('opening_at') }}">-->
                    <input type="date" min="2018-01-01" class="form-control" name="opening_at" value="{{date("Y/m/d h:m:i", strtotime($data->created_at))}}">
                  </div>
                  <div class="form-group col-md-12">
                    <label>Người nhận</label>
                    <!--<input type="text" class="form-control" name="schedule" value="{{ old('schedule') }}" required>-->
                    <input type="" class="form-control" name="schedule" value="{{ UserInfo()->name }}" required>
                  </div>
                  <div class="form-group col-md-12">
                    <label>Thành viên tham gia</label>
                    <input type="number" class="form-control" name="maxseat" value="{{ old('maxseat') }}" required>
                  </div>
                  <div class="form-group col-md-12">
                    <label>Người thiết kế</label>
                    <input type="text" class="form-control" name="teacher" value="{{ old('teacher') }}" required>
                  </div>
                  <div class="form-group col-md-12">
                    <label>Báo giá thiết kế</label>
                    <input type="number" class="form-control" name="tuition" value="{{ old('tuition') }}" required>
                  </div>
                  <div class="form-group col-md-12">
                    <label>Ghi chú</label>
                    <input type="text" class="form-control" name="note" value="{{ old('note') }}">
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary pull-right">Thêm mới</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@stop

@section('script')
<!-- bootstrap datepicker -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script>
  /* global $ */
  $(function() {
    $('.select2').select2()
  })
</script>
@stop