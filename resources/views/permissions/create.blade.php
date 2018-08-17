@extends('adminlte::page')

@section('title', 'Criar Permissão')

@section('content_header')
    <h3><i class="fa fa-key"></i>Permissões</h3>
@stop

@section('content')

<div class="box">
    <div class="box-header">
        <div class="box-body">
            <div class="panel panel-default">
                <div class="table-responsive">
                    
                    <div class='col-lg-6 col-lg-offset-4'>
                        <h3><i class='fa fa-key'></i> Adicionar permissão</h3>
                        <br>
                        @include('admin.includes.alerts') {{ Form::open(array('url' => 'admin\permissions')) }}
                        
                        <div class="form-group">
                            {{ Form::label('name', 'Name') }} {{ Form::text('name', '', array('class' => 'form-control')) }}
                        </div><br> @if(!$roles->isEmpty())
                        <h4>Atribuir Permissão a Funções</h4>
                        
                        @foreach ($roles as $role) {{ Form::checkbox('roles[]', $role->id ) }} {{ Form::label($role->name, ucfirst($role->name))
                        }}<br> @endforeach @endif
                        <br> {{ Form::submit('Adicionar', array('class' => 'btn btn-primary')) }} {{ Form::close() }}<br>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

