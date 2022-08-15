@extends('back.index')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="page-title">مدیریت کاربران</h4>
                    </div>
                </div>

            </div>
            <!-- Page Title Header Ends-->
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <x-success-message />
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        @switch($user->role)
                                            @case(1)
                                                @php
                                                    $role="Manager";
                                                @endphp
                                            @break

                                            @case(2)
                                                @php
                                                    $role="User";
                                                @endphp
                                            @break
                                        @endswitch
                                        @switch($user->status)
                                            @case(1)
                                                @php
                                                    $url = route('admin.user.status', $user->id);
                                                    // $Status='
                                                    //             <form method="POST" action="'.$url.'">
                                                    //                 @csrf
                                                    //                 @method("POST")
                                                    //                 <button type="submit" class="badge badge-success">Avtive</button>
                                                    //             </form>
                                                    //         ';
                                                    $Status='<a href="' . $url . '" class="badge badge-success">Active</a>';
                                                @endphp
                                            @break

                                            @case(0)
                                                @php
                                                    $url = route('admin.user.status', $user->id);
                                                    // $Status='
                                                    //             <form method="POST" action="'.$url.'">
                                                    //                 @csrf
                                                    //                 @method("POST")
                                                    //                 <button type="submit" class="badge badge-danger">Inavtive</button>
                                                    //             </form>
                                                    //         ';
                                                    $Status='<a href="' . $url . '" class="badge badge-warning">Inactive</a>';
                                                @endphp
                                            @break
                                        @endswitch
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td><label class="badge badge-primary">{{ $role }}</label></td>
                                            <td>{!! $Status !!}</td>
                                            <td>
                                                <a href="{{ route('admin.profile', $user->id) }}"
                                                    class="badge badge-warning">Edit</a>
                                                <form method="POST" action="{{ route('admin.user.delete', $user->id) }}">
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
