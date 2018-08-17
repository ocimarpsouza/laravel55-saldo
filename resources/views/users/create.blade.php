@extends('adminlte::page')

@section('title', 'Adicionar Usuário')

@section('content_header')
<h3><i class="fa fa-users"></i> Administrador de usuários<h3>
    @stop
    
    @section('content')
    <div class="box">
        <div class="box-header">
            <div class="box-body">
                <div class="panel panel-default">
                    <div class="table-responsive">
                        <div class='col-lg-6 col-lg-offset-4'>
                            
                            <h3><i class='fa fa-user-plus'></i> Adicionar Usuário</h3>
                            @include('admin.includes.alerts')
                            {{ Form::open(array('url' => 'admin/users')) }}
                            
                            <div class="form-group">
                                {{ Form::label('name', 'Nome') }}
                                {{ Form::text('name', '', array('class' => 'form-control')) }}
                            </div>
                            
                            <div class="form-group">
                                {{ Form::label('email', 'Email') }}
                                {{ Form::email('email', '', array('class' => 'form-control')) }}
                            </div>
                            
                            <div class='form-group'>
                                @foreach ($roles as $role)
                                {{ Form::checkbox('roles[]',  $role->id ) }}
                                {{ Form::label($role->name, ucfirst($role->name)) }}<br>
                                
                                @endforeach
                            </div>
                            
                            <div class="form-group">
                                {{ Form::label('password', 'Senha') }}<br>
                                {{ Form::password('password', array('class' => 'form-control')) }}
                                
                            </div>
                            
                            <div class="form-group">
                                {{ Form::label('password', 'Confirmar Senha') }}<br>
                                {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
                                
                            </div>
                            
                            {{ Form::submit('Adicionar', array('class' => 'btn btn-primary')) }}
                            
                            {{ Form::close() }}
                            <br>
                        </div>
                        
                        
@stop
                        
