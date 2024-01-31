<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\SecurityCard;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SecurityCardController extends Controller
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
        $securityCard = SecurityCard::all();
        // return view('securitycard.index',compact('securityCard'));
            if(Auth::user()->status==660)
            {
                return view('securitycard.index',compact('securityCard'));
            }
            elseif(Auth::user()->status==2)
            {
                return view('reseptionSideBar.securitycard.index',compact('securityCard'));
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
        $user = User::where('status' , '0')->get();
        $room = Room::where('status' , 'busy')->get();
        // return view('securitycard.create',compact('user','room'));
            if(Auth::user()->status==660)
            {
                return view('securitycard.create',compact('user','room'));
            }
            elseif(Auth::user()->status==2)
            {
                return view('reseptionSideBar.securitycard.create',compact('user','room'));
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
                'user_id' => 'required',
                'fathers_name' => 'required',
                'mothers_name' => 'required',
                'place_of_birth' => 'required',
                'date_of_birth' => 'required',
                'nationality' => 'required',
                'profassion' => 'required',
                'domicile' => 'required',
                'no_of_identity_or_passport' => 'required',
                'date_of_identity_or_passport' => 'required',
                'issued_of_identity_or_passport' => 'required',
                'arrive_from' => 'required',
                'date_of_arrive' => 'required',
                'date_of_depart' => 'required',
                'room_id' => 'required',
            ]);
            if($validator->fails())
            {
                return "you should enter your info";
            }
            $securityCard = new SecurityCard();
            $securityCard->user_id = $request->user_id;
            $securityCard->fathers_name = $request->fathers_name;
            $securityCard->mothers_name = $request->mothers_name;
            $securityCard->place_of_birth = $request->place_of_birth;
            $securityCard->date_of_birth = $request->date_of_birth;
            $securityCard->nationality = $request->nationality;
            $securityCard->profassion = $request->profassion;
            $securityCard->domicile = $request->domicile;
            $securityCard->no_of_identity_or_passport = $request->no_of_identity_or_passport;
            $securityCard->date_of_identity_or_passport = $request->date_of_identity_or_passport;
            $securityCard->issued_of_identity_or_passport = $request->issued_of_identity_or_passport;
            // $securityCard->phone_number = $request->phone_number;
            $securityCard->arrive_from = $request->arrive_from;
            $securityCard->date_of_arrive = $request->date_of_arrive;
            $securityCard->date_of_depart = $request->date_of_depart;
            $securityCard->room_id = $request->room_id;
            $securityCard->save();
            return redirect()->route('securitycards.index')->with('message','The securityCard created successfully.');
        }
        else
        {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SecurityCard  $securityCard
     * @return \Illuminate\Http\Response
     */
    public function show(SecurityCard $securityCard)
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
     * @param  \App\Models\SecurityCard  $securityCard
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::id())
        {
        $securityCard = SecurityCard::findorFail($id);
        $user = User::where('status' , '0')->get();
        $room = Room::where('status' , 'busy')->get();
        // return view('securitycard.edit',compact('securityCard','user','room'));
            if(Auth::user()->status==660)
            {
                return view('securitycard.edit',compact('securityCard','user','room'));
            }
            elseif(Auth::user()->status==2)
            {
                return view('reseptionSideBar.securitycard.edit',compact('securityCard','user','room'));
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
     * @param  \App\Models\SecurityCard  $securityCard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::id())
        {
            $validator = Validator::make($request->all(),
            [
                'user_id' => 'required',
                'fathers_name' => 'required',
                'mothers_name' => 'required',
                'place_of_birth' => 'required',
                'date_of_birth' => 'required',
                'nationality' => 'required',
                'profassion' => 'required',
                'domicile' => 'required',
                'no_of_identity_or_passport' => 'required',
                'date_of_identity_or_passport' => 'required',
                'issued_of_identity_or_passport' => 'required',
                'arrive_from' => 'required',
                'date_of_arrive' => 'required',
                'date_of_depart' => 'required',
                'room_id' => 'required',
            ]);
            if($validator->fails())
            {
                return "you should enter your info";
            }
            $securityCard = SecurityCard::findorFail($id);
            $securityCard->user_id = $request->user_id;
            $securityCard->fathers_name = $request->fathers_name;
            $securityCard->mothers_name = $request->mothers_name;
            $securityCard->place_of_birth = $request->place_of_birth;
            $securityCard->date_of_birth = $request->date_of_birth;
            $securityCard->nationality = $request->nationality;
            $securityCard->profassion = $request->profassion;
            $securityCard->domicile = $request->domicile;
            $securityCard->no_of_identity_or_passport = $request->no_of_identity_or_passport;
            $securityCard->date_of_identity_or_passport = $request->date_of_identity_or_passport;
            $securityCard->issued_of_identity_or_passport = $request->issued_of_identity_or_passport;
            $securityCard->arrive_from = $request->arrive_from;
            $securityCard->date_of_arrive = $request->date_of_arrive;
            $securityCard->date_of_depart = $request->date_of_depart;
            $securityCard->room_id = $request->room_id;
            $securityCard->save();
            return redirect()->route('securitycards.index')->with('message','The securityCard updated successfully.');
        }
        else
        {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SecurityCard  $securityCard
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::id())
        {
            $securityCard = SecurityCard::findorFail($id)->delete();
            return redirect()->route('securitycards.index')->with('message','The securityCard archived successfully.');
        }
        else
        {
            return redirect()->back();
        }
    }


    public function showAllSecurityCardDeleted()
    {
        if(Auth::id())
        {
            if(Auth::user()->status==660)
            {
                $securityCard = SecurityCard::onlyTrashed()->get();
                return view('securityCard.softdelete',compact('securityCard'));
            }
        }
        else
        {
            return redirect()->back();
        }
    }
    public function getThisSecurityCardDeleted($id)
    {
        if(Auth::id())
        {
            if(Auth::user()->status==660)
            {
                SecurityCard::withTrashed()->where('id',$id)->restore();
                return redirect()->route('securityCards.index')->with('message','The securityCard restored successfully.');
            }
        }
        else
        {
            return redirect()->back();
        }
    }

}
