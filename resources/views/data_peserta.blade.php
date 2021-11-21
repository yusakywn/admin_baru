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
            <a href="{{ url('export_data/peserta') . '/' . Request::segment(2) }}" class="mx-1 btn btn-success my-3" target="_blank">Export Excel</a>
            <a data-name="Add Certificate To All Participant" data-id="{{ Request::segment(2) }}" data-toggle="modal" data-target="#addCert" class="mx-1 btn text-white btn-info my-3" target="_blank">Add Certificate</a>
            <a href="{{ url('send/certificate') }}" class="mx-1 btn text-white btn-danger my-3">Send Certificate</a>
            <thead>
              <tr>
              <th>ID</th>
              <th>Nama Peserta</th>
              <th>Title</th>
              <th>Deskripsi</th>
              <th>File</th>
              <th>Tanggal Upload</th>
              <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            @foreach($users as $u)
            <tr>
              <td>{{ $u->id }}</td>
              <td>{{ $u->data_peserta['name'] }}</td>
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
              <td>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#updateCert"
                  data-id="{{ $u->user_id }}"
                  data-name="{{ __('Update ' . $u->data_peserta['name'] . ' Certificate') }}"
                  >
                  {{ 'Update Certificate' }}
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
<!-- Modal updateCert -->
<div class="modal fade" id="updateCert" tabindex="-1" role="dialog" aria-labelledby="updateCert" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form method="POST" action="{{ url('/update/certificate') }}" enctype='multipart/form-data'>
    @csrf
      <input type="hidden" class="form-control mb-3" id="user_id" name="userid">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control mb-3" name="filename">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Kirim</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal addCert -->
<div class="modal fade bd-example-modal-lg" id="addCert" tabindex="-1" role="dialog" aria-labelledby="addCert" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="shoutOutTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ url('/add/certificate') }}" enctype='multipart/form-data'>
      @csrf
        <input type="hidden" class="form-control mb-3" id="ids" name="uuid">
        <input type="text" class="form-control mb-3" name="filename">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Kirim</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {

    $('#addCert').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('id')
      var name = button.data('name')
      var modal = $(this)
      modal.find('#shoutOutTitle').text(name)
      $('#ids').val(recipient);
    });

    $('#updateCert').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('id')
      var name = button.data('name')
      var modal = $(this)
      modal.find('.modal-title').text(name)
      $('#user_id').val(recipient);
  });
});

$(function() {
    $('#datatables').DataTable();
})
</script>
@endsection
