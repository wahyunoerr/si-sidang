@include('backend.head')
   <body id="kt_body" class="header-tablet-and-mobile-fixed aside-enabled">
      <!--begin::Main-->
      <!--begin::Root-->
      <div class="d-flex flex-column flex-root">
         <!--begin::Page-->
         <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Aside-->
        @include('backend.sidebar')
            <!--end::Aside-->
            <!--begin::Wrapper-->
        @include('backend.topbar')
         </div>
         <!--end::Page-->
      </div>
      <!--begin::Scrolltop-->
      @include('backend.footer')
