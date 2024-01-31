<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
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
        $product = Product::all();
        // return view('product.index',compact('product'));

            if(Auth::user()->status==660)
            {
                return view('product.index',compact('product'));
            }
            elseif(Auth::user()->status==1)
            {
                return view('chiefSideBar.product.index',compact('product'));
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
            // $user = User::all();
            // return view('product.create',compact('user'));


            if(Auth::user()->status==660)
            {
                $user = User::where('status' , '660')->get();
                return view('product.create',compact('user'));
            }
            elseif(Auth::user()->status==1)
            {
                $user = User::where('status' , '1')->get();
                return view('chiefSideBar.product.create',compact('user'));
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
                'cost' => 'required',
                'user_id' => 'required',
            ]);
            if($validator->fails())
            {
                return "you should enter your info";
            }
            $product = new Product();
            $product->name = $request->name;
            $product->cost = $request->cost;
            $product->user_id = $request->user_id;
            $product->save();
            return redirect()->route('products.index')->with('message','The product created successfully.');
        }
        else
        {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::id())
        {
        $product = Product::findorFail($id);
        // $user = User::all();
        // return view('product.edit',compact('product','user'));


            if(Auth::user()->status==660)
            {
                $user = User::where('status' , '660')->get();
                return view('product.edit',compact('product','user'));
            }
            elseif(Auth::user()->status==1)
            {
                $user = User::where('status' , '1')->get();
                return view('chiefSideBar.product.edit',compact('product','user'));
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::id())
        {
            $validator = Validator::make($request->all(),
            [
                'name' => 'required',
                'cost' => 'required',
                'user_id' => 'required',
            ]);
            if($validator->fails())
            {
                return "you should enter your info";
            }
            $product = Product::findorFail($id);
            $product->name = $request->name;
            $product->cost = $request->cost;
            $product->user_id = $request->user_id;
            $product->save();
            return redirect()->route('products.index')->with('message','The order updated successfully.');
        }
        else
        {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::id())
        {
            $product = Product::findorFail($id)->delete();
            return redirect()->route('products.index')->with('message','The order archived successfully.');
        }
        else
        {
            return redirect()->back();
        }
    }


    public function showAllProductDeleted()
    {
        if(Auth::id())
        {
            if(Auth::user()->status==660)
            {
                $product = Product::onlyTrashed()->get();
                return view('product.softdelete',compact('product'));
            }
        }
        else
        {
            return redirect()->back();
        }
    }
    public function getThisProductDeleted($id)
    {
        if(Auth::id())
        {
            if(Auth::user()->status==660)
            {
                Product::withTrashed()->where('id',$id)->restore();
                return redirect()->route('products.index')->with('message','The products restored successfully.');
            }
        }
        else
        {
            return redirect()->back();
        }
    }

}
