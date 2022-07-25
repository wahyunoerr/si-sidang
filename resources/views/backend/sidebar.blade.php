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
                   <span class="menu-title">Dashboard</span>
                </a>
             </div>

             <div class="menu-item">
                <a class="menu-link {{ request()->is('mahasiswa/daftar-sidang') ? 'active' : ''}}" href="{{ url('mahasiswa/daftar-sidang') }}">
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
                   <span class="menu-title">Daftar Sidang</span>
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
             <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <span class="menu-link {{ request()->is('mahasiswa/role') ? 'active' : ''}}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="black" />
                                <path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Pendaftaran Sidang</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion">
                    <div class="menu-item">
                        <a class="menu-link" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Sidang Kerja Praktik</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Sidang Skripsi</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link" href="#">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Sidang Proposal</span>
                        </a>
                    </div>
                </div>
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
