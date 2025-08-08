@extends('layouts.news-layout')

@section('title', 'OnePhone News')

@section('content')
    <article class="space-y-6">
        <!-- Judul Berita -->
        <h1 class="text-3xl font-extrabold leading-snug">
            The Quiet Green Revolution: Inside Company Neuveraphone’s Hidden Climate Strategy
        </h1>

        <!-- Gambar Utama Berita -->
        <img src="{{ asset('images/berita/neuveraphone-green.jpg') }}" alt="Neuveraphone Green Strategy" class="w-full h-auto rounded-lg shadow" />

        <!-- Isi Berita -->
        <p class="text-lg leading-relaxed text-gray-700">
            Isi berita utama ditampilkan di sini... Artikel ini membahas bagaimana Neuveraphone secara diam-diam menjalankan strategi hijau yang berdampak besar pada lingkungan, tanpa banyak eksposur publik. 
            Strategi ini mencakup pengurangan emisi, penggunaan energi terbarukan, dan inovasi produk yang berkelanjutan.
        </p>
    </article>
@endsection

@section('sidebar')
    <div class="border-l border-gray-200 pl-4">
        <h2 class="text-lg font-semibold mb-2">Berita Lainnya</h2>
        <ul class="space-y-2">
            <li><a href="#" class="text-blue-600 hover:underline">Berita Terkait 1</a></li>
            <li><a href="#" class="text-blue-600 hover:underline">Berita Terkait 2</a></li>
            <li><a href="#" class="text-blue-600 hover:underline">Berita Terkait 3</a></li>
        </ul>
    </div>
@endsection
