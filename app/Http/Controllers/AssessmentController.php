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
	
	public function rating()
	{
		$places = Place::all();
		return view('rating', compact('places'));
	}
}
