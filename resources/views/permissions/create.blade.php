@extends('adminlte::page')

@section('title', 'Criar Permissão')

@section('content_header')
    <h1>Adicionar Permissão</h1>
    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Adicionar Permissão</a></li>
    </ol>
@stop

@section('content')

    <div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-key'></i> Adicionar Permissão</h1>
    <br>

    {{ Form::open(array('url' => 'admin\permissions')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div><br>
    @if(!$roles->isEmpty()) //If no roles exist yet
        <h4>Atribuir Permissão a Funções</h4>

        @foreach ($roles as $role) 
            {{ Form::checkbox('roles[]',  $role->id ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

        @endforeach
    @endif
    <br>
    {{ Form::submit('Adicionar', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

    </div>

@stop

