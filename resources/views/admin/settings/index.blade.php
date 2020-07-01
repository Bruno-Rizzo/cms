@extends('layouts.app')

@section('content')
    
 <!-- Content Header (Page header) -->
 <div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h4 class="m-0 text-dark">
          <i class="fas fa-cogs mr-1"></i> Configurações
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
            <h5 class="m-0">Configurações do CMS</h5>
          </div>
          <div class="card-body">
            <form action="{{route('settings.save')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Título</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$settings['title']}}">
                    @error('title') <span style="color: red"> {{$message}} </span> @enderror
                  </div>
                  <div class="form-group">
                    <label>Subtítulo</label>
                    <input type="text" class="form-control @error('subtitle') is-invalid @enderror" name="subtitle" value="{{$settings['subtitle']}}.">
                    @error('subtitle') <span style="color: red"> {{$message}} </span> @enderror
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$settings['email']}}">
                    @error('email') <span style="color: red"> {{$message}} </span> @enderror
                  </div>
                  <div class="form-group">
                    <label>Cor de Fundo</label>
                    <div class="col-lg-1">
                        <input type="color" class="form-control" name="bgcolor" value="{{$settings['bgcolor']}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Cor do Texto</label>
                    <div class="col-lg-1">
                        <input type="color" class="form-control" name="textcolor" value="{{$settings['textcolor']}}">
                    </div>
                  </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-sm btn-success">
                      <i class="fas fa-check mr-1"></i> Salvar
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

