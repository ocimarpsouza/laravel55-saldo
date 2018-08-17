@extends('adminlte::page')

@section('title', 'Alterar Post')

@section('content_header')
<h1>Alterar Post</h1>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <div class="box-body">
            <div class="panel panel-default">
                <div class="table-responsive">
                    
                    <div class="col-md-8 col-md-offset-2">
                        
                        <h1>Alterar Post</h1>
                        <hr>
                        @include('admin.includes.alerts')
                        {{ Form::model($post, array('route' => array('posts.update', $post->id), 'method' => 'PUT')) }}
                        <div class="form-group">
                            {{ Form::label('title', 'Título') }}
                            {{ Form::text('title', null, array('class' => 'form-control')) }}<br>
                            
                            {{ Form::label('body', 'Corpo do Post') }}
                            {{ Form::textarea('body', null, array('class' => 'form-control')) }}<br>
                            
                            {{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}
                            
                            {{ Form::close() }}
                            
                            
                            @endsection