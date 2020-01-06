<?php

namespace App\Http\Controllers\Dashboard\client;

use Illuminate\Http\Request;
use App\Client;
use App\Category;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        # code...
    }
    
    public function create(Client $client)
    {
        $categories=Category::with('products')->get();
        return view('dashboard.clients.orders.create',compact('client','categories'));
    }

    public function store(Request $request,Client $client)
    {
        dd($request->all());
    }
    public function edit(Client $client,Order $order)
    {
        # code...
    }

    public function update(Request $request,Client $client ,Order $order)
    {
        # code...
    }

    public function destory(Client $client,Order $order)
    {
        # code...
    }




}
