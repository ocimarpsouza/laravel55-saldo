@extends('adminlte::page')

@section('title', 'Papéis')

@section('content_header')
    <h1>Papéis</h1>
    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Papeis</a></li>
    </ol>
@stop

@section('content')

    <div class="col-lg-10 col-lg-offset-1">
    <h1><i class="fa fa-key"></i> Papéis

    <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Usuarios</a>
    <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissões</a></h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Função</th>
                    <th>Permissões</th>
                    <th>Operação</th>
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
    </div>

    <a href="{{ URL::to('admin/roles/create') }}" class="btn btn-success">Adicionar Papel</a>

</div>


@stop

