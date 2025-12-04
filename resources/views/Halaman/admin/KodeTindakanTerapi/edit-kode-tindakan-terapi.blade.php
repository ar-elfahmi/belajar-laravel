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
                            <h3 class="mb-0">Data Master Kode Tindakan Terapi</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Kode Tindakan Terapi</li>
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
                                    <h3 class="card-title">Edit Data Kode Tindakan Terapi</h3>
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
                                            <form action="{{ route('kode-tindakan-terapi.update', $data_kode_tindakan_terapi->idkode_tindakan_terapi) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <div class="mb-3">
                                                    <label>Kode</label>
                                                    <input type="text" name="kode" class="form-control" value="{{ old('kode', $data_kode_tindakan_terapi->kode) }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Deskripsi Tindakan Terapi</label>
                                                    <input type="text" name="deskripsi_tindakan_terapi" class="form-control" value="{{ old('deskripsi_tindakan_terapi', $data_kode_tindakan_terapi->deskripsi_tindakan_terapi) }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Kategori</label>
                                                    <select class="form-select" name="idkategori" required>
                                                        <option value="">Pilih Kategori</option>
                                                        @foreach($data_kategori as $kategori)
                                                        <option value="{{ $kategori->idkategori }}" {{ old('idkategori', $data_kode_tindakan_terapi->idkategori) == $kategori->idkategori ? 'selected' : '' }}>
                                                            {{ $kategori->nama_kategori }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Kategori Klinis</label>
                                                    <select class="form-select" name="idkategori_klinis" required>
                                                        <option value="">Pilih Kategori Klinis</option>
                                                        @foreach($data_kategori_klinis as $kategori_klinis)
                                                        <option value="{{ $kategori_klinis->idkategori_klinis }}" {{ old('idkategori_klinis', $data_kode_tindakan_terapi->idkategori_klinis) == $kategori_klinis->idkategori_klinis ? 'selected' : '' }}>
                                                            {{ $kategori_klinis->nama_kategori_klinis }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <a href="{{route('kode-tindakan-terapi')}}" class="btn btn-secondary">Kembali</a>
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