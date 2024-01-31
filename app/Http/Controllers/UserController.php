<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
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
        $user = User::all();
        // return view('user.index',compact('user'));
            if(Auth::user()->status==660)
            {
                return view('user.index',compact('user'));
            }
            elseif(Auth::user()->status==2)
            {
                return view('reseptionSideBar.user.index',compact('user'));
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
        // return view('user.create');
        if(Auth::id())
        {
            if(Auth::user()->status==660)
            {
                return view('user.create');
            }
            elseif(Auth::user()->status==2)
            {
                return view('reseptionSideBar.user.create');
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
                'name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]);
            if($validator->fails())
            {
                return "you should enter your info";
            }
            $user = new User();
            $user->name = $request->first_name;
            $user->last_name = $request->last_name;
            // $user->email = $request->email;
            $u = User::all();
            foreach($u as $value)
            {
                $email = $value->email;
                if($request->email == $email)
                {
                    return back()->with('message','this email is already exist.');
                }
                else
                {
                    $user->email = $request->email;
                }
            }
            $user->password = Hash::make($request->password);
            $user->phone_number = $request->phone_number;
            $user->save();
            return redirect()->route('users.index')->with('message','The user created successfully.');
        }
        else
        {
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::id())
        {
        $user = User::findorfail($id);
        // return view('user.edit',compact('user'));
            if(Auth::user()->status==660)
            {
                return view('user.edit',compact('user'));
            }
            elseif(Auth::user()->status==2)
            {
                return view('reseptionSideBar.user.edit',compact('user'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::id())
        {
            $validator = Validator::make($request->all(),
            [
                'name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]);
            if($validator->fails())
            {
                return "you should enter your info";
            }
            $user = User::findorFail($id);
            $user->name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone_number = $request->phone_number;
            $user->save();
            return redirect()->route('users.index')->with('message','The user updated successfully.');
        }
        else
        {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::id())
        {
            $user = User::findorFail($id)->delete();
            return redirect()->route('users.index')->with('message','The user archived successfully.');
        }
        else
        {
            return redirect()->back();
        }
    }

    public function showAllUserDeleted()
    {
        if(Auth::id())
        {
            if(Auth::user()->status==660)
            {
                $user = User::onlyTrashed()->get();
                return view('user.softdelete',compact('user'));
            }
        }
        else
        {
            return redirect()->back();
        }
    }
    public function getThisUserDeleted($id)
    {
        if(Auth::id())
        {
            if(Auth::user()->status==660)
            {
                User::withTrashed()->where('id',$id)->restore();
                return redirect()->route('users.index')->with('message','The user restored successfully.');
            }
        }
        else
        {
            return redirect()->back();
        }
    }
}
