<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $query = Property::query();
        if ($user->role != 'admin') {
            $query->where('user_id', auth()->id());
        }
        $properties = $query->get();
        return view('backend.property.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $cities = City::all();
        return view('backend.property.add', compact(['categories', 'cities']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required|max:50',
            'category'      => 'required|exists:categories,id',
            'city'          => 'required|exists:cities,name',
            'price'         => 'required|gte:0',
            'phone'         => 'required|max_digits:15',
            'email'         => 'required|max:50|email',
            'status'        => 'required|in:available,unavailable',
            'image1'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image2'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image3'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'latitude'      => 'required|max:50',
            'longitude'     => 'required|max:50',
            'description'   => 'required|max:65535',
        ]);
        $user = Auth::user();
        $destinationPath = public_path('uploads/images/');
        if (!file_exists($destinationPath)) {
            File::makeDirectory($destinationPath, 755, true);
        }
        $img1 = null;
        $img2 = null;
        $img3 = null;
        if ($files1 = $request->file('image1')) {
            $img1 = 'image1_' . date('YmdHis') . "." . $files1->getClientOriginalExtension();
            $files1->move($destinationPath, $img1);
        }
        if ($files2 = $request->file('image2')) {
            $img2 = 'image1_' . date('YmdHis') . "." . $files2->getClientOriginalExtension();
            $files2->move($destinationPath, $img2);
        }
        if ($files3 = $request->file('image3')) {
            $img3 = 'image3_' . date('YmdHis') . "." . $files3->getClientOriginalExtension();
            $files3->move($destinationPath, $img3);
        }
        Property::create([
            'name'          => $request->name,
            'slug'          => Str::slug($request->name),
            'user_id'       => $user->id,
            'category_id'   => $request->category,
            'city'          => $request->city,
            'price'         => $request->price,
            'phone'         => $request->phone,
            'email'         => $request->email,
            'status'        => $request->status,
            'lat'           => $request->latitude,
            'long'          => $request->longitude,
            'description'   => $request->description,
            'image1'        => $img1,
            'image2'        => $img2,
            'image3'        => $img3,
        ]);
        return redirect()->route('backend.properties.index')->with('message', 'Success Add Data!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        $user = auth()->user();
        if ($user->role != 'admin' && $property->user_id != $user->id) {
            return redirect()->route('backend.properties.index')->with('message', 'Unauthorize Edit this property!');
        }
        $categories = Category::all();
        $cities = City::all();
        return view('backend.property.edit', compact(['categories', 'property', 'cities']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        $this->validate($request, [
            'name'          => 'required|max:50',
            'category'      => 'required|exists:categories,id',
            'city'          => 'required|exists:cities,name',
            'price'         => 'required|gte:0',
            'phone'         => 'required|max_digits:15',
            'email'         => 'required|max:50|email',
            'status'        => 'required|in:available,unavailable',
            'image1'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image2'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image3'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'latitude'      => 'required|max:50',
            'longitude'     => 'required|max:50',
            'description'   => 'required|max:65535',
        ]);

        $destinationPath = public_path('uploads/images/');
        if (!file_exists($destinationPath)) {
            File::makeDirectory($destinationPath, 755, true);
        }
        $img1 = $property->getRawOriginal('image1');
        $img2 = $property->getRawOriginal('image2');
        $img3 = $property->getRawOriginal('image3');
        if ($files1 = $request->file('image1')) {
            if (!empty($img1) && file_exists($destinationPath . $img1)) {
                File::delete($destinationPath . $img1);
            }
            $img1 = 'image1_' . date('YmdHis') . "." . $files1->getClientOriginalExtension();
            $files1->move($destinationPath, $img1);
        }
        if ($files2 = $request->file('image2')) {
            if (!empty($img2) && file_exists($destinationPath . $img2)) {
                File::delete($destinationPath . $img2);
            }
            $img2 = 'image1_' . date('YmdHis') . "." . $files2->getClientOriginalExtension();
            $files2->move($destinationPath, $img2);
        }
        if ($files3 = $request->file('image3')) {
            if (!empty($img3) && file_exists($destinationPath . $img3)) {
                File::delete($destinationPath . $img3);
            }
            $img3 = 'image3_' . date('YmdHis') . "." . $files3->getClientOriginalExtension();
            $files3->move($destinationPath, $img3);
        }
        $property->update([
            'name'          => $request->name,
            'slug'          => Str::slug($request->name),
            'category_id'   => $request->category,
            'city'          => $request->city,
            'price'         => $request->price,
            'phone'         => $request->phone,
            'email'         => $request->email,
            'status'        => $request->status,
            'lat'           => $request->latitude,
            'long'          => $request->longitude,
            'description'   => $request->description,
            'image1'        => $img1,
            'image2'        => $img2,
            'image3'        => $img3,
        ]);
        return redirect()->route('backend.properties.index')->with('message', 'Success Edit Data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $user = auth()->user();
        if ($user->role != 'admin' && $property->user_id != $user->id) {
            return redirect()->route('backend.properties.index')->with('message', 'Unauthorize Delete this property!');
        }
        $property->delete();
        return redirect()->route('backend.properties.index')->with('message', 'Success Delete Data!');
    }
}
