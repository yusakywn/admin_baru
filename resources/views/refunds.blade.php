@extends('layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white">
  <!-- Content Header (Page header) -->
  <div class="content-header">
  <div class="container-fluid">
  <div class="row">
      <div class="col-md-12">
          <h3 class="text-center">Data Refunds</h3>
      <div class="card">
      <div class="card-header bg-danger">

        <h3 class="card-title">Data Refunds</h3>
      </div>
      <div class="card-body table-responsive">
          <table class="table table-bordered" id="datatables">
            <thead>
              <tr>
              <th>ID</th>
              <th>Contract Id</th>
              <th>Nama Pemilik</th>
              <th>Nomer Rekening</th>
              <th>Nama Bank</th>
              <th>Kode Bank</th>
              <th>Amount</th>
              <th>Status</th>
              <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($users as $u)
            <tr>
              <td>{{ $u->id }}</td>
              <td>{{ $u->contract_id }}</td>
              <td>{{ $u->name }}</td>
              <td>{{ $u->number }}</td>
              <td>{{ $u->channel }}</td>
              <td>{{ $u->code}}</td>
              <td>{{ $u->amount }}</td>
              <td>
              @if($u->status==0)
                {{"Pending"}}
              @elseif ($u->status==1)
                {{"Sukses"}}
              @elseif ($u->status==2)
                {{"Ditolak"}}
              @endif
              </td>
              <td>
                @if($u->status==0)
                <a href="/refunds/verifikasi/{{$u->id }}" class="btn btn-warning">
                  {{ 'Verifikasi Refund' }}
                </a>
                @elseif ($u->status==1)
                <a class="btn btn-success text-white">
                  {{ 'terverifikasi' }}
                </a>
                @elseif ($u->status==2)
                <a class="btn btn-danger text-white">
                  {{ 'ditolak' }}
                </a>
                @endif

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
