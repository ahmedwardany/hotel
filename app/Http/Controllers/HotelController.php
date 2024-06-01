<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHotelRequest;
use App\Http\Requests\SearchHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use App\Http\Resources\HotelResource;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SearchHotelRequest $request)
    {
        $hotels = Hotel::with(['city', 'facilities'])
            ->withName($request->input('name'))
            ->withCountryCode($request->input('country_code'))
            ->withCityName($request->input('city'))
            ->withPricePerNight($request->input('price_per_night'))
            ->orderBy($request->input('sort_by', 'name'))
            ->get();

        return HotelResource::collection($hotels);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateHotelRequest $request)
    {
        $hotel = Hotel::create($request->validated());
        if ($request->has('facilities')) {
            foreach ($request->facilities as $facility) {
                $hotel->facilities()->create($facility);
            }
        }
    
        return new HotelResource($hotel->load('city', 'facilities'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotel = Hotel::with('facilities', 'city')->findOrFail($id);
        return new HotelResource($hotel->load('city', 'facilities'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHotelRequest $request, Hotel $hotel)
    {
        $hotel->update($request->validated());

        return new HotelResource($hotel);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Hotel::destroy($id);
        return response()->json(null, 204);
    }
}
