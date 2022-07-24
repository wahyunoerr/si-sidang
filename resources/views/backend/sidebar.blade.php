<div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Aside Toolbarl-->
    <div class="aside-toolbar flex-column-auto" id="kt_aside_toolbar">
       <!--begin::User-->
       <div class="aside-user d-flex align-items-sm-center justify-content-center py-5">
          <!--begin::Symbol-->
          <div class="symbol symbol-50px">
             <img src="{{ asset(Auth::user()->foto)}}" alt="" />
          </div>
          <!--end::Symbol-->
          <!--begin::Wrapper-->
          <div class="aside-user-info flex-row-fluid flex-wrap ms-5">
             <!--begin::Section-->
             <div class="d-flex">
                <!--begin::Info-->
                <div class="flex-grow-1 me-2">
                   <!--begin::Username-->
                   <a href="{{ route('profil.index') }}" class="text-white text-hover-primary fs-6 fw-bold">{{ Auth::user()->name }}</a>
                   <!--end::Username-->
                   <!--begin::Description-->
                   <span class="text-gray-600 fw-bold d-block fs-8 mb-1">{{ Auth::user()->email }}</span>
                   <!--end::Description-->
                   <!--begin::Label-->
                   <div class="d-flex align-items-center text-success fs-9">
                      <span class="bullet bullet-dot bg-success me-1"></span>online
                   </div>
                   <!--end::Label-->
                </div>
                <!--end::Info-->
                <!--begin::User menu-->
                <!--end::User menu-->
             </div>
             <!--end::Section-->
          </div>
          <!--end::Wrapper-->
       </div>
       <!--end::User-->
    </div>
    <!--end::Aside Toolbarl-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
       <!--begin::Aside Menu-->
       <div class="hover-scroll-overlay-y px-2 my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="{default: '#kt_aside_toolbar, #kt_aside_footer', lg: '#kt_header, #kt_aside_toolbar, #kt_aside_footer'}" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="5px">
          <!--begin::Menu-->
          <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
             <div class="menu-item">
                <div class="menu-content pb-2">
                   <span class="menu-section text-muted text-uppercase fs-8 ls-1">Dashboard</span>
                </div>
             </div>
             <div class="menu-item">
                <a class="menu-link {{ request()->is('home') ? 'active' : ''}}" href="{{ url('/home') }}">
                   <span class="menu-icon">
                      <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                      <span class="svg-icon svg-icon-2">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                            <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                            <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                            <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                         </svg>
                      </span>
                      <!--end::Svg Icon-->
                   </span>
                   <span class="menu-title">Default</span>
                </a>
             </div>

             <div class="menu-item">
                <a class="menu-link {{ request()->is('admin/role') ? 'active' : ''}}" href="#">
                   <span class="menu-icon">
                      <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                      <span class="svg-icon svg-icon-2">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                            <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                            <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                            <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                         </svg>
                      </span>
                      <!--end::Svg Icon-->
                   </span>
                   <span class="menu-title">Manajemen User</span>
                </a>
             </div>

             <div class="menu-item">
                <div class="menu-content">
                   <div class="separator mx-1 my-4"></div>
                </div>
             </div>
          </div>
          <!--end::Menu-->
       </div>
       <!--end::Aside Menu-->
    </div>
    <!--end::Aside menu-->
    <!--begin::Footer-->
    <div class="aside-footer flex-column-auto py-5" id="kt_aside_footer">
       <a href="{{ route('logout') }}"
       onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();"  class="btn btn-danger w-100" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" title="200+ in-house components and 3rd-party plugins">Log Out</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
    </form>
          <span class="btn-label">Docs &amp; Components</span>
          <!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->
          <!--end::Svg Icon-->
       </a>
    </div>
    <!--end::Footer-->
 </div>
</div>
