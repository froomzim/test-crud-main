@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header col-12">Produtos - Novo
                </div>


                <div class="card-body">
                    <x-alert/>


                    <form action="{{ route('produtos.store') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <div class="col-12">
                                <span class="badge badge-secondary w-100">Dados Básicos</span>
                            </div>

                            <div class="col-md-2">
                                <div class="form-material">
                                    <label>Status</label>
                                    <select name="situation" class="form-control">
                                        <option value="">Selecione ...</option>
                                        <option value="1" {{ old('ativo') ? ( old('ativo') == '1' ? 'selected' : '' ) : 'selected' }}>Ativo</option>
                                        <option value="0" {{ old('ativo') == '0' ? 'selected' : '' }}>Inativo</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="form-material">
                                    <label>Nome</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-material">
                                    <label>Descrição</label>
                                    <input type="text" class="form-control" name="description" value="{{ old('description') }}" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-material">
                                    <label id="ie">Categoria</label>
                                    <select name="category_id" class="form-control" id="categories" required>
                                        <option value="">Selecione ...</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 mt-10">
                                <span class="badge badge-secondary w-100">Estoque e Venda</span>
                            </div>


                            <div class="col-md-4">
                                <label for="buy_price">Preço de Compra</label>
                                <div class="form-material input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">R$</span>
                                    </div>
                                    <input type="number" step="0.01" min="0" class="form-control text-right" name="buy_price"
                                        value="{{ old('buy_price') }}" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label>Preço de Venda</label>
                                <div class="form-material input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">R$</span>
                                    </div>
                                    <input type="number" step="0.01" min="0" class="form-control text-right" name="sell_price"
                                        value="{{ old('sell_price') }}" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-material">
                                    <label>Estoque</label>
                                    <input type="number" step="1" min="0" class="form-control text-right" name="inventory"
                                        value="{{ old('inventory') ? old('inventory') : '1' }}" required>
                                </div>
                            </div>




                        </div>

                        <hr>

                        <div class=" form-group row">
                            <div class="col-6 text-left">
                                <a href="{{ route('produtos.index') }}" class="btn btn-primary">
                                    <i class="bi bi-arrow-counterclockwise"></i> Voltar
                                </a>
                            </div>
                            <div class="col-6 text-right">
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-check"></i> Salvar
                                </button>
                            </div>
                        </div>

                    </form>
                </div>



            </div>
        </div>
    </div>
</div>
</div>
</div>

@endsection
