<div x-data="{
    checked: {{ session('locale', app()->getLocale()) === 'id' ? 'true' : 'false' }},
    init() {
        this.$watch('checked', value => {
            window.location.href = value ? '/lang/id' : '/lang/en';
        });
    }
}"
    class="font-montserrat flex items-center space-x-2 px-2 py-2 {{ $attributes->get('class') }}">
    <!-- Label EN -->
    <span :class="checked ? 'text-gray-400' : 'text-black'" class="text-xs sm:text-sm font-semibold">EN</span>

    <!-- Toggle -->
    <div class="relative w-[34px] h-[18px] sm:w-[36px] sm:h-[20px] md:w-[40px] md:h-[22px]">
        <input type="checkbox" id="lang-toggle" x-model="checked" class="sr-only" />

        <label for="lang-toggle" class="block w-full h-full bg-gray-300 rounded-full cursor-pointer transition">
            <div class="absolute top-[2px] rounded-full shadow transition-all duration-200 overflow-hidden"
                :class="{
                    'left-[2px] w-[14px] h-[14px] sm:w-[16px] sm:h-[16px] md:w-[18px] md:h-[18px]': !checked,
                    'left-[18px] sm:left-[20px] md:left-[22px] w-[14px] h-[14px] sm:w-[16px] sm:h-[16px] md:w-[18px] md:h-[18px]': checked
                }">
                <img :src="checked ? '/images/flag_id.png' : '/images/flag_en.png'" alt=""
                    class="w-full h-full object-cover rounded-full">
            </div>
        </label>
    </div>

    <!-- Label ID -->
    <span :class="checked ? 'text-black' : 'text-gray-400'" class="text-xs sm:text-sm font-semibold">ID</span>
</div>
