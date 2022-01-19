<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCatRequest;
use App\Models\Breed;
use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CatController extends Controller
{
    public function create()
    {
        $breeds = Breed::all();

        return view('create', compact('breeds'));
    }

    public function store(StoreCatRequest $request)
    {
        $cat = new Cat();
        $cat->name = $request->name;
        $cat->user_id = Auth::id();
        $cat->description = $request->description;
        $cat->breed_id = $request->breed;
        $cat->birthday = $request->birthday;
        $cat->weight = $request->weight;
        $cat->sex = $request->sex;
        $cat->address = $request->address;
        $cat->address_latitude = $request->address_latitude;
        $cat->address_longitude = $request->address_longitude;
        if ($request->photo){
            $photo_name = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('storage'), $photo_name);
            $cat->photo = $photo_name;
        }

        $cat->save();

        return redirect()->route('dashboard');
    }

    public function show($id)
    {
        $breeds = Breed::all();

        $cat = Cat::where('id', $id)->first();

        return view('edit', compact('breeds', 'cat'));
    }

    public function update(StoreCatRequest $request, $id)
    {
        $cat = Cat::where('id', $id)->first();

        $cat->name = $request->name;
        $cat->description = $request->description;
        $cat->breed_id = $request->breed;
        $cat->birthday = $request->birthday;
        $cat->weight = $request->weight;
        $cat->sex = $request->sex;
        $cat->address = $request->address;
        $cat->address_latitude = $request->address_latitude;
        $cat->address_longitude = $request->address_longitude;
        if ($request->photo){
            $photo_name = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('storage'), $photo_name);
            $cat->photo = $photo_name;
        }

        $cat->save();

        return redirect()->route('dashboard');
    }

    public function map()
    {
        $cats = Cat::where('user_id', Auth::id())->get();

        if ($cats->isNotEmpty()){
            foreach ($cats as $cat){
                $locations[] = [$cat->address_latitude, $cat->address_longitude];
            }
            return view('map', compact('locations'));
        }else{
            return view('map');
        }
    }
}
