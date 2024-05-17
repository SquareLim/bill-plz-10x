<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\OrderPizza;
use App\Http\Requests\StoreOrderPizzaRequest;
use App\Http\Requests\UpdateOrderPizzaRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;

class OrderPizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $latestOrderPizza = OrderPizza::orderBy('orderId', 'desc')->first();
        if ($latestOrderPizza == null){
            $orderId = 1;
        }else{
            $orderId = $latestOrderPizza->orderId + 1;
        }
        $userId = $user->id;

        $request->validate([
            "pizzas"=>'required|array',
            "pizzas.*.size"=>'required',
            "pizzas.*.pepperoni"=>'required',
            "pizzas.*.cheese"=>'required',
            "pizzas.*.pizzaId"=>'required',
        ]);

        $orderPizzas = [];
        foreach ($request->pizzas as $pizzaRequest) {
            $price = 0;

            if($pizzaRequest['size'] == 'small'){
                $price = 15;
            }elseif($pizzaRequest['size'] == 'medium'){
                $price = 22;
            }elseif($pizzaRequest['size'] == 'large'){
                $price = 30;
            }

            if($pizzaRequest['pepperoni'] == true){
                if($pizzaRequest['size'] == 'small'){
                    $price += 3;
                }else{
                    // Assume that for the pizza of medium and large size, the price of pepperoni is $5
                    $price += 5;
                }
            }

            if ($pizzaRequest['cheese'] == true){
                $price += 6;
            }

            $orderPizza = new OrderPizza();
            $orderPizza->orderId = $orderId;
            $orderPizza->size = $pizzaRequest['size'];
            $orderPizza->pepperoni = $pizzaRequest['pepperoni'];
            $orderPizza->cheese = $pizzaRequest['cheese'];
            $orderPizza->price = $price;
            $orderPizza->pizzaId = $pizzaRequest['pizzaId'];
            $orderPizza->userId = $userId;
            $orderPizza->save();

            $orderPizzas[] = $orderPizza;
        }

        return response()->json([
            'message'=>'OrderPizza created successfully',
            'data'=>$orderPizzas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderPizzaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderPizza $orderPizza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderPizza $orderPizza)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderPizzaRequest $request, OrderPizza $orderPizza)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderPizza $orderPizza)
    {
        //
    }
}
