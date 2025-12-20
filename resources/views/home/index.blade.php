@extends('layouts.app')
@section('content')

{{-- Tentang Kami Section --}}
<section class="section">
    <div class="container">
        <div class="grid grid-cols-12 md:gap-15 items-center place-items-center">
            <div class="col-span-12 md:col-span-6">
                <span class="section-subtitle">Tentang Kami</span>
                <h2 class="section-title mb-7">Panti Asuhan Al-Dzikro</h2>
                <p class="section-description mb-3">
                    Kami hadir untuk membantu mereka memperoleh kehidupan yang lebih layak, mendukung pendidikan, serta mengurangi kerawanan sosial.
                </p>
                <p class="section-description mb-7">
                   Berlandaskan semangat tolong-menolong dan ajaran Islam, yayasan ini berupaya mengangkat martabat mereka agar bisa mandiri dan sejahtera.
                </p>
                <a href="#" class="cursor-pointer">
                    <button class="btn btn-primary cursor-pointer">Selengkapnya</button>
                </a>
            </div>
            <div class="col-span-12 md:col-span-6 text-center">
                <div class="relative w-full">
                    <div class="absolute -right-5 -top-5 w-25 h-75 bg-primary -z-1"></div>
                    <img src="https://aldzikro.org/wp-content/uploads/2025/06/Panti_Asuhan_Al-Dzikro.jpg" alt="" class="w-full h-30 md:w-120 md:h-120 object-cover z-5">
                    <div class="absolute -left-5 -bottom-5 w-25 h-75 bg-accent -z-1"></div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Media Section --}}
<section class="section bg-[#F3F3F3]">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title mb-7">Media Al-dzikro</h2>
            <div class="grid grid-cols-2 gap-6 mb-10">
                    <div class="col-span-2 md:col-span-1">
                        <iframe src="https://www.youtube.com/embed/5OuZB7CinuU?si=jZlKeK3iuxXpV3lj" title="YouTube video player" class="w-full aspect-3/2" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                    <div class="col-span-2 md:col-span-1">
                        <iframe src="https://www.youtube.com/embed/jqeSKB5RBQs?si=HM1SIJlWRe_DvPHf" title="YouTube video player" class="w-full aspect-3/2" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            <a href="#" class="cursor-pointer">
                <button class="btn btn-primary cursor-pointer">Lihat Lebih Banyak</button>
            </a>
        </div>
    </div>
</section>

{{-- Fasilitas Section --}}
<section class="section">
    <div class="container">
        <div class="text-center mb-10">
            <h2 class="section-title mb-7">Fasilitas Kami</h2>
            <p class="section-description">
               Fasilitas untuk mendukung pelaksanaan program-program Yayasan Al-Dzikro. 
            </p>
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
<section class="section bg-[#F3F3F3]">
    <div class="container">
        <div class="grid grid-cols-2 gap-5 md:gap-10 lg:gap-20 items-center">
            <div class="col-span-2 md:col-span-1">
                <div class="grid grid-cols-2 gap-4">
                    <div class="grid gap-4">
                        <div>
                            <img class="h-full max-w-full rounded-base" src="https://aldzikro.org/wp-content/uploads/2025/07/1-1_result-scaled.webp" alt="">
                        </div>
                        <div>
                            <img class="h-full max-w-full rounded-base" src="https://aldzikro.org/wp-content/uploads/2025/07/1-4_result.webp" alt="">
                        </div>
                    </div>
                    <div class="grid gap-4">
                        <div>
                            <img class="h-full max-w-full rounded-base" src="https://aldzikro.org/wp-content/uploads/2025/07/3-4_result.webp" alt="">
                        </div>
                        <div>
                            <img class="h-full max-w-full rounded-base" src="https://aldzikro.org/wp-content/uploads/2025/07/3-1_result-scaled.webp" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-2 md:col-span-1">
                <h2 class="section-title mb-7">Visi & Misi Kami</h2>
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
                            <ol class="list-decimal list-inside">
                                <li>Menyelenggarakan panti asuhan yatim piatu.</li>
                                <li>Memperluas jaringan komunikasi dengan instansi terkait, lembaga-lembaga dan masyarakat yang peduli terhadap penyandang masalah sosial.</li>
                                <li>Menyelenggarakan les prifat bagi anak-anak yatim piatu yang ada di panti dan masyarakat.</li>
                                <li>Pembinaan mental dengan pengajian rutin.</li>
                                <li>Anak yang ada di panti maupun di luar panti di target lulus SLTA.</li>
                                <li>Membekali keterampilan dan melatih kemandirian anak asuh.</li>
                            </ol>
                        </div>
                    </div>
                     <div class="accordion-item">
                        <div class="accordion-header">
                            <h3>Tujuan</h3>
                        </div>
                        <div class="accordion-content">
                            <ol class="list-decimal list-inside">
                                <li>Terwujudnya sumberdaya manusia yang berakhlak mulia dan mandiri.</li>
                                <li>Terbinanya sumberdaya manusia/ generasi muda yang kuat iman, taqwa, kuat mental dan mandiri.</li>
                                <li>Mendukung terwujudnya masyarakat dengan tingkat ekonomi yang lebih baik, keluarga yang sakinah mawadah warahmah.</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Testimoni Section --}}
<section class="section">
    <div class="container">
        <div class="grid grid-cols-2 lg:gap-20">
            <div class="col-span-2 md:col-span-1">
                 <div class="relative w-full">
                    <div class="absolute -right-5 -top-5 w-25 h-75 bg-primary -z-1"></div>
                    <img src="https://aldzikro.org/wp-content/uploads/2025/07/2-4_result.webp" alt="" class="w-full h-30 md:h-120 object-cover z-5">
                    <div class="absolute -left-5 -bottom-5 w-25 h-75 bg-accent -z-1"></div>
                </div>
            </div>
            <div class="col-span-2 lg:col-span-1">
                <h2 class="section-title mb-7">Kata Masyarakat Tentang Al-Dzikro</h2>
                <div class="bg-accent p-8">
                    <p class="font-secondary">aaaaa</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Artikel Section --}}
<section class="section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Artikel</h2>
        </div>
        <div class="grid grid-cols-12 gap-8">
            <div class="col-span-12 md:col-span-6 lg:col-span-4">
                <div class="article-card">
                    <div class="article-image">
                        <img src="https://aldzikro.org/wp-content/uploads/2025/06/mbnd4xtrlvy-1024x683.jpg" alt="" class="w-full object-cover">
                    </div>
                    <div class="article-body">
                        <h3 class="text-lg font-extrabold text-primary font-primary mb-8">Kunjungan Mahasiswa UAD di Yayasan Al-Dzikro</h3>
                        <a href="#" class="text-primary text-xs uppercase font-medium hover:text-accent">Detail Artikel >></a>
                    </div>
                    <div class="article-footer">
                        <span class="text-secondary text-xs">June 17, 2025</span>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
@endsection