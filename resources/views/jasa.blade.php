@extends("layouts.app")

@section ("content")
<!-- isi konten -->
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
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/jasaexova" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Jasa Exova</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
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
                  <a href="/subscriptions" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                      Data Langganan
                  </p>
                  </a>
              </li>
          </ul>
          <ul class="nav nav-pills nav-sidebar flex-column">
              <li class="nav-item">
                  <a href="/employees" class="nav-link">
                  <i class="nav-icon fas fa-id-card"></i>
                  <p>
                      Data Karyawan
                  </p>
                  </a>
              </li>
          </ul>
          <ul class="nav nav-pills nav-sidebar flex-column">
              <li class="nav-item">
                  <a href="/blog" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                      Blogs
                  </p>
                  </a>
              </li>
          </ul>
          <ul class="nav nav-pills nav-sidebar flex-column">
              <li class="nav-item">
                  <a href="/add/employees" class="nav-link">
                  <i class="nav-icon fas fa-user-plus"></i>
                  <p>
                      Tambah Karyawan
                  </p>
                  </a>
              </li>
          </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<div class="content-wrapper bg-white">
<div class="card-body table-responsive">
  <h5 class="text-center">Table Jasa</h5>
    <table class="table table-bordered" id="datatables">
      <thead class="">
        <tr>
        <th>Nama Jasa</th>
        <th>Seller</th>
        <th>Harga</th>
        <th>Terjual</th>
        <th>Ratting</th>
        <th>Tanggal</th>
        <th>Status</th>
        </tr>
      </thead>
      <tbody>

      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      </tbody>
    </table>
  </div>
</div>
</div>
<script>
$(function() {
    $('#datatables').DataTable();
})
</script>
@endsection
