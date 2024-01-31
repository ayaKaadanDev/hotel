<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
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
                $order = Order::all();
                return view('order.index',compact('order'));
            }
            elseif(Auth::user()->status==1)
            {
                $order = Order::all();
                return view('chiefSideBar.order.index',compact('order'));
            }
            elseif(Auth::user()->status==2)
            {
                $order = Order::all();
                return view('reseptionSideBar.order.index',compact('order'));
            }
            else
            {
                $me = Auth::user()->id;
                $reservation = Reservation::where('user_id' , '=' , $me)->get();
                if(!sizeof($reservation))
                {
                    return redirect()->route('message')->with('message','you have not any reservation.');
                    // return view('cliectSideBar.order.message')->with('message','you have not any reservation.');
                }
                else
                {
                    foreach($reservation as $r)
                    {
                        $my_room = $r->room_id;
                    }
                    $order = Order::where('room_id' , '=' , $my_room)->get();
                    return view('cliectSideBar.order.index',compact('order'));
                }
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
            $me = Auth::user()->id;
            $reservation = Reservation::where('user_id' , '=' , $me)->get();
            // return $reservation;
            if(!sizeof($reservation))
            {
                // return "sorry";
                return redirect()->route('message')->with('message','you have not any reservation.');
                // return view('cliectSideBar.order.message')->with('message','you have not any reservation.');
            }
            else
            {
                // return $reservation;
            // }
                // $reservation = Reservation::where('user_id' , '=' , $me)->get();
                foreach($reservation as $r)
                {
                    $my_room = $r->room_id;
                }
                $room = Room::where('id' , '=' , $my_room)->get();
                // if(!Room::where('id' , '=' , $my_room))
                // {
                //     return "sorry";
                // }
                // $room = Room::where('status' , 'busy')->get();
                // return view('order.create',compact('product','room'));

                if(Auth::user()->status==660)
                {
                    return view('order.create',compact('room'));
                }
                elseif(Auth::user()->status==1)
                {
                    return view('chiefSideBar.order.create',compact('room'));
                }
                elseif(Auth::user()->status==2)
                {
                    return view('reseptionSideBar.order.create',compact('room'));
                }
                else
                {
                    return view('cliectSideBar.order.create',compact('room'));
                }
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
                'room_id' => 'required',
            ]);
            if($validator->fails())
            {
                return "you should enter your info";
            }
            $order = new Order();
            $order->room_id = $request->room_id;
            $order->save();
            // return redirect()->route('orders.index')->with('message','The order created successfully.');
            return redirect()->route('list.for.check')->with('message','The order created successfully.');
        }
        else
        {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::id())
        {
        $order = Order::findorFail($id);
        $room = Room::where('status' , 'busy')->get();
        // return view('order.edit',compact('order','product','room'));
            if(Auth::user()->status==660)
            {
                // return $order;
                return view('order.edit',compact('order','room'));
            }
            elseif(Auth::user()->status==1)
            {
                return view('chiefSideBar.order.edit',compact('order','room'));
            }
            elseif(Auth::user()->status==2)
            {
                return view('reseptionSideBar.order.edit',compact('order','room'));
            }
            else
            {
                return view('cliectSideBar.order.edit',compact('order','room'));
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::id())
        {
            $validator = Validator::make($request->all(),
            [
                'room_id' => 'required',
            ]);
            if($validator->fails())
            {
                return "you should enter your info";
            }
            $order = Order::findorFail($id);
            $order->room_id = $request->room_id;
            $order->save();
            return redirect()->route('orders.index')->with('message','The order updated successfully.');
        }
        else
        {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if(Auth::id())
        // {
        //     if(Auth::user()->status==660)
        //     {
        //     }

        //     elseif(Auth::user()->status==2)
        //     {
        //     }
        // }
        // else
        // {
        //     return redirect()->back();
        // }
        if(Auth::id())
        {
            $order = Order::findorFail($id)->delete();
            return redirect()->route('orders.index')->with('message','The order archived successfully.');
        }
        else
        {
            return redirect()->back();
        }
    }

    // public function menu()
    // {
    //     if(Auth::id())
    //     {
    //     $product = Product::all();
    //     // return view('order.menu',compact('product'));
    //         if(Auth::user()->status==660)
    //         {
    //             return view('order.menu',compact('product'));
    //         }
    //         elseif(Auth::user()->status==1)
    //         {
    //             return view('chiefSideBar.order.menu',compact('product'));
    //         }
    //         elseif(Auth::user()->status==2)
    //         {
    //             return view('reseptionSideBar.order.menu',compact('product'));
    //         }
    //         else
    //         {
    //             return view('cliectSideBar.order.menu',compact('product'));
    //         }

    //     }
    //     else
    //     {
    //         return redirect()->back();
    //     }
    // }

    public function showAllOrderDeleted()
    {
        if(Auth::id())
        {
            if(Auth::user()->status==660)
            {
                $order = Order::onlyTrashed()->get();
                return view('order.softdelete',compact('order'));
            }
        }
        else
        {
            return redirect()->back();
        }
    }
    public function getThisOrderDeleted($id)
    {
        if(Auth::id())
        {
            if(Auth::user()->status==660)
            {
                Order::withTrashed()->where('id',$id)->restore();
                return redirect()->route('orders.index')->with('message','The order restored successfully.');
            }
        }
        else
        {
            return redirect()->back();
        }
    }

    public function message()
    {
        return view('cliectSideBar.order.message')->with('message','you have not any reservation.');
    }

}
