@extends('layouts.app')

@section('content')
  
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg-white">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <p class="text-right">
            <a class="btn btn-success" href="blogs/create">Create Blogs</a>
          </p>
        @if($blogs != '')
            {{ 'Nothing to view' }}
          @else
          @foreach($blogs as $d)
            <div class="border mb-1">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand p-0" href="">
                    <img class="border object-fit-cover" width="80" height="60" 
                    src="" alt="Templates Thumbnail">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                      <a href="">
                        <h5 class="nav-link p-1 m-0 active" >{{ $d->blogs_title }}<span class="sr-only">(current)</span></h5>
                        <span class="nav-link p-1">{{ strip_tags($d->blogs_content) }}</span>
                      </a>
                    </li>
                    </ul>
                    <div class="my-2 my-lg-0 col-md-5 h6 text-right nav-link text-muted">
                        <a class="mr-3">0 <i class="fa fa-cart-arrow-down"></i></a>
                        <a class="mr-3">0 <i class="fa fa-envelope"></i></a>
                        <a class="mr-3">0 <i class="fa fa-eye"></i></a>
                        <a class="mr-3" href="blogs/update/{{ $d->blogs_id }}"><i class="fa fa-edit"></i></a>
                        <a class="mr-3 text-danger" href="blogs/delete/{{ $d->blogs_id }}"><i class="fa fa-trash"></i></a>
                    </div>
                    <div class="my-2 my-lg-0">
                        <ul class="navbar-nav mr-auto">
                        <li class="nav-item text-right">
                            <a class="nav-link p-1 m-0 active"> 
                                {{ $d->blogs_author }}
                              <img width="24" height="24" class="rounded-circle align-top" src="https://assets.exova.id/img/1.png" alt="avatar">
                            </a>
                            <span class="nav-link p-1" href="#">{{ $d->blogs_status }} On <?php echo date('M j, Y H:i a', strtotime($d->updated_at)) ?></span>
                        </li>
                        </ul>
                    </div>
                </div>
              </nav>
          </div>
          @endforeach
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
