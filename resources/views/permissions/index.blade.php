@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
<h3><i class="fa fa-key"></i>Permissões</h3>
@stop

@section('content')

<div class="box">
    <div class="box-header">
        <div class="box-body">
            <a href="{{ URL::to('admin/permissions/create') }}" class="btn btn-success">Adicionar Permissão</a>
            <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Usuários</a>
            <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Papéis</a>                
        </div>
        <div class="box-body">
            <div class="panel panel-default">
                <div class="panel-heading">Página {{ $permissions->currentPage() }} de {{ $permissions->lastPage() }}</div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        
                        <thead>
                            <tr>
                                <th>Permissão</th>
                                <th style="width:150px;">Operações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->name }}</td> 
                                <td>
                                    <a href="{{ URL::to('admin/permissions/'.$permission->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Alterar</a>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                                    {!! Form::submit('Excluir', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {!! $permissions->links() !!}
                    </div>
                </div>                    
            </div>
            
        </div>
    </div>
    
    @stop
    
