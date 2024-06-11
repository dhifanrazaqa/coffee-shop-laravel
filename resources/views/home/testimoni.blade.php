<div class="flex flex-col items-start w-full md:h-screen px-2 pt-16 md:p-16 mt-10">
    <h1 class="text-app_primary font-bold text-3xl md:text-6xl">What They Say</h1>
    <div x-data="{ current: 1 }" class="flex justify-center items-center mx-auto w-full md:w-1/3 mt-5 md:mt-16">
        <!-- Left Button -->
        <button @click="current = (current === 0) ? 2 : current - 1" 
                class="h-20 p-2 bg-gray-200 rounded-full">
            &lt;
        </button>
        
        <!-- Containers -->
        <div class="overflow-hidden w-full">
            <div class="flex transition-transform duration-300 w-full" 
                 :style="'transform: translateX(-' + (current * 100) + '%)'">
                
                <div class="w-full flex-shrink-0 p-4">
                    <div class="flex flex-col pt-5 md:pt-16 items-center h-72 bg-app_grey_low p-6 rounded-2xl shadow-lg">
                        <blockquote class="text-gray-700 italic">
                            <p>"Rasanya kayak lagi minum kopi zaman dulu banget, ya. Gak ribet, tapi rasanya dapet banget. Buat yang cari kopi simpel dan enak, ini jadi pilihannya."</p>
                        </blockquote>
                        <div class="flex gap-2 items-center absolute bottom-3 w-11/12 bg-app_grey_high rounded-lg p-2">
                            <img class="h-12 object-contain" src="{{ asset('images/avatar-1.png') }}" alt="avatar 1">
                            <p class="mt-4 text-gray-500"><strong>Iman Arianto</strong><br>Karyawan</p>
                        </div>
                    </div>
                </div>

                <div class="w-full flex-shrink-0 p-4">
                    <div class="flex flex-col pt-5 md:pt-16 items-center h-72 bg-app_grey_low p-6 rounded-2xl shadow-lg">
                        <blockquote class="text-gray-700 italic">
                            <p>"Kopi ini bener-bener kaya klasik gitu. Rasa dan aromanya bener-bener alami dan autentik. Cocok buat yang suka nuansa kopi tradisional."</p>
                        </blockquote>
                        <div class="flex gap-2 items-center absolute bottom-3 w-11/12 bg-app_grey_high rounded-lg p-2">
                            <img class="h-12 object-contain" src="{{ asset('images/avatar-1.png') }}" alt="avatar 1">
                            <p class="mt-4 text-gray-500"><strong>Afiza Rahma</strong><br>Mahasiswa</p>
                        </div>
                    </div>
                </div>

                <div class="w-full flex-shrink-0 p-4">
                    <div class="flex flex-col pt-5 md:pt-16 items-center h-72 bg-app_grey_low p-6 rounded-2xl shadow-lg">
                        <blockquote class="text-gray-700 italic">
                            <p>"Ini kopi bener-bener nunjukin keaslian rasanya. Nggak usah mikirin macem-macem, cuma nikmatin aja. Buat yang mau rasa kopi yang otentik, boleh coba yang ini."</p>
                        </blockquote>
                        <div class="flex gap-2 items-center absolute bottom-3 w-11/12 bg-app_grey_high rounded-lg p-2">
                            <img class="h-12 object-contain" src="{{ asset('images/avatar-1.png') }}" alt="avatar 1">
                            <p class="mt-4 text-gray-500"><strong>Raihan Pandita</strong><br>Mahasiswa</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Right Button -->
        <button @click="current = (current === 2) ? 0 : current + 1" 
                class="h-20 p-2 bg-gray-200 rounded-full">
            &gt;
        </button>
    </div>
</div>