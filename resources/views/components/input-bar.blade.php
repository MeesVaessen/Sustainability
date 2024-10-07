<div class="flex items-center justify-center">
    <div>
        <div class="flex items-center justify-center">
            <h1 class="mb-3 text-2xl font-bold"> How did you get to work today? </h1>
        </div>

        @if(auth()->user()->distance == null)
            <form id="travel-form1" method=POST action="/">
                @csrf
                <div class="flex flex-row">
                    <div class="flex flex-col">
                        <label for="distance">Distance (rounded to the nearest kilometer):</label>
                        <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="number" id="distance" name="distance" min="0">
                    </div>
                    <div class="flex flex-col ml-4">
                        <label for="type">Mode of transport:</label>

                        <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="type" id="type">
                            @foreach(\App\Models\travelMode::all() as $mode)
                                <option value={{$mode->id}}>{{$mode->type}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    <input class="mt-2 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" form="travel-form1" type="submit" value="Save">
                </div>
            </form>
        @else
            <form id="travel-form2" method=POST action="/">
                @csrf
                <input id="distance" name="distance" type="hidden" value="{{ auth()->user()->distance }}"/>
                <div class="flex flex-row items-center justify-center">
                    <div class="flex flex-col ">
                        <label for="type">Mode of transport:</label>
                        <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="type" id="type">
                            @foreach(\App\Models\travelMode::all() as $mode)
                                <option value={{$mode->id}}>{{$mode->type}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex items-center justify-center">
                    <input class="mt-2 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" form="travel-form2" type="submit" value="Save">
                </div>
            </form>
        @endif



    </div>
</div>
