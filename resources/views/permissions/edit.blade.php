@extends('adminlte::page')

@section('title', 'Alterar Permissão')

@section('content_header')
    <h3><i class="fa fa-key"></i>Permissões</h3>
@stop

@section('content')

<div class="box">
    <div class="box-header">
        <div class="box-body">
            <div class="panel panel-default">
                <div class="table-responsive">
                    
                    <div class='col-lg-6 col-lg-offset-4'>
                        
                        <h3><i class='fa fa-key'></i> Alterar permissão: {{$permission->name}}</h3>
                        <br>
                        @include('admin.includes.alerts')
                        {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}
                        
                        <div class="form-group">
                            {{ Form::label('name', 'Nome da permissão') }}
                            {{ Form::text('name', null, array('class' => 'form-control')) }}
                        </div>
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

