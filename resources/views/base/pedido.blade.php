@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Listagem dos Pedidos') }}</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Data do Pedido</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Codigo do Cliente</th>
                                <th scope="col">Codigo do Funcionario</th>
                                <th scope="col">Preço do Pedido</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($pedido))  {{-- Caso não encontre nenhum usuário --}}
                                @foreach ($pedido as $pedido)
                                <tr>
                                    <th scope="row">{{ $pedido->NumPedido }}</th>
                                    <td>{{ $pedido->DataPedido }}</td>
                                    <td>{{ $pedido->Descricao }}</td>
                                    <td>{{ $pedido->fk_Cliente_CodCliente }}</td>
                                    <td>{{ $pedido->fk_Funcionario_CodFuncionario }}</td>
                                    <td>{{ $pedido->PrecoPedido }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#updateUserModal{{ $pedido->id }}">Editar</button>
                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteUser({{ $pedido->id }}, '{{ $pedido->name }}')">Excluir</button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="updateUserModal{{ $pedido->id }}" tabindex="-1" role="dialog" aria-labelledby="updateUserModalLabel{{ $pedido->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updateUserModalLabel{{ $pedido->id }}">Atualizar Usuário</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ url('/colaboradores/'.$pedido->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="NumPedido">Pedido:</label>
                                                        <input type="text" class="form-control" name="NumPedido" value="{{ $pedido->NumPedido }}" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="DataPedido">Data:</label>
                                                        <input type="date" class="form-control" name="DataPedido" value="{{ $pedido->DataPedido }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Descricao">Descrição:</label>
                                                        <input type="text" class="form-control" name="Descricao" value="{{ $pedido->Descricao }}" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fk_Cliente_CodCliente">Cliente:</label>
                                                        <input type="text" class="form-control" name="fk_Cliente_CodCliente" value="{{ $pedido->fk_Cliente_CodCliente }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fk_Funcionario_CodFuncionario">Funcionario:</label>
                                                        <input type="text" class="form-control" name="fk_Funcionario_CodFuncionario" value="{{ $pedido->fk_Funcionario_CodFuncionario }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="PrecoPedido">Preço:</label>
                                                        <input type="text" class="form-control" name="PrecoPedido" value="{{ $pedido->PrecoPedido }}" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" id="atualizar_colaborador" class="btn btn-primary">Atualizar</button>
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
<script src="{{ asset('js/colaboradores.js') }}"></script>
{{-- A função asset() é uma função do Laravel que gera uma URL completa para um arquivo localizado em sua pasta public --}}

{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
{{-- <script>
    function deleteUser(id, name) {
        Swal.fire({
            title: 'Tem certeza?',
            text: `Você está prestes a excluir o usuário ${name}.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, excluir',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.delete(`/users/${id}`)
                    .then(() => {
                        Swal.fire(
                            'Excluído!',
                            'O usuário foi excluído com sucesso.',
                            'success'
                        ).then(() => {
                            location.reload();
                        });
                    })
                    .catch(() => {
                        Swal.fire(
                            'Erro!',
                            'Não foi possível excluir o usuário.',
                            'error'
                        );
                    });
            }
        });
    }
</script> --}}
@endsection
