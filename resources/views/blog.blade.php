@extends('layouts.app')

@section('content')
    <h1>SECCION BLOG</h1>
    <h2>Crea un nuevo Blog:</h2>
    <form method="POST" action="{{ route('blogs.storeBlog') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="is_important">Quieres que salga en la pagina principal?</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="isImportant" id="is_important_true" value="1" {{ old('isImportant') == '1' ? 'checked' : '' }}>
                <label class="form-check-label" for="is_important_true">Si</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="isImportant" id="is_important_false" value="0" {{ old('isImportant') == '0' ? 'checked' : '' }}>
                <label class="form-check-label" for="is_important_false">No</label>
            </div>
            @error('isImportant')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
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
            <label for="subTitle_es">Subtitulo en español</label>
            <textarea class="form-control @error('subTitle_es') is-invalid @enderror" id="subTitle_es" name="subTitle_es"></textarea>
            @error('subTitle_es')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="subTitle_en">Subtitulo en ingles</label>
            <textarea class="form-control @error('subTitle_en') is-invalid @enderror" id="subTitle_en" name="subTitle_en"></textarea>
            @error('subTitle_en')
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
            <label for="bulletpoints_es">Bullet Points en español  (separados por comas)</label>
            <input type="text" class="form-control @error('bulletpoints_es') is-invalid @enderror" id="bulletpoints_es" name="bulletpoints_es">
            @error('bulletpoints_es')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="bulletpoints_es">Bullet Points en ingles  (separados por comas)</label>
            <input type="text" class="form-control @error('bulletpoints_en') is-invalid @enderror" id="bulletpoints_en" name="bulletpoints_en">
            @error('bulletpoints_en')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="image1">Imagen de la noticia Numero 1</label>
            <input type="file" class="form-control @error('image1') is-invalid @enderror" id="image1" name="image1" >
            @error('image1')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="image2">Imagen de la noticia Numero 2</label>
            <input type="file" class="form-control @error('image2') is-invalid @enderror" id="image2" name="image2" >
            @error('image2')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="image3">Imagen de la noticia Numero 3</label>
            <input type="file" class="form-control @error('image3') is-invalid @enderror" id="image3" name="image3" >
            @error('image3')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="image4">Imagen de la noticia Numero 4</label>
            <input type="file" class="form-control @error('image4') is-invalid @enderror" id="image4" name="image4" >
            @error('image4')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="d-flex justify-content-center my-4">
          <button type="submit" class="btn btn-primary w-auto">Crear</button>
        </div>
    </form>
    <h2>Blogs:</h2>
    @foreach ($blogs as $blog)
    <h3>Product Numero: {{ $blog->id }}</h3>
    <form method="POST" action="{{ route('blogs.updateBlog', $blog->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="is_important">Quieres que salga en la pagina principal?</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="isImportant" id="is_important_true" value="1" {{ $blog->isImportant ? 'checked' : '' }}>
                <label class="form-check-label" for="is_important_true">Si</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="isImportant" id="is_important_false" value="0" {{ !$blog->isImportant ? 'checked' : '' }}>
                <label class="form-check-label" for="is_important_false">No</label>
            </div>
            @error('is_important')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="title_es">Titulo en español</label>
            <input type="text" class="form-control @error('title_es') is-invalid @enderror" id="title_es" name="title_es" value="{{ old('title_es', $blog->title_es) }}">
            @error('title_es')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="title_en">Titulo en ingles</label>
            <input type="text" class="form-control @error('title_en') is-invalid @enderror" id="title_en" name="title_en" value="{{ old('title_en', $blog->title_en) }}">
            @error('title_en')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="subTitle_es">Subtitulo en español</label>
            <textarea class="form-control @error('subTitle_es') is-invalid @enderror" id="subTitle_es" name="subTitle_es">{{ old('subTitle_es', $blog->subTitle_es) }}</textarea>
            @error('subTitle_es')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="subTitle_en">Subtitulo en ingles</label>
            <textarea class="form-control @error('subTitle_en') is-invalid @enderror" id="subTitle_en" name="subTitle_en">{{ old('subTitle_en', $blog->subTitle_en) }}</textarea>
            @error('subTitle_en')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="description_es">Descripciòn en español</label>
            <textarea class="form-control @error('description_es') is-invalid @enderror" id="description_es" name="description_es">{{ old('description_es', $blog->description_es) }}</textarea>
            @error('description_es')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="description_en">Descripciòn en ingles</label>
            <textarea class="form-control @error('description_en') is-invalid @enderror" id="description_en" name="description_en">{{ old('description_en', $blog->description_en) }}</textarea>
            @error('description_en')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="bulletpoints_es">Bullet Points en español  (separados por comas)</label>
            <input type="text" class="form-control @error('bulletpoints_es') is-invalid @enderror" id="bulletpoints_es" name="bulletpoints_es"
            value="{{ old('bulletpoints_es', implode(',', json_decode($blog->bulletpoints_es))) }}"
        >
            @error('bulletpoints_es')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="bulletpoints_en">Bullet Points en ingles (separados por comas)</label>
            <input type="text" class="form-control @error('bulletpoints_en') is-invalid @enderror" id="bulletpoints_en" name="bulletpoints_en"
            value="{{ old('bulletpoints_en', implode(',', json_decode($blog->bulletpoints_en))) }}"
        >
            @error('bulletpoints_en')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="image1">Imagen de la noticia Numero 1</label>
            <input type="file" class="form-control @error('image1') is-invalid @enderror" id="image1" name="image1" >
            @error('image1')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="image2">Imagen de la noticia Numero 2</label>
            <input type="file" class="form-control @error('image2') is-invalid @enderror" id="image2" name="image2" >
            @error('image2')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="image3">Imagen de la noticia Numero 3</label>
            <input type="file" class="form-control @error('image3') is-invalid @enderror" id="image3" name="image3" >
            @error('image3')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="image4">Imagen de la noticia Numero 4</label>
            <input type="file" class="form-control @error('image4') is-invalid @enderror" id="image4" name="image4" >
            @error('image4')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="d-flex justify-content-center my-4">
          <button type="submit" class="btn btn-primary w-auto">Actualizar</button>
        </div>
    </form>
    <form action="{{ route('blogs.deleteBlog', $blog->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="d-flex justify-content-center my-4">
          <button type="submit" class="btn btn-danger w-auto">Borrar</button>
        </div>
    </form>
    @endforeach
@endsection
