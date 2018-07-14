<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PlaceRequest;
use App\Place;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::all();
        return view('placesList', compact('places'));
    }

    public function form()
    {
        return view('form');
    }

    public function create(PlaceRequest $request)
    {
        Place::create($request->all());
        return redirect('places');
    }

    public function show(Request $request, $id)
    {
        $url=[];
        $place = Place::find($id);
        $dir = 'public/'.$id;
        $file = Storage::files($dir);
        $fil = str_replace('public/', '', $file);
        foreach ($fil as $fi) {
            $images = Storage::disk('public')->url($fi);
            $url[]=$images;
        }
        return view('place', compact('place', 'url'));
    }

    public function showForm($id)
    {
        return view('formPhoto', compact('id'));
    }

    public function store(Request $request, $id)
    {
        $place = Place::find($id);
        $path = $request->image->getClientOriginalName();
        $file = $request->image->storeAs($id, $path, 'public');
        return redirect('places/'.$id);
    }
}
