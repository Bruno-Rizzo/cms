@extends('layouts.app')

@section('content')
    
 <!-- Content Header (Page header) -->
 <div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h4 class="m-0 text-dark">
            <i class="fas fa-file"></i> Minhas Páginas
        </h4>
      </div><!-- /.col -->
   </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="m-0">Editar Página</h5>
          </div>
          <div class="card-body">
            
            <form role="form" method="POST" action="{{route('pages.update',[$page->id])}}">
                @csrf
                @method('PUT')
                  <div class="form-group">
                    <label>Título</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$page->title}}">
                    @error('title') <span style="color: red"> {{$message}} </span> @enderror
                  </div>
                  <div class="form-group">
                    <label>Corpo</label>
                    <textarea cols="30" rows="10" class="form-control bodyfield @error('body') is-invalid @enderror" name="body">{{$page->body}}</textarea>
                    @error('body') <span style="color: red"> {{$message}} </span> @enderror
                  </div>
              <div class="card-footer">
                  <button type="submit" class="btn btn-sm btn-info">
                      <i class="fas fa-check mr-1"></i> Editar
                  </button>
                </div>
              </form>  

          </div>
        </div>
      </div>
      <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

@endsection