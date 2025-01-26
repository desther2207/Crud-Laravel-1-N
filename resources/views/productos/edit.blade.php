@extends('plantillas.principal')
@section('titulo')
Productos
@endsection
@section('cabecera')
Editar producto
@endsection
@section('contenido')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario Tailwind + Font Awesome</title>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
  <div class="bg-white shadow-lg rounded-lg mx-auto w-1/2 p-4">
    <h1 class="text-2xl font-bold text-gray-700 mb-6 flex items-center">
      <i class="fas fa-paint-brush text-blue-500 mr-3"></i>Editar producto
    </h1>
    <form action="{{route('products.update', $product)}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <!-- Input de texto -->
      <div class="mb-4">
        <label for="color-texto" class="block text-gray-600 font-medium mb-2">
          <i class="fas fa-font text-gray-500"></i> Titulo del producto
        </label>
        <input
          type="text"
          id="nombre"
          value="{{@old('nombre', $product->nombre)}}"
          name="nombre"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"
          placeholder="Nombre...">
      </div>
      <x-error for="nombre" />

      <div class="mb-4">
        <label for="color-texto" class="block text-gray-600 font-medium mb-2">
          <i class="fas fa-font text-gray-500"></i> Descripción del producto
        </label>
        <input
          type="text"
          id="descripcion"
          value="{{@old('descripcion', $product->descripcion)}}"
          name="descripcion"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"
          placeholder="Descripcion...">
      </div>
      <x-error for="descripcion" />

      <!-- Categoría y Stock en una fila -->
      <div class="flex space-x-4 mb-4">
        <div class="w-1/2">
          <label for="category_id" class="block text-sm font-medium text-gray-700">
            <i class="fas fa-font text-gray-500"></i> Categoría
          </label>
          <select id="category_id" name="category_id" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
            <option value="">Seleccione una categoría</option>
            @foreach ($categorias as $categoria)
            <option value="{{$categoria->id}}" @selected(old('category_id', $product->category_id)==$categoria->id)>{{$categoria->nombre}}</option>
            @endforeach
          </select>
        </div>

        <div class="w-1/2">
          <label for="stock" class="block text-gray-600 font-medium mb-2">
            <i class="fas fa-font text-gray-500"></i> Stock
          </label>
          <input
            type="number"
            id="stock"
            value="{{@old('stock', $product->stock)}}"
            name="stock"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"
            placeholder="Stock...">
        </div>
      </div>
      <x-error for="category_id" />
      <x-error for="stock" />

      <div class="mb-4">
        <label for="imagen" class="block text-sm font-medium text-gray-700">
          <i class="fas fa-image text-gray-500"></i> Subir Imagen
        </label>
        <div class="mt-2">
          <input
            type="file"
            id="imagen"
            name="imagen"
            class="p-2 block w-full border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
            accept="image/*"
            oninput="preview.src=window.URL.createObjectURL(this.files[0])">
        </div>
        <div class="mt-4 flex justify-center">
          <img
            id="preview"
            src="{{Storage::url($product->imagen)}}"
            alt="Vista previa"
            class="w-48 h-48 object-cover border border-gray-300 rounded-lg shadow-md">
        </div>
      </div>
      <x-error for="imagen" />

      <!-- Botones -->
      <div class="flex justify-between">
        <!-- Botón Home -->
        <a
          href="{{route('products.index')}}"
          class="flex items-center px-4 py-2 bg-blue-500 text-white font-medium rounded-lg shadow hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 focus:outline-none">
          <i class="fas fa-home mr-2"></i> Home
        </a>
        <!-- Botón Reset -->
        <button
          type="reset"
          class="flex items-center px-4 py-2 bg-gray-400 text-white font-medium rounded-lg shadow hover:bg-gray-500 focus:ring-2 focus:ring-gray-300 focus:outline-none">
          <i class="fas fa-undo-alt mr-2"></i> Reset
        </button>
        <!-- Botón Submit -->
        <button
          type="submit"
          class="flex items-center px-4 py-2 bg-green-500 text-white font-medium rounded-lg shadow hover:bg-green-600 focus:ring-2 focus:ring-green-400 focus:outline-none">
          <i class="fas fa-paper-plane mr-2"></i> Enviar
        </button>
      </div>
    </form>
  </div>
</body>

</html>

@endsection