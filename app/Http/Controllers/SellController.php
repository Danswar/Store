<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Sell;
use App\Item;
use App\Http\Resources\Sell as SellResource;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sells = Sell::orderBy('created_at','desc')->paginate(15);
        return SellResource::collection($sells);
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        
        try{
            $sell = new Sell;
            $sell->total = $request->json('total');
            $sell->save();

            $items = $request->json('items');
            foreach($items as $reqItem){
                $item = new Item;
                $item->product_id = $reqItem['product_id'];
                $item->sell_id = $sell->id;
                $item->cantidad = $reqItem['cantidad'];
                $item->p_costo = $reqItem['p_costo'];
                $item->p_costo_usd = $reqItem['p_costo_usd'];
                $item->p_venta = $reqItem['p_venta'];
                
                $item->save();
            }
            DB::commit();

            $sell->items;
            return new SellResource($sell);

        }catch(\Exception $e){
            DB::rollback();
            return $e; /* TODO: Hacer algo aqui */
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
        $sell = Sell::find($id);
        //cargamos tambien los items de la venta y el producto asociado
        foreach($sell->items as $item){
            $item->name;
        }
        return new SellResource($sell);
    }

    public function today(){
        $sells = Sell::whereDate('created_at', '=', date('Y-m-d'))->get();
        foreach($sells as $sell){
            $sell->items;
        }
        return SellResource::collection($sells);
    }


}
