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
        
        
        $product = $request->json('id')!=="" ? 
            Product::findOrFail( $request->json('id')) : new Product;

        
        $product->id = $request->json('id')==="" ? NULL : $request->json('id'); 
        $product->codigo = $request->json('codigo') ==="" ? NULL : $request->json('codigo');
        $product->nombre = $request->json('nombre') ==="" ? NULL : strtoupper($request->json('nombre'));
        $product->stock = $request->json('stock') ==="" ? NULL :  $request->json('stock');
        $product->stock_min = $request->json('stock_min') ==="" ? NULL : $request->json('stock_min');
        $product->p_costo = $request->json('p_costo') ==="" ? NULL : $request->json('p_costo');
        $product->p_costo_usd = $request->json('p_costo_usd') ==="" ? NULL : $request->json('p_costo_usd');
        $product->p_venta = $request->json('p_venta') ==="" ? NULL : $request->json('p_venta');
        $product->dolar_base = $request->json('dolar_base') ==="" ? NULL : $request->json('dolar_base');
        
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
