@extends('adminlte::page')

@section('title', 'Adicionar Usuário')

@section('content_header')
    <h1>Usuário</h1>
    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Adicionar usuário</a></li>
    </ol>
@stop

@section('content')
<div class='col-lg-4 col-lg-offset-4'>

    <h3><i class='fa fa-user-plus'></i> Adicionar Usuário</h3>
    <hr>

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

</div>


@stop

