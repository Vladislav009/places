<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Place;
use App\Photo;
use App\Assessment;

class AssessmentController extends Controller
{
    public function likePlace($id)
	{
		$place = Place::find($id);
		$place->assessments()->increment('like');
		return redirect()->route('index');
	}

	public function likePhoto($id)
	{
		$photo = Photo::find($id);
		$photo->assessments()->increment('like');
		$place_id = $photo->place_id;
		return redirect()->route('place.show',['id' => $place_id]);
	}

	public function dislikePlace($id)
	{
		$place = Place::find($id);
		$place->assessments()->increment('dislike');
		return redirect()->route('index');
	}

	public function dislikePhoto($id)
	{
		$photo = Photo::find($id);
		$photo->assessments()->increment('dislike');
		$place_id = $photo->place_id;
		return redirect()->route('place.show',['id' => $place_id]);
	}
}
