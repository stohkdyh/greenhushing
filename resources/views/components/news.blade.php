@props([
  'title',
  'image',
])

<div class="pt-24 max-w-4xl mx-auto px-4 py-8">
  <!-- Judul Berita -->
  <h1 class="text-3xl font-bold text-center mb-6">
    {{ $title }}
  </h1>

  <!-- Gambar Berita -->
  <div class="flex justify-center mb-4">
    <img src="{{ $image }}" alt="Gambar {{ $title }}" class="w-2/3 rounded shadow">
  </div>

  <!-- Isi Berita -->
  <div class="prose prose-lg max-w-none">
    {!! $slot !!}
  </div>
</div>
