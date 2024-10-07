@props(['travels'])

<table class="table-auto">
    <thead>
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Distance</th>
        <th>CO2 (total)</th>
    </tr>
    </thead>
    <tbody>
    @foreach($travels as $travel)
        <tr>
            <td>{{ $travel->user->name }}</td>
            <td>{{ $travel->travelMode->type }}</td>
            <td>{{ $travel->user->distance }} km</td>
            <td>
                @php
                    echo $travel->travelMode->co2 * $travel->user->distance;
                @endphp
                g
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
