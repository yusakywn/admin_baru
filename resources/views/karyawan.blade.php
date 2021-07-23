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
        <a class="btn btn-success text-white">Export Data</a>
      </p>
      <div class="card">
      <div class="card-header bg-danger">
        <h3 class="card-title text-center">Karyawan</h3>
      </div>
      <div class="card-body table-responsive">
          <table class="table table-bordered" id="datatables">
            <thead>
              <tr>
              <th>User ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Jabatan</th>
              <th>Action</th>
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
              <td>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#suspend" 
                  data-email="" data-name="">
                  action
                  </button>
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#shoutOut" 
                  data-email="" data-name="">
                    action
                </button>
              </td>
            </tr>
          
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
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg-white">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
              @foreach($jobs as $j)
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-header bg-danger">
                            {{ $j->level }}
                        </div>
                        <div class="card-body">
                            <div class="card-title float-none">
                                <img class="mb-2 rounded-circle img-profil" width="120px" height="120px" src="{{ $j->picture }}" alt="Profil Picture">
                                <h5 class="text-capitalize">{{ $j->name }}</h5>
                            </div>
                            <p class="card-text">{{ $j->bio }}</p>
                            <a href="#" class="btn btn-danger">View Details</a>
                        </div>
                    </div>
                </div>
              @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
    $('#datatables').DataTable();
    })
</script>
</script>
@endsection
