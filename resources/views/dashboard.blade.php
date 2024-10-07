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
                    <!-- Flex container to align the button to the right -->
                    <div class="flex justify-between items-center mb-4">
                        <!-- Empty div for the left side alignment -->
                        <div></div>
                        <form action="{{ route('export.csv') }}" method="GET">
                            <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Export CSV
                            </button>
                        </form>
                    </div>

                    <!-- Table -->
                    <table class="table-auto w-full">
                        <thead>
                        <tr>
                            <th class="px-4 py-2 text-left">Name</th>
                            <th class="px-4 py-2 text-left">Type</th>
                            <th class="px-4 py-2 text-left">Distance</th>
                            <th class="px-4 py-2 text-left">CO2 (total)</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($travels as $travel)
                            <tr>
                                <td class="border px-4 py-2">{{ $travel->user->name }}</td>
                                <td class="border px-4 py-2">{{ $travel->travelMode->type }}</td>
                                <td class="border px-4 py-2">{{ $travel->user->distance }} km</td>
                                <td class="border px-4 py-2">
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
