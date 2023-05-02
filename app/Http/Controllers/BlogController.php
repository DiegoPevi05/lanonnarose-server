<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs       = blog::all();
        return view('blog', compact('blogs'));
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
        $blog = new blog;

        $validatedData = $request->validate([
            'title_es' => 'required|string|max:255',
            'title_en'=> 'required|string|max:255',
            'subTitle_es' => 'required|string',
            'subTitle_en'=> 'required|string',
            'description_es' => 'required|string',
            'description_en'=> 'required|string'
        ], [
            'title_es.required' => 'El titulo inicial es requerido.',
            'title_en.required' => 'El titulo es requerido.',
            'subTitle_es.required' => 'El contenido es requerido.',
            'subTitle_en.required' => 'El contenido es requerido.',
            'description_es.required' => 'El contenido es requerido.',
            'description_en.required' => 'El contenido es requerido.',

            'title_es.max' => 'El numero de caracteres no debe ser superior  :max characters.',
            'title_es.max' => 'El numero de caracteres no debe ser superior  :max characters.',
            'subTitle_es.max' => 'El numero de caracteres no debe ser superior a  :max characters.',
            'subTitle_en.max' => 'El numero de caracteres no debe ser superior a  :max characters.'
        ]);



        $destinationPath = public_path().'/images/blogs' ;

        $fileName1 = '';
        if ($request->hasFile('image1') && $request->file('image1')->isValid()) {
            $file1 = $request->file('image1');
            $extension1 = $file1->extension();
            $fileName1 = 'blogs_'.strtotime('+1 second').'.' .$extension1;
            $file1->move($destinationPath,$fileName1);
        }

        $fileName2 = '';
        if ($request->hasFile('image2') && $request->file('image2')->isValid()) {
            $file2 = $request->file('image2');
            $extension2 = $file2->extension();
            $fileName2 = 'blogs_'.strtotime('+2 second').'.' .$extension2;
            $file2->move($destinationPath,$fileName2);
        }

        $fileName3 = '';
        if ($request->hasFile('image3') && $request->file('image3')->isValid()) {
            $file3 = $request->file('image3');
            $extension3 = $file3->extension();
            $fileName3 = 'blogs_'.strtotime('+3 second').'.' .$extension3;
            $file3->move($destinationPath,$fileName3);
        }

        $fileName4 = '';
        if ($request->hasFile('image4') && $request->file('image4')->isValid()) {
            $file4 = $request->file('image4');
            $extension4 = $file4->extension();
            $fileName4 = 'blogs_'.strtotime('+4 second').'.' .$extension4;
            $file4->move($destinationPath,$fileName4);
        }

        $bulletpoints_es = [];
        // validate if the field is not empty and is a string
        if (!empty($request->bulletpoints_es) && is_string($request->bulletpoints_es)) {

            $bulletpoints_es_raw = explode(',', $request->bulletpoints_es);

            foreach ($bulletpoints_es_raw as $bullet) {
                $bullet = trim($bullet);
                if (!empty($bullet) && is_string($bullet)) {
                    $bulletpoints_es[] = $bullet;
                }
            }
        }

        $bulletpoints_en = [];
        // validate if the field is not empty and is a string
        if (!empty($request->bulletpoints_en) && is_string($request->bulletpoints_en)) {

            $bulletpoints_en_raw = explode(',', $request->bulletpoints_en);

            foreach ($bulletpoints_en_raw as $bullet) {
                $bullet = trim($bullet);
                if (!empty($bullet) && is_string($bullet)) {
                    $bulletpoints_en[] = $bullet;
                }
            }
        }

        $blog->title_es                = $request->title_es;
        $blog->title_en                = $request->title_en;
        $blog->subTitle_es             = $request->subTitle_es;
        $blog->subTitle_en             = $request->subTitle_en;
        $blog->description_es          = $request->description_es;
        $blog->description_en          = $request->description_en;

        if($fileName1 != ''){
            $blog->image1                  = '/images/blogs/'. $fileName1;
        }

        if($fileName2 != ''){
            $blog->image2                  = '/images/blogs/'. $fileName2;
        }

        if($fileName3 != ''){
            $blog->image3                  = '/images/blogs/'. $fileName3;
        }

        if($fileName4 != ''){
            $blog->image4                  = '/images/blogs/'. $fileName4;
        }

        $blog->bulletpoints_es         = json_encode($bulletpoints_es);
        $blog->bulletpoints_en         = json_encode($bulletpoints_en);

        if ($request->isImportant == '1'){
            $blog->isImportant = '1';
        }else{
            $blog->isImportant = '0';
        }

        try {
            $blog->save();
        } catch (\Exception $e) {
            error_log('Some message here.');
            return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while creating the news. Please try again.']);
        }

        return redirect()->back()->with('success', 'Blog is created successfully.');
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
        $blog = blog::findOrFail($id);

        $validatedData = $request->validate([
            'title_es' => 'required|string|max:255',
            'title_en'=> 'required|string|max:255',
            'subTitle_es' => 'required|string',
            'subTitle_en'=> 'required|string',
            'description_es' => 'required|string',
            'description_en'=> 'required|string'
        ], [
            'title_es.required' => 'El titulo inicial es requerido.',
            'title_en.required' => 'El titulo es requerido.',
            'subTitle_es.required' => 'El contenido es requerido.',
            'subTitle_en.required' => 'El contenido es requerido.',
            'description_es.required' => 'El contenido es requerido.',
            'description_en.required' => 'El contenido es requerido.',

            'title_es.max' => 'El numero de caracteres no debe ser superior  :max characters.',
            'title_es.max' => 'El numero de caracteres no debe ser superior  :max characters.',
            'subTitle_es.max' => 'El numero de caracteres no debe ser superior a  :max characters.',
            'subTitle_en.max' => 'El numero de caracteres no debe ser superior a  :max characters.'
        ]);

        $imagePath1 = public_path($blog->image1);
        $imagePath2 = public_path($blog->image2);
        $imagePath3 = public_path($blog->image3);
        $imagePath4 = public_path($blog->image4);

        if (file_exists($imagePath1)) {
            unlink($imagePath1);
        }

        if (file_exists($imagePath2)) {
            unlink($imagePath2);
        }

        if (file_exists($imagePath3)) {
            unlink($imagePath4);
        }

        if (file_exists($imagePath4)) {
            unlink($imagePath4);
        }

        $destinationPath = public_path().'/images/blogs' ;

        $fileName1 = '';
        if ($request->hasFile('image1') && $request->file('image1')->isValid()) {
            $file1 = $request->file('image1');
            $extension1 = $file1->extension();
            $fileName1 = 'blogs_'.strtotime('+1 second').'.' .$extension1;
            $file1->move($destinationPath,$fileName1);
        }

        $fileName2 = '';
        if ($request->hasFile('image2') && $request->file('image2')->isValid()) {
            $file2 = $request->file('image2');
            $extension2 = $file2->extension();
            $fileName2 = 'blogs_'.strtotime('+2 second').'.' .$extension2;
            $file2->move($destinationPath,$fileName2);
        }

        $fileName3 = '';
        if ($request->hasFile('image3') && $request->file('image3')->isValid()) {
            $file3 = $request->file('image3');
            $extension3 = $file3->extension();
            $fileName3 = 'blogs_'.strtotime('+3 second').'.' .$extension3;
            $file3->move($destinationPath,$fileName3);
        }

        $fileName4 = '';
        if ($request->hasFile('image4') && $request->file('image4')->isValid()) {
            $file4 = $request->file('image4');
            $extension4 = $file4->extension();
            $fileName4 = 'blogs_'.strtotime('+4 second').'.' .$extension4;
            $file4->move($destinationPath,$fileName4);
        }

        $bulletpoints_es = [];
        // validate if the field is not empty and is a string
        if (!empty($request->bulletpoints_es) && is_string($request->bulletpoints_es)) {

            $bulletpoints_es_raw = explode(',', $request->bulletpoints_es);

            foreach ($bulletpoints_es_raw as $bullet) {
                $bullet = trim($bullet);
                if (!empty($bullet) && is_string($bullet)) {
                    $bulletpoints_es[] = $bullet;
                }
            }
        }

        $bulletpoints_en = [];
        // validate if the field is not empty and is a string
        if (!empty($request->bulletpoints_en) && is_string($request->bulletpoints_en)) {

            $bulletpoints_en_raw = explode(',', $request->bulletpoints_en);

            foreach ($bulletpoints_en_raw as $bullet) {
                $bullet = trim($bullet);
                if (!empty($bullet) && is_string($bullet)) {
                    $bulletpoints_en[] = $bullet;
                }
            }
        }


        $blog->title_es                = $request->title_es;
        $blog->title_en                = $request->title_en;
        $blog->subTitle_es             = $request->subTitle_es;
        $blog->subTitle_en             = $request->subTitle_en;
        $blog->description_es          = $request->description_es;
        $blog->description_en          = $request->description_en;

        if($fileName1 != ''){
            $blog->image1                  = '/images/blogs/'. $fileName1;
        }

        if($fileName2 != ''){
            $blog->image2                  = '/images/blogs/'. $fileName2;
        }

        if($fileName3 != ''){
            $blog->image3                  = '/images/blogs/'. $fileName3;
        }

        if($fileName4 != ''){
            $blog->image4                  = '/images/blogs/'. $fileName4;
        }

        $blog->bulletpoints_es         = json_encode($bulletpoints_es);
        $blog->bulletpoints_en         = json_encode($bulletpoints_en);

        if ($request->isImportant == '1'){
            $blog->isImportant = '1';
        }else{
            $blog->isImportant = '0';
        }

        try {
            $blog->save();
        } catch (\Exception $e) {
            error_log('Some message here.');
            return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while creating the news. Please try again.']);
        }

        return redirect()->back()->with('success', 'Blog is created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog=blog::findorFail($id);
        $imagePath1 = public_path($blog->image1);
        $imagePath2 = public_path($blog->image2);
        $imagePath3 = public_path($blog->image3);
        $imagePath4 = public_path($blog->image4);

        try {

            if (file_exists($imagePath1)) {
                unlink($imagePath1);
            }

            if (file_exists($imagePath2)) {
                unlink($imagePath2);
            }

            if (file_exists($imagePath3)) {
                unlink($imagePath4);
            }

            if (file_exists($imagePath4)) {
                unlink($imagePath4);
            }
            $blog->delete();
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while deleting the News Section. Please try again.']);
        }

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }
}
