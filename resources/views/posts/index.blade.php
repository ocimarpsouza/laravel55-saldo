@extends('adminlte::page')

@section('title', 'Posts')

@section('content_header')
    <h3>Posts</h3>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <div class="box-body">
                <div class="panel panel-default">
                    <div class="panel-heading">Página {{ $posts->currentPage() }} de {{ $posts->lastPage() }}</div>
                    @foreach ($posts as $post)
                        <div class="panel-body">
                            <li style="list-style-type:disc">
                                <a href="{{ route('posts.show', $post->id ) }}"><b>{{ $post->title }}</b><br>
                                    <p class="teaser">
                                       {{  str_limit($post->body, 100) }} {{-- Limit teaser to 100 characters --}}
                                    </p>
                                </a>
                            </li>
                        </div>
                    @endforeach
                    </div>
                    <div class="text-center">
                        {!! $posts->links() !!}
                    </div>
                </div>
            </div>
        </div>
    @can('Create Post')
    <a href="{{ route('posts.create') }}" class="btn btn-success">Adicionar Post</a>
    @endcan
    </div>
@stop

