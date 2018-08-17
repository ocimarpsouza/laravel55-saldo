@extends('adminlte::page')

@section('title', 'Alterar função')

@section('content_header')
<h3><i class="fa fa-map"></i> Funções</h3>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <div class="box-body">
            <div class="panel panel-default">
                <div class="table-responsive">
                    <div class='col-lg-6 col-lg-offset-4'>
                        <h3><i class='fa fa-key'></i> Alterar Função: {{$role->name}}</h3>
                        @include('admin.includes.alerts')
                        {{ Form::model($role, array('route' => array('roles.update', $role->id), 'method' => 'PUT')) }}
                        
                        <div class="form-group">
                            {{ Form::label('name', 'Role Name') }}
                            {{ Form::text('name', null, array('class' => 'form-control')) }}
                        </div>
                        
                        <h5><b>Assign Permissions</b></h5>
                        @foreach ($permissions as $permission)
                        
                        {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
                        {{Form::label($permission->name, ucfirst($permission->name)) }}<br>
                        
                        @endforeach
                        <br>
                        {{ Form::submit('Alterar', array('class' => 'btn btn-primary')) }}
                        
                        {{ Form::close() }} 
                        <br>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                    
@stop
                    
