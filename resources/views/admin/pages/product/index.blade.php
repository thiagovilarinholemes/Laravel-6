@extends('admin.layouts.app')

@section('title', 'Produtos')

@section('content')

    <nav class="navbar">
        <p class="logo">Produtos</p>  
    </nav>
    <div class="container">

    <div class="btn-group mt-2" role="group" aria-label="Basic example">
        <a class="btn btn-primary" href="{{ route('product.create') }}" role="button">Cadastrar Novo Produto</a>
        <a class="btn btn-primary" href="{{ route('home') }}" role="button">Retornar a página inicial</a>
    </div>

    <br><br>

    <div>
        <form method="POST" action="{{ route('product.search') }}" class="form-inline">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="filter" placeholder="Pesquisar produto..." value="{{ $filters['filter'] ?? ''}}">                
            </div>
            <button type="submit" class="btn btn-info ml-1">Pesquisar</button>
        </form>
    </div>

    <hr>

    @if ($products == null)
        <div class="alert alert-warning mt-5 ml-5 mr-5" role="alert">
            Nenhum produto encontrado
        </div>
    @else
    <table border="1" class="table table-striped mt-5">
        <thead>
            <tr>
                <th>Imagem</th>    
                <th>Nome</th>                
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>
                        @if ($product->image)
                            <img src="{{ url("storage/{$product->image}") }}" alt="{{ $product->name }}"  width="100px">
                        @else
                            Sem Imagem
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a href="{{ route('product.show', $product->id) }}">Detalhes</a>
                        <a href="{{ route('product.edit', $product->id) }}">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>   

    <div class="row ml-2">        
        @if (isset($filters))
            {!! $products->appends($filters)->links() !!}
        @else
            {!! $products->links() !!}
        @endif
    </div>
    @endif

    </div>
@endsection