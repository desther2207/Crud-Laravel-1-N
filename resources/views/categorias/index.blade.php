@extends('plantillas.principal')
@section('titulo')
    Categorias
@endsection
@section('cabecera')
    Listado de categorias
@endsection
@section('contenido')
    
@endsection
@section('alertas')


<div class="mx-auto w-1/2 p-4">
    <div class="flex flex-row-reverse">
        <a href="{{route('categories.create')}}" class="px-2 bg-blue-500 hover:bg-blue-700">
            <i class="fas fa-add text-white"></i>
            Nueva
        </a>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Color
                </th>
                <th scope="col" class="px-6 py-3">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $item)
                
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-white-900 whitespace-nowrap dark:text-white">
                    {{$item->nombre}}
                </th>
                <td class="px-6 py-4 font-medium text-white-900 whitespace-nowrap dark:text-white" style="background-color: {{$item->color}};">
                    {{$item->color}}
                </td>
                <td class="px-6 py-4">
                    <form action="{{route('categories.destroy', $item)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('categories.edit', $item)}}">
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
   
@endsection

@section('alertas')
<x-alertas/>
@endsection