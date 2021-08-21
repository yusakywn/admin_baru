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
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Broadcast</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Broadcast message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{url('sendbroadcast')}}">
          @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Users:</label>
            <div class="input-group mb-3">
              <!-- <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Options</label>
              </div> -->
              <!-- input select -->
              <select class="custom-select" name="list">
                <option value="1">Semua Users</option>
                <option value="2">Semua Fotogrhapy</option>
                <option value="3">Semua Videogrhapy</option>
                <option value="4">Semua Customer</option>
              </select>
            </div>
          </div>
          <!-- Subject -->
          <div class="form-group">
            <label for="message-text" class="col-form-label">Subject</label>
            <input type="text" class="form-control" name="sub">
          </div>
          <!-- pesan -->
          <div class="form-group">
            <label for="message-text" class="col-form-label">Pesan:</label>
            <textarea class="form-control" name="pesan"></textarea>
          </div>


      </div>
      <!-- tombol -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batalkan</button>
        <button type="submit" class="btn btn-primary">Kirim Pesan</button>
      </div>
    </div>
  </div>
</div>
</form>
      </p>
      <div class="card">
        <h3 class="text-center">Data Users</h3>
      <div class="card-header bg-danger">
        <h3 class="card-title">Users</h3>
      </div>
      <div class="card-body table-responsive">
          <table class="table table-bordered" id="datatables">
            <thead>
              <tr>
              <th>User ID</th>
              <th>Name</th>
              <th>Email</th>

              <th>Address</th>

              <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($users as $u)
            <tr>
              <td>{{ $u->id }}</td>
              <td>{{ $u->name }}</td>
              <td>{{ $u->email }}</td>

              <td>{{ $u->locations }}</td>

              <td>

                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#shoutOut"
                  data-email="{{ $u->email }}" data-name="{{ $u->name }}">
                    {{ 'Shout Out' }}
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
