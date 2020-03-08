@extends('admin.layouts.app')

@section('title', 'Editar Produto')

@section('content')
    
<nav class="navbar">
    <p class="logo">Editar Produto {!! $product->name !!}</p>  
</nav>

<div class="container">
    <div class="btn-group mt-2" role="group" aria-label="Basic example">
        <a class="btn btn-primary" href="{{ route('product.index') }}" role="button">Voltar</a>
    </div>

    <hr>
    
    <form class="form-group mt-5" action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.pages.product._partisls.form')

    </form>
</div>
@endsection