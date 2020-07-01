@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4 class="m-0 text-dark">
                    <i class="fas fa-user"></i> Perfil
                </h4>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0">Dados do Usuário</h5>
                    </div>
                    <div class="card-body">
                        <form role="form" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Digite o Nome" name="name" value="{{$user->name}}">
                                @error('name') <span style="color: red"> {{$message}} </span> @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Digite o Email" name="email" value="{{$user->email}}">
                                @error('email') <span style="color: red"> {{$message}} </span> @enderror
                            </div>
                            <div class="form-group">
                                <label>Nova Senha</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Digite a Senha" name="password" >
                                @error('password') <span style="color: red"> {{$message}} </span> @enderror
                            </div>
                            <div class="form-group">
                                <label>Confirmar Nova Senha</label>
                                <input type="password" class="form-control" placeholder="Confirme a Senha" name="password_confirmation" >
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
        </div>
    </div>
</div>

@endsection