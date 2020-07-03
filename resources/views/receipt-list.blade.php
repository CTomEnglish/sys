@extends('master')
@section('head')
<title>DELI | Sổ phiếu thu @if(isset($danhmuc)): {{$danhmuc->ten}} @endif</title>
<link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.css')}}">
@stop
@section('main')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>SỔ PHIẾU THU @if(isset($danhmuc)): {{$danhmuc->ten}} @endif</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Sổ phiếu thu</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Danh sách phiếu thu</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="text-center">
                  <th>Thời gian</th>
                <th>Người nộp</th>
                  <th>Chi nhánh | Danh mục</th>
                  <th>Nội dung</th>
                  <th>Số tiền</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($receipts->reverse() as $data)
                <tr>
                  <td class="text-center">{{date("Y/m/d h:m:i", strtotime($data->created_at))}}</td>
                  <td>{{$data->client->name}}</td>
                  <td class="text-center"><span class="badge bg-info">{{$data->branch->name}}</span> <span class="badge bg-danger">{{$data->field->name}}</span></td>
                  <td>{{$data->content}}</td>
                  <td class="text-center">{{number_format($data->amount,0,",",".")}} ₫</td>
                  <td class="text-center"><a href="{{route('staff.receipt.view.get', ['receipt_id' => $data->id])}}" class="btn btn-primary">Xem</a></td>
                </tr>
                @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@stop

@section('script')
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
        "ordering": false,
        "language": {
        	"sProcessing":   "Đang xử lý...",
        	"sLengthMenu":   "Xem _MENU_ mục",
        	"sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
        	"sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
        	"sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
        	"sInfoFiltered": "(được lọc từ _MAX_ mục)",
        	"sInfoPostFix":  "",
        	"sSearch":       "Tìm:",
        	"sUrl":          "",
        	"oPaginate": {
        		"sFirst":    "Đầu",
        		"sPrevious": "Trước",
        		"sNext":     "Tiếp",
        		"sLast":     "Cuối"
        	}
        }
    });
  });

</script>
@stop