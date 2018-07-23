<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\PlaceRequest;
use App\Http\Requests\PhotoRequest;
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
        $photos = $place->photos();
        return view('place', compact('place','photos'));
    }

    public function showForm($id)
    {
        return view('formPhoto', compact('id'));
    }

	public function storeSelect(PhotoRequest $request)
    {
		$path = $request->image->getClientOriginalName();
        $id = $request->type;
        $value = $request->image->storeAs($id, $path, 'public');
        $url = Storage::url($value);
        Photo::insert(array(
            'url' => $url,
			'place_id'=>$id
        ));
        return redirect('places/'.$id);
    }

	public function addFormSelect(Request $request)
    {
		$places = Place::all();
        return view('formPhotoSelect', compact('places'));
    }

    public function store(PhotoRequest $request, $id)
    {
        $path = $request->image->getClientOriginalName();
        $value = $request->image->storeAs($id, $path, 'public');
        $url = Storage::url($value);
        Photo::insert(array(
            'url' => $url,
			'place_id'=>$id
        ));
        return redirect('places/'.$id);
    }
}
