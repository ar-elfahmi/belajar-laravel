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
                            <h3 class="mb-0">Data Master Detail Rekam Medis</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail Rekam Medis</li>
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
                                    <h3 class="card-title">Tambah Data Detail Rekam Medis</h3>
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
                                            <form action="{{ route('admin.detail-rekam-medis.store') }}" method="POST">

                                                @csrf

                                                <div class="mb-3 row">
                                                    <label for="idrekam_medis" class="col-sm-2 col-form-label">Rekam Medis</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-select" name="idrekam_medis" required>
                                                            <option value="">Pilih Rekam Medis</option>
                                                            @foreach($data_rekam_medis as $rekam)
                                                            <option value="{{ $rekam->idrekam_medis }}">
                                                                {{ $rekam->temuDokter->pet->nama }} - {{ $rekam->temuDokter->waktu_daftar }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="idkode_tindakan_terapi" class="col-sm-2 col-form-label">Tindakan/Terapi</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-select" name="idkode_tindakan_terapi" required>
                                                            <option value="">Pilih Tindakan/Terapi</option>
                                                            @foreach($data_kode_tindakan_terapi as $tindakan)
                                                            <option value="{{ $tindakan->idkode_tindakan_terapi }}">
                                                                {{ $tindakan->kode }} - {{ $tindakan->deskripsi_tindakan_terapi }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="detail" class="col-sm-2 col-form-label">Detail</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" name="detail" rows="3" required></textarea>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-sm-2 col-form-label"></label>
                                                    <div class="col-sm-10">
                                                        <a href="{{route('detail-rekam-medis')}}" class="btn btn-secondary">Kembali</a>
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