@csrf
@include('admin.includes.alerts')

<div class="form-group">
    <label for="exampleFormControlInput1">Nome</label>
    <input type="text" class="form-control" name="name" placeholder="Digite o nome" value="{{ $product->name ?? old('name') }}">
</div>

<div class="form-group">
    <label for="exampleFormControlInput1">Descrição</label>
    <input type="text" class="form-control" name="description" placeholder="Digite a descrição" value="{{ $product->description ?? old('description') }}">
</div>

<div class="form-group">
    <label for="exampleFormControlInput1">Preço</label>
    <input type="text" class="form-control" name="price" placeholder="Digite o preço" value="{{ $product->price ?? old('price') }}">
</div>

<div class="form-group">
    <label for="exampleFormControlFile1">Selecione uma foto</label>
    <input type="file" class="form-control-file" name="image">
</div>

<div style="text-align: right;">
    <button type="submit" class="btn btn-success text-right">Salvar</button>
</div>