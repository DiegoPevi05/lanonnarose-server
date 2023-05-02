<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products       = product::all();
        return view('product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $product = new product;

        $validatedData = $request->validate([
            'title_es' => 'required|string|max:255',
            'title_en'=> 'required|string|max:255',
            'shortDescription_es' => 'required|string',
            'shortDescription_en'=> 'required|string',
            'description_es' => 'required|string',
            'description_en'=> 'required|string'
        ], [
            'title_es.required' => 'El titulo inicial es requerido.',
            'title_en.required' => 'El titulo es requerido.',
            'shortDescription_es.required' => 'El contenido es requerido.',
            'shortDescription_es.required' => 'El contenido es requerido.',
            'description_es.required' => 'El contenido es requerido.',
            'description_en.required' => 'El contenido es requerido.',

            'title_es.max' => 'El numero de caracteres no debe ser superior  :max characters.',
            'title_en.max' => 'El numero de caracteres no debe ser superior a  :max characters.'
        ]);


        $fileName = '';
        if ($request->hasFile('imageUrl') && $request->file('imageUrl')->isValid()) {
            $file = $request->file('imageUrl');
            $extension = $file->extension();
            $fileName = 'products_'.time().'.' .$extension;
            $destinationPath = public_path().'/images/products';
            $file->move($destinationPath,$fileName);
        }


        $product->title_es                = $request->title_es;
        $product->title_en                = $request->title_en;
        $product->shortDescription_es     = $request->shortDescription_es;
        $product->shortDescription_en     = $request->shortDescription_en;
        $product->description_es          = $request->description_es;
        $product->description_en          = $request->description_en;

        if($fileName != ''){
           $product->imageUrl = '/images/products/'. $fileName;
        }


        try {
            $product->save();
        } catch (\Exception $e) {
            error_log('Some message here.');
            return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while creating the news. Please try again.']);
        }

        return redirect()->back()->with('success', 'Producto is created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = product::findOrFail($id);

        $validatedData = $request->validate([
            'title_es' => 'required|string|max:255',
            'title_en'=> 'required|string|max:255',
            'shortDescription_es' => 'required|string',
            'shortDescription_en'=> 'required|string',
            'description_es' => 'required|string',
            'description_en'=> 'required|string'
        ], [
            'title_es.required' => 'El titulo inicial es requerido.',
            'title_en.required' => 'El titulo es requerido.',
            'shortDescription_es.required' => 'El contenido es requerido.',
            'shortDescription_es.required' => 'El contenido es requerido.',
            'description_es.required' => 'El contenido es requerido.',
            'description_en.required' => 'El contenido es requerido.',

            'title_es.max' => 'El numero de caracteres no debe ser superior  :max characters.',
            'title_en.max' => 'El numero de caracteres no debe ser superior a  :max characters.'
        ]);

        $imagePath = public_path($product->imageUrl);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $fileName = '';
        if ($request->hasFile('imageUrl') && $request->file('imageUrl')->isValid()) {
            $file = $request->file('imageUrl');
            $extension = $file->extension();
            $fileName = 'products_'.time().'.' .$extension;
            $destinationPath = public_path().'/images/products' ;
            $file->move($destinationPath,$fileName);
        }

        $product->title_es                = $request->title_es;
        $product->title_en                = $request->title_en;
        $product->shortDescription_es     = $request->shortDescription_es;
        $product->shortDescription_en     = $request->shortDescription_en;
        $product->description_es          = $request->description_es;
        $product->description_en          = $request->description_en;


        if($fileName != ''){
             $product->imageUrl = '/images/products/'. $fileName;
        }

        try {

        $product->update([
                'title_es' => $product->title_es,
                'title_en' => $product->title_en,
                'shortDescription_es' => $product->shortDescription_es,
                'shortDescription_en' => $product->shortDescription_en,
                'description_es' => $product->description_es,
                'description_en' => $product->description_en,
                'imageUrl' => $product->imageUrl,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while updating the News Section. Please try again.']);
        }

        return redirect()->back()->with('success', 'News updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product=product::findorFail($id);
        $imagePath = public_path($product->imageUrl);

        try {
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $product->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while deleting the News Section. Please try again.']);
        }

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }
}
