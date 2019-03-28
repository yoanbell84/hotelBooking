<form class="form-horizontal" role="form" method="POST" action="{{ route('booking.store') }}" id="bookingForm">
    {!! csrf_field() !!}

    <div class="modal-body">

        <input type="hidden" id="room_id" name="room_id">
        <input type="hidden" id="hotel_id" name="hotel_id">
        <input type="hidden" id="amount" name="amount">
        <input type="hidden" id="tax" name="tax">
        <input type="hidden" id="fee" name="fee">
        <fieldset>
            <legend>Client Information</legend>
            <div class="row" style="padding-bottom: 5px">
                <div class="col form-group">
                    <label for="time_from">Check-in</label>
                    <input class="form-control {{$errors->has('time_from') ? ' is-invalid' : ''}}  " type="date" name="time_from" id="time_from">
                    <span id="error-time_from" class="invalid-feedback"></span>

                </div>
                <div class="col form-group">
                    <label for="time_to">Check-out</label>
                    <input class="form-control {{$errors->has('time_to') ? ' is-invalid' : ''}} " type="date" name="time_to" id="time_to">
                    <span id="error-time_to" class="invalid-feedback"></span>
                </div>
            </div>
            <div class="row" style="padding-bottom: 5px">
                <div class="col form-group">
                    <label for="firstName">First Name</label>
                    <input class="form-control  {{$errors->has('firstName') ? ' is-invalid' : ''}}" type="text" name="firstName" id="firstName">
                    <span id="error-firstName" class="invalid-feedback"></span>
                </div>
                <div class="col form-group">
                    <label for="lastName">Last Name</label>
                    <input class="form-control  {{$errors->has('lastName') ? ' is-invalid' : ''}} " type="text" name="lastName" id="lastName">
                    <span id="error-lastName" class="invalid-feedback"></span>
                </div>
            </div>
            <div class="row" style="padding-bottom: 5px">
                <div class="col form-group">
                    <label for="email">Email</label>
                    <input class="form-control {{$errors->has('email') ? ' is-invalid' : ''}} " type="email" name="email" id="email">
                    <span id="error-email" class="invalid-feedback"></span>
                </div>
                <div class="col form-group">
                    <label for="phone">Phone</label>
                    <input class="form-control {{$errors->has('phone') ? ' is-invalid' : ''}} " type="text" name="phone" id="phone">
                    <span id="error-phone" class="invalid-feedback"></span>
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>Payment Information</legend>
            <div class="row" style="padding-bottom: 5px">
                <div class="col form-group">
                    <label for="card_number">Credit Number</label>
                    <input class="form-control {{$errors->has('card_number') ? ' is-invalid' : ''}} " placeholder="Credit Card Number" type="text" name="card_number" id="card_number">
                    <span id="error-card_number" class="invalid-feedback"></span>
                </div>
                <div class="col form-group">
                    <label for="nameOnCard">Name on Card</label>
                    <input class="form-control {{$errors->has('nameOnCard') ? ' is-invalid' : ''}} " placeholder="Full Name" type="text" name="nameOnCard" id="nameOnCard">
                    <span id="error-nameOnCard" class="invalid-feedback"></span>
                </div>
                <div class="col form-group">
                    <label for="expiration">Expire</label>
                    <input class="form-control {{$errors->has('expiration') ? ' is-invalid' : ''}} " placeholder="mm/yyyy" type="text" name="expiration" id="expiration">
                    <span id="error-expiration" class="invalid-feedback"></span>
                </div>
                <div class="col form-group">
                    <label for="ccv">CCV</label>
                    <input class="form-control {{$errors->has('ccv') ? ' is-invalid' : ''}} " placeholder="ccv" type="text" name="ccv" id="ccv">
                    <span id="error-ccv" class="invalid-feedback"></span>
                </div>
            </div>
        </fieldset>
        <fieldset>
            <div class="row align-items-end">
                <div class="col"></div>
                <div class="col col-lg-3" style="text-align: end">
                    <table style="display: none;" id="summary">
                        <tr> <td>Price:</td><td><strong><span class="text-muted"  id="price"></span></strong></td></tr>
                        <tr> <td>Taxes:</td><td><strong><span class="text-muted"  id="finalTax"></span></strong></td></tr>
                        <tr> <td>Fees:</td><td><strong><span class="text-muted"  id="finalFee"></span></strong></td></tr>
                        <tr> <td>Total:</td><td><strong><span class="text-muted" id="finalAmount" ></span></strong></td></tr>
                    </table>

                </div>
            </div>

        </fieldset>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="save">Save changes</button>
    </div>
</form>
