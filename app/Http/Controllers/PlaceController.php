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
		$places->assessments()->save(new Assessment(['like'=>'0','dislike'=>'0']));
        return redirect()->route('index');
    }

    public function show($id)
    {
        $place = Place::find($id);
        return view('place', compact('place'));
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
		Photo::create([
			'url' => $url,
			'place_id'=>$id
		]);
		return redirect()->route('place.show', ['id' => $id]);
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
		$place = Place::find($id);

		foreach($place->photos as $photo){
			$item = Photo::find($photo->id);
			$item->assessments()->save(new Assessment(['like'=>'0','dislike'=>'0']));
		}

        return redirect()->route('place.show', ['id' => $id]);
    }
}
