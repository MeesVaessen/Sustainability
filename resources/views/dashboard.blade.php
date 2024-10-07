@props(['travels'])

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
