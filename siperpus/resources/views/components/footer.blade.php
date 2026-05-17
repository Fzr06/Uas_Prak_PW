{{-- resources/views/components/footer.blade.php --}}
<footer class="mt-auto border-t" style="border-color:#e0d9cf; background:#f2ede4;">
    <div class="container mx-auto px-4 max-w-7xl py-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            {{-- Brand --}}
            <div>
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background:#b8860b;">
                        <i class="ph-fill ph-books text-white text-lg"></i>
                    </div>
                    <span class="font-display text-lg font-semibold" style="color:#0f0f0f;">
                        Pustaka<span style="color:#b8860b;">Digital</span>
                    </span>
                </div>
                <p class="text-sm leading-relaxed" style="color:#6b6457;">
                    Temukan, pinjam, dan nikmati ribuan koleksi buku pilihan dari perpustakaan digital kami.
                </p>
            </div>

            {{-- Links --}}
            <div>
                <h4 class="text-sm font-semibold mb-3" style="color:#0f0f0f;">Navigasi</h4>
                <ul class="space-y-2 text-sm" style="color:#6b6457;">
                    <li><a href="{{ route('home') }}" class="hover:text-amber-700 transition-colors">Beranda</a></li>
                    @auth
                        <li><a href="{{ route('peminjaman.history') }}" class="hover:text-amber-700 transition-colors">Riwayat Peminjaman</a></li>
                    @else
                        <li><a href="{{ route('login') }}" class="hover:text-amber-700 transition-colors">Masuk</a></li>
                        <li><a href="{{ route('register') }}" class="hover:text-amber-700 transition-colors">Daftar Anggota</a></li>
                    @endauth
                </ul>
            </div>

            {{-- Info --}}
            <div>
                <h4 class="text-sm font-semibold mb-3" style="color:#0f0f0f;">Informasi</h4>
                <ul class="space-y-2 text-sm" style="color:#6b6457;">
                    <li class="flex items-center gap-2">
                        <i class="ph ph-clock text-base" style="color:#b8860b;"></i>
                        Senin – Jumat, 08.00 – 17.00
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="ph ph-map-pin text-base" style="color:#b8860b;"></i>
                        Jl. Perpustakaan No. 1, Kota
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="ph ph-envelope text-base" style="color:#b8860b;"></i>
                        info@pustakadigital.id
                    </li>
                </ul>
            </div>
        </div>

        <div class="mt-8 pt-6 border-t flex flex-col sm:flex-row items-center justify-between gap-2"
             style="border-color:#e0d9cf;">
            <p class="text-xs" style="color:#6b6457;">
                &copy; {{ date('Y') }} PustakaDigital. Semua hak dilindungi.
            </p>
            <p class="text-xs" style="color:#6b6457;">
                Dibuat dengan <i class="ph-fill ph-heart text-red-400"></i> untuk para pembaca
            </p>
        </div>
    </div>
</footer>