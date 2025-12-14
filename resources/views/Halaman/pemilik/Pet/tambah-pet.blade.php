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
                            <h3 class="mb-0">Data Master Pet</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Pet</li>
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
                                    <h3 class="card-title">Tambah Data Pet</h3>
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
                                            <form action="{{ route('pemilik.pet.store') }}" method="POST">

                                                @csrf

                                                <div class="mb-3 row">
                                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="nama" required>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                                    <div class="col-sm-10">
                                                        <input type="date" class="form-control" name="tanggal_lahir" required>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="warna_tanda" class="col-sm-2 col-form-label">Warna Tanda</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="warna_tanda" required>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name="jenis_kelamin" required>
                                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                                            <option value="J">Jantan</option>
                                                            <option value="L">Betina</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="idpemilik" class="col-sm-2 col-form-label">Pemilik</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name="idpemilik" required>
                                                            <option value="">-- Pilih Pemilik --</option>
                                                            @foreach($data_pemilik as $pemilik)
                                                            <option value="{{ $pemilik->idpemilik }}">{{ $pemilik->user->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="idras_hewan" class="col-sm-2 col-form-label">Ras Hewan</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name="idras_hewan" required>
                                                            <option value="">-- Pilih Ras Hewan --</option>
                                                            @foreach($data_ras_hewan as $ras)
                                                            <option value="{{ $ras->idras_hewan }}">{{ $ras->nama_ras }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-sm-2 col-form-label"></label>
                                                    <div class="col-sm-10">
                                                        <a href="{{route('pet')}}" class="btn btn-secondary">Kembali</a>
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