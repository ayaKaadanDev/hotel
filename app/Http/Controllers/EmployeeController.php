<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
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
            $employee = Employee::all();
            if(Auth::user()->status==660)
            {
                return view('employee.index',compact('employee'));
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
            if(Auth::user()->status==660)
            {
                return view('employee.create');
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
                'first_name' => 'required',
                'last_name' => 'required',
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
                'phone_number' => 'required',
                'word_hours' => 'required',
            ]);
            if($validator->fails())
            {
                return "you should enter your info";
            }
            $employee = new Employee();
            $employee->first_name = $request->first_name;
            $employee->last_name = $request->last_name;
            $employee->fathers_name = $request->fathers_name;
            $employee->mothers_name = $request->mothers_name;
            $employee->place_of_birth = $request->place_of_birth;
            $employee->date_of_birth = $request->date_of_birth;
            $employee->nationality = $request->nationality;
            $employee->profassion = $request->profassion;
            $employee->domicile = $request->domicile;
            $employee->no_of_identity_or_passport = $request->no_of_identity_or_passport;
            $employee->date_of_identity_or_passport = $request->date_of_identity_or_passport;
            $employee->issued_of_identity_or_passport = $request->issued_of_identity_or_passport;
            $employee->arrive_from = $request->arrive_from;
            $employee->date_of_arrive = $request->date_of_arrive;
            // $employee->date_of_depart = $request->date_of_depart;
            $employee->phone_number = $request->phone_number;
            $employee->word_hours = $request->word_hours;
            // ID's photo
            $employee->save();
            return redirect()->route('employees.index')->with('message','The employee created successfully.');
        }
        else
        {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
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
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::id())
        {
        $employee = Employee::findorFail($id);

           if(Auth::user()->status==660)
            {
                return view('employee.edit',compact('employee'));
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
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    if(Auth::id())
    {
        $validator = Validator::make($request->all(),
        [
            'first_name' => 'required',
            'last_name' => 'required',
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
            'phone_number' => 'required',
            'word_hours' => 'required',
        ]);
        if($validator->fails())
        {
            return "you should enter your info";
        }
        $employee = Employee::findorFail($id);
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->fathers_name = $request->fathers_name;
        $employee->mothers_name = $request->mothers_name;
        $employee->place_of_birth = $request->place_of_birth;
        $employee->date_of_birth = $request->date_of_birth;
        $employee->nationality = $request->nationality;
        $employee->profassion = $request->profassion;
        $employee->domicile = $request->domicile;
        $employee->no_of_identity_or_passport = $request->no_of_identity_or_passport;
        $employee->date_of_identity_or_passport = $request->date_of_identity_or_passport;
        $employee->issued_of_identity_or_passport = $request->issued_of_identity_or_passport;
        $employee->arrive_from = $request->arrive_from;
        $employee->date_of_arrive = $request->date_of_arrive;
        // $employee->date_of_depart = $request->date_of_depart;
        $employee->phone_number = $request->phone_number;
        $employee->word_hours = $request->word_hours;
        // ID's photo
        $employee->save();
        return redirect()->route('employees.index')->with('message','The employee updated successfully.');
        }
        else
        {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::id())
        {
            $employee = Employee::findorFail($id)->delete();
            return redirect()->route('employees.index')->with('message','The employee archived successfully.');
        }
        else
        {
            return redirect()->back();
        }
    }


    public function showAllEmployeeDeleted()
    {
        if(Auth::id())
        {
            if(Auth::user()->status==660)
            {
                $employee = Employee::onlyTrashed()->get();
                return view('employee.softdelete',compact('employee'));
            }
        }
        else
        {
            return redirect()->back();
        }
    }

    public function getThisEmployeeDeleted($id)
    {
        if(Auth::id())
        {
            if(Auth::user()->status==660)
            {
                Employee::withTrashed()->where('id',$id)->restore();
                return redirect()->route('employees.index')->with('message','The employee restored successfully.');
            }
        }
        else
        {
            return redirect()->back();
        }
    }

}
