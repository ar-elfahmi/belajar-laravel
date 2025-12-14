<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
    @include('Template.head')
</head>
<!--end::Head-->
<!--begin::Body-->

<body
    class="layout-fixed fixed-header fixed-footer sidebar-expand-lg sidebar-open bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        <!--begin::Navbar-->
        @include('Template.navbar')
        <!--end::Navbar-->
        <!--begin::Sidebar-->
        @include('Template.sidebar')
        <!--end::Sidebar-->
        <!--begin::App Main-->
        <main class="app-main">
            <!--begin::App Content Header-->
            <div class="app-content-header">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Data Master Temu Dokter</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Temu Dokter</li>
                            </ol>
                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::App Content Header-->
            <!--begin::App Content-->
            <div class="app-content">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-12">
                            <!-- Default box -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Tambah Data Temu Dokter</h3>
                                    <div class="card-tools">
                                        <button
                                            type="button"
                                            class="btn btn-tool"
                                            data-lte-toggle="card-collapse"
                                            title="Collapse">
                                            <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                                            <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                                        </button>
                                        <button
                                            type="button"
                                            class="btn btn-tool"
                                            data-lte-toggle="card-remove"
                                            title="Remove">
                                            <i class="bi bi-x-lg"></i>
                                        </button>
                                    </div>
                                    <!-- konten utama -->
                                </div>
                                <div class="card-body">
                                    <div class="container">
                                        <!-- START FORM -->
                                        <div class="my-3 p-3 bg-body rounded shadow-sm">
                                            <form action="{{ route('admin.temu-dokter.store') }}" method="POST">

                                                @csrf

                                                <div class="mb-3 row">
                                                    <label for="no_urut" class="col-sm-2 col-form-label">No Urut</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" value="Nomor Urut Dibuat Otomatis" readonly>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="waktu_daftar" class="col-sm-2 col-form-label">Waktu Daftar</label>
                                                    <div class="col-sm-10">
                                                        <input type="datetime-local" class="form-control" name="waktu_daftar" required value="{{ now()->format('Y-m-d\TH:i') }}">
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name="status" required>
                                                            <option value="">-- Pilih Status --</option>
                                                            <option value="0">Belum Diperiksa</option>
                                                            <option value="1">Sedang Diperiksa</option>
                                                            <option value="2">Selesai</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="idpet" class="col-sm-2 col-form-label">Pet</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name="idpet" required>
                                                            <option value="">-- Pilih Pet --</option>
                                                            @foreach($data_pet as $pet)
                                                            <option value="{{ $pet->idpet }}">{{ $pet->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="idrole_user" class="col-sm-2 col-form-label">User</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name="idrole_user" required>
                                                            <option value="">-- Pilih User --</option>
                                                            @foreach($data_role_user as $role_user)
                                                            <?php if ($role_user->idrole == 2) { ?>
                                                                <option value="{{ $role_user->idrole_user }}">{{ $role_user->user->nama }}</option>
                                                            <?php } ?>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-sm-2 col-form-label"></label>
                                                    <div class="col-sm-10">
                                                        <a href="{{route('temu-dokter')}}" class="btn btn-secondary">Kembali</a>
                                                        <button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- AKHIR FORM -->
                                    </div>
                                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
                                        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
                                    </script>
                                </div>
                                <!-- /.card-body (akhir konten utama) -->
                                <div class="card-footer">Rumah Sakit Hewan Pendidikan</div>
                                <!-- /.card-footer-->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::App Content-->
        </main>
        <!--end::App Main-->
        <!--begin::Footer-->
        @include('Template.foot')
        <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    @include('Template.script')
    <!--end::Script-->
</body>
<!--end::Body-->

</html>