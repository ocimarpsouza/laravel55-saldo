@extends('adminlte::page')

@section('title', 'Confirmar transferência de saldo')

@section('content_header')
    <h1>Confirmar transferência de saldo</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Saldo</a></li>
        <li><a href="">Trasnferir</a></li>
        <li><a href="">Confirmação</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
       <div class="box-header">
           <h3>Confirmar transferência de saldo</h3>     
       </div>
       <div class="box-body">
            @include('admin.includes.alerts')
            <h4><strong>Recebedor: </strong>{{ $sender->name }}</h4>
            <h3>Saldo disponível: R$ {{ number_format($balance->amount, 2, ',', '.') }}</h3>
            <form method="POST" action="{{ route('transfer.store')}}">
                {!! csrf_field() !!}

                <input type="hidden" name="sender_id" value="{{ $sender->id }}">
                <div class="form-group">
                    <input type="text" name="value" placeholder="Valor" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Transferir</button>
                </div>
            </form>
       </div>
    </div>
@stop