@extends('layouts.app')

@section('style')
@endsection

@section('content')
<section class="page-header">
    <div class="container">
        <div class="pt-35 pb-35 md:pt-60 md:pb-20">
            <h1 class="uppercase text-white font-secondary font-black text-4xl text-center md:text-start lg:text-5xl">Tentang Al-Dzikro</h1>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="grid grid-cols-2 gap-10 items-center place-items-center">
            <div class="col-span-2 md:col-span-1">
                <h2 class="section-title mb-10">yayasan al-dzikro</h2>
                <p class="section-description mb-5">Yayasan Al-Dzikro berdiri atas kepedulian terhadap anak-anak yatim, piatu, kaum dhuafa, dan orang jompo yang kurang beruntung. Kami hadir untuk membantu mereka memperoleh kehidupan yang lebih layak, mendukung pendidikan, serta mengurangi kerawanan sosial. Berlandaskan semangat tolong-menolong dan ajaran Islam, yayasan ini berupaya mengangkat martabat mereka agar bisa mandiri dan sejahtera.</p>
                <p class="section-description">Yayasan Al-Dzikro berbadan hukum sesuai <span class="font-bold">UU No. 16 Tahun 2001</span> tentang Yayasan (jo. <span class="font-bold">UU No. 28 Tahun 2004</span>). Yayasan bergerak di bidang sosial, keagamaan, dan kemanusiaan tanpa beranggotakan individu tertentu, namun didukung oleh donatur dan masyarakat luas.</p>
            </div>
            <div class="col-span-2 md:col-span-1">
                <div class="relative w-full">
                    <div class="absolute -right-3 -top-3 lg:-right-5 lg:-top-5 w-25 h-60 md:h-75 bg-primary -z-1"></div>
                    <img src="{{ asset('/assets/tentang-yayasan.webp') }}" alt="" class="w-full h-80 md:w-120 md:h-120 object-cover z-5">
                    <div class="absolute -left-3 -bottom-3 lg:-left-5 lg:-bottom-5 w-25 h-60 md:h-75 bg-accent -z-1"></div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Sejarah Section --}}
<section class="section">
    <div class="container">
        <div class="text-center mb-10">
            <h2 class="section-title">Sejarah Singkat Al-Dzikro</h2>
        </div>
        <div class="grid grid-cols-3 gap-5 md:gap-8">
            <div class="col-span-3 md:col-span-1">
                <div class="text-center">
                    <div class="bg-primary py-2 mb-4">
                        <p class="text-white text-2xl font-extrabold">1983</p>
                    </div>
                    <img src="{{ asset('/assets/icons/lamp.svg') }}" alt="" class="size-12 object-contain mx-auto mb-3">
                    <h3 class="text-lg text-primary font-semibold mb-4">Awal Berdiri</h3>
                    <p class="text-secondary text-base/7">Yayasan Al-Dzikro berawal pada tahun <span class="font-bold">1993</span>, terinspirasi dari kisah dua anak kecil yang kehilangan kedua orang tuanya.</p>
                </div>
            </div>

            <div class="col-span-3 md:col-span-1">
                <div class="text-center">
                    <div class="bg-primary py-2 mb-4">
                        <p class="text-white text-2xl font-extrabold">1997</p>
                    </div>
                    <img src="{{ asset('/assets/icons/hand.svg') }}" alt="" class="size-12 object-contain mx-auto mb-3">
                    <h3 class="text-lg text-primary font-semibold mb-4">Membentuk Yayasan</h3>
                    <p class="text-secondary text-base/7">Kepedulian masyarakat menguatkan langkah untuk membentuk yayasan resmi pada <span class="font-bold">8 Oktober 1997</span>.</p>
                </div>
            </div>

            <div class="col-span-3 md:col-span-1">
                <div class="text-center">
                    <div class="bg-primary py-2 mb-4">
                        <p class="text-white text-2xl font-extrabold">2005</p>
                    </div>
                    <img src="{{ asset('/assets/icons/building.svg') }}" alt="" class="size-12 object-contain mx-auto mb-3">
                    <h3 class="text-lg text-primary font-semibold mb-4">Berkembang</h3>
                    <p class="text-secondary text-base/7">Dengan dukungan donatur, pada <span class="font-bold">2005</span> diperoleh tanah wakaf 1.359 m² yang menjadi pusat kegiatan dan pembangunan fasilitas yayasan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Fasilitas Section --}}
<section class="section bg-[#F3F3F3]">
    <div class="container">
        <div class="text-center mb-10">
            <h2 class="section-title mb-7">Fasilitas Kami</h2>
        </div>
        <div class="grid grid-cols-12 gap-5">

            <div class="col-span-12 md:col-span-6">
                <div class="grid grid-cols-12">
                    <div class="col-span-12 lg:col-span-6">
                        <img src="https://aldzikro.org/wp-content/uploads/2025/06/ciuozi9bm34-768x1024.jpg" alt="" class="w-full h-60 object-cover object-bottom">
                    </div>
                    <div class="col-span-12 lg:col-span-6 bg-primary">
                        <div class="flex h-full p-6 md:p-7">
                            <div class="lg:m-auto">
                                <p class="text-lg text-white font-bold font-primary">
                                    Mushola Al-Dzikro (8m x 12m)
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-12 md:col-span-6">
                <div class="grid grid-cols-12">
                    <div class="col-span-12 lg:col-span-6 bg-accent">
                        <div class="flex h-full p-6 md:p-7">
                            <div class="lg:m-auto">
                                <p class="text-lg text-primary text-end font-bold font-primary">
                                    Panti Asuhan Putra & Putri
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 lg:col-span-6">
                        <img src="https://aldzikro.org/wp-content/uploads/2025/06/Mask-Group-3.jpg" alt="" class="w-full h-60 object-cover object-center">
                    </div>
                </div>
            </div>

            <div class="col-span-12 md:col-span-6">
                <div class="grid grid-cols-12">
                    <div class="col-span-12 lg:col-span-6">
                        <img src="https://aldzikro.org/wp-content/uploads/2025/07/4-4_result-1024x683.webp" alt="" class="w-full h-60 object-cover object-bottom">
                    </div>
                    <div class="col-span-12 lg:col-span-6 bg-accent">
                        <div class="flex h-full p-6 md:p-7">
                            <div class="lg:m-auto">
                                <p class="text-lg text-primary font-bold font-primary">
                                    Aula terbuka (joglo dan limasan)
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-12 md:col-span-6">
                <div class="grid grid-cols-12">
                    <div class="col-span-12 lg:col-span-6 bg-primary">
                        <div class="flex h-full p-6 md:p-7">
                            <div class="lg:m-auto">
                                <p class="text-lg text-white font-bold font-primary">
                                    Kamar mandi dan fasilitas penunjang lainnya
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 lg:col-span-6">
                        <img src="https://aldzikro.org/wp-content/uploads/2025/07/2_result-1024x576.webp" alt="" class="w-full h-60 object-cover object-bottom">
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

{{-- Visi Misi Section --}}
<section class="section">
    <div class="container">
        <div class="grid grid-cols-2 gap-5 md:gap-10 lg:gap-20 items-center">
            <div class="col-span-2 md:col-span-1">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="grid gap-4">
                        <div>
                            <img class="max-w-full rounded-base object-cover md:aspect-6/10" src="https://aldzikro.org/wp-content/uploads/2025/07/1-1_result-scaled.webp" alt="">
                        </div>
                        <div>
                            <img class="max-w-full rounded-base object-cover md:aspect-square" src="https://aldzikro.org/wp-content/uploads/2025/07/1-4_result.webp" alt="">
                        </div>
                    </div>
                    <div class="grid gap-4">
                        <div>
                            <img class="max-w-full rounded-base object-cover md:aspect-square" src="https://aldzikro.org/wp-content/uploads/2025/07/3-4_result.webp" alt="">
                        </div>
                        <div>
                            <img class="max-w-full rounded-base object-cover md:aspect-6/10" src="https://aldzikro.org/wp-content/uploads/2025/07/3-1_result-scaled.webp" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-2 md:col-span-1">
                <h2 class="section-title text-center md:text-start mb-7">Visi & Misi Kami</h2>
                <div id="accordion-visi-misi" class="accordion">
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <h3>Visi</h3>
                        </div>
                        <div class="accordion-content">
                            <p>Terwujudnya kondisi penyandang masalah sosial yang lebih baik agar dapat maju dan mandiri serta berakhlak mulia.</p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <h3>Misi</h3>
                        </div>
                        <div class="accordion-content">
                            <table class="align-top">
                                <tbody>
                                    <tr class="align-top">
                                        <td>1.</td>
                                        <td class="leading-relaxed">Menyelenggarakan panti asuhan yatim piatu.</td>
                                    </tr>
                                    <tr class="align-top">
                                        <td>2.</td>
                                        <td class="leading-relaxed">Memperluas jaringan komunikasi dengan instansi terkait, lembaga-lembaga dan masyarakat yang peduli terhadap penyandang masalah sosial.</td>
                                    </tr>
                                    <tr class="align-top">
                                        <td>3.</td>
                                        <td class="leading-relaxed">Menyelenggarakan les prifat bagi anak-anak yatim piatu yang ada di panti dan masyarakat.</td>
                                    </tr>
                                    <tr class="align-top">
                                        <td>4.</td>
                                        <td class="leading-relaxed">Pembinaan mental dengan pengajian rutin.</td>
                                    </tr>
                                    <tr class="align-top">
                                        <td>5.</td>
                                        <td class="leading-relaxed">Anak yang ada di panti maupun di luar panti di target lulus SLTA.</td>
                                    </tr>
                                    <tr class="align-top">
                                        <td>6.</td>
                                        <td class="leading-relaxed">Membekali keterampilan dan melatih kemandirian anak asuh.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                     <div class="accordion-item">
                        <div class="accordion-header">
                            <h3>Tujuan</h3>
                        </div>
                        <div class="accordion-content">
                             <table class="align-top">
                                <tbody>
                                    <tr class="align-top">
                                        <td>1.</td>
                                        <td class="leading-relaxed">Terwujudnya sumberdaya manusia yang berakhlak mulia dan mandiri.</td>
                                    </tr>
                                    <tr class="align-top">
                                        <td>2.</td>
                                        <td class="leading-relaxed">Terbinanya sumberdaya manusia/ generasi muda yang kuat iman, taqwa, kuat mental dan mandiri.</td>
                                    </tr>
                                    <tr class="align-top">
                                        <td>3.</td>
                                        <td class="leading-relaxed">Mendukung terwujudnya masyarakat dengan tingkat ekonomi yang lebih baik, keluarga yang sakinah mawadah warahmah.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Lokasi Section --}}
<section class="section">
    <div class="container">
        <div class="grid grid-cols-2 gap-4 md:gap-15 items-center">
            <div class="col-span-2 md:col-span-1">
                 <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d87682.14192642561!2d110.391643!3d-7.908523000000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a547000000001%3A0xba21a4fb2bd5da11!2sAl%20Dzikro%20Yogyakarta!5e1!3m2!1sen!2sus!4v1766325336538!5m2!1sen!2sus" class="w-full h-80" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-span-2 md:col-span-1">
                <h2 class="section-title mb-7">Lokasi Yayasan Al-Dzikro</h2>
                <p class="section-description font-bold">Pedukuhan Manggung RT 07, Desa Wukirsari, Imogiri, Bantul, Yogyakarta</p>
                <p class="section-description">Dekat dengan sekolah MTs N Giriloyo, SMAN 1 Imogiri, dan pesantren sekitar.</p>
            </div>
        </div>
    </div>
</section>

{{-- Kemitraan Secction --}}
<section class="section">
    <div class="container">
        <div class="text-center mb-10">
            <h2 class="section-title">Kemitraan Kami</h2>
        </div>
         <div class="grid grid-cols-2 gap-4 md:gap-15">
            <div class="col-span-2 md:col-span-1">
                <div class="mb-7">
                    <h3 class="text-primary font-bold text-lg font-primary mb-3">Badan Sosial</h3>
                    <ul class="font-secondary list-disc list-inside">
                        <li>Muslim Aid Indonesia</li>
                    </ul>
                </div>

                <div class="mb-5">
                    <h3 class="text-primary font-bold text-lg font-primary mb-3">Dinas Instansi</h3>
                    <ul class="font-secondary list-disc list-inside">
                        <li>Dinas Sosial Kabupaten Bantul</li>
                        <li>Polsek Imogiri Kabupaten Bantul</li>
                        <li>Koramil Imogiri Kabupaten Bantul</li>
                        <li>Puskesmas Imogiri I</li>
                        <li>Dokter Keluarga dr. Hanung</li>
                        <li>BPRSW DIY</li>
                    </ul>
                </div>
            </div>
            <div class="col-span-2 md:col-span-1">
                <div class="mb-5">
                    <h3 class="text-primary font-bold text-lg font-primary mb-3">Dunia Usaha</h3>
                    <ul class="font-secondary list-disc list-inside">
                        <li class="mb-2">
                            <div class="inline">
                                <h5 class="text-lg inline">Toko Rizki</h5>
                                <p class="text-sm md:text-base text-secondary ms-6">Membantu pelayanan dan kemudahan dalam pengadaan keperluan pokok sehari-hari (sembako).</p>
                            </div>
                        </li>
                        <li class="mb-2">
                            <div class="inline">
                                <h5 class="text-lg inline">Toko Gae Sae</h5>
                                <p class="text-sm md:text-base text-secondary ms-6">Membantu pelayanan dan kemudahan dalam pengadaan alat tulis, seragam, dan keperluan sekolah.</p>
                            </div>
                        </li>
                        <li class="mb-2">
                            <div class="inline">
                                <h5 class="text-lg inline">Ulil Penjahit</h5>
                                <p class="text-sm md:text-base text-secondary ms-6">Membantu pelayanan dan kemudahan dalam menjahit seragam sekolah dan seragam panti asuhan.</p>
                            </div>
                        </li>
                        <li class="mb-2">Salon Mboiz</li>
                        <li>Trimulyo Batik</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Pengurus Section --}}
<section class="section bg-[#F3F3F3]">
    <div class="container">
        <div class="text-center mb-10">
            <h2 class="section-title">Struktur Pengurus</h2>
        </div>
        <table class="w-full">
            <thead class="bg-primary text-white font-primary border-white/20">
                <tr>
                    <th class="w-15 py-3 px-2 border border-white/20">Nomor</th>
                    <th class="py-3 px-2 border-white/20">Nama</th>
                    <th class="py-3 px-2 border-white/20">Jabatan</th>
                </tr>
            </thead>
            <tbody class="text-secondary font-secondary border border-secondary/30">
                <tr class="border border-secondary/30">
                    <td class="text-center py-3 px-2 border border-secondary/30">1</td>
                    <td class="py-3 px-2 border border-secondary/30">Bapak pengurus pertama</td>
                    <td class="py-3 px-2 border border-secondary/30">Ketua Yayasan</td>
                </tr>
                <tr class="border border-secondary/30">
                    <td class="text-center py-3 px-2 border border-secondary/30">2</td>
                    <td class="py-3 px-2 border border-secondary/30">Bapak pengurus kedua</td>
                    <td class="py-3 px-2 border border-secondary/30">Sekretaris</td>
                </tr>
                <tr class="border border-secondary/30">
                    <td class="text-center py-3 px-2 border border-secondary/30">3</td>
                    <td class="py-3 px-2 border border-secondary/30">Bapak pengurus ketiga</td>
                    <td class="py-3 px-2 border border-secondary/30">Bendahara</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
@endsection

@section("script")
<script>
// Accordion Visi Misi
let items = document.querySelectorAll(
    "#accordion-visi-misi .accordion-item .accordion-header"
);

items[0].closest(".accordion-item").classList.add("active");
items.forEach((item) => {
    item.addEventListener("click", (e) => {
        items.forEach((header) => {
            header.closest(".accordion-item").classList.remove("active");
        });

        e.currentTarget.closest(".accordion-item").classList.toggle("active");
    });
});
</script>
@endsection