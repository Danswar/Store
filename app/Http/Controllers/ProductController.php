<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;
use App\Http\Resources\Product as ProductResource;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get articles
        $products = Product::all();

        return ProductResource::collection($products);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $request->isMethod('put') ? 
            Product::findOrFail($request->id) : new Product;

        $product->id = $request->input('id');
        $product->codigo = $request->input('codigo');
        $product->nombre = $request->input('nombre');
        $product->stock = $request->input('stock');
        $product->stock_min = $request->input('stock_min');
        $product->p_costo = $request->input('p_costo');
        $product->p_costo_usd = $request->input('p_costo_usd');
        $product->p_venta = $request->input('p_venta');
        $product->p_venta_usd = $request->input('p_venta_usd');
        $product->margen_min = $request->input('margen_min');
        $product->dolar_base = $request->input('dolar_base');
        
        if($product->save()){
            return new ProductResource($product);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Get a single product
        $product = Product::findOrFail($id);

        //return the single article
        return new ProductResource( $product );
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $product = Product::findOrFail($id);

        if($product->delete()){
            return new ProductResource( $product );
        }
        
    }
}
