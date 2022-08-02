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

        <form class="needs-validation" action="{{ route('register') }}" method="POST" novalidate>
            @csrf
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationCustom01">First name</label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="Name" value=""
                        name="name" required>
                    {{-- <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        You have to enter your name.
                    </div> --}}
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationCustomUsername">Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="validationCustomUsername" placeholder="Email"
                            aria-describedby="inputGroupPrepend" name="email" required>
                        {{-- <div class="invalid-feedback">
                            Please fill email field.
                        </div>
                        <div class="valid-feedback">
                            Looks good!
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationCustom03">Password</label>
                    <input type="password" class="form-control" id="validationCustom03" placeholder="Password"
                        name="password" required>
                    {{-- <div class="invalid-feedback">
                        Please enter Password.
                    </div>
                    <div class="valid-feedback">
                        Looks good!
                    </div> --}}
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationCustom04">Phone</label>
                    <input type="text" class="form-control" id="validationCustom04" placeholder="phone" name="phone"
                        required>
                    {{-- <div class="invalid-feedback">
                        Please enter phone.
                    </div>
                    <div class="valid-feedback">
                        Looks good!
                    </div> --}}
                </div>
            </div>
            {{-- <button class="btn btn-primary" type="submit">Submit form</button> --}}
            <input type="submit" value="Submit form">
        </form>



        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>


    </main>
@endsection
