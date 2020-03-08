@extends('admin.layouts.app')

@section('title', 'Cadastrar novo produto')

@section('content')

    <nav class="navbar">
        <p class="logo">Cadastrar Novo Produto</p>  
    </nav>

    <div class="container">
        <div class="btn-group mt-2" role="group" aria-label="Basic example">
            <a class="btn btn-primary" href="{{ route('home') }}" role="button">Retornar a página inicial</a>
        </div>
    
        <hr>
    
        <form class="form-group mt-5" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @include('admin.pages.product._partisls.form')
        </form>
    </div>
    
@endsection