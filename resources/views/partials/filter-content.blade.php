{{-- filepath: c:\Users\ASUS\Herd\greenhushing\resources\views\partials\filter-content.blade.php --}}
@php
    $carriers = [
        'AT&T Wireless',
        'Boost Mobile',
        'Simple Mobile',
        'Sprint',
        'Straight Talk',
        'T-Mobile',
        'Ting',
        'Total Wireless',
        'TracFone Wireless',
        'Unlocked',
        'Verizon Wireless',
    ];

    $androidVersions = [
        'Android 10.0',
        'Android 11.0',
        'Android 12.0',
        'Android 13.0',
        'Android 14.0',
        'Android 15.0',
        'Android 4.0',
        'Android 4.1',
    ];
@endphp

<p class="mb-3 text-gray-500 font-semibold text-lg">{{ __('Carier') }}</p>
<!-- 📦 Carrier Filter -->
@foreach ($carriers as $carrier)
    <div class="flex items-center mb-2">
        <input type="checkbox" id="carrier-{{ $loop->index }}" name="carriers[]" value="{{ $carrier }}"
            class="w-4 h-4 text-black bg-gray-100 border-black border-[2px] rounded-sm focus:ring-black focus:ring-2">
        <label for="carrier-{{ $loop->index }}" class="ms-2 text-sm font-medium text-black">
            {{ $carrier }}
        </label>
    </div>
@endforeach
<div class="mt-6 mb-3 border-gray-300 border-t-[1px]"></div>
<!-- 🖥 Section Title -->
<p class="mb-3 text-gray-500 font-semibold text-lg">{{ __('Operating System') }}</p>

<!-- 📱 Android Versions Filter -->
@foreach ($androidVersions as $version)
    <div class="flex items-center mb-2">
        <input type="checkbox" id="os-{{ $loop->index }}" name="android_versions[]" value="{{ $version }}"
            class="w-4 h-4 text-black bg-gray-100 border-black border-[2px] rounded-sm focus:ring-black focus:ring-2">
        <label for="os-{{ $loop->index }}" class="ms-2 text-sm font-medium text-black">
            {{ $version }}
        </label>
    </div>
@endforeach
