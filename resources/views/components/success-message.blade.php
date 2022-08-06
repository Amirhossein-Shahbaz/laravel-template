@if (session('message'))
    <div class="alert-content ml-4">
        <div class="alert-title font-lg text-green-600">
            {{ __('Success!') }}
        </div>

        <ul class="alert-description text-medium text-green-600">
            {{ session('message') }}
        </ul>
    </div>
@endif
