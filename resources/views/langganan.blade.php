@extends('layouts.app')

@section('content')
<<<<<<< HEAD
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="https://assets.exova.id/img/1.png" alt="Exova Indonesia" class="brand-image img-circle elevation-3"
           style="opacity: .8">
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
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-video"></i>
                    <p>
                        Data Freelancer
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
=======

>>>>>>> 515c47969492d6bdf5310beba0a8b9f157ba0a9a
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white">
  <!-- Content Header (Page header) -->
  <div class="content-header">
  <div class="container-fluid">
  <div class="row">
      <div class="col-md-12">
      <p class="text-right">
        <a class="btn btn-success text-white">Export Data</a>
      </p>
      <div class="card">
      <div class="card-header bg-primary">
        <h3 class="card-title">Subscriptions</h3>
      </div>
      <div class="card-body table-responsive">
          <table class="table table-bordered" id="datatables">
            <thead>
              <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Subscription End</th>
              <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($subs as $s)
            <tr>
              <td>{{ $s->name }}</td>
              <td>{{ $s->email }}</td>
              <td>{{ $s->phone }}</td>
              <td>{{ $s->address }}</td>
              <td>{{ $s->subscription_end }}</td>
              <td><span type="button" class="text-white badge badge-success pointer-cursor" data-toggle="modal" data-target="#exampleModal" data-jasa_order_id="$s->id">
                <i class="fa fa-eye"></i>
                  </span>
              </td>
            </tr>
             @endforeach
            </tbody>
          </table>
        </div>
        </div>
        </div>
    </div>
  </div>
</div>
</div>


<div class="modal fade bd-example-modal-lg" id="exampleInv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</div>
<script>
  $(document).ready(function() {
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

$(function() {
    $('#datatables').DataTable();
})
</script>
@endsection
