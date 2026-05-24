<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hangout;
use App\Models\Category;

class HangoutController extends Controller
{
    public function index(Request $request)
    {
        if ($request->rating) {
            $hangouts = Hangout::where('rating', $request->rating)->get();
        } else {
            $hangouts = Hangout::all();
        }

       $categories = Category::all();

       return view('hangout.index', compact('hangouts', 'categories'));
    }

    public function store(Request $request)
    {
        Hangout::create([
            'nama_tempat' => $request->nama_tempat,
            'lokasi' => $request->lokasi,
            'rating' => $request->rating,
            'suasana' => $request->suasana,
            'category_id' => $request->category_id,
        ]);

        return redirect('/');
    }

    public function destroy($id)
    {
    $hangout = Hangout::findOrFail($id);
    $hangout->delete();

    return redirect('/');
    }

    public function update(Request $request, $id)
    {
    $hangout = Hangout::findOrFail($id);

    $hangout->update([
        'nama_tempat' => $request->nama_tempat,
        'lokasi' => $request->lokasi,
        'rating' => $request->rating,
        'suasana' => $request->suasana,
    ]);

    return redirect('/');
    }
}