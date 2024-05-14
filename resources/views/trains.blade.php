@extends('layout.main')

@section('content')
    <h1>Lista Treni</h1>
    @dump($trains);
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">company</th>
                <th scope="col">departure_station</th>
                <th scope="col">arrival_station</th>
                <th scope="col">departure_time</th>
                <th scope="col">arrival_time</th>
                <th scope="col">train_code</th>
                <th scope="col">wagons_number</th>
                <th scope="col">on_time</th>
                <th scope="col">cancelled</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trains as $train)
                <tr>
                    {{-- <th scope="row">1</th> --}}
                    <td>{{ $train->id }}</td>
                    <td>{{ $train->company }}</td>
                    <td>{{ $train->departure_station }}</td>
                    <td>{{ $train->arrival_station }}</td>
                    <td>{{ $train->departure_time }}</td>
                    <td>{{ $train->arrival_time }}</td>
                    <td>{{ $train->train_code }}</td>
                    <td>{{ $train->wagons_number }}</td>
                    <td>{{ $train->on_time }}</td>
                    <td>{{ $train->cancelled }}</td>

                </tr>
            @endforeach

        </tbody>
    </table>
@endsection

@section('title')
    Treni disponibili
@endsection
