@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center">
            <h1>Purchase form</h1>
        </div>
        <div class="row"
            style="background-color: white; display:flex; justify-content:center; padding:20px; border-radius:10px;">
            <div class="col-md-8 order-md-1">
                <div class="text-center">
                    <img class="d-block mx-auto mb-4" src="{{ url('img/' . $purchase->figure->image) }}"
                        alt="{{ $purchase->figure->name }}" width="300">
                    <h2>{{ $purchase->figure->name }}</h2>
                    <p class="lead">{{ $purchase->figure->description }}</p>
                </div>
                <h4 class="mb-3">Billing address</h4>
                <form class="needs-validation" action="{{ $purchase->id == null ? '/purchase' : '/purchase-update' }}"
                    method="POST">
                    <input @if ($readonly) readonly @endif type="hidden" name="_token" id="_token"
                        value="{{ csrf_token() }}">
                    <input @if ($readonly) readonly @endif type="hidden" name="figure_id" id="figure_id"
                        value="{{ $purchase->figure->id }}">

                    @if ($purchase->id != null)
                        <input @if ($readonly) readonly @endif type="hidden" name="id" id="id"
                            value="{{ $purchase->id }}">
                    @endif

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input @if ($readonly) readonly @endif type="text"
                                class="form-control @error('firstName') is-invalid @enderror" id="firstName"
                                name="firstName" placeholder="First Name"
                                value="{{ old('firstName') ?? ($purchase->firstName ?? '') }}" required>
                            @error('firstName')
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input @if ($readonly) readonly @endif type="text"
                                class="form-control @error('lastName') is-invalid @enderror" id="lastName" name="lastName"
                                placeholder="Last Name" value="{{ old('lastName') ?? ($purchase->lastName ?? '') }}"
                                required>
                            @error('lastName')
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="phone">Phone</label>
                        <input @if ($readonly) readonly @endif type="phone"
                            class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"
                            placeholder="01XXXXXXXX" value="{{ old('phone') ?? ($purchase->phone ?? '') }}">
                        @error('phone')
                            <div class="invalid-feedback">
                                Please enter a valid phone address for shipping updates.
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input @if ($readonly) readonly @endif type="text"
                            class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                            placeholder="Address" value="{{ old('address') ?? ($purchase->address ?? '') }}" required>
                        @error('address')
                            <div class="invalid-feedback">
                                Please provide a valid address.
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="postcode">Postcode</label>
                            <input @if ($readonly) readonly @endif type="text"
                                class="form-control @error('postcode') is-invalid @enderror" id="postcode" name="postcode"
                                placeholder="Postcode" value="{{ old('postcode') ?? ($purchase->postcode ?? '') }}"
                                required>
                            @error('postcode')
                                <div class="invalid-feedback">
                                    Please provide a valid postcode.
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="city">City</label>
                            <input @if ($readonly) readonly @endif type="text"
                                class="form-control @error('city') is-invalid @enderror" id="city" name="city"
                                placeholder="City" value="{{ old('city') ?? ($purchase->city ?? '') }}" required>
                            @error('city')
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="state">State</label>
                            <input @if ($readonly) readonly @endif type="text"
                                class="form-control @error('state') is-invalid @enderror" id="state" name="state"
                                placeholder="State" value="{{ old('state') ?? ($purchase->state ?? '') }}" required>
                            @error('state')
                                <div class="invalid-feedback">
                                    Please select a valid state.
                                </div>
                            @enderror
                        </div>
                        @if (Auth::user()->role == 'admin')
                            <div class="col-md-5 mb-3">
                                <label for="state">Status</label>
                                {!! Form::select('status', ['pending' => 'Pending', 'completed' => 'Completed'], $purchase->status, ['class' => 'form-select']) !!}
                                @error('state')
                                    <div class="invalid-feedback">
                                        Please select a valid state.
                                    </div>
                                @enderror
                            </div>
                        @endif

                    </div>

                    <hr class="mb-4">
                    @if (!$readonly)
                        <input @if ($readonly) readonly @endif class="btn btn-primary btn-lg btn-block"
                            name="btn_purchase" type="submit" value="{{ $purchase->id == null ? 'Submit' : 'Update' }}">
                    @endif

                </form>
            </div>
        </div>
    </div>
@endsection
