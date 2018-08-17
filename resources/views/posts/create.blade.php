@extends('adminlte::page')

@section('title', 'Criar novo Post')

@section('content_header')
<h1>Posts</h1>
<ol class="breadcrumb">
    <li><a href="">Dashboard</a></li>
    <li><a href="">Criar novo post</a></li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <div class="box-body">
            <div class="panel panel-default">
                <div class="table-responsive">
                    <div class="col-md-8 col-md-offset-2">
                        
                        <h1>Criar novo post</h1>
                        <hr>
                        @include('admin.includes.alerts')    
                        {{-- Using the Laravel HTML Form Collective to create our form --}}
                        {{ Form::open(array('route' => 'posts.store')) }}
                        
                        <div class="form-group">
                            {{ Form::label('title', 'Título') }}
                            {{ Form::text('title', null, array('class' => 'form-control')) }}
                            <br>
                            
                            {{ Form::label('body', 'Corpo do Post') }}
                            {{ Form::textarea('body', null, array('class' => 'form-control')) }}
                            <br>
                            
                            {{ Form::submit('Criar Post', array('class' => 'btn btn-success btn-lg btn-block')) }}
                            {{ Form::close() }}
                            
                            
                            @endsection