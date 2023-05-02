@extends('layouts.app')

@section('content')
    <h1>SECCION PRODUCTO</h1>
    <h2>Crea un nuevo Producto:</h2>
    <form method="POST" action="{{ route('products.storeProduct') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title_es">Titulo en español</label>
            <input type="text" class="form-control @error('title_es') is-invalid @enderror" id="title_es" name="title_es">
            @error('title_es')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="title_en">Titulo en ingles</label>
            <input type="text" class="form-control @error('title_en') is-invalid @enderror" id="title_en" name="title_en">
            @error('title_en')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="shortDescription_es">Pequeña Descripciòn en español</label>
            <textarea class="form-control @error('shortDescription_es') is-invalid @enderror" id="shortDescription_es" name="shortDescription_es"></textarea>
            @error('shortDescription_es')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="shortDescription_en">Pequeña Descripciòn en ingles</label>
            <textarea class="form-control @error('shortDescription_en') is-invalid @enderror" id="shortDescription_en" name="shortDescription_en"></textarea>
            @error('shortDescription_en')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="description_es">Descripciòn en español</label>
            <textarea class="form-control @error('description_es') is-invalid @enderror" id="description_es" name="description_es"></textarea>
            @error('description_es')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="description_en">Descripciòn en ingles</label>
            <textarea class="form-control @error('description_en') is-invalid @enderror" id="description_en" name="description_en"></textarea>
            @error('description_en')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="imageUrl">Imagen de la noticia</label>
            <input type="file" class="form-control @error('imageUrl') is-invalid @enderror" id="imageUrl" name="imageUrl">
            @error('imageUrl')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="d-flex justify-content-center my-4">
          <button type="submit" class="btn btn-primary w-auto">Crear</button>
        </div>
    </form>
    <h2>Productos:</h2>
    @foreach ($products as $product)
    <h3>Product Numero: {{ $product->id }}</h3>
    <form method="POST" action="{{ route('products.updateProduct', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title_es">Titulo en español</label>
            <input type="text" class="form-control @error('title_es') is-invalid @enderror" id="title_es" name="title_es" value="{{ old('title_es', $product->title_es) }}">
            @error('title_es')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="title_en">Titulo en ingles</label>
            <input type="text" class="form-control @error('title_en') is-invalid @enderror" id="title_en" name="title_en" value="{{ old('title_en', $product->title_en) }}">
            @error('title_en')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="shortDescription_es">Pequeña Descripciòn en español</label>
            <textarea class="form-control @error('shortDescription_es') is-invalid @enderror" id="shortDescription_es" name="shortDescription_es">
             {{ old('shortDescription_es', $product->shortDescription_es) }}
            </textarea>
            @error('shortDescription_es')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="shortDescription_en">Pequeña Descripciòn en ingles</label>
            <textarea class="form-control @error('shortDescription_en') is-invalid @enderror" id="shortDescription_en" name="shortDescription_en">
             {{ old('shortDescription_en', $product->shortDescription_en) }}
            </textarea>
            @error('shortDescription_en')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="description_es">Descripciòn en español</label>
            <textarea class="form-control @error('description_es') is-invalid @enderror" id="description_es" name="description_es">
             {{ old('description_es', $product->description_es) }}
            </textarea>
            @error('description_es')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="description_en">Descripciòn en ingles</label>
            <textarea class="form-control @error('description_en') is-invalid @enderror" id="description_en" name="description_en">
             {{ old('description_en', $product->description_en) }}
            </textarea>
            @error('description_en')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="imageUrl">Imagen de la noticia</label>
            <input type="file" class="form-control @error('imageUrl') is-invalid @enderror" id="imageUrl" name="imageUrl">
            @error('imageUrl')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="d-flex justify-content-center my-4">
          <button type="submit" class="btn btn-primary w-auto">Actualizar</button>
        </div>
    </form>
    <form action="{{ route('products.deleteProduct', $product->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="d-flex justify-content-center my-4">
          <button type="submit" class="btn btn-danger w-auto">Borrar</button>
        </div>
    </form>
    @endforeach
@endsection
