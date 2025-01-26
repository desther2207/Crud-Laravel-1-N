@extends('plantillas.principal')
@section('titulo')
    Productos
@endsection
@section('cabecera')
    Listado de productos
@endsection
@section('contenido')

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-16 py-3">
                    Image
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Descripcion
                </th>
                <th scope="col" class="px-6 py-3">
                    Categoria
                </th>
                <th scope="col" class="px-6 py-3">
                    Stock
                </th>
                <th scope="col" class="px-6 py-3">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>

            <div class="flex flex-row-reverse">
                <a href="{{route('products.create')}}" class="px-2 bg-blue-500 hover:bg-blue-700">
                    <i class="fas fa-add text-white"></i>
                    Nuevo
                </a>
            </div>

            @foreach ($products as $item)

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="p-4">
                    <img src="{{Storage::url($item->imagen)}}" class="w-16 md:w-32 max-w-full max-h-full" alt="{{$item->nombre}}">
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    {{$item->nombre}}
                </td>
                <td class="px-6 py-4">
                    {{$item->descripcion}}
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    <div class="m-2 rounded-xl" style="background-color: {{$item->category->color}};">
                        {{$item->category->nombre}}
                    </div>
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    {{$item->stock}}
                </td>
                <td class="px-6 py-4">
                    <form action="{{route('products.destroy', $item)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('products.edit', $item)}}">
                            <i class="fas fa-edit text-blue-500"></i>
                        </a>
                        <button type="submit">
                            <i class="fas fa-trash text-red-500"></i>
                        </button>
                    </form>
                </td>
            </tr>                
            @endforeach
        </tbody>
    </table>
</div>
<div>
    {{$products->links()}}
</div>

@endsection