@extends('back.index')
@section('title')
    Edit Article
@endsection
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="page-title">Article Managment</h4>
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
                            <form method="POST" action="{{ route('admin.article.update', $article->id) }}">
                                @csrf
                                @method('PUT')
                                <!-- Name -->
                                <div>
                                    <x-label for="title" :value="__('Title')" />
                                    <x-input id="title" class="block mt-1 w-full" type="text" name="title"
                                        value="{{ $article->title }}" autofocus />
                                </div>

                                <!-- Email Address -->
                                <div class="mt-4">
                                    <x-label for="slug" :value="__('Slug')" />

                                    <x-input id="slug" class="block mt-1 w-full" type="text" name="slug"
                                        value="{{ $article->slug }}" />
                                </div>

                                <div class="mt-4">
                                    <x-label for="description" :value="__('Description')" />

                                    {{-- <x-input id="description" class="block mt-1 w-full" type="text" name="description" /> --}}

                                    <textarea id="description" class="block mt-1 w-full" name="description">{{ $article->description }}</textarea>
                                </div>

                                <div class="mt-4">
                                    <x-label for="status" :value="__('Status')" />
                                    <select name="status" id="status">
                                        <option value="0">Unpublish</option>
                                        <option value="1" <?php if ($article->status == 1) {
                                            echo 'Selected';
                                        } ?>>Publish</option>
                                    </select>
                                </div>

                                <div class="mt-4">
                                    <x-label for="category" :value="__('Category')" />
                                    <select class="choosen-select" name="category[]" id="category" multiple>
                                        @foreach ($categories as $cat_id => $cat_name)
                                            <option value="{{ $cat_id }}" <?php if(in_array($cat_id, $article->categories->pluck('id')->toArray()))echo 'selected'; ?>>{{ $cat_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mt-4">
                                    <label for="user_id">Author : {{ Auth::user()->name }}</label>
                                    <x-input id="user_id" class="block mt-1 w-full" type="hidden" name="user_id"
                                        value="{{ Auth::user()->id }}" />
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <x-button class="ml-4">
                                        {{ __('Update') }}
                                    </x-button>
                                    <a href="{{ route('admin.article') }}" class="btn btn-danger">Back</a>
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
