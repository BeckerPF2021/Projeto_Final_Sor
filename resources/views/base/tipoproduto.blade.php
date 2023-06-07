@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tipo de Produtos') }}</div>
                <!-- <td><img src="{{ asset('images/tipoproduto.jpg') }}" alt="Imagem do produto" style="width: 100px; height: 80px;"></td> -->
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
                                <th scope="col">Descrição</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($tipoproduto))  {{-- Caso não encontre nenhum usuário --}}
                                @foreach ($tipoproduto as $tipoproduto)
                                <tr>
                                    <th scope="row">{{ $tipoproduto->CodTipo }}</th>
                                    <td>{{ $tipoproduto->Descricao }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#updateUserModal{{ $tipoproduto->id }}">Editar</button>
                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteUser({{ $tipoproduto->id }}, '{{ $tipoproduto->name }}')">Excluir</button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="updateUserModal{{ $tipoproduto->id }}" tabindex="-1" role="dialog" aria-labelledby="updateUserModalLabel{{ $tipoproduto->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updateUserModalLabel{{ $tipoproduto->id }}">Atualizar Usuário</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ url('/colaboradores/'.$tipoproduto->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="CodTipo">Tipo:</label>
                                                        <input type="text" class="form-control" name="CodTipo" value="{{ $tipoproduto->CodTipo }}" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Descricao">Descricão:</label>
                                                        <input type="text" class="form-control" name="Descricao" value="{{ $tipoproduto->Descricao }}" required>
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
