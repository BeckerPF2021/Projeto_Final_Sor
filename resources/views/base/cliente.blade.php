@extends('layouts.app')

@section('content')

<div class ="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Lista de Clientes') }}</div>
                <!-- <td><img src="{{ asset('images/clientes.png') }}" alt="Imagem do produto" style="width: 100px; height: 80px;"></td> -->
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Endereço</th>
                                <th scope="col">CPF</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($cliente))  {{-- Caso não encontre nenhum usuário --}}
                                @foreach ($cliente as $cliente)
                                <tr>
                                    <th scope="row">{{ $cliente->id }}</th>
                                    <td>{{ $cliente->Nome }}</td>
                                    <td>{{ $cliente->endereco }}</td>
                                    <td>{{ $cliente->CPF }}</td>
                                    <td>{{ $cliente->Telefone }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#updateUserModal{{ $cliente->id }}">Editar</button>
                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="deletar_cliente({{ $cliente->id }}, '{{ $cliente->Nome }}')">Excluir</button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="updateUserModal{{ $cliente->id }}" tabindex="-1" role="dialog" aria-labelledby="updateUserModalLabel{{ $cliente->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updateUserModalLabel{{ $cliente->id }}">Atualizar Usuário</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ url('/cliente/'.$cliente->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="id">Código:</label>
                                                        <input type="number" class="form-control" name="id" value="{{ $cliente->id }}" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Nome">Nome:</label>
                                                        <input type="text" class="form-control" name="Nome" value="{{ $cliente->Nome }}" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="endereco">Endereço:</label>
                                                        <input type="text" class="form-control" name="endereco" value="{{ $cliente->endereco }}" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="CPF">CPF:</label>
                                                        <input type="text" class="form-control" name="CPF" value="{{ $cliente->CPF }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Telefone">Telefone:</label>
                                                        <input type="text" class="form-control" name="Telefone" value="{{ $cliente->Telefone }}" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" id="atualizar_cliente" class="btn btn-primary">Atualizar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/cliente.js') }}"></script>
{{-- A função asset() é uma função do Laravel que gera uma URL completa para um arquivo localizado em sua pasta public --}}

{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
@endsection
