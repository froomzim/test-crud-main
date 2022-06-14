@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header col-12">Produtos
                </div>


                <div class="card-body">

                    <x-alert/>

                    <div class="row">
                        <div class="col-8">
                        <form action="" class="form-inline">
                            <select name="category" class="form-control">
                                <option value="0">Todas as Categorias</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == session('selected_category') ? 'selected' : '' }}>{{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-secondary">
                                <i class="bi bi-funnel"></i>
                            </button>
                        </form>
                        </div>
                        <div class="d-flex flex-row-reverse col-2">
                            <a type="button" class="btn btn-primary" href="{{ route('home') }}"><i class="bi bi-arrow-counterclockwise"></i> Voltar</a>
                        </div>

                        <div class="d-flex flex-row-reverse col-2">
                            <a href="{{ route('produtos.create') }}" type="button" class="btn btn-success">
                                <i class="bi bi-plus-lg"></i> Novo Produto
                            </a>
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="block-content block-content-full">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-sm table-striped table-hover js-dataTable-full">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nome</th>
                                            <th>Categoria</th>
                                            <th>Estoque</th>
                                            <th>Situação</th>
                                            <th class="text-center no-sort" style="width: 30px">
                                                <i class="bi bi-gear"></i>
                                            </th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>{{ $product->inventory }}</td>
                                            <td>{{ $product->situation == 1 ? 'Ativo' : 'Inativo' }}</td>
                                            <td>
                                                <form action="{{ route('produtos.destroy', $product->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <div class="btn-group">
                                                        <a href="{{ route('produtos.edit', $product->id) }}"
                                                            class="btn btn-sm btn-secondary"
                                                            data-toggle="tooltip" title="Editar">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </a>

                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger delete-product"
                                                            data-toggle="tooltip" title="Deletar">
                                                            <i class="bi bi-eraser-fill"></i>
                                                        </button>
                                                    </div>

                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach

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

@endsection
