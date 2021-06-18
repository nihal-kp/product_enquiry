<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Enquiry;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.product.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|min:4',
            'price' => 'required|numeric',
            'description' => 'required',
            'image'=> 'required|file|mimes:png,jpg,jpeg',
        ]);
        $product = new Product;
        $product->product_name = $request->name;
        $product->product_price = $request->price;
        $product->product_description = $request->description;
        $product->product_status = '1';
        // $product->image = $request->file('image')->store('images');

        if($request->hasFile('image')) {
            
            $file = $request->file('image') ;
            
            $fileName = uniqid().'.'.$file->getClientOriginalExtension();
            $destinationPath = base_path().'/public/images';
            $file->move($destinationPath,$fileName);
            $product->product_image = $fileName;
        }
        else
        {
            $product->product_image = '';
        }
        $product->save();
        // return '<script>
        //             alert("New product added");
        //         </script>';
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::all();
        $prod = Product::find($id);

        return view('admin.product.edit', compact('products','prod'));
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
        $this->validate($request, [
            'name' => 'required|max:255|min:4',
            'price' => 'required|numeric',
            'description' => 'required',
            'image'=> 'file|mimes:png,jpg,jpeg',
        ]);
        $product = Product::find($id);
        $product->product_name = $request->name;
        $product->product_price = $request->price;
        $product->product_description = $request->description;
        // $product->product_status = '0';
        // $product->image = $request->file('image')->store('images');

        if($request->hasFile('image')) {
            
            $file = $request->file('image') ;
            
            $fileName = uniqid().'.'.$file->getClientOriginalExtension();
            $destinationPath = base_path().'/public/images';
            $file->move($destinationPath,$fileName);
            $product->product_image = $fileName;
        }
        $product->save();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('product.index');
    }

    public function statusActive(Request $request)
    {
        $id = $request->id;
        Product::where('id',$id)->update(['product_status'=>1]);
        return response()->json(['status' => 1, 'msg' => 'Status changed to active!', 'heading' => 'Success']);
    }

    public function statusInactive(Request $request)
    {
        $id = $request->id;
        Product::where('id',$id)->update(['product_status'=>0]);
        return response()->json(['status' => 1, 'msg' => 'Status changed to inactive!', 'heading' => 'Success']);
    }

    public function customers(Request $request)
    {
        $customers = User::where('role','customer')->get();
        return view('admin.customers', compact('customers'));
    }

    public function enquiries(Request $request)
    {
        $enquiries = Enquiry::all();
        return view('admin.enquiries', compact('enquiries'));
    }
}
