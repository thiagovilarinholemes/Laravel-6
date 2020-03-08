@extends('admin.layouts.card_product')

@section('navbar')
  <nav class="navbar">
    <p class="logo">{!! $product->name !!}</p>  
  </nav>

  <div class="btn-group mt-2 ml-2" role="group" aria-label="Basic example">
    <a class="btn btn-primary" href="{{ route('product.index') }}" role="button">Voltar</a>
  </div>
@endsection

@section('content')

  <div class="card" style="width: 18rem;">
    <img src="{{ url("storage/{$product->image}") }}" class="card-img-top" alt="{{ $product->name }}"  width="28%">
    <div class="card-body">
      <h5 class="card-title">{!! $product->name !!}</h5>
      <p class="card-text">{!! $product->description !!}</p>
      <form action="{{ route('product.destroy', $product->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Deletar o produto {{ $product->name }}</button>
        </form>
    </div>
  </div>
@endsection
