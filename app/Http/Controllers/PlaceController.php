<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PlaceRequest;
use App\Place;
use App\Type;
use App\Photo;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::all();
        return view('placesList', compact('places'));
    }

    public function form()
    {
        $types = Type::all();
        return view('form', compact('types'));
    }

    public function create(PlaceRequest $request)
    {
        Place::create($request->all());
        return redirect('places');
    }

    public function show($id)
    {
        $place = Place::find($id);
        $photos = Photo::all()->where('id_place', $id);
        return view('place', compact('place', 'photos'));
    }

    public function showForm($id)
    {
        return view('formPhoto', compact('id'));
    }

    public function store(Request $request, $id)
    {
        $path = $request->image->getClientOriginalName();
        $value = $request->image->storeAs($id, $path, 'public');
        $url = Storage::url($value);
        Photo::insert(array(
            'url' => $url,
            'id_place' => $id
        ));
        return redirect('places/'.$id);
    }
}
