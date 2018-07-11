<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Place;

class Places extends Controller
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

	public function create(Request $request)
    {
		Place::create($request->all());
    	return redirect('places');
    }

	public function show(Request $request, $id)
	{
		$place = Place::find($id);
		//$url = Storage::disk('public')->url('vis.jpg');
		//dd($fullUrl);
		return view('place', compact('place') );
	}

	public function showForm()
	{
		return view('formPhoto');
	}

	public function addPhoto(Request $request, $id)
	{
		$path = $request->image->getClientOriginalName();
		$file = $request->image->storeAs($id, $path, 'public');
		$url = Storage::disk('public')->url('app/public/' .$id .'/'.$path);
		dd($url);
		return redirect ('place');
	}
}
