@if (session('message'))
    <div class="grid justify-items-center bg-blue-200 ml-4">
        <div class="font-lg text-lg text-green-600">
            {{ __('Success!') }}
        </div>

        <ul class="text-lg text-green-600">
            {{ session('message') }}
        </ul>
    </div>
@endif
