<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\webcontent;
use App\Models\product;
use App\Models\blog;

class WebContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $WebContent = webcontent::all();
        return view('webcontent',compact('WebContent'));
    }

    public function getAllData(){

        $data = webcontent::all();
        $products = product::all();
        $blogs = blog::all();

        return response()->json([
            'webContent' => $data,
            'products' => $products,
            'blogs' => $blogs
        ]);
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
        //
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

        $webContent = webcontent::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'content_es'=> 'required|text',
            'content_en'=> 'required|text',
        ], [
            'name.required' => 'El nombre del campo es requerido.',
            'content_es.required' => 'El contenido en español es requerido.',
            'content_en.required' => 'El contenido en ingles es requerido.',
        ]);

        try {
            $webContent->update($validatedData);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while updating the reasons Section. Please try again.']);
        }

        return redirect()->back()->with('success', 'Contenido actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
