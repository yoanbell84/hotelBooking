<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Card;
use App\Customer;
use App\Room;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use LVR\CreditCard\CardNumber;
use LVR\CreditCard\CardCvc;
use LVR\CreditCard\CardExpirationDate;
use Illuminate\Support\Facades\Validator;
use App\Events\DBLog;

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
     * @param  \Illuminate\Http\Request;  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'time_from' => 'required|date',
            'time_to' => 'required|date|after:time_from',
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'phone' => 'required|string|max:12',
            'nameOnCard' => 'required|string|max:255',
            'card_number' => ['required', new CardNumber],
            'expiration' => ['required', new CardExpirationDate('m/y')],
            'ccv' => ['required', new CardCvc($request->card_number)]
        ]);

        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);


        } else {

            $input = $request->all();

            $room = Room::findOrFail($request->room_id);
            if (!$room) return false;

            $customer = Customer::create([
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'email' => $request->email,
                'phone' => $request->phone
            ]);
            if (!$customer) return false;
            $input['customer_id'] = $customer->id;

            $card = Card::create([
                'card_number' => $request->card_number,
                'nameOnCard' => $request->nameOnCard,
                'ccv' => $request->ccv,
                'expiration' => $request->expiration,
                'customer_id' => $customer->id
            ]);

            if (!$card) return false;


            Booking::create($input);
            $room->status_id = 2;
            $room->save();

            Session::flash('created_booking', 'The booking has been created');

            $results = [
                'customer_email' => $customer->email,
                'customer_name' => $customer->firstName.' ' .$customer->lastName,
                'customer_used_card' => $card->card_number,
                'booking_amount' => $request->amount,
                'booking_taxes' => $request->tax,
                'booking_fees' => $request->fee
            ];
            event(new DBLog( $request, new Collection($results)));
            return response()->json([
                'status' => 'success',
                'response_code' => 200,
                'redirect_url' => route('home')
            ]);


        }
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
