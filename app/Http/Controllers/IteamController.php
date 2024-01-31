<?php

namespace App\Http\Controllers;

use App\Models\Iteam;
use App\Models\Order;
use App\Models\Product;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class IteamController extends Controller
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
            if(Auth::user()->status==660)
            {
                $iteam = Iteam::all();
                return view('iteam.index',compact('iteam'));
            }
            elseif(Auth::user()->status==1)
            {
                $iteam = Iteam::all();
                return view('chiefsidebar.iteam.index',compact('iteam'));
            }
            elseif(Auth::user()->status==2)
            {
                $iteam = Iteam::all();
                return view('reseptionSideBar.iteam.index',compact('iteam'));
            }
            else
            {
                // $iteam = Iteam::all();
                // return view('cliectSideBar.iteam.index',compact('iteam'));
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
        // $product = Product::all();
        // $order = Order::all();
        // return view('iteam.create',compact('product','order'));
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
                'product_id' => 'required',
                'order_id' => 'required',
                'amount' => 'required',
            ]);
            if($validator->fails())
            {
                return "you should enter your info";
            }
            $iteam = new Iteam();
            foreach($request->product_id as $key=>$name)
            {
                // if($request->amount[$key] == null){
                //     $x = $key+1;
                //     $iteam= [
                //         'product_id' => $request->product_id[$key],
                //         'amount' => $request->amount[$x],
                //         'order_id' => $request->order_id,
                //     ];
                //     DB::table('iteams')->insert($iteam);
                // }
                // else{
                    $str = $request->product_id[$key];
                    $arr = explode("-" , $str);
                    $iteam= [
                        // 'product_id' => $request->product_id[$key],
                        'product_id' => $arr[0],
                        'amount' => $request->amount[$key],
                        'order_id' => $request->order_id,
                    ];
                            DB::table('iteams')->insert($iteam);
                // }
            }
            // if(Auth::user()->status==0)
            // {
                // return redirect()->route('orders.index')->with('message','The iteam(s) created successfully.');
            // }
            // else{
                            // return redirect()->route('iteams.index')->with('message','The iteam(s) created successfully.');
                            return redirect()->route('orders.index')->with('message','The iteam(s) created successfully.');
            // }
        }
        else
        {
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Iteam  $iteam
     * @return \Illuminate\Http\Response
     */
    public function show(Iteam $iteam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Iteam  $iteam
     * @return \Illuminate\Http\Response
     */
    public function edit(Iteam $iteam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Iteam  $iteam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Iteam $iteam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Iteam  $iteam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $iteam = Iteam::findorFail($id)->delete();
        return redirect()->route('iteams.index')->with('message','The iteam archived successfully.');
    }


    public function listforcheck()
    {
        if(Auth::id())
        {
            $product = Product::all();
            if(Auth::user()->status==660)
            {
                return view('iteam.myselected',compact('product'));
            }
            elseif(Auth::user()->status==1)
            {
                return view('chiefsidebar.iteam.myselected',compact('product'));
            }
            elseif(Auth::user()->status==2)
            {
                return view('reseptionSideBar.iteam.myselected',compact('product'));
            }
            else
            {
                return view('cliectSideBar.iteam.myselected',compact('product'));
            }

        }
        else
        {
            return redirect()->back();
        }


    }

    public static function checkboxHelper(Request $request)
    {
        if(Auth::id())
        {
            if($request->product_id == null)
            {
                return back()->with('message','please .. add something to your order.');
            }
            else{
            $product = Product::all();
            $me = Auth::user()->id;
                $reservation = Reservation::where('user_id' , '=' , $me)->get();
                foreach($reservation as $r)
                {
                    $my_room = $r->room_id;
                }
                $or = Order::where('room_id' , '=' , $my_room)->get();
                foreach($or as $o)
                {
                    $ord = $o->id;
                }
                $order = Order::where('id' , $ord)->get();
            // $order = Order::all();
            $request_array = array();
            ///////////////
            foreach($request->product_id as $key=>$name)
            {
                array_push($request_array , $request->product_id[$key]);
            }
            if(Auth::user()->status==660)
            {
                // $order = Order::all();
                return view('iteam.create',compact('request_array','order','product'));
            }
            elseif(Auth::user()->status==1)
            {
                // $order = Order::all();
                return view('chiefsidebar.iteam.create',compact('request_array','order','product'));
            }
            elseif(Auth::user()->status==2)
            {
                // $order = Order::all();
                return view('reseptionSideBar.iteam.create',compact('request_array','order','product'));
            }
            else
            {
                // $order = Order::all();
                // $me = Auth::user()->id;
                // $reservation = Reservation::where('user_id' , '=' , $me)->get();
                // foreach($reservation as $r)
                // {
                //     $my_room = $r->room_id;
                // }
                // $order = Order::where('room_id' , '=' , $my_room)->get();

                // $me = Auth::user()->id;
                // $reservation = Reservation::where('user_id' , '=' , $me)->get();
                // foreach($reservation as $r)
                // {
                //     $my_room = $r->room_id;
                // }
                // $or = Order::where('room_id' , '=' , $my_room)->get();
                // foreach($or as $o)
                // {
                //     $ord = $o->id;
                // }
                // $order = Order::where('id' , $ord)->get();


                // return $order;

                return view('cliectSideBar.iteam.create',compact('request_array','order','product'));
            }

        }}
        else
        {
            return redirect()->back();
        }
    }


    public function showAllIteamDeleted()
    {
        if(Auth::id())
        {
            if(Auth::user()->status==660)
            {
                $iteam = Iteam::onlyTrashed()->get();
                return view('iteam.softdelete',compact('iteam'));
            }
        }
        else
        {
            return redirect()->back();
        }
    }
    public function getThisIteamDeleted($id)
    {
        if(Auth::id())
        {
            if(Auth::user()->status==660)
            {
                Iteam::withTrashed()->where('id',$id)->restore();
                return redirect()->route('iteams.index')->with('message','The iteam restored successfully.');
            }
        }
        else
        {
            return redirect()->back();
        }
    }

    public function my_order($id)
    {
        if(Auth::id())
        {
            // if(Auth::user()->status==0)
            // {
                $order = Order::findorFail($id);
                $iteam = Iteam::where('order_id' , $order->id)->get();
                if(Auth::user()->status==660)
                {
                    return view('iteam.index',compact('iteam'));
                }
                elseif(Auth::user()->status==1)
                {
                    return view('chiefsidebar.iteam.index',compact('iteam'));
                }
                elseif(Auth::user()->status==2)
                {
                    return view('reseptionSideBar.iteam.index',compact('iteam'));
                }
                else
                {
                    return view('cliectSideBar.iteam.index',compact('iteam'));
                }
        }
        else
        {
            return redirect()->back();
        }
    }

}
