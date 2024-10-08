@props(['travels'])

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if(!(\App\Models\dailyTravel::query()->where('user_id', auth()->user()->id)->where('date', today())->exists()))
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <x-input-bar />
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Flex container to align the button to the right -->
                    <div class="flex justify-between items-center mb-4">
                        <div></div>
                        <form action="{{ route('export.csv') }}" method="GET" class="flex items-center">
                            <input type="hidden" name="filter" value="{{ request()->input('filter', 'today') }}">
                            <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Export CSV
                            </button>
                        </form>
                    </div>


                    <!-- Filter buttons -->
                    <div class="mb-4">
                        <form action="{{ url()->current() }}" method="GET" class="flex space-x-4">
                            <button type="submit" name="filter" value="today" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-3">
                                Today
                            </button>
                            <button type="submit" name="filter" value="last_week" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-3">
                                Last Week
                            </button>
                            <button type="submit" name="filter" value="last_month" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-3">
                                Last Month
                            </button>
                            <button type="submit" name="filter" value="all" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-3">
                                All
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
                                <td class="border px-4 py-2 flex justify-between items-center">
                                    <div>
                                        @php
                                            $co2Value = $travel->travelMode->co2 * $travel->user->distance;
                                            echo $co2Value;
                                        @endphp
                                        g
                                    </div>

                                    <div style="display: flex; gap: 5px;"> <!-- Use flexbox for colored balls -->
                                        @if($co2Value < 1000)
                                            <div style="width: 10px; height: 10px; background-color: green; border-radius: 5px;"></div>
                                        @endif

                                        @if($co2Value > 1000 && $co2Value < 5000)
                                            <div style="width: 10px; height: 10px; background-color: orange; border-radius: 5px;"></div>
                                        @endif

                                        @if($co2Value > 5000 && $co2Value < 50000)
                                            <div style="width: 10px; height: 10px; background-color: red; border-radius: 5px;"></div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $travels->appends(['filter' => $filter])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
