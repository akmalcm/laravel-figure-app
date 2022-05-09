@extends('layouts.app')

@section('content')
    <div class="container">
        <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
            @if ($errors->any())
                <div class="toast alert alert-danger" style="position: fixed; top: 20px; right: 20px; z-index:1">
                    <div class="toast-header">
                        <strong class="mr-auto">Error</strong>
                    </div>
                    <div class="toast-body">
                        {{ $errors->first() }}
                    </div>
                </div>
                <script>
                    $('.toast').fadeIn();

                    let counter = 0;
                    let interval = setInterval(function() {
                        counter++;
                        // Display 'counter' wherever you want to display it.
                        if (counter == 5) {
                            $('.toast').fadeOut();
                            // Display a login box
                            clearInterval(interval);
                        }
                    }, 1000);
                </script>

            @enderror

            <div class="row justify-content-center">
                @foreach ($figures as $item)
                    <div class="col-md-3">
                        <div class="card text-center" style="width: 18rem; margin-bottom: 20px;">
                            {{-- <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div> --}}

                            <div class="card-header">
                                <img class="card-img-top" src="{{ url('/img/' . $item->image) }}"
                                    alt="{{ $item->image }}" style="height:18rem" />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                <h6 class="card-title">RM{{ $item->price }}</h6>
                                <a href="purchase/{{ $item->id }}" class="btn btn-primary">Purchase</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </div>
</div>
@endsection
