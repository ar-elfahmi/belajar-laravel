    <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
            <!--begin::Brand Link-->
            <a href="../index.html" class="brand-link">
                <!--begin::Brand Image-->
                <img
                    src="{{asset('AdminLTE/assets/img/logo.jpg')}}"
                    alt="AdminLTE Logo"
                    class="brand-image opacity-75 shadow" />
                <!--end::Brand Image-->
                <!--begin::Brand Text-->
                <span class="brand-text fw-light">RSHP</span>
                <!--end::Brand Text-->
            </a>
            <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
            <nav class="mt-2">
                <!--begin::Sidebar Menu-->
                <ul
                    class="nav sidebar-menu flex-column"
                    data-lte-toggle="treeview"
                    role="navigation"
                    aria-label="Main navigation"
                    data-accordion="false"
                    id="navigation">
                    <!-- Dashboard -->
                    <li class="nav-item">
                        <a href="{{route('beranda')}}" class="nav-link">
                            <i class="nav-icon bi bi-speedometer"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    @if(auth()->user()->role_user()->where('status', '1')->first()->role->nama_role=="Administrator")
                    <!-- Administrator Menu -->
                    <li class="nav-header">DATA MASTER</li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-people-fill"></i>
                            <p>
                                Pengguna
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.user')}}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Data User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.role-user')}}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Role User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.role')}}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Role</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-list-stars"></i>
                            <p>
                                Referensi
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.jenis-hewan')}}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Jenis Hewan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.ras-hewan')}}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Ras Hewan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.kategori')}}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Kategori</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.kategori-klinis')}}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Kategori Klinis</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.kode-tindakan-terapi')}}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Kode Tindakan Terapi</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-database-fill"></i>
                            <p>
                                Data Pasien
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.pemilik')}}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Data Pemilik</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.pet')}}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Data Pet</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-calendar-check-fill"></i>
                            <p>
                                Transaksi
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.temu-dokter')}}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Temu Dokter</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.rekam-medis')}}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Rekam Medis</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.detail-rekam-medis')}}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Detail Rekam Medis</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    @endif

                    @if(auth()->user()->role_user()->where('status', '1')->first()->role->nama_role=="Resepsionis")
                    <!-- Resepsionis Menu -->
                    <li class="nav-header">DATA RESEPSIONIS</li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-people-fill"></i>
                            <p>
                                Data Pasien
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('resepsionis.pemilik')}}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Data Pemilik</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('resepsionis.pet')}}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Data Pet</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-calendar-check-fill"></i>
                            <p>
                                Jadwal Temu
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('resepsionis.temu-dokter')}}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Temu Dokter</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    @endif

                    @if(auth()->user()->role_user()->where('status', '1')->first()->role->nama_role=="Dokter")
                    <!-- Dokter Menu -->
                    <li class="nav-header">MENU DOKTER</li>

                    <li class="nav-item">
                        <a href="{{route('dokter.data-pasien')}}" class="nav-link">
                            <i class="nav-icon bi bi-people-fill"></i>
                            <p>Data Pasien</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-journal-medical"></i>
                            <p>
                                Rekam Medis
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('dokter.rekam-medis')}}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Rekam Medis</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('dokter.detail-rekam-medis')}}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Detail Rekam Medis</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('dokter.profil')}}" class="nav-link">
                            <i class="nav-icon bi bi-person-badge-fill"></i>
                            <p>Profil Dokter</p>
                        </a>
                    </li>

                    @endif

                    @if(auth()->user()->role_user()->where('status', '1')->first()->role->nama_role=="Perawat")
                    <!-- Perawat Menu -->
                    <li class="nav-header">MENU PERAWAT</li>

                    <li class="nav-item">
                        <a href="{{route('perawat.data-pasien')}}" class="nav-link">
                            <i class="nav-icon bi bi-people-fill"></i>
                            <p>Data Pasien</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-journal-medical"></i>
                            <p>
                                Rekam Medis
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('perawat.rekam-medis')}}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Rekam Medis</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('perawat.detail-rekam-medis')}}" class="nav-link">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Detail Rekam Medis</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('perawat.profil')}}" class="nav-link">
                            <i class="nav-icon bi bi-person-badge-fill"></i>
                            <p>Profil Perawat</p>
                        </a>
                    </li>

                    @endif

                    @if(auth()->user()->role_user()->where('status', '1')->first()->role->nama_role=="Pemilik")
                    <!-- Pemilik Menu -->
                    <li class="nav-header">MENU PEMILIK</li>

                    <li class="nav-item">
                        <a href="{{route('pemilik.jadwal-temu-dokter')}}" class="nav-link">
                            <i class="nav-icon bi bi-calendar-check-fill"></i>
                            <p>Jadwal Temu Dokter</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('pemilik.rekam-medis')}}" class="nav-link">
                            <i class="nav-icon bi bi-journal-medical"></i>
                            <p>Rekam Medis</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('pemilik.pet')}}" class="nav-link">
                            <i class="nav-icon bi bi-heart-fill"></i>
                            <p>Data Pet</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('pemilik.profil')}}" class="nav-link">
                            <i class="nav-icon bi bi-person-badge-fill"></i>
                            <p>Profil Pemilik</p>
                        </a>
                    </li>

                    @endif

                    <li class="nav-header">OTHERS</li>
                    <li class="nav-item">
                        <a href="{{route('logout')}}" class="nav-link">
                            <i class="nav-icon bi bi-box-arrow-in-right"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
                <!--end::Sidebar Menu-->
            </nav>
        </div>
        <!--end::Sidebar Wrapper-->
    </aside>