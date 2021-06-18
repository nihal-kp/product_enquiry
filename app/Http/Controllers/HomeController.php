<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Enquiry;
use App\Models\User;
use App\Mail\EnquiryMail;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('product_status',1)->get();
        return view('index', compact('products'));
    }

    public function enquiry($id)
    {
        $product = Product::find($id);
        return view('enquiry', compact('product'));
    }

    public function sendEnquiry(Request $request)
    {
        $this->validate($request, [
            'enquiry' => 'required',
        ]);
        $newEnquiry = Enquiry::create($request->all());

        $enquiry = Enquiry::where('id',$newEnquiry->id)->first();
        $admin = User::where('role','admin')->first();

        $details = [
                  'product_name' => $enquiry->product->product_name,
                  'product_price' => $enquiry->product->product_price,
                  'customer_name' => $enquiry->user->name,
                  'customer_email' => $enquiry->user->email,
                  'enquiry' => $enquiry->enquiry
               ];
      Mail::to($admin->email)->send(new EnquiryMail($details));

        return '<script type="text/javascript">
                    alert("Enquiry sent successfully!"); 
                    window.location.href="/";
                </script>';
    }

}
