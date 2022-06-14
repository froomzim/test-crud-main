@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header col-12">Produtos
                </div>


                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="row">
                        <div class="d-flex flex-row col-6">
                            <a type="button" class="btn btn-primary" href="{{ route('home') }}"><i class="bi bi-arrow-counterclockwise"></i> Voltar</a>
                        </div>

                        <div class="d-flex flex-row-reverse col-6">
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#newCategory">
                                <i class="bi bi-plus-lg"></i> Nova Categoria
                            </button>
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="block-content block-content-full">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-sm table-striped table-hover js-dataTable-full">
                                    <thead>
                                        <tr>
                                            <th>Categoria</th>
                                            <th class="text-center no-sort" style="width: 30px">
                                                <i class="bi bi-gear"></i>
                                            </th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                <form action="{{ route('categorias.destroy', $category->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <div class="btn-group">
                                                        <a href="{{ route('categorias.edit', $category->id) }}"
                                                            class="btn btn-sm btn-secondary edit-category"
                                                            data-toggle="tooltip" title="Editar">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </a>

                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger excluir-categoria"
                                                            data-toggle="tooltip" title="Deletar">
                                                            <i class="bi bi-eraser-fill"></i>
                                                        </button>
                                                    </div>

                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach

                                        {{-- MODAL STORE CATEGORY --}}
                                        <div class="modal fade" id="newCategory" tabindex="-1" role="dialog"
                                            aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Nova Categoria</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('categorias.store') }}" method="POST">
                                                            @csrf
                                                            <div class="form-row">
                                                                <div class="col-md-12">
                                                                    <div class="form-material">
                                                                        <label>Nome</label>
                                                                        <input type="text" class="form-control"
                                                                            name="name" autofocus
                                                                            placeholder="Informe o nome da sua categoria" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <div class="col-sm-12 text-right">
                                                            <button type="button" class="btn btn-warning"
                                                                data-dismiss="modal">
                                                                <i class="bi bi-arrow-counterclockwise"></i>
                                                                Cancelar</button>
                                                            <button type="submit" class="btn btn-success">
                                                                <i class="bi bi-check"></i> Salvar</button>
                                                        </div>
                                                    </div>


                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- MODAL EDIT CATEGORY --}}
                                        <div class="modal fade" id="editCategory" tabindex="-1" role="dialog"
                                            aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Editar Categoria</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('categorias.update', 99999) }}"
                                                            method="POST" id="form_edit_category">
                                                            @csrf
                                                            @method('put')
                                                            <div class="form-row">
                                                                <div class="col-md-12">
                                                                    <div class="form-material">
                                                                        <label>Nome</label>
                                                                        <input type="text" class="form-control"
                                                                            name="name"
                                                                            placeholder="Informe o nome da sua categoria" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <div class="col-sm-12 text-right">
                                                            <button type="button" class="btn btn-warning"
                                                                data-dismiss="modal">
                                                                <i class="bi bi-arrow-counterclockwise"></i>
                                                                Cancelar</button>
                                                            <button type="submit" class="btn btn-success">
                                                                <i class="bi bi-check"></i> Salvar</button>
                                                        </div>
                                                    </div>

                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                            </div>
                        </div>
                        </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>

<script>
    $('.edit-category').click(function (e) {
        e.preventDefault();
        let url = $(this).attr('href');
        $.get(url, function (response) {
            var rota = $('#form_edit_category').attr('action');
            rota = rota.replace('99999', response.id);
            $('#form_edit_category').attr('action', rota);
            $('[name="name"]').val(response.name);
            $("#editCategory").modal('show');
        });
    });

</script>
@endsection
