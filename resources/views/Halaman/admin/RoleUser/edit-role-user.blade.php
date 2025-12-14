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
                            <h3 class="mb-0">Edit Role User</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.role-user') }}">Role User</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Role User</li>
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
                                    <h3 class="card-title">Form Edit Role User</h3>
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
                                </div>
                                <div class="card-body">
                                    @include('Template.message')

                                    <form action="{{ route('admin.role-user.update', $data_role_user->idrole_user) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="iduser" class="form-label">User</label>
                                                    <select class="form-select" id="iduser" name="iduser" required>
                                                        <option value="">-- Pilih User --</option>
                                                        @foreach($data_user as $user)
                                                        <option value="{{ $user->iduser }}" {{ $data_role_user->iduser == $user->iduser ? 'selected' : '' }}>
                                                            {{ $user->nama }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @error('iduser')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="idrole" class="form-label">Role</label>
                                                    <select class="form-select" id="idrole" name="idrole" required>
                                                        <option value="">-- Pilih Role --</option>
                                                        @foreach($data_role as $role)
                                                        <option value="{{ $role->idrole }}" {{ $data_role_user->idrole == $role->idrole ? 'selected' : '' }}>
                                                            {{ $role->nama_role }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @error('idrole')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="status" class="form-label">Status</label>
                                                    <select class="form-select" id="status" name="status" required>
                                                        <option value="1" {{ $data_role_user->status == 1 ? 'selected' : '' }}>Aktif</option>
                                                        <option value="0" {{ $data_role_user->status == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                                                    </select>
                                                    @error('status')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <a href="{{ route('admin.role-user') }}" class="btn btn-secondary">Batal</a>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-body -->
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