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

class PhotoController extends Controller
{
	public function showForm($id)
	{
		return view('formPhoto', compact('id'));
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
        Photo::create([
			'url' => $url,
			'place_id'=>$id
		]);

        return redirect()->route('place.show', ['id' => $id]);
    }

	public function storeSelect(PhotoRequest $request)
    {
		$path = $request->image->getClientOriginalName();
        $id = $request->type;
        $value = $request->image->storeAs($id, $path, 'public');
        $url = Storage::url($value);
		Photo::create([
			'url' => $url,
			'place_id'=>$id
		]);
		return redirect()->route('place.show', ['id' => $id]);
    }

	public function likePhoto($id)
	{
		$photo = Photo::find($id);
		$photo->assessments()->create(['type_assessment_id' => 1]);
		$place_id = $photo->place_id;
		return redirect()->route('place.show',['id' => $place_id]);
	}

	public function dislikePhoto($id)
	{
		$photo = Photo::find($id);
		$photo->assessments()->create(['type_assessment_id' => 2]);
		$place_id = $photo->place_id;
		return redirect()->route('place.show',['id' => $place_id]);
	}
}
