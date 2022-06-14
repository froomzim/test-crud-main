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
                        <div class="col-6">

                            <a href="{{ route('produtos.index') }}" class="btn btn-primary">
                                <i class="bi bi-plus-lg"></i> Cadastro de Produtos
                            </a>
                        </div>
                        <div class="col-6">

                            <a href="{{ route('categorias.index') }}" class="btn btn-primary">
                                <i class="bi bi-plus-lg"></i> Cadastro de Categorias
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
