@extends('front.index')


@section('content')
    <style>
        .breadcrumb-item+.breadcrumb-item::before {
            content: url('front/images/img/arrow-left.svg');
            width: 25px;
            height: 25px;
            transform: translateY(4.5px);
        }
    </style>


    <section id="intro2" class="clearfix"></section>
    <main class="container main2">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bgcolor">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Register</li>
            </ol>
        </nav>

        <form action="{{ route('registery') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationCustom01">First name</label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="Name" name="name">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationCustomUsername">Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="validationCustomUsername" placeholder="Email"
                            aria-describedby="inputGroupPrepend" name="email">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationCustom03">Password</label>
                    <input type="password" class="form-control" id="validationCustom03" placeholder="Password"
                        name="password">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationCustom04">Phone</label>
                    <input type="text" class="form-control" id="validationCustom04" placeholder="phone" name="phone">
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Submit form</button>
        </form>


    </main>
@endsection
