<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
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
            // if(Auth::user()->status==660)
            // {
            $room = Room::all();
            if(Auth::user()->status==660)
            {
                return view('room.index',compact('room'));
            }
            elseif(Auth::user()->status==2)
            {
                return view('reseptionSideBar.room.index',compact('room'));
            }
            // return view('room.index',compact('room'));
            // }
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
            if(Auth::user()->status==660)
            {
            return view('room.create');
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
                'number' => 'required',
                'floor' => 'required',
                'beds_number' => 'required',
                'status' => 'required',
            ]);
            if($validator->fails())
            {
                return "you should enter your info";
            }
            $room = new Room();
            $room->number = $request->number;
            $room->floor = $request->floor;
            $room->beds_number = $request->beds_number;
            $room->status = $request->status;
            $room->save();
            return redirect()->route('rooms.index')->with('message','The room created successfully.');
        }
        else
        {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
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
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::id())
        {
        $room = Room::findorfail($id);
        // return view('room.edit',compact('room'));
            if(Auth::user()->status==660)
            {
                return view('room.edit',compact('room'));
            }
            elseif(Auth::user()->status==2)
            {
                return view('reseptionSideBar.room.edit',compact('room'));
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
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
        if(Auth::id())
        {
            $validator = Validator::make($request->all(),
            [
                'number' => 'required',
                'floor' => 'required',
                'beds_number' => 'required',
                'status' => 'required',
            ]);
            if($validator->fails())
            {
                return "you should enter your info";
            }
            $room = Room::findorFail($id);
            $room->number = $request->number;
            $room->floor = $request->floor;
            $room->beds_number = $request->beds_number;
            $room->status = $request->status;
            $room->save();
            // return redirect()->route('reservation.index')->with('message','The reservation created successfully.');
            return redirect()->route('reservation.index');
            // return redirect()->route('orders.destroy');
        }
        else
        {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::id())
        {
            $room = Room::findorFail($id)->delete();
            return redirect()->route('rooms.index')->with('message','The room archived successfully.');
        }
        else
        {
            return redirect()->back();
        }
    }

    public function showAllRoomDeleted()
    {
        if(Auth::id())
        {
            if(Auth::user()->status==660)
            {
                $room = Room::onlyTrashed()->get();
                return view('room.softdelete',compact('room'));
            }
        }
        else
        {
            return redirect()->back();
        }
    }
    public function getThisRoomDeleted($id)
    {
        if(Auth::id())
        {
            if(Auth::user()->status==660)
            {
                Room::withTrashed()->where('id',$id)->restore();
                return redirect()->route('rooms.index')->with('message','The room restored successfully.');
            }
        }
        else
        {
            return redirect()->back();
        }
    }
}
