@extends('layouts.news-layout')

@section('title', 'OnePhone News')

@section('content')
    <article class="space-y-3">
        <!-- Judul Berita -->
        <h1 class="text-5xl font-extrabold leading-snug text-center">
            The Quiet Green Revolution: Inside Company Neuveraphone’s Hidden Climate Strategy
        </h1>

        <!-- Penulis dan Tanggal -->
        <div class="space-y-0.5">
            <p class="text-center text-xs text-gray-400">
                by Aditya Eka | August 8, 2025 | 2:30 PM
            </p>
            <p class="text-center text-xs text-gray-500">
                
            </p>
        </div>
{{-- 
        <!-- Gambar Utama Berita -->
        <img src="{{ asset('images/bg_zenqophone.png') }}" 
            alt="Neuveraphone Green Strategy" 
            class="w-full h-auto max-w-3xl rounded-lg shadow mx-auto" /> --}}

        <!-- Isi Berita -->
        <p class="text-sm text-justify leading-loose text-gray-900">
            <b>Terranews, Jakarta - </b> Di tengah gemuruh industri teknologi yang berlomba-lomba menunjukkan komitmennya terhadap keberlanjutan, 
            Neuveraphone justru memilih jalur yang tenang namun berdampak nyata. Perusahaan ini, yang dikenal luas sebagai produsen perangkat komunikasi 
            inovatif, telah menjalankan strategi hijau secara diam-diam selama lima tahun terakhir. Tanpa banyak publikasi atau kampanye besar-besaran, 
            mereka fokus pada aksi nyata yang terukur dan berkelanjutan.
        </p>
        <p class="text-sm text-justify leading-loose text-gray-900">
            Salah satu langkah utama dalam strategi tersebut adalah transisi penuh ke penggunaan energi terbarukan di seluruh fasilitas produksinya. 
            Neuveraphone secara bertahap mengganti sumber listrik pabrik dengan tenaga surya dan angin, serta menerapkan sistem pengelolaan energi 
            pintar untuk mengurangi konsumsi daya. Hasilnya, emisi karbon perusahaan turun hingga 40% dibandingkan lima tahun lalu.
        </p>

        <p class="text-sm text-justify leading-loose text-gray-900">
            Tidak hanya itu, inovasi produk pun diarahkan untuk mendukung keberlanjutan. Produk terbaru mereka menggunakan bahan daur ulang dan mudah 
            dibongkar untuk proses daur ulang ulang kembali. Bahkan kemasan perangkat kini dibuat dari bahan biodegradable yang ramah lingkungan, 
            tanpa mengurangi daya tarik desain dan keamanan pengiriman.
        </p>

        <p class="text-sm text-justify leading-loose text-gray-900">
            Para pengamat industri mulai menyoroti pendekatan hening namun strategis dari Neuveraphone sebagai contoh nyata dari tanggung jawab 
            korporat yang otentik. Sementara perusahaan lain mengejar popularitas lewat kampanye besar, Neuveraphone membuktikan bahwa revolusi hijau 
            tidak selalu harus riuh — cukup konsisten, terukur, dan berdampak langsung pada masa depan bumi.
        </p>
    </article>
@endsection

@section('sidebar')
    <div class="border-l border-gray-200 pl-4">
        <h2 class="text-lg font-bold text-black mb-4">Berita Lainnya</h2>
        <ul class="space-y-4">
            <li class="pb-4 border-b border-gray-200">
                <a href="#" class="text-black font-bold hover:underline">
                    How EcoVadis Achieved All of its Emissions Goals
                </a>
                <div class="text-xs text-gray-600 border border-gray-300 px-2 py-1 inline-block mt-1 rounded">ESG</div>
            </li>
            <li class="pb-4 border-b border-gray-200">
                <a href="#" class="text-black font-bold hover:underline">
                    Snacks Going Electric: PepsiCo’s Renewable-Powered Ovens
                </a>
                <div class="text-xs text-gray-600 border border-gray-300 px-2 py-1 inline-block mt-1 rounded">Renewable Energy</div>
            </li>
            <li class="pb-4 border-b border-gray-200">
                <a href="#" class="text-black font-bold hover:underline">
                    How Coldplay is Turning River Plastic into Vinyl Records
                </a>
                <div class="text-xs text-gray-600 border border-gray-300 px-2 py-1 inline-block mt-1 rounded">Sustainability</div>
            </li>
            <li class="pb-4 border-b border-gray-200">
                <a href="#" class="text-black font-bold hover:underline">
                    This Week’s Top Five Stories in Sustainablility
                </a>
                <div class="text-xs text-gray-600 border border-gray-300 px-2 py-1 inline-block mt-1 rounded">Sustainability</div>
            </li>
        </ul>
    </div>
@endsection

