@extends('adminlte::page')

@section('title', 'Alterar Post')

@section('content_header')
<h3>Visualizar Post</h3>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <div class="box-body">
            <div class="panel panel-default">
                <div class="table-responsive">
                    
                    <h3>{{ $post->title }}</h3>
                    
                    <hr>
                    <div class="box-body">
                        {{ $post->body }}
                    </div>
                    
                </div>
            </div>
            {!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id] ]) !!}
            <a href="{{ route('posts.index') }}" class="btn btn-primary">Voltar</a>
            @can('Edit Post')
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info" role="button">Alterar</a>
            @endcan
            @can('Delete Post')
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            @endcan
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection