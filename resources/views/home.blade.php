@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="d-flex flex-row col-6">

                            <a href="{{ route('produtos.index') }}" class="btn btn-primary">
                                <i class="bi bi-bag"></i> Cadastro de Produtos
                            </a>
                        </div>
                        <div class="d-flex flex-row-reverse col-6">

                            <a href="{{ route('categorias.index') }}" class="btn btn-primary">
                                <i class="bi bi-tags"></i> Cadastro de Categorias
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
