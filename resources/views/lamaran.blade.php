@extends('layouts.app')

@section('content')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white">
  <!-- Content Header (Page header) -->
  <div class="content-header">
  <div class="container-fluid">
  <div class="row">
      <div class="col-md-12">
      <p class="text-right">
        <a href="/notifications/accept/employees" class="btn btn-success text-white">Export Data</a>
      </p>
      <div class="card">
      <div class="card-header bg-danger">
        <h3 class="card-title">Applyer</h3>
      </div>
      <div class="card-body table-responsive">
          <table class="table table-bordered" id="dataapply">
            <thead>
              <tr>
              <th>Apply ID</th>
              <th>Foto Profil</th>
              <th>Name</th>
              <th>Email</th>
              <th>Level</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Moto</th>
              <th>CV</th>
              <th>Portfolio</th>
              <th>Status</th>
              <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($jobs as $u)
            <tr>
              <td>{{ $u->applyer_id }}</td>
              <td><img class="img-profil rounded-circle" width="80px" height="80px" src="{{ $u->applyer_picture }}"></td>
              <td>{{ $u->applyer_name }}</td>
              <td>{{ $u->applyer_email }}</td>
              <td>{{ $u->applyer_level }}</td>
              <td>{{ $u->applyer_phone }}</td>
              <td>{{ $u->applyer_address }}</td>
              <td>{{ $u->applyer_bio }}</td>
              <td>{{ $u->applyer_cv }}</td>
              <td>{{ $u->applyer_portfolio }}</td>
              <td>{{ $u->applyer_status }}</td>
              <td>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#reject"
                  data-id="{{ $u->applyer_id }}" data-name="{{ $u->applyer_name }}">
                    {{ 'Reject' }}
                  </button>
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#accept"
                  data-id="{{ $u->applyer_id }}" data-name="{{ $u->applyer_name }}">
                    {{ 'Accept' }}
                </button>
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

<!-- Modal Accept -->
<div class="modal fade" id="accept" tabindex="-1" role="dialog" aria-labelledby="accept" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="acceptTitle">Accept Verification Proccess</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ url('/add/employees/accept') }}">
        @csrf
        <input type="hidden" name="id" id="id_accept">
      <div class="modal-body accept">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-success">Sure</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Reject -->
<div class="modal fade" id="reject" tabindex="-1" role="dialog" aria-labelledby="reject" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rejectTitle">Reject Verification Proccess</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ url('/add/employees/reject') }}">
        @csrf
        <input type="hidden" name="id" id="id_reject">
      <div class="modal-body reject">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-success">Sure</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#accept').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var recipient = button.data('id')
      var name = button.data('name')
      var modal = $(this)
      modal.find('.accept').text("Are You Sure Accept "+name+" ?")
      $('#id_accept').val(recipient);
    });

    $('#reject').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var recipient = button.data('id')
      var name = button.data('name')
      var modal = $(this)
      modal.find('.reject').text("Are You Sure Reject "+name+" ?")
      $('#id_reject').val(recipient);
  });
});

$(function() {
    $('#dataapply').DataTable();
})
</script>
@endsection
