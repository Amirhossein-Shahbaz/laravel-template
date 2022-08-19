<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- plugins:css -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('/back/assets/css/chosen.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/back/assets/vendors/iconfonts/ionicons/css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('/back/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/back/assets/vendors/iconfonts/typicons/src/font/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('/back/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/back/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('/back/assets/vendors/css/vendor.bundle.addons.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('/back/assets/css/shared/style.css') }}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('/back/assets/css/demo_1/style.css') }}">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="{{ asset('/back/assets/images/favicon.png') }}" />


    <script src="https://cdn.tiny.cloud/1/xwizw2s2xfcngylt0xztupsxfiepfwejt8pnrfy0xjqhm1cb/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>


    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
            toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
        });
    </script>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('back.navbar')
        <!-- partial -->
        <div style="margin-right: -15px;" class="container-fluid page-body-wrapper bg-red">
            <!-- partial:partials/_sidebar.html -->
            @include('back.sidebar')
            <!-- partial -->

            <!-- main-panel ends -->
            @yield('content')

        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    {{-- <script src="{{ asset('back/assets/vendors/jquery/easing/jquery.easing.min.js') }}"></script> --}}
    <script src="{{ asset('back/assets/js/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('back/assets/js/chosen.proto.min.js') }}"></script>
    <script src="{{ asset('back/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('back/assets/vendors/js/vendor.bundle.addons.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('back/assets/js/shared/off-canvas.js') }}"></script>
    <script src="{{ asset('back/assets/js/shared/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('back/assets/js/demo_1/dashboard.js') }}"></script>
    <!-- End custom js for this page-->
</body>

</html>
