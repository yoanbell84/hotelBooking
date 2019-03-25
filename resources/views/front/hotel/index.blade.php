@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
        @if($hotels)

            @foreach($hotels as $hotel)
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                    </div>

                    <div class="card-body">
                        <div class="d-flex">
                            <div class="p-2">
                                <img class="img-responsive rounded" src="{{$hotel->image ? $hotel->image->file : 'http://placehold.it/200x100'}}" alt="100" height="100">
                            </div>
                            <div class="p-2">
                                <h4 class="text-primary">{{$hotel->name}} |
                                    @if($hotel->rating && $hotel->rating > 0 )
                                        @for ($i=1; $i <= 5 ; $i++)
                                            <span class="fa fa-star{{ ($i <= round($hotel->rating)) ? '' : '-o'}}"></span>
                                        @endfor
                                    @endif
                                </h4>
                                <p class="text-muted"> {{$hotel->address}}</p>
                                <button type="button" class="btn btn-dark dropdown-toggle"  data-toggle="collapse" href="#collapseRoom_{{$hotel->id}}"><icon class="caret"></icon>Room | Availability</button>
                            </div>
                            <div class="ml-auto p-2 bg bg-info border" style="text-align: right;color:white;border-top-left-radius: 45px;">
                                starting at <br>
                                <h5 style="font-weight: bold">USD ${{ number_format($hotel->lowestRoomPrice,2)}}</h5>
                                <span class="text-white"> per room / night</span><br>
                                <span class="text-white"> *taxes not include</span>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="collapse" id="collapseRoom_{{$hotel->id}}" style="width: 100%">

                                <div class="card-header text-dark"> <h5>Available Rooms</h5>
                                </div>
                                <div class="card card-body">
                                @if($hotel->rooms)
                                        <table class="table table-borderless table-responsive-sm table-sm" style="width: 100%;">
                                            <tbody>
                                @foreach($hotel->rooms as $room)
                                        <tr>
                                            <td> {{strtoupper($room->description)}} </td>
                                            @if($room->status_id == 1)
                                                <td class="text text-primary">{{$room->availability->name}}</td>
                                            @elseif($room->status_id == 2)
                                                <td class="text-warning">{{$room->availability->name}}</td>
                                            @else
                                                <td class="text text-dark">{{$room->availability->name}}</td>
                                            @endif
                                            <td class="btn btn-dark dropdown-toggle btn-sm " style="vertical-align: middle" data-target="#accordion_{{$room->id}}" data-toggle="collapse"> Details
                                            </td>
                                            <td> USD ${{ number_format($room->price,2)}} <span class="text-muted">per room / night</span> </td>
                                            <td> <a href="#">Request</a></td>
                                        </tr>
                                       <tr id="accordion_{{$room->id}}" class="collapse">

                                                   <td>
                                                       @if($room->amenities && count($room->amenities) > 0)
                                                           <span class="text-primary" style="font-size: 14px; font-weight: bold">Amenities</span><br>
                                                           <ul>
                                                               @foreach($room->amenities as $amenity)

                                                                   <li> {{$amenity->description}}</li>

                                                               @endforeach
                                                           </ul>
                                                       @endif
                                                           @if($room->cancellation_policies)
                                                               <span class="text-primary" style="font-size: 14px; font-weight: bold">Cancellation Policies</span><br>
                                                               <span class="text-danger"> {{$room->cancellation_policies}}</span>
                                                           @endif
                                                   </td>
                                                   <td>

                                                       <span class="text-primary" style="font-size: 14px; font-weight: bold">Capacity</span><br>
                                                       @for ($i=1; $i <= 6 ; $i++)
                                                           <span class="fa fa-2x {{ ($i <= $room->capacity) ? 'fa-user' : ''}}"></span>
                                                       @endfor

                                                   </td>
                                                   <td>

                                                       @if($room->offers && count($room->offers) > 0)
                                                           <span class="text-primary" style="font-size: 14px; font-weight: bold">Offers</span><br>
                                                           <ul>
                                                               @foreach($room->offers as $offer)
                                                                   <li> {{$offer->description}}</li>
                                                               @endforeach
                                                           </ul>
                                                       @endif
                                                   </td>
                                           <td class=" p-2" style="text-align: right;">
                                                Price : {{ number_format($room->price,2)}} <span class="text-muted" style="align-items: end">USD</span><br>
                                                Taxes : {{ number_format($room->tax,2)}} <span class="text-muted" style="align-items: end">USD</span><br>
                                                Fees  : {{ number_format($room->fee,2)}} <span class="text-muted" style="align-items: end">USD</span><br>
                                                <strong>Total: </strong>{{number_format(($room->price > 0 ? $room->price : 0) + ($room->tax > 0 ? $room->tax : 0 )   + ($room->fee > 0 ? $room->fee : 0.00 ),2)}} USD
                                           </td>

                                       </tr>
                                @endforeach
                                            </tbody>
                                        </table>
                                @endif
                            </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            @endforeach
        @endif
        </div>
    </div>
@endsection
