<?php

namespace App\Http\Controllers\Admin;
//Pemanggilan
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryRequest;
use App\Gallery;
use App\TravelPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use View;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resourcep
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Gallery::with(['travel_package'])->get();

        return view('pages.admin.gallery.index',
            ['items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        $travel_packages = TravelPackage::all();
        return view('pages.admin.gallery.create',
        [
            'travel_packages' => $travel_packages
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        $input = $request->all();
        $picture = $request->file('image');
        if ($picture) {
            $img = Image ::make ($picture->getRealPath());
            $img->resize(500,null,function($constraint){
                $constraint->aspectRatio();
            })->encode('png');
            
            $directoryName = "thumbnail";
            $pictureName = $picture->hashName();
            $path = $directoryName. '/' .$pictureName;
            $img_resources = $img->getEncoded();
            Storage::disk('public')->put($path,$img_resources,'public');
            $input['image'] = $path;
        }


      Gallery::create([
          'travel_packages_id' =>$request->travel_packages_id,
          'image' =>$path,
      ]);

      return redirect()->route('gallery.index');
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
       $item = Gallery::findOrFail($id);
       $travel_packages = TravelPackage::all();
       return view('pages.admin.gallery.edit',[
            'item' => $item,
            'travel_packages ' => $travel_packages
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryRequest $request, $id)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/gallery','public',
        );

        $item = Gallery::findOrFail($id);
        $item ->update($data);
        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Gallery::findOrFail($id);
        $item ->delete();

        return redirect()->route('gallery.index'); 
    }
}
