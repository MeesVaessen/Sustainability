<div class="flex items-center justify-center">
    <div>
        <div class="flex items-center justify-center">
            <h1 class="mb-3 text-2xl font-bold"> How did you get to work today? </h1>
        </div>

        @if(auth()->user()->distance == null)
            <form>
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
                                <option value={{$mode->type}}>{{$mode->type}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
        @else
            <form>
                @csrf
                <div class="flex flex-row items-center justify-center">
                    <div class="flex flex-col ">
                        <label for="type">Mode of transport:</label>
                        <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="type" id="type">
                            @foreach(\App\Models\travelMode::all() as $mode)
                                <option value={{$mode->type}}>{{$mode->type}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button></button>
            </form>
        @endif



    </div>
</div>
