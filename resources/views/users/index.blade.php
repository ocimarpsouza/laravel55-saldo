@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
<h3><i class="fa fa-users"></i> Administrador de usuários<h3>
    @stop
    
    @section('content')
    <div class="box">
        <div class="box-header">
            <div class="box-body">
                <a href="{{ route('users.create') }}" class="btn btn-success">Adicionar Usuário</a>
                <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Papéis</a>
                <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissões</a>
            </div>
            <div class="box-body">
                <div class="panel panel-default">
                    <div class="panel-heading">Página {{ $users->currentPage() }} de {{ $users->lastPage() }}</div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Data/Hora Adicionado</th>
                                    <th>Funções do usuário</th>
                                    <th style="width:150px;">Operações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                                    <td>{{  $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                                    <td>
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">Alterar</a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id] ]) !!}
                                        {!! Form::submit('Excluir', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            {!! $users->links() !!}
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
    
    @stop
    
