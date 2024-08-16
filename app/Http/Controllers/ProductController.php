<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Company;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**php artisan serve

     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('companies')->get();
        return view('website.product', compact('products'));
    }

    public function create()
    {
       
        $companies = Company::all();
        return view('website.addProduct', compact('companies'));
    }

    public function show(Product $product)
    {
        return view('website.showProduct', compact('products'));
    }

    public function edit(Product $product)
    {
        // Fetching all companies to allow changing the company associated with the product
        $companies = Company::all();
        return view('website.updateProduct', compact('product', 'companies'));
    }

    public function update(Request $request, Product $product)
    {
        // Validating the request data
        $request->validate([
            'name' => 'required',
            'date' => 'required|date',
            'details' => 'nullable',
            'company' => 'required|exists:companies,id',
        ]);

        // Updating the product with the new data
        $product->update([
            'name' => $request->name,
            'expired_at' => $request->date,
            'details' => $request->details,
            'company_id' => $request->company,
        ]);

        // Redirecting back to the products index page
        return redirect()->route('index');
    }

    public function destroy(Product $product)
    {
        // Deleting the product
        $product->delete();
        return redirect()->route('index');
    }
}
