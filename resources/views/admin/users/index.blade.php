@extends('layouts.app')

@section('content')
    
 <!-- Content Header (Page header) -->
 <div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h4 class="m-0 text-dark">
            <i class="fas fa-user-friends"></i> Meus Usuários
            <a href="{{route('users.create')}}" class="btn btn-sm btn-success ml-4">
                <i class="fas fa-user-plus mr-1"></i> Novo Usuário 
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
            <h5 class="m-0">Lista de Usuários</h5>
          </div>

          <div class="card-body">

            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nome</th>
                  <th>Email</th>
                  <th class="text-center">Ações</th>
                </tr>  
              </thead>
              <tbody>
                @foreach ($users as $u)
                    <tr>
                        <td>{{$u->id}}</td>
                        <td>{{$u->name}}</td>
                        <td>{{$u->email}}</td>
                        <td class="text-center">
                          <a href="{{route('users.edit',[$u->id])}}" class="btn btn-sm btn-info mr-1">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                           <a href="#excluir" data-toggle="modal" user="{{$u->id}}" class="btn btn-sm btn-danger ml-1">
                              <i class="fas fa-trash"></i> Excluir
                            </a> 
                        </td>
                    </tr>
                  @endforeach
              </tbody>  
             </table>
            
          </div>

        </div>

        {{$users->links()}}
        
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
      <form action="{{route('del')}}" method="POST">
        @csrf
        <input type="hidden" name="id" id="idUser">
      <div class="modal-header" style="background-color: #DC3545;color:#FFF">
        <h4 class="modal-title">Excluir Usuário</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Deseja realmente excluir este usuário?</p>
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

