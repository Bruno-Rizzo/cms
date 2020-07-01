@extends('layouts.app')

@section('content')
    
 <!-- Content Header (Page header) -->
 <div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h4 class="m-0 text-dark">
            <i class="fas fa-file"></i> Minhas Páginas
            <a href="{{route('pages.create')}}" class="btn btn-sm btn-success ml-4">
                <i class="fas fa-plus-circle mr-1"></i> Nova Página 
            </a>
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
            <h5 class="m-0">Lista de Páginas</h5>
          </div>

          <div class="card-body">

            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th width="60%">Título</th>
                  <th class="text-center">Ações</th>
                </tr>  
              </thead>
              <tbody>
                @foreach ($pages as $p)
                    <tr>
                        <td>{{$p->id}}</td>
                        <td>{{$p->title}}</td>
                        <td class="text-center">
                            <a href="#" target="_blank" class="btn btn-sm btn-success mr-1">
                              <i class="fas fa-search"></i> Visualizar
                            </a>
                            <a href="{{route('pages.edit',[$p->id])}}" class="btn btn-sm btn-info mr-1">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <a href="#excluir" data-toggle="modal" page="{{$p->id}}" class="btn btn-sm btn-danger ml-1">
                              <i class="fas fa-trash"></i> Excluir
                            </a> 
                        </td>
                    </tr>
                  @endforeach
              </tbody>  
             </table>
            
          </div>

        </div>

        {{$pages->links()}}
        
      </div>
      <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->


<div class="modal fade" id="excluir">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{route('pageDel')}}" method="POST">
        @csrf
        <input type="hidden" name="id" id="idPage">
      <div class="modal-header" style="background-color: #DC3545;color:#FFF">
        <h4 class="modal-title">Excluir Página</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Deseja realmente excluir esta página?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">
          <i class="fas fa-ban"></i> Cancelar
        </button>
        <button type="submit" class="btn btn-sm btn-danger">
          <i class="fas fa-check"></i> Excluir
        </button>
      </div>
    </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

@endsection

