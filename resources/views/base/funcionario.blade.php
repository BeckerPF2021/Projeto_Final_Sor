@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Lista de Funcionarios') }}</div>
                <!-- <td><img src="{{ asset('images/funcionarios.png') }}" alt="Imagem do produto" style="width: 100px; height: 80px;"></td> -->
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
                                <th scope="col">Cargo</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($funcionario))  {{-- Caso não encontre nenhum usuário --}}
                                @foreach ($funcionario as $funcionario)
                                <tr>
                                    <th scope="row">{{ $funcionario->id }}</th>
                                    <td>{{ $funcionario->Nome }}</td> 
                                    <td>{{ $funcionario->Cargo }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#updateUserModal{{ $funcionario->id }}">Editar</button>
                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteUser({{ $funcionario->id }}, '{{ $funcionario->name }}')">Excluir</button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="updateUserModal{{ $funcionario->id }}" tabindex="-1" role="dialog" aria-labelledby="updateUserModalLabel{{ $funcionario->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updateUserModalLabel{{ $funcionario->id }}">Atualizar funcionario</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ url('/funcionario/'.$funcionario->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="id">Codigo:</label>
                                                        <input type="text" class="form-control" name="id" value="{{ $funcionario->id }}" required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Nome">Nome:</label>
                                                        <input type="text" class="form-control" name="Nome" value="{{ $funcionario->Nome }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Senha">Senha:</label>
                                                        <input type="password" class="form-control" name="Senha" value="{{ $funcionario->Senha }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Cargo">Cargo:</label>
                                                        <input type="text" class="form-control" name="Cargo" value="{{ $funcionario->Cargo }}" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" id="atualizar_funcionario" class="btn btn-primary">Atualizar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </tbody>
                                <div class="modal fade" id="inserirUserModal" tabindex="-1" role="dialog" aria-labelledby="inserirUserModal" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="inserirUserModal">Cadastrar funcionario</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </table>
                    <form method="POST" action="{{ url('/funcionario') }}">
                                                    @csrf
                                                    @method('POST')
                                                    <div class="form-group">
                                                        <label for="id">Codigo:</label>
                                                        <input type="text" class="form-control" name="id" value="" required >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Nome">Nome:</label>
                                                        <input type="text" class="form-control" name="Nome" value="" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Senha">Senha:</label>
                                                        <input type="password" class="form-control" name="Senha" value="" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Cargo">Cargo:</label>
                                                        <input type="text" class="form-control" name="Cargo" value="" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" id="inserir_funcionario" class="btn btn-primary">Cadastrar</button>
                                                    </div>
                                                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/funcionario.js') }}"></script>
{{-- A função asset() é uma função do Laravel que gera uma URL completa para um arquivo localizado em sua pasta public --}}

{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
@endsection
