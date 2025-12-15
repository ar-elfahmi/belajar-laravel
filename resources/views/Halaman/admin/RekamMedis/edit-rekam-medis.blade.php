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
                            <h3 class="mb-0">Data Master Rekam Medis</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Rekam Medis</li>
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
                                    <h3 class="card-title">Edit Data Rekam Medis</h3>
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
                                            <form action="{{ route('admin.rekam-medis.update', $data_rekam_medis->idrekam_medis) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label>Temu Dokter</label>
                                                    <select class="form-control" name="idreservasi_dokter" required>
                                                        <option value="">-- Pilih Temu Dokter --</option>
                                                        @foreach($data_temu_dokter as $temu)
                                                        <option value="{{ $temu->idreservasi_dokter }}" {{ old('idreservasi_dokter', $data_rekam_medis->idreservasi_dokter) == $temu->idreservasi_dokter ? 'selected' : '' }}>
                                                            {{ $temu->pet->nama }} - {{ $temu->waktu_daftar }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Anamnesa</label>
                                                    <textarea class="form-control" name="anamnesa" rows="3" required>{{ old('anamnesa', $data_rekam_medis->anamnesa) }}</textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Temuan Klinis</label>
                                                    <textarea class="form-control" name="temuan_klinis" rows="3" required>{{ old('temuan_klinis', $data_rekam_medis->temuan_klinis) }}</textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Diagnosa</label>
                                                    <textarea class="form-control" name="diagnosa" rows="3" required>{{ old('diagnosa', $data_rekam_medis->diagnosa) }}</textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Dokter Pemeriksa</label>
                                                    <select class="form-control" name="dokter_pemeriksa" required>
                                                        <option value="">-- Pilih Dokter --</option>
                                                        @foreach($data_role_user as $dokter)
                                                        <option value="{{ $dokter->idrole_user }}" {{ old('dokter_pemeriksa', $data_rekam_medis->dokter_pemeriksa) == $dokter->idrole_user ? 'selected' : '' }}>
                                                            {{ $dokter->user->nama }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <a href="{{route('admin.rekam-medis')}}" class="btn btn-secondary">Kembali</a>
                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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