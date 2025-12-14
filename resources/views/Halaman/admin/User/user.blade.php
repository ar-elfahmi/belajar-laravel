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
                            <h3 class="mb-0">Data Master User</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">User</li>
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
                                    <h3 class="card-title">Tabel Data User</h3>
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
                                    @include('Template.message')
                                    <!-- <div class="container"> -->
                                    <!-- START DATA -->
                                    <div class="my-3 p-3 bg-body rounded shadow-sm">
                                        <div class="d-flex justify-content-between align-items-center mb-3">

                                            <a href="{{ route('admin.tambah-user') }}" class="btn btn-primary">Tambah User</a>

                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination m-0">
                                                    <li class="page-item">
                                                        <a class="page-link" href="{{ $data_user->previousPageUrl() }}" aria-label="Previous">
                                                            <span aria-hidden="true">&laquo;</span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="{{$data_user->url(1) }}">1</a></li>
                                                    <li class="page-item"><a class="page-link" href="{{$data_user->url(2) }}">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="{{$data_user->url(3) }}">3</a></li>

                                                    <li class="page-item">
                                                        <a class="page-link" href="{{ $data_user->nextPageUrl() }}" aria-label="Next">
                                                            <span aria-hidden="true">&raquo;</span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                        <!-- <h1>Tabel</h1> -->
                                        <table class="table table-striped">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th class="col-md-1">No</th>
                                                    <th class="col-md-4">Nama</th>
                                                    <th class="col-md-3">Email</th>
                                                    <th class="col-md-2">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($data_user as $user => $value)
                                                <tr>
                                                    <td>{{ $data_user->firstItem() + $user }}</td>
                                                    <td>{{ $value->nama }}</td>
                                                    <td>{{ $value->email }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.edit-user', $value->iduser) }}" class="btn btn-warning btn-sm">Edit</a>
                                                        <a href="{{ route('admin.user.hapus', $value->iduser) }}" class="btn btn-danger btn-sm">Delete</a>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">Tidak ada data</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- AKHIR DATA -->
                                    <!-- </div> -->
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