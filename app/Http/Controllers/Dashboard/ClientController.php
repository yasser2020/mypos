<?php

namespace App\Http\Controllers\dashboard;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clients=Client::when($request->search,function($q) use($request){
            return $q->where('name','like','%'.$request->search.'%')
                   ->orWhere('phone','like','%'.$request->search.'%')
                   ->orWhere('address','like','%'.$request->search.'%');
        })->latest()->paginate(5);
        return view('dashboard.clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
         'name'=>'required',
         'phone'=>'required|array|min:1',
         'phone.0'=>'required',
        
         'address'=>'required'
        ]);
        Client::create($request->all());
        session()->flash('success',__('site.added_successfully'));
        return redirect()->route('dashboard.clients.index');
    }

    
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('dashboard.clients.edit',compact('client'));
    }

   
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required|array|min:1',
            'phone.0'=>'required',
           
            'address'=>'required'
           ]);

           $request_data=$request->all();
           $request_data['phone']=array_filter($request->phone);
           $client->update($request_data);
           session()->flash('success',__('site.updated_successfully'));
           return redirect()->route('dashboard.clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        session()->flash('success',__('site.deleted_successfully'));
           return redirect()->route('dashboard.clients.index');

    }
}
