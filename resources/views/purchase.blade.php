@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Purchase form</h1>
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="{{ url('img/' . $figure->image) }}" alt="{{ $figure->name }}"
                width="300">
            <h2>{{ $figure->name }}</h2>
            <p class="lead">{{ $figure->description }}</p>
        </div>

        <div class="row"
            style="background-color: white; display:flex; justify-content:center; padding:20px; border-radius:10px;">
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                <form class="needs-validation" action="/purchase" method="POST">
                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token(); }}">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" value="" required>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="phone">Phone</label>
                        <input type="email" class="form-control" id="phone" name="phone" placeholder="01XXXXXXXX">
                        <div class="invalid-feedback">
                            Please enter a valid phone address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="postcode">Postcode</label>
                            <input type="text" class="form-control" id="postcode" name="postcode" placeholder="Postcode" required>
                            <div class="invalid-feedback">
                                Postcode code required.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="state">State</label>
                            <input type="text" class="form-control" id="state" name="state" placeholder="State" required>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                    </div>
                    {{-- <hr class="mb-4">

                    <h4 class="mb-3">Payment</h4>

                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked
                                required>
                            <label class="custom-control-label" for="credit">Credit card</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                            <label class="custom-control-label" for="debit">Debit card</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                            <label class="custom-control-label" for="paypal">PayPal</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cc-name">Name on card</label>
                            <input type="text" class="form-control" id="cc-name" placeholder="" required>
                            <small class="text-muted">Full name as displayed on card</small>
                            <div class="invalid-feedback">
                                Name on card is required
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cc-number">Credit card number</label>
                            <input type="text" class="form-control" id="cc-number" placeholder="" required>
                            <div class="invalid-feedback">
                                Credit card number is required
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="cc-expiration">Expiration</label>
                            <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                            <div class="invalid-feedback">
                                Expiration date required
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="cc-cvv">CVV</label>
                            <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                            <div class="invalid-feedback">
                                Security code required
                            </div>
                        </div>
                    </div> --}}
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" name="btn_purchase" type="submit">Continue to checkout</button>
                </form>
            </div>
        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; 2017-2020 Company Name</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>
@endsection
