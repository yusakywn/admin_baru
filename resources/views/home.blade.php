@extends('layouts.app')

@section('content')
  <!-- Main Sidebar Container -->
<<<<<<< HEAD
 
=======
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <!-- <img src="https://assets.exova.id/img/1.png" alt="Exova Indonesia" class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
      <span class="brand-text font-weight-light">Exova Indonesia</span>
    </a>
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column">
          <li class="nav-item">
            <a href="/" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-layer-group"></i>
              <p>
                Layanan
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
            <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/jasaexova" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jasa Exova</p>
                </a>
              </li>
            </ul>
          </li>
        </ul> -->
        <ul class="nav nav-pills nav-sidebar flex-column">
                <li class="nav-item">
                    <a href="/users" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Data Users
                    </p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column">
                <li class="nav-item">
<<<<<<< HEAD
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-video"></i>
                    <p>
                        Data Freelancer
=======
                    <a href="/seler" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Data Seler
>>>>>>> 515c47969492d6bdf5310beba0a8b9f157ba0a9a
                    </p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-box-open"></i>
                    <p>
                        Data Order
                    </p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column">
                <li class="nav-item">
                    <a href="/#" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                        Refund
                    </p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-money-bill-alt"></i>
                    <p>
                      Data Penarikan
                    </p>
                    </a>
                </li>
            </ul>
            <!-- <ul class="nav nav-pills nav-sidebar flex-column">
                <li class="nav-item">
                    <a href="/add/employees" class="nav-link">
                    <i class="nav-icon fas fa-user-plus"></i>
                    <p>
                        Tambah Karyawan
                    </p>
                    </a>
                </li>
            </ul> -->

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
>>>>>>> 22fe5f6d028e685388695536d3ae84c295868fe6
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
