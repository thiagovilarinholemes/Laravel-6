<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Para retirar o Produt:: e substituir para  $this->repository->
    private $repository;

    private $request;

    public function __construct(Product $product, Request $request){
        $this->repository = $product;
        $this->request = $request;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->repository->paginate();
        return view('admin.pages.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return App\Http\Requests\StoreUpdateProductRequest  $request
     */
    public function create()
    {
        
        return view('admin.pages.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductRequest $request)
    {
        $data = $request->only('name', 'description', 'price');

        // Upload de Imagem 
        if($request->hasFile('image') && $request->image->isValid()){

            // Salvando imagem e passando o caminho da imagem
            $imagePath = $request->image->store('products');

            // Passando o nome da imagem para armazenar no banco
            $data['image'] =  $imagePath;
        }

        $this->repository->create($data);
        return redirect()->route('product.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->repository->find($id);
        if(!$product){
            return redirect()->back();
        }
        return view('admin.pages.product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->repository->find($id);
        if(!$product){
            return redirect()->back();
        }
        return view('admin.pages.product.edit', ['product' => $product]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdateProductRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProductRequest $request, $id)
    {
        
        $product = $this->repository->find($id);
        if(!$product){
            return redirect()->back();
        }

        $data = $request->all();

        // Upload de Imagem 
        if($request->hasFile('image') && $request->image->isValid()){

            /** Verifica se o arquivo existe */
            if($product->image && Storage::exists($product->image)){
                /** Deleta o arquivo */
                Storage::delete($product->image);
            }
            // Salvando imagem e passando o caminho da imagem
            $imagePath = $request->image->store('products');

            // Passando o nome da imagem para armazenar no banco
            $data['image'] =  $imagePath;
        }

        $product->update($data);
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->repository->all()->where('id', $id)->first();
        if(!$product){
            return redirect()->back();
        }

        /** Verifica se o arquivo existe */
        if($product->image && Storage::exists($product->image)){
            /** Deleta o arquivo */
            Storage::delete($product->image);
        }

        $product->delete();
        return redirect()->route('product.index');
    }

    /**
     * Method Search
     */
    public function search(Request $request)
    {
        $filters = $this->request->except('_token');
        $products = $this->repository->search($request->filter);

        return view('admin.pages.product.index', [
            'products' => $products,
            'filters' => $filters
        ]);
    }
}
