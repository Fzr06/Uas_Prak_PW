@extends('layouts.app')

@section('title', 'kelola Peminjaman')

@section('content')

<div class="max-w-3xl mx-auto space-y-6">

    {{-- Header --}}
    <div>
        <p class="text-xs font-semibold uppercase tracking-widest mb-1"
           style="color:#b8860b; letter-spacing:0.12em;">
            Admin
        </p>

        <h1 style="font-family:'Poppins',sans-serif; font-size:1.75rem; font-weight:700; color:#0f0f0f;">
            kelola Peminjaman
        </h1>

        <p class="text-sm mt-1" style="color:#6b6457;">
            Admin dapat mengelola peminjaman buku untuk anggota.
        </p>
    </div>

    {{-- Form --}}
    <div class="rounded-xl p-6 space-y-5"
         style="background:#fff; border:1px solid #e0d9cf;">

        <form action="{{ route('admin.peminjaman.store') }}"
              method="POST"
              class="space-y-5">

            @csrf

            {{-- Pilih Anggota --}}
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wide mb-1.5"
                       style="color:#6b6457;">
                    Pilih Anggota
                </label>

                <select name="user_id"
                        class="w-full px-4 py-2.5 rounded-lg text-sm border border-gray-200"
                        style="background:#faf8f4; color:#0f0f0f;">

                    <option value="">-- Pilih Anggota --</option>

                    @foreach($anggota as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->name }} - {{ $user->email }}
                        </option>
                    @endforeach

                </select>
            </div>

            {{-- Pilih Buku --}}
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wide mb-1.5"
                       style="color:#6b6457;">
                    Pilih Buku
                </label>

                <select name="buku[0][id]"
                        class="w-full px-4 py-2.5 rounded-lg text-sm border border-gray-200"
                        style="background:#faf8f4; color:#0f0f0f;">

                    <option value="">-- Pilih Buku --</option>

                    @foreach($buku as $b)
                        <option value="{{ $b->id }}">
                            {{ $b->judul }} (Stok: {{ $b->stok }})
                        </option>
                    @endforeach

                </select>
            </div>

            {{-- Jumlah --}}
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wide mb-1.5"
                       style="color:#6b6457;">
                    Jumlah
                </label>

                <input type="number"
                       name="buku[0][jumlah]"
                       min="1"
                       value="1"
                       class="w-full px-4 py-2.5 rounded-lg text-sm border border-gray-200"
                       style="background:#faf8f4; color:#0f0f0f;">
            </div>

            {{-- Tanggal --}}
            <div class="grid grid-cols-2 gap-4">

                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wide mb-1.5"
                           style="color:#6b6457;">
                        Tanggal Pinjam
                    </label>

                    <input type="date"
                           name="tanggal_pinjam"
                           value="{{ date('Y-m-d') }}"
                           class="w-full px-4 py-2.5 rounded-lg text-sm border border-gray-200"
                           style="background:#faf8f4; color:#0f0f0f;">
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wide mb-1.5"
                           style="color:#6b6457;">
                        Rencana Kembali
                    </label>

                    <input type="date"
                           name="tanggal_kembali_rencana"
                           class="w-full px-4 py-2.5 rounded-lg text-sm border border-gray-200"
                           style="background:#faf8f4; color:#0f0f0f;">
                </div>

            </div>

            {{-- Tombol --}}
            <div class="flex justify-end gap-3 pt-3">

                <a href="{{ route('admin.peminjaman.index') }}"
                   class="px-5 py-2.5 rounded-lg text-sm border border-gray-200">
                    Batal
                </a>

                <button type="submit"
                        class="px-6 py-2.5 rounded-lg text-sm font-semibold"
                        style="background:#0f0f0f; color:#faf8f4;">
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection