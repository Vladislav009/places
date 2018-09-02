<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use App\Photo;
use App\Assessment;

class AssessmentController extends Controller
{

	public function rating()
	{
		$places = Place::all();
		foreach($places as $key => $place){
			$likePlaces  = $place->assessments()->likes();
			$disLikePlaces = $place->assessments()->dis();
			$ratingPhoto = $likePlaces - $disLikePlaces;
			dump($ratingPhoto);
		}

		return view('rating', compact('places','ratingPhoto'));
	}
}
