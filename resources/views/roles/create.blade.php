@extends('adminlte::page')

@section('title', 'Adicionar função')

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
                        
                        <h3><i class='fa fa-key'></i> Adicionar Função</h3>
                        <hr>
                        @include('admin.includes.alerts')
                        {{ Form::open(array('url' => 'admin\roles')) }}
                        
                        <div class="form-group">
                            {{ Form::label('name', 'Nome') }}
                            {{ Form::text('name', null, array('class' => 'form-control')) }}
                        </div>
                        
                        <h5><b>Atribuir Permissões</b></h5>
                        
                        <div class='form-group'>
                            @foreach ($permissions as $permission)
                            {{ Form::checkbox('permissions[]',  $permission->id ) }}
                            {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>
                            
                            @endforeach
                        </div>
                        
                        {{ Form::submit('Adicionar', array('class' => 'btn btn-primary')) }}
                        
                        {{ Form::close() }}
                        <br>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@stop

