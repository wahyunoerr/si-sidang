@include('backend.head')

<body id="kt_body" class="header-tablet-and-mobile-fixed aside-enabled">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Aside-->
            <!--end::Aside-->
            <!--begin::Wrapper-->
            @include('backend.content')
            @include('backend.footer')
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--begin::Scrolltop-->
    <!--end::Scrolltop-->
    <!--end::Main-->
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
</body>
</div>
<!--end::Wrapper-->
</div>
<!--end::Page-->
</div>
</body>
