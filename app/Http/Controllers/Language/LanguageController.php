<?php

namespace App\Http\Controllers\Language;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language\Language;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $langData=Language::where('status',1)->Get();
        return view('adminpanel.LanguageTables',compact('langData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminpanel.LanguageCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       Language::create([
        'name'=>$request['name'],
        'locale'=>$request['locale'],
        'status'=>$request['status']
    ]);

    

    return redirect()->route('language.create')->with('success', 'Dil uğurla yaradıldı!');
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
        $langData=Language::findOrFail($id);

        return view('adminpanel.LanguageChange',compact(['langData']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $langData=Language::findOrFail($id);

        $langData->update([
            'name'=>$request['name'],
            'locale'=>$request['locale'],
            'status'=>$request['status']
        ]);

        return redirect()->route('language.index')->with('success', 'Dil uğurla güncəlləndi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $langData=Language::findOrFail($id);
        $langData->delete();

        return redirect()->route('language.index')->with('success', 'Dil uğurla  silindi!');
    }
}
