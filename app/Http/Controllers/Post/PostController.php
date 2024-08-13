<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post\Post;
use App\Models\Post\PostTranslations;
use App\Models\Language\Language;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postData=Post::with('translations')->get();

        return view('adminpanel.post.PostTables',compact(['postData']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        $lang=Language::where('status',1)->get();
        return view('adminpanel.post.PostCreate',compact(['lang']));
    }

    public function customCreate($id)
    {
        
        $lang=Language::where('status',1)->get();
        return view('adminpanel.post.PostCreate',compact(['lang','id']));
        
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'title' => 'required|string|max:255',
            'article' => 'required',
        
        ]);
        $id=$request->createId;
        if(isset($id) && $id != '')
        {
           
            $post=Post::find($id);
    
            PostTranslations::create(['post_id'=>$post->id,'lang_code'=>$request['language'],'title'=>$request['title'],'article'=>$request['article']]);
    
            return redirect()->route('post.create')->with('success', 'Posta uğurla Yeni dildə məlumat yaradıldı!');
        }

        else
        {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('public/images', $imageName);
            $post=Post::create(['image'=>$imageName,'status'=>$request['status']]);
    
            PostTranslations::create(['post_id'=>$post->id,'lang_code'=>$request['language'],'title'=>$request['title'],'article'=>$request['article']]);
    
            return redirect()->route('post.create')->with('success', 'Post uğurla yaradıldı!');
        }

        
        
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
        
    }

    public function customEdit($id,$lang)
    {
        $postData=Post::find($id);
        $postTranslationsData = PostTranslations::where('post_id', $id)
        ->where('lang_code', $lang)
        ->get();
        
       
       
        return view('adminpanel.post.PostChange',compact(['postData','postTranslationsData']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       

        if($request->hasFile('image')){
             
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('public/images', $imageName);
            $post=Post::findOrFail($id);
            $oldImage = $post->image;
            $post->update(['image'=>$imageName,'status'=>$request['status']]);
            if ($oldImage !='') {
                Storage::delete('public/images/' . $oldImage);
            }
        }
        else{
            $post=Post::findOrFail($id);
            $post->update(['status'=>$request['status']]);
        }
       
        $translation = PostTranslations::where('post_id', $id)
        ->where('lang_code', $request['language'])
        ->first();

    if ($translation) {
        // Modelin özelliklerini güncelle
        $translation->title = $request['title'];
        $translation->article = $request['article'];
        $translation->save(); // Değişiklikleri kaydet


        
    }

    return redirect()->route('post.index')->with('success', 'Post uğurla güncəlləndi!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $postData=Post::findOrFail($id);
        $postData->delete();

        return redirect()->route('post.index')->with('success', 'Post uğurla  silindi!');
    }
}
