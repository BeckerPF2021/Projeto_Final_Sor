@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Menus') }}</div>

                <!-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     {{ __('Voce Entrou!!!') }}
                </div>  -->

                <button type="button" class="btn btn-sm btn-outline-primary"  href="{{ url('/cliente') }}">Clientes</button>
                <button type="button" class="btn btn-sm btn-outline-primary"  href="{{ url('/cliente') }}">Funcionarios</button>
                <button type="button" class="btn btn-sm btn-outline-primary"  href="{{ url('/cliente') }}">Produtos</button>
                <button type="button" class="btn btn-sm btn-outline-primary"  href="{{ url('/cliente') }}">Pedidos</button>
                <button type="button" class="btn btn-sm btn-outline-primary"  href="{{ url('/cliente') }}">Itens</button>
                <button type="button" class="btn btn-sm btn-outline-primary"  href="{{ url('/cliente') }}">Tipos de Produtos</button>

            </div>
        </div>
    </div>
</div>
@endsection
