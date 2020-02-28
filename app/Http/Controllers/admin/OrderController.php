<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\OrderDetail;
use App\Repositories\Order\OrderRepositoryInterface;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $order;

    public function __construct(OrderRepositoryInterface $order)
    {
        $this->order = $order;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = $this->order->getIndex();

        return view('admin.order.index', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = $this->order->find($id);
      
        $orderDetails = OrderDetail::where('order_id', $id)->get();
        
        return view('admin.order.OrderDetail', compact('order', 'orderDetails'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
