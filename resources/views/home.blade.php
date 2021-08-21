@extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white">
  <!-- Content Header (Page header) -->
  <div class="content-header">
  <div class="container-fluid">
  <div class="row">
  <div class="col-md-3 col-sm-6">
  <div class="small-box bg-success">
    <div class="inner">
      <h3>{{ number_format($revenue ?? 0, 0) }}</h3>
        <p>Pendapatan Total (IDR)</p>
          </div>
            <div class="icon">
              <i class="fa">&#xf200;</i>
          </div>
        </div>
      </div>
  <div class="col-md-3 col-sm-6">
  <div class="small-box bg-danger">
    <div class="inner">
      <h3>{{ $users }}</h3>
        <p>Users</p>
          </div>
            <div class="icon">
              <i class="fas fa-user-plus"></i>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
  <div class="small-box bg-primary">
    <div class="inner">
      <h3>{{ $subs ?? 0 }}</h3>
        <p>Seller</p>
          </div>
            <div class="icon">
              <i class="fas fa-id-card"></i>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
  <div class="small-box bg-info">
    <div class="inner">
      <h3>{{ $jasa_count ?? 0}}</h3>
        <p>Orderan Total</p>
          </div>
            <div class="icon">
              <i class="fa fa-cart-plus"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Table -->
<div class="card-body table-responsive">
  <h5 class="text-center">Table Order</h5>
    <table class="table table-bordered" id="datatables">
      <thead class="">
        <tr>
        <th>Order Id</th>
        <th>Customer</th>
        <th>Seller</th>
        <th>Harga</th>
        <th>Tanggal</th>
        </tr>
      </thead>
      <tbody>
          @foreach($order as $a)
      <tr>
        <td>{{ $a->order_id }}</td>
        <td>{{ $a->pengguna['name']}}</td>
        <td>{{$a->seller['name']}}</td>
        <td>{{"Rp". number_format($a->harga,2,',','.')}}</td>
          <td>{{ date_format(date_create($a->created_at),"M,d,Y H:i:a")
        }}</td>
      </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>

<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order Jasa Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body jasa">
      </div>
    </div>
  </div>
</div>

<!-- <div class="modal fade bd-example-modal-lg" id="exampleInv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order Invitations Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body invitations">
      </div>
    </div>
  </div>
</div> -->
<!-- <script>
  $(document).ready(function() {
    $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var recipient = button.data('jasa_order_id')
    var name = button.data('name')
    $.ajaxSetup({ headers: { '_token' : '' } });

    $.ajax({
      url:"{{ url('/modal-jasa') }}/"+recipient,
      type:'GET',
      dataType:'html',
      success:function(data){
        $(".jasa").html(data);
      },
      beforeSend:function() {
        $(".jasa").html("Sedang Memuat...");
      },
        error:function() {
          $(".jasa").html("Terjadi Kesalahan...");
      }
    });

    var modal = $(this)
    modal.find('.modal-title').text(name)
})
$('#exampleInv').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var recipient = button.data('inv_order_id')
    var name = button.data('name')
    $.ajaxSetup({ headers: { '_token' : '' } });

    $.ajax({
      url:"{{ url('/modal-inv') }}/"+recipient,
      type:'GET',
      dataType:'html',
      success:function(data){
        $(".invitations").html(data);
      },
      beforeSend:function() {
        $(".invitations").html("Sedang Memuat...");
      },
        error:function() {
          $(".invitations").html("Terjadi Kesalahan...");
      }
    });

    var modal = $(this)
    modal.find('.modal-title').text(name)
})
});
</script> -->
<script>
$(function() {
    $('#datatables').DataTable();
})
</script>

@endsection
