@extends('admin.layouts.app')

@section('title', 'Curso de Laravel 6')

@section('content')

    <nav class="navbar">
        <p class="logo">Curso de Laravel 6</p>  
    </nav>

    <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('product.index') }}">Exibir Produtos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('product.create') }}">Cadastrar Novo Produto</a>
        </li>
    </ul>

    <br>

    <div class="text-center">
        <img src="{{asset('assets/images/laravel.png')}}" alt="laravel" width="28%">
    </div>
        
        

    </div>    
    
    
@endsection
