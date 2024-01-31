<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Iteam;
use App\Models\Order;
use App\Models\Product;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::id())
        {
            $invoice = Invoice::all();
            // return view('invoice.index',compact('invoice'));
            if(Auth::user()->status==660)
            {
                return view('invoice.index',compact('invoice'));
            }
            elseif(Auth::user()->status==2)
            {
                return view('reseptionSideBar.invoice.index',compact('invoice'));
            }
        }
        else
        {
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::id())
        {
        $room = Room::where('status' , 'busy')->get();
        // return view('invoice.create',compact('room'));
            if(Auth::user()->status==660)
            {
                return view('invoice.create',compact('room'));
            }
            elseif(Auth::user()->status==2)
            {
                return view('reseptionSideBar.invoice.create',compact('room'));
            }
        }
        else
        {
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::id())
        {
            $validator = Validator::make($request->all(),
            [
                'reservation_cost' => 'required',
                'order_id' => 'required',
                'reservation_and_orders_cost' => 'required',
                'add_5_percent_form_cost' => 'required',
                'add_5_percent_from_5_percent' => 'required',
                'add_duplicate_of_the_5_percent' => 'required',
                'total_amount' => 'required',
                'room_id' => 'required',
            ]);
            if($validator->fails())
            {
                return "you should enter your info";
            }
            $invoice = new Invoice();
            $invoice->reservation_cost = ceil($request->reservation_cost/100)*100;

            $invoice->room_id = $request->room_id;
            $a = DB::table('iteams')
            ->join('products', 'iteams.product_id', '=', 'products.id')
            ->join('orders', 'iteams.order_id', '=', 'orders.id')
            ->select('iteams.*', 'products.cost', 'orders.room_id')
            ->where('orders.room_id' , '=' , $invoice->room_id)
            ->sum(DB::raw('amount * cost'));
            // return $a;
            $invoice->order_id = ceil($a/100)*100;

            // $ord = Order::where('room_id' , '=' , $invoice->room_id)->sum('cost');
                        // $invoice->order_id = ceil($ord/100)*100;
                        // return $ord;
            $invoice->reservation_and_orders_cost = $invoice->reservation_cost + $invoice->order_id;

            $invoice->add_5_percent_form_cost = ceil(($invoice->reservation_and_orders_cost)*(5/100)/100)*100;
            $invoice->add_5_percent_from_5_percent = ceil($invoice->add_5_percent_form_cost*(5/100)/100)*100;
            $invoice->add_duplicate_of_the_5_percent = $invoice->add_5_percent_from_5_percent*(2);
            $invoice->total_amount = $invoice->reservation_and_orders_cost + $invoice->add_5_percent_form_cost + $invoice->add_5_percent_from_5_percent + $invoice->add_duplicate_of_the_5_percent;
            $invoice->save();
            return redirect()->route('invoices.index')->with('message','The invoice created successfully.');

        }
        else
        {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        if(Auth::id())
        {
            //
        }
        else
        {
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::id())
        {
        $invoice = Invoice::findorFail($id);
        $room = Room::where('status' , 'busy')->get();
        // return view('invoice.edit',compact('invoice','room'));
            if(Auth::user()->status==660)
            {
                return view('invoice.edit',compact('invoice','room'));
            }
            elseif(Auth::user()->status==2)
            {
                return view('reseptionSideBar.invoice.edit',compact('invoice','room'));
            }
        }
        else
        {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::id())
        {
            $validator = Validator::make($request->all(),
            [
                'reservation_cost' => 'required',
                'order_id' => 'required',
                'reservation_and_orders_cost' => 'required',
                'add_5_percent_form_cost' => 'required',
                'add_5_percent_from_5_percent' => 'required',
                'add_duplicate_of_the_5_percent' => 'required',
                'total_amount' => 'required',
                'room_id' => 'required',
            ]);
            if($validator->fails())
            {
                return "you should enter your info";
            }
            $invoice = Invoice::findorFail($id);
            $invoice->reservation_cost = ceil($request->reservation_cost/100)*100;

            $invoice->room_id = $request->room_id;
            $a = DB::table('iteams')
            ->join('products', 'iteams.product_id', '=', 'products.id')
            ->join('orders', 'iteams.order_id', '=', 'orders.id')
            ->select('iteams.*', 'products.cost', 'orders.room_id')
            ->where('orders.room_id' , '=' , $invoice->room_id)
            ->sum(DB::raw('amount * cost'));
            // return $a;
            $invoice->order_id = ceil($a/100)*100;

            // $ord = Order::where('room_id' , '=' , $invoice->room_id)->sum('cost');
                        // $invoice->order_id = ceil($ord/100)*100;
                        // return $ord;
            $invoice->reservation_and_orders_cost = $invoice->reservation_cost + $invoice->order_id;

            $invoice->add_5_percent_form_cost = ceil(($invoice->reservation_and_orders_cost)*(5/100)/100)*100;
            $invoice->add_5_percent_from_5_percent = ceil($invoice->add_5_percent_form_cost*(5/100)/100)*100;
            $invoice->add_duplicate_of_the_5_percent = $invoice->add_5_percent_from_5_percent*(2);
            $invoice->total_amount = $invoice->reservation_and_orders_cost + $invoice->add_5_percent_form_cost + $invoice->add_5_percent_from_5_percent + $invoice->add_duplicate_of_the_5_percent;
            $invoice->save();
            return redirect()->route('invoices.index')->with('message','The invoice updated successfully.');

        }
        else
        {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::id())
        {
            $invoice = Invoice::findorFail($id)->delete();
            return redirect()->route('invoices.index')->with('message','The invoice archived successfully.');

        }
        else
        {
            return redirect()->back();
        }
    }

    public function showAllInvoiceDeleted()
    {
        if(Auth::id())
        {
            if(Auth::user()->status==660)
            {
                $invoice = Invoice::onlyTrashed()->get();
                return view('invoice.softdelete',compact('invoice'));
            }
        }
        else
        {
            return redirect()->back();
        }
    }
    public function getThisInvoiceDeleted($id)
    {
        if(Auth::id())
        {
            if(Auth::user()->status==660)
            {
                Invoice::withTrashed()->where('id',$id)->restore();
                return redirect()->route('invoices.index')->with('message','The invoice restored successfully.');
            }
        }
        else
        {
            return redirect()->back();
        }
    }
}
