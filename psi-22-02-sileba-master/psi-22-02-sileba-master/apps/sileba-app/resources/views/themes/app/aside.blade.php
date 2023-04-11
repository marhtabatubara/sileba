<div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle" t>
    <div class="flex-column-fluid" style="color: white;">
        <div class="hover-scroll-overlay-y px-2 my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="{default: '#kt_aside_toolbar, #kt_aside_footer', lg: '#kt_header, #kt_aside_toolbar, #kt_aside_footer'}" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="5px">
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
                <div class="menu-item">
                    <div class="menu-content pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Dashboard</span>
                    </div>
                </div>
                <div class="menu-item py-2">
                    @php
                    $dashboard = '';
                    if (Auth::user()->role == 'o') {
                        $dashboard = route('admin.dashboard');
                    } elseif (Auth::user()->role == 'g') {
                        $dashboard = route('guru.dashboard');
                    } elseif (Auth::user()->role == 's') {
                        $dashboard = route('siswa.dashboard');
                    }
                    @endphp
                    <a class="menu-link {{request()->is('admin/dashboard') || request()->is('guru/dashboard') || request()->is('siswa/dashboard') ? 'active' : ''}} menu-center" href="{{ $dashboard }}" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                        <span class="menu-icon me-0">
                            <i class="bi bi-house fs-2"></i>
                        </span>
                        <span class="menu-title">Home</span>
                    </a>
                </div>
                <div class="menu-item {{Auth::user()->role != 'o' ? 'd-none' : ''}}">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Menu Utama</span>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion" {{Auth::user()->role != 'o' ? 'hidden' : ''}}>
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="black"></path>
                                    <path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="black"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Data Master</span>
                        <span class="menu-arrow"></span>
                    </span>
                    @if(Str::title(Auth::user()->role))
                        <div class="menu-sub menu-sub-accordion" kt-hidden-height="117" style="display: none; overflow: hidden;">
                            <div class="menu-item">
                                <a class="menu-link  {{request()->is('admin/room') || request()->is('guru/room') || request()->is('siswa/room') ? 'active' : ''}} menu-center" href="{{ route('admin.room.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Ruang Kelas</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{request()->is('admin/pelajaran') || request()->is('guru/pelajaran') || request()->is('siswa/pelajaran') ? 'active' : ''}} menu-center" href="{{ route('admin.pelajaran.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Mata Pelajaran</span>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{Auth::user()->role != 'o' ? 'd-none' : ''}}">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="black"></path>
                                    <path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="black"></path>
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Registrasi</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion" kt-hidden-height="117">
                        <div class="menu-item">
                            <a class="menu-link {{request()->is('admin/admin') || request()->is('guru/admin') || request()->is('siswa/admin') ? 'active' : ''}} menu-center" href="{{ route('admin.admin.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Admin</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{request()->is('admin/guru') || request()->is('guru/guru') || request()->is('siswa/guru') ? 'active' : ''}} menu-center" href="{{ route('admin.guru.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Guru</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{request()->is('admin/siswa') || request()->is('guru/siswa') || request()->is('siswa/siswa') ? 'active' : ''}} menu-center" href="{{ route('admin.siswa.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Siswa</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion" {{Auth::user()->role != 'g' ? 'hidden' : ''}}>
                    @if(Str::title(Auth::user()->role))
                    <div class="menu-item">
                        <a class="menu-link  {{request()->is('guru/materi') ? 'active' : ''}} menu-center" href="{{ route('guru.materi.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Materi</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link  {{request()->is('guru/tugas') ? 'active' : ''}} menu-center" href="{{ route('guru.tugas.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Tugas</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link  {{request()->is('guru/nilai') ? 'active' : ''}} menu-center" href="{{ route('guru.nilai.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Nilai</span>
                        </a>
                    </div>
                    @endif
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion" {{Auth::user()->role != 's' ? 'hidden' : ''}}>
                    @if(Str::title(Auth::user()->role))
                    <div class="menu-item">
                        <a class="menu-link  {{request()->is('siswa/materi') ? 'active' : ''}} menu-center" href="{{ route('siswa.materi.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Materi</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link  {{request()->is('siswa/tugas') ? 'active' : ''}} menu-center" href="{{ route('siswa.tugas.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Tugas</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link  {{request()->is('siswa/nilai') ? 'active' : ''}} menu-center" href="{{ route('siswa.nilai.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Nilai</span>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>