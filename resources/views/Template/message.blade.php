{{-- Cek apakah ada session bernama 'success' --}}
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{-- Tampilkan pesan dari controller --}}
    {{ session('success') }}

    {{-- Tombol close (silang) bawaan Bootstrap --}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

{{-- Opsional: Cek jika ada error --}}
@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif