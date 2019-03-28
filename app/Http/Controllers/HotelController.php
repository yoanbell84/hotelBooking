<?php

namespace App\Http\Controllers;

use App\Events\DBLog;
use App\Events\SearchHotel;
use Illuminate\Http\Request;
use App\Hotel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::all();
        return view ('front.hotel.index',compact('hotels'));
    }

    public function search(Request $request)
    {

        $hotels = !$request->q ? [] : Hotel::where('name', 'LIKE', '%' . $request->q . '%')
            ->orWhere('address', 'LIKE', '%' . $request->q . '%')
            ->get();


        event(new DBLog( $request, new Collection($hotels) , 'search'));

        return view ('front.hotel.index',compact('hotels'));
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
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
