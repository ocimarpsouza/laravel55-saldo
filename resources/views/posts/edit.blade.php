@extends('adminlte::page')

@section('title', 'Alterar Post')

@section('content_header')
    <h1>Alterar Post</h1>
    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Alterar Post</a></li>
    </ol>
@stop

@section('content')
<div class="row">

    <div class="col-md-8 col-md-offset-2">

        <h1>Alterar Post</h1>
        <hr>
            {{ Form::model($post, array('route' => array('posts.update', $post->id), 'method' => 'PUT')) }}
            <div class="form-group">
            {{ Form::label('title', 'Título') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}<br>

            {{ Form::label('body', 'Corpo do Post') }}
            {{ Form::textarea('body', null, array('class' => 'form-control')) }}<br>

            {{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
    </div>
    </div>
</div>

@endsection