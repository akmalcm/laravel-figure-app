@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Figure</th>
                        <th scope="col">Purchase Date</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($purchases as $item)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $item->figure->name }}</td>
                            <td>{{ $item->created_date }}</td>
                            <td>@mdo</td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
