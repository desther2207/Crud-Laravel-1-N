<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('nombre', 'desc')->paginate(10);
        return view('productos.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Category::orderBy('nombre')->get();

        return view('productos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate($this->rules());
        $datos['imagen'] = ($request->imagen) ? $request->imagen->store('images/products/') : 'images/products/noimage.png';
        Product::create($datos);
        return redirect()->route('products.index')->with('message', "Producto creado");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categorias = Category::orderBy('nombre')->get();
        return view('productos.edit', compact('product', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $datos = $request->validate($this->rules($product->id));
        $datos['imagen'] = ($request->imagen) ? $request->imagen->store('images/products/') : $product->imagen;
        $imagenVieja = $product->imagen;
        $product->update($datos);
        if (basename($imagenVieja) != 'noimage.png' && $request->imagen) {
            Storage::delete($imagenVieja);
        }
        return redirect()->route('products.index')->with('message', "Producto Editado");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if (basename($product->imagen) != 'noimage.jpeg') {
            Storage::delete($product->imagen);
        }

        $product->delete();
        return redirect()->route('products.index')->with('message', 'El producto ha sido eliminado');
    }

    private function rules(?int $id = null):array {
        return [
            'nombre' => ['required', 'string', 'min:3', 'max:50', 'unique:products,nombre,'.$id],
            'descripcion' => ['required', 'string', 'min:10', 'max:150'],
            'stock' => ['required'],
            'imagen' => ['image', 'max:2048'],
            'category_id' => ['required', 'exists:categories,id'],
        ];
    }
}
