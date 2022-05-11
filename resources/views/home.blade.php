@extends('layouts.app')

@section('content')
    <div class="container">
        <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
            <div class="row justify-content-center">
                @foreach ($figures as $item)
                    <div class="col-md-3">
                        <div class="card text-center" style="width: 18rem; margin-bottom: 20px;">
                            <div class="card-header">
                                <img class="card-img-top" src="{{ url('/img/' . $item->image) }}"
                                    alt="{{ $item->image }}" style="height:18rem" />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                <h6 class="card-title">RM{{ $item->price }}</h6>
                                <a href="purchase/form/{{ $item->id }}" class="btn btn-primary">Purchase</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </div>
</div>
@endsection
