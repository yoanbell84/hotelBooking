<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Card;
use App\Customer;
use App\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $input = $request->all();
        $room = Room::findOrFail($request->room_id);
        if(!$room) return false;

        $customer = Customer::create([
            'firstName'=>$request->firstName ,
            'lastName' => $request->lastName ,
            'email' => $request->email ,
            'phone' => $request->phone
        ]);
        if(!$customer) return false;
        $input['customer_id'] = $customer->id;

        $card = Card::create([
            'number'=>$request->number ,
            'nameOnCard' => $request->nameOnCard ,
            'ccv' => $request->ccv ,
            'expiration' => $request->expiration,
            'customer_id' => $customer->id
        ]);

        if(!$card) return false;

        dd($request);
        $booking = Booking::create($input);
        $room->status_id = 2;
        $room->save();

        Session::flash('created_booking', 'The booking has been created');
        return redirect('home');
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
