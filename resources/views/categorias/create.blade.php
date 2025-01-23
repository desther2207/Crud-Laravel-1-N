@extends('plantillas.principal')
@section('titulo')
    Categorias
@endsection
@section('cabecera')
    Listado de categorias
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
      <i class="fas fa-paint-brush text-blue-500 mr-3"></i>Nueva categoria
    </h1>
    <form action="{{route('categories.store')}}" method="POST">
        @csrf
      <!-- Input de texto -->
      <div class="mb-4">
        <label for="color-texto" class="block text-gray-600 font-medium mb-2">
          <i class="fas fa-font text-gray-500"></i> Nombre de la categoria
        </label>
        <input 
          type="text" 
          id="nombre" 
          value="{{@old('nombre')}}"
          name="nombre" 
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none" 
          placeholder="Ejemplo: Azul">
      </div>

      <x-error for="nombre"/>

      <!-- Input tipo color -->
      <div class="mb-6">
        <label for="color-picker" class="block text-gray-600 font-medium mb-2">
          <i class="fas fa-palette text-gray-500"></i> Selecciona un color
        </label>
        <input 
          type="color" 
          id="color" 
          name="color"
          value="{{@old('color')}}" 
          class="w-full h-10 cursor-pointer rounded-lg border border-gray-300">
      </div>

      <x-error for="color"/>

      <!-- Botones -->
      <div class="flex justify-between">
        <!-- Botón Home -->
        <a 
          href="{{route('categories.index')}}" 
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
@section('alertas')