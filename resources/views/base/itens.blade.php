@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Quantidade de Itens') }}</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Número do Pedido</th>
                                <th scope="col">Codigo do Produto</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($itens))  {{-- Caso não encontre nenhum usuário --}}
                                @foreach ($itens as $itens)
                                <tr>
                                    <th scope="row">{{ $itens->fk_Pedido_NumPedido }}</th>
                                    <td>{{ $itens->fk_Produto_CodProduto }}</td>
                                    <td>{{ $itens->Qtd }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#updateUserModal{{ $itens->id }}">Editar</button>
                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteUser({{ $itens->id }}, '{{ $itens->name }}')">Excluir</button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="updateUserModal{{ $itens->id }}" tabindex="-1" role="dialog" aria-labelledby="updateUserModalLabel{{ $itens->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updateUserModalLabel{{ $itens->id }}">Atualizar Usuário</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ url('/colaboradores/'.$itens->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="fk_Pedido_NumPedido">Numero do Pedido:</label>
                                                        <input type="text" class="form-control" name="fk_Pedido_NumPedido" value="{{ $itens->fk_Pedido_NumPedido }}" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fk_Produto_CodProduto">Código do Produto:</label>
                                                        <input type="text" class="form-control" name="fk_Produto_CodProduto" value="{{ $itens->fk_Produto_CodProduto }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Qtd">Quantidade:</label>
                                                        <input type="text" class="form-control" name="Qtd" value="{{ $itens->Qtd }}" required>
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
