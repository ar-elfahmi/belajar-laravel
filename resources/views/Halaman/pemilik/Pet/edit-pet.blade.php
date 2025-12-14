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
                                    <h3 class="card-title">Edit Data Pet</h3>
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
                                            <form action="{{ route('pemilik.pet.update', $data_pet->idpet) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label>Nama</label>
                                                    <input type="text" name="nama" class="form-control" value="{{ old('nama', $data_pet->nama) }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Tanggal Lahir</label>
                                                    <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $data_pet->tanggal_lahir) }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Warna Tanda</label>
                                                    <input type="text" name="warna_tanda" class="form-control" value="{{ old('warna_tanda', $data_pet->warna_tanda) }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Jenis Kelamin</label>
                                                    <select class="form-control" name="jenis_kelamin" required>
                                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                                        <option value="J" {{ old('jenis_kelamin', $data_pet->jenis_kelamin) == 'J' ? 'selected' : '' }}>Jantan</option>
                                                        <option value="L" {{ old('jenis_kelamin', $data_pet->jenis_kelamin) == 'L' ? 'selected' : '' }}>Betina</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Pemilik</label>
                                                    <select class="form-control" name="idpemilik" required>
                                                        <option value="">-- Pilih Pemilik --</option>
                                                        @foreach($data_pemilik as $pemilik)
                                                        <option value="{{ $pemilik->idpemilik }}" {{ old('idpemilik', $data_pet->idpemilik) == $pemilik->idpemilik ? 'selected' : '' }}>
                                                            {{ $pemilik->user->nama }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Ras Hewan</label>
                                                    <select class="form-control" name="idras_hewan" required>
                                                        <option value="">-- Pilih Ras Hewan --</option>
                                                        @foreach($data_ras_hewan as $ras)
                                                        <option value="{{ $ras->idras_hewan }}" {{ old('idras_hewan', $data_pet->idras_hewan) == $ras->idras_hewan ? 'selected' : '' }}>
                                                            {{ $ras->nama_ras }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <a href="{{route('pet')}}" class="btn btn-secondary">Kembali</a>
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