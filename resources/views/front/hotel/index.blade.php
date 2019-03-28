@extends('layouts.app')

@section('content')




    <div class="container">
        <div class="row justify-content-center">
            @if( Session::has('created_booking') )
                <div class='alert alert-dismissible alert-success'>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session('created_booking')}}
                </div>
            @endif
        @if($hotels)

            @foreach($hotels as $hotel)
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                    </div>

                    <div class="card-body">


                        <div class="d-flex">
                            <div class="p-2">
                                <img class="img-responsive rounded" src="{{$hotel->image ? 'images/'.$hotel->image : 'http://placehold.it/200x100'}}" width="150" alt="100" height="120">
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
                                <button type="button" class="btn btn-dark dropdown-toggle"  data-toggle="collapse" href="#collapseRoom_{{$hotel->id}}">Room | Availability</button>
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
                                    @foreach($hotel->rooms as $room)

                                            <div class="row" style="padding-bottom: 3px;">
                                                    <div class="col-4">{{strtoupper($room->description)}}</div>
                                                    <div class="col-2">
                                                        @if($room->status_id == 1)
                                                            <span class="text text-primary">{{$room->availability->name}}</span>
                                                        @elseif($room->status_id == 2)
                                                            <span class="text text-warning " style="color: #d88c26!important;">{{$room->availability->name}}</span>
                                                        @else
                                                            <span class="text text-danger">{{$room->availability->name}}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col" ><button type="button" class="btn btn-dark dropdown-toggle btn-sm" data-target="#roomDetail_{{$room->id}}" data-toggle="collapse">Details</button></div>
                                                    <div class="col-3">${{ number_format($room->price,2)}} <span class="text-muted">per room / night</span></div>
                                                    <div class="col">
                                                        @if($room->status_id != 3)
                                                        <a data-toggle="modal"
                                                           data-target="#bookModal"
                                                           data-id="{{$room->id}}"
                                                           data-hotel="{{$hotel->id}}"
                                                           data-tax="{{number_format($room->tax,2)}}"
                                                           data-price="{{number_format($room->price,2)}}"
                                                           data-fee="{{number_format($room->fee,2)}}"
                                                           href="#">
                                                           Request</a>
                                                         @else
                                                            <p style="text-decoration: line-through;color: #3490dc;">Request</p>
                                                        @endif
                                                    </div>
                                            </div>
                                        <div id="roomDetail_{{$room->id}}" class="collapse ">
                                            <div class="card card-header">
                                            <div class="row">
                                                <div class="col">
                                                    <span class="text-primary" style="font-size: 14px; font-weight: bold">No. of people</span><br>
                                                    @for ($i=1; $i <= 6 ; $i++)
                                                        <span class="fa fa-2x {{ ($i <= $room->capacity) ? 'fa-user' : ''}}"></span>
                                                    @endfor
                                                </div>
                                            </div>
                                            <div class="row" style="padding-bottom: 3px;">
                                                <div class="col-4">
                                                    @if($room->amenities && count($room->amenities) > 0)
                                                        <span class="text-primary" style="font-size: 14px; font-weight: bold">Amenities</span><br>
                                                        <ul>
                                                            @foreach($room->amenities as $amenity)

                                                                <li> {{$amenity->description}}</li>

                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </div>

                                                <div class="col-4">
                                                    @if($room->offers && count($room->offers) > 0)
                                                        <span class="text-primary" style="font-size: 14px; font-weight: bold">Offers</span><br>
                                                        <ul>
                                                            @foreach($room->offers as $offer)
                                                                <li> {{$offer->description}}</li>
                                                            @endforeach
                                                        </ul>
                                                    @endif

                                                </div>
                                                <div class="col-3 offset-md-1">
                                                    <table>
                                                        <tr>
                                                            <td style="border-bottom: 1px solid #ddd;"> Price : {{ number_format($room->price,2)}} <span class="text-muted" style="align-items: end">USD</span></td>

                                                        </tr>
                                                        <tr> <td style="border-bottom: 1px solid #ddd;"> Taxes : {{ number_format($room->tax,2)}} <span class="text-muted" style="align-items: end">USD</span></td></tr>
                                                        <tr> <td style="border-bottom: 1px solid #ddd;"> Fees  : {{ number_format($room->fee,2)}} <span class="text-muted" style="align-items: end">USD</span></td>
                                                        </tr>
                                                        <tr><td style="border-bottom: 1px solid #ddd;"> <strong>Total : </strong>{{number_format(($room->price > 0 ? $room->price : 0) + ($room->tax > 0 ? $room->tax : 0 )   + ($room->fee > 0 ? $room->fee : 0.00 ),2)}} USD</td>
                                                        </tr>
                                                    </table>

                                                </div>
                                            </div>
                                            <div class="row" style="padding-bottom: 10px;">
                                                <div class="col-4">
                                                    @if($room->cancellation_policies)
                                                        <span class="text-primary" style="font-size: 14px; font-weight: bold">Cancellation Policies</span><br>
                                                        <span class="text-danger"> {{$room->cancellation_policies}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body"> Data not found </div>
                </div>
            </div>
        @endif
        </div>
    </div>

    <div class="modal fade " id="bookModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Book Room </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @include('front.forms.booking')
            </div>
        </div>
    </div>
@endsection


@push('scripts')

@endpush

