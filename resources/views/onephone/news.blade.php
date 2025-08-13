@extends('layouts.news-layout')

@section('title', 'OnePhone News')

@section('content')
    <article class="space-y-3">
        <!-- Judul Berita -->
        <h1 class="text-5xl font-extrabold leading-snug text-center">
            OneTech Sets a New Standard for Sustainable Smartphones
        </h1>

        <!-- Penulis dan Tanggal -->
        <div class="space-y-0.5">
            <p class="text-center text-xs text-gray-400">
                by Martha Stewart | The Eco Ledger
            </p>
            <p class="text-center text-xs text-gray-500">
                
            </p>
        </div>

        <!-- Gambar Utama Berita -->
        <img src="{{ asset('images/bg_zenqophone.png') }}" 
            alt="Neuveraphone Green Strategy" 
            class="w-full h-auto max-w-3xl rounded-lg shadow mx-auto" />

        <!-- Isi Berita -->
        <p class="text-sm text-justify leading-loose text-gray-900">
            In a consumer electronics market often clouded by vague environmental claims, <b>OneTech</b> is gaining attention — not just for its cutting-edge smartphone design but for its commitment to verified sustainability.
            
            <br><br>
            
            Earlier this year, the company released the <b>One Phone</b>, a premium modular smartphone that combines high-end performance with eco-conscious engineering. According to the company, the design allows users to easily replace and upgrade parts such as the battery, screen, and camera — reducing the need for full-device replacement and minimizing e-waste.

            <br><br>

            <i>“We’re committed to protecting the planet and designing products you love,”</i> said Eliza Ng, OneTech’s Head of Sustainability. <i>“Our modular approach and use of recycled and renewable materials are part of our mission to achieve net-zero emissions across our carbon footprint.”</i>
            
            <br><br>

            The company reports that <b>more than 30% of materials</b> shipped in its products in 2024 were sourced from <b>recycled or renewable resources</b>. In addition, <b>the entire packaging of the One Phone is now 100% fiber-based</b>, the result of an initiative to eliminate all plastics from the packaging process.

            <br><br>

            <b>Packaging claim confirmed:</b>

            <br>

            According to the latest environmental audit, OneTech has removed plastic entirely from its product packaging and replaced it with recyclable fiber-based alternatives.

            <br><br>

            But OneTech’s efforts don’t end at the point of sale. As part of its take-back program, the company offers free recycling of old devices, cables, cases, and accessories — regardless of brand. Consumers can return their used electronics in-store or via mail.

            <br><br>

            <i>“You’ll help protect the earth’s resources and reduce waste,” Ng added. “We’re building a system where disposal becomes circular, not wasteful.”</i>

            <br><br>

            Unlike many competitors, OneTech has made its <b>full environmental product report</b> publicly available on its website, detailing carbon emissions, materials sourcing, and lifecycle impact.

            <br><br>
            
            The brand has also received <b>official ecolabel certifications</b> from both Indonesian and international bodies, including:

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

