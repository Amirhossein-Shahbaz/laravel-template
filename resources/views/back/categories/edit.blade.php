@extends('back.index')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="page-title">ویرایش دسته بندی ها</h4>
                    </div>
                </div>

            </div>
            <!-- Page Title Header Ends-->
            <div class="row">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <x-success-message class="mb-4" />
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.category.update', $category->id) }}">
                                @csrf
                                @method('PUT')
                                <!-- Name -->
                                <div>
                                    <x-label for="title" :value="__('Title')" />
                                    <x-input id="title" class="block mt-1 w-full" type="text" name="title"
                                        value="{{ $category->name }}" required autofocus />
                                </div>

                                <!-- Email Address -->
                                <div class="mt-4">
                                    <x-label for="slug" :value="__('Description')" />

                                    <x-input id="slug" class="block mt-1 w-full" type="text" name="slug"
                                        value="{{ $category->slug }}" required />
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <x-button class="ml-4">
                                        {{ __('Create') }}
                                    </x-button>
                                    <a href="{{ route('admin.category') }}" class="btn btn-danger">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('back.footer')
        <!-- partial -->
    </div>
@endsection
