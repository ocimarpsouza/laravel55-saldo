@extends('adminlte::page')

@section('title', 'Adicionar função')

@section('content_header')
    <h1>Funções</h1>
    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Adicionar Função</a></li>
    </ol>
@stop

@section('content')
<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-key'></i> Add Função</h1>
    <hr>

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

</div>
    
@stop

