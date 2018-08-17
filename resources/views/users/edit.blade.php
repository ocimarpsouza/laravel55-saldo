@extends('adminlte::page')

@section('title', 'Alterar Usuário')

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
                            
                            <h3><i class='fa fa-user-edit'></i> Alterar usuário: {{$user->name}}</h3>
                            
                            @include('admin.includes.alerts')
                            {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with user data --}}
                            
                            <div class="form-group">
                                {{ Form::label('name', 'Nome') }}
                                {{ Form::text('name', null, array('class' => 'form-control')) }}
                            </div>
                            
                            <div class="form-group">
                                {{ Form::label('email', 'Email') }}
                                {{ Form::email('email', null, array('class' => 'form-control')) }}
                            </div>
                            
                            <h5><b>Qual papel</b></h5>
                            
                            <div class='form-group'>
                                @foreach ($roles as $role)
                                {{ Form::checkbox('roles[]',  $role->id, $user->roles ) }}
                                {{ Form::label($role->name, ucfirst($role->name)) }}<br>
                                
                                @endforeach
                            </div>
                            
                            <div class="form-group">
                                {{ Form::label('password', 'Password') }}<br>
                                {{ Form::password('password', array('class' => 'form-control')) }}
                                
                            </div>
                            
                            <div class="form-group">
                                {{ Form::label('password', 'Confirm Password') }}<br>
                                {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
                                
                            </div>
                            
                            {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}
                            
                            {{ Form::close() }}
                            <br>
                        </div>
@stop
                        
