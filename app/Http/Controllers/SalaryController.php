<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SalaryController extends Controller
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
            $salary = Salary::all();
            if(Auth::user()->status==660)
            {
                return view('salary.index',compact('salary'));
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
            $employee = Employee::all();
            if(Auth::user()->status==660)
            {
                return view('salary.create',compact('employee'));
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
                'employee_id' => 'required',
                'salary' => 'required',
                'additional_name' => 'required',
                'additional_quantity' => 'required',
                'severance_name' => 'required',
                'severance_quantity' => 'required',
                'net_payment' => 'required',
            ]);
            if($validator->fails())
            {
                return "you should enter your info";
            }
            $salary = new Salary();
            $salary->employee_id = $request->employee_id;
            $salary->salary = $request->salary;
            $salary->additional_name = $request->additional_name;
            $salary->additional_quantity = $request->additional_quantity;
            $salary->severance_name = $request->severance_name;
            $salary->severance_quantity = $request->severance_quantity;
            $salary->net_payment = $salary->salary + $salary->additional_quantity - $salary->severance_quantity;
            $salary->save();
        return redirect()->route('salaries.index')->with('message','The salary created successfully.');
        }
        else
        {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function show(Salary $salary)
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
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::id())
        {
            $employee = Employee::all();
            $salary = Salary::findorFail($id);
           if(Auth::user()->status==660)
            {
                return view('salary.edit',compact('salary','employee'));
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
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::id())
        {
            $validator = Validator::make($request->all(),
            [
                'employee_id' => 'required',
                'salary' => 'required',
                'additional_name' => 'required',
                'additional_quantity' => 'required',
                'severance_name' => 'required',
                'severance_quantity' => 'required',
                'net_payment' => 'required',
            ]);
            if($validator->fails())
            {
                return "you should enter your info";
            }
            $salary = Salary::findorFail($id);
            $salary->employee_id = $request->employee_id;
            $salary->salary = $request->salary;
            $salary->additional_name = $request->additional_name;
            $salary->additional_quantity = $request->additional_quantity;
            $salary->severance_name = $request->severance_name;
            $salary->severance_quantity = $request->severance_quantity;
            $salary->net_payment = $salary->salary + $salary->additional_quantity - $salary->severance_quantity;
            $salary->save();
        return redirect()->route('salaries.index')->with('message','The salary updated successfully.');
        }
        else
        {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::id())
        {
            $salary = Salary::findorFail($id)->delete();
            return redirect()->route('salaries.index')->with('message','The salary archived successfully.');
        }
        else
        {
            return redirect()->back();
        }
    }


    public function showAllSalaryDeleted()
    {
        if(Auth::id())
        {
            if(Auth::user()->status==660)
            {
                $salary = Salary::onlyTrashed()->get();
                return view('salary.softdelete',compact('salary'));
            }
        }
        else
        {
            return redirect()->back();
        }
    }

    public function getThisSalaryDeleted($id)
    {
        if(Auth::id())
        {
            if(Auth::user()->status==660)
            {
                Salary::withTrashed()->where('id',$id)->restore();
                return redirect()->route('salaries.index')->with('message','The salary restored successfully.');
            }
        }
        else
        {
            return redirect()->back();
        }
    }


}
