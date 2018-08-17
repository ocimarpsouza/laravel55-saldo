@extends('adminlte::page')

@section('title', 'Papéis')

@section('content_header')
<h3><i class="fa fa-map"></i> Funções</h3>
@stop

@section('content')

<div class="box">
    <div class="box-header">
        <div class="box-body">
            <a href="{{ URL::to('admin/roles/create') }}" class="btn btn-success">Adicionar função</a>
            <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Usuarios</a>
            <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissões</a>                
        </div>
        <div class="box-body">
            <div class="panel panel-default">
                <div class="panel-heading">Página {{ $roles->currentPage() }} de {{ $roles->lastPage() }}</div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Função</th>
                                <th>Permissões</th>
                                <th style="width:150px;">Operações</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                                <td>
                                    <a href="{{ URL::to('admin/roles/'.$role->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Alterar</a>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]) !!}
                                    {!! Form::submit('Excluir', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                    <div class="text-center">
                        {!! $roles->links() !!}
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>


@stop

