@if (session('message'))
    <div class="grid bg-green-200 p-2  w-full rounded rounded-lg">
        <div class="font-lg text-lg text-green-600">
            {{ __('Success!') }}
        </div>

        <ul class="text-lg mt-2 text-green-600">
            {{ session('message') }}
        </ul>
    </div>
@endif
