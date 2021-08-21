@extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white">
  <!-- Content Header (Page header) -->
  <div class="content-header">
  <div class="container-fluid">
  <div class="row">
      <div class="col-md-12">
          <h3 class="text-center">Data Peserta Lomba</h3>
      <div class="card">
      <div class="card-header bg-danger">

        <h3 class="card-title">Data Peserta Lomba</h3>
      </div>
      <div class="card-body table-responsive">
          <table class="table table-bordered" id="datatables">
            <a href="/data_peserta/export_data/{{ Request::segment(2) }}" class="btn btn-success my-3" target="_blank">Export Excel</a>
            <thead>
              <tr>
              <th>ID</th>
              <th>Nama Peserta</th>
              <th>Title</th>
              <th>Deskripsi</th>
              <th>File</th>
              <th>Tanggal Upload</th>
              </tr>
            </thead>
            <tbody>
            @foreach($users as $u)
            <tr>
              <td>{{ $u->id }}</td>
              <td>{{ $u->data_peserta['name']}}</td>
              <td>{{ $u->title }}</td>
              <td>{{ $u->description }}</td>
              <td>
                @if ($u->file_id == 0)
                  <a target="_blank" href="{{ $u->url }}">Google Drive</a>
                  @else
                  {{ $u->files['new_name'] }}
                @endif
              </td>
              <td>{{ $u->created_at->format('F j, Y h:i a') }}</td>
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
<!-- Modal Suspend -->
<div class="modal fade" id="suspend" tabindex="-1" role="dialog" aria-labelledby="Suspend" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form method="POST" action="{{ url('/suspend') }}">
    @csrf
      <input type="hidden" class="form-control mb-3" id="emails" name="email">
      <div class="modal-header">
        <h5 class="modal-title">Caution Suspend Verification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body suspend">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Suspend</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Shout Out -->
<div class="modal fade bd-example-modal-lg" id="shoutOut" tabindex="-1" role="dialog" aria-labelledby="shoutOut" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="shoutOutTitle">Shout out </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ url('/shoutout') }}">
      @csrf
        <input type="hidden" class="form-control mb-3" id="email" name="email">
        <input type="text" class="form-control mb-3" name="subyek" placeholder="Subyek">
        <textarea type="text" class="form-control" name="pesan" placeholder="Write a text here"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Send</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {

    $('#shoutOut').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('email')
      var name = button.data('name')
      var modal = $(this)
      modal.find('#shoutOutTitle').text("Shout out "+name)
      $('#email').val(recipient);
    });

    $('#suspend').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('email')
      var name = button.data('name')
      var modal = $(this)
      modal.find('.suspend').text("Are You Sure Suspend "+name+"?")
      $('#email').val(recipient);
  });
});

$(function() {
    $('#datatables').DataTable();
})
</script>
@endsection
