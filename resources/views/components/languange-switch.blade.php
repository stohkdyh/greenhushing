<div x-data="{ checked: '{{ app()->getLocale() === 'id' ? 'true' : 'false' }}' === 'true' }" class="font-montserrat flex items-center space-x-2">
    <span :class="{ 'text-gray-400 font-semibold': checked, 'text-black font-semibold': !checked }">EN</span>

    <div class="w-[51px] h-[31px] relative">
        <input type="checkbox" id="lang-toggle" x-model="checked"
            @change="window.location.href = checked ? '/lang/id' : '/lang/en'" class="sr-only">

        <label for="lang-toggle"
            class="block w-full h-full bg-gray-200 rounded-full cursor-pointer transition-colors duration-200"
            :class="{ 'bg-green-500': checked }">
            <div class="absolute w-[27px] h-[27px] top-[2px] rounded-full shadow transition-all duration-200 overflow-hidden"
                :style="checked ? 'left:22px' : 'left:2px'">
                <img :src="checked ? '/images/flag_id.png' : '/images/flag_en.png'" alt="Lang Flag"
                    class="w-full h-full object-cover rounded-full">
            </div>
        </label>
    </div>

    <span :class="{ 'text-black font-semibold': checked, 'text-gray-400 font-semibold': !checked }">ID</span>
</div>
