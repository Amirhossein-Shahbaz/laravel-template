@extends('back.index')
@section('title')
    Article List
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
                <a href="{{ route('admin.article.create') }}" class="btn btn-primary ml-3 mb-3">New Article</a>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <x-success-message />
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        {{-- <th>Description</th> --}}
                                        <th>Author</th>
                                        <th>Categories</th>
                                        <th>Hit</th>
                                        <th>Status</th>
                                        <th>Managment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($articles as $article)
                                        @switch($article->status)
                                            @case(1)
                                                @php
                                                    $url = route('admin.article.status', $article->id);
                                                    $Status='<a href="' . $url . '" class="badge badge-success">Active</a>';
                                                @endphp
                                            @break

                                            @case(0)
                                                @php
                                                    $url = route('admin.article.status', $article->id);
                                                    $Status='<a href="' . $url . '" class="badge badge-warning">Inactive</a>';
                                                @endphp
                                            @break
                                        @endswitch
                                        <tr>
                                            <td>{{ $article->title }}</td>
                                            <td>{{ $article->slug }}</td>
                                            {{-- <td class="text-left">{{ $article->description }}</td> --}}
                                            <td>{{ $article->user->name }}</td>
                                            <td>
                                                @foreach ($article->categories()->pluck('name') as $category)
                                                    <span class="badge badge-primary">{{ $category }}</span>
                                                @endforeach
                                            </td>
                                            <td>{{ $article->hit }}</td>
                                            <td>{!! $Status !!}</td>
                                            <td>
                                                <a href="{{ route('admin.article.edit', $article->id) }}"
                                                    class="badge badge-warning">Edit</a>
                                                <form method="POST"
                                                    action="{{ route('admin.article.delete', $article->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="badge badge-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $articles->links() }}
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
