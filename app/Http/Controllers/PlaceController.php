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
use App\Assessment;
use App\TypeAssessment;

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
        $places = Place::create($request->all());
        return redirect()->route('index');
    }

    public function show($id)
    {
        $place = Place::find($id);
		$likePlace = Place::find($id)->assessments()->likes();
		$disPlace = Place::find($id)->assessments()->dis();
		$photos = $place->photos;
		foreach ($photos as $key =>$value) {
			$data[$key] =  $value->assessments()->likes();
		}
		$likePhoto = collect($data)->sum();
		$ratingPlace = $likePhoto + $likePlace;

        return view('place', compact('place', 'ratingPlace'));
    }

	public function likePlace($id)
	{
		$place = Place::find($id);
		$place->assessments()->create(['type_assessment_id' => 1]);
		return redirect()->route('index');
	}

	public function dislikePlace($id)
	{
		$place = Place::find($id);
		$place->assessments()->create(['type_assessment_id' => 2]);
		return redirect()->route('index');
	}
}
