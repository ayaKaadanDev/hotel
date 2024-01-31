<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReserveStoreRequest;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
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
        $reservation = Reservation::all();
        // return view('reservation.index',compact('reservation'));
            if(Auth::user()->status==660)
            {
                return view('reservation.index',compact('reservation'));
            }
            elseif(Auth::user()->status==2)
            {
                return view('reseptionSideBar.reservation.index',compact('reservation'));
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
        $room = Room::where('status' , 'available')->get();
        $user = User::all();
        // return view('reservation.create',compact('room','user'));
            if(Auth::user()->status==660)
            {
                return view('reservation.create',compact('room','user'));
            }
            elseif(Auth::user()->status==2)
            {
                return view('reseptionSideBar.reservation.create',compact('room','user'));
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
    public function store(ReserveStoreRequest $request)
    {
        if(Auth::id())
        {
            Reservation::create($request->validated());
            // $reservation = new Reservation();
            // $reservation->date = $request->date;
            // $reservation->room_id = $request->room_id;
            // $reservation->user_id = $request->user_id;
            // $reservation->save();
            $room = Room::all();
            $room = $request->room_id;
            return to_route('rooms.edit',compact('room'));
        }
        else
        {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
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
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::id())
        {
        $reservation = Reservation::findorFail($id);
        // $room = Room::where('status' , 'available')->get();
        $room = Room::where('status' , 'busy')->get();
        $user = User::all();
        // return view('reservation.edit',compact('reservation','room','user'));
            if(Auth::user()->status==660)
            {
                return view('reservation.edit',compact('reservation','room','user'));
            }
            elseif(Auth::user()->status==2)
            {
                return view('reseptionSideBar.reservation.edit',compact('reservation','room','user'));
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
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        if(Auth::id())
        {
            $reservation = Reservation::findorFail($id);
            $reservation->date = $request->date;
            $reservation->room_id = $request->room_id;
            $reservation->user_id = $request->user_id;
            $reservation->save();
            return redirect()->route('reservation.index');
        }
        else
        {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::id())
        {
            $reservation = Reservation::findorFail($id);
            $room = $reservation->room_id;
            $reservation = Reservation::findorFail($id)->delete();
            return to_route('rooms.edit',compact('room'));
        }
        else
        {
            return redirect()->back();
        }
    }

    public function showAllReservationDeleted()
    {
        if(Auth::id())
        {
            if(Auth::user()->status==660)
            {
                $reservation = Reservation::onlyTrashed()->get();
                return view('reservation.softdelete',compact('reservation'));
            }
        }
        else
        {
            return redirect()->back();
        }
    }
    public function getThisReservationDeleted($id)
    {
        if(Auth::id())
        {
            if(Auth::user()->status==660)
            {
                Reservation::withTrashed()->where('id',$id)->restore();
                return redirect()->route('reservation.index')->with('message','The reservation restored successfully.');
            }
        }
        else
        {
            return redirect()->back();
        }
    }
}
