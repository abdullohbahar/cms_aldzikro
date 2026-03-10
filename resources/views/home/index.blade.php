@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />

    <style>
        /* Floating WhatsApp Button */
        .floating-wa {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            background-color: #25D366;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            animation: pulse-wa 2s infinite;
        }

        .floating-wa:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(37, 211, 102, 0.5);
            animation: none;
        }

        .floating-wa i {
            font-size: 32px;
            color: white;
        }

        /* Tooltip untuk Floating WA */
        .floating-wa::before {
            content: 'Hubungi Kami';
            position: absolute;
            right: 70px;
            background-color: #253C56;
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 14px;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            font-family: 'Open Sans', sans-serif;
        }

        .floating-wa::after {
            content: '';
            position: absolute;
            right: 60px;
            top: 50%;
            transform: translateY(-50%);
            border: 8px solid transparent;
            border-left-color: #253C56;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .floating-wa:hover::before,
        .floating-wa:hover::after {
            opacity: 1;
            visibility: visible;
        }

        @keyframes pulse-wa {

            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7);
            }

            50% {
                box-shadow: 0 0 0 15px rgba(37, 211, 102, 0);
            }
        }

        /* Responsive untuk mobile */
        @media (max-width: 768px) {
            .floating-wa {
                bottom: 20px;
                right: 20px;
                width: 50px;
                height: 50px;
            }

            .floating-wa i {
                font-size: 26px;
            }

            .floating-wa::before {
                display: none;
                /* Hide tooltip on mobile */
            }
        }
    </style>
@endsection

@section('content')
    {{-- Hero Section --}}
    <section id="hero-section" class="h-screen">
        <div class="container h-full">
            <div class="grid grid-cols-2 items-center h-full relative">
                <div class="col-span-2 md:col-span-1">
                    <div class="text-white">
                        <h1
                            class="font-secondary uppercase font-black text-4xl md:text-5xl lg:text-6xl leading-10 md:leading-16 lg:leading-20 mb-5 md:mb-4">
                            Panti Asuhan Al-Dzikro</h1>
                        <p class="font-primary leading-relaxed ps-4 border-s-3 border-accent py-1 mb-9">Yayasan Al-Dzikro
                            berdiri atas kepedulian terhadap anak yatim, piatu, kaum dhuafa, dan orang jompo yang kurang
                            beruntung. </p>
                        <a href="#" class="inline-block btn bg-white text-primary">Selengkapnya</a>
                    </div>
                </div>
                <div class="col-span-2 md:col-span-1">
                    <img src="{{ asset('/assets/hero-img.webp') }}" alt=""
                        class="absolute bottom-0 right-10 md:right-0 h-90 md:h-130 lg:h-180">
                </div>
            </div>
        </div>
    </section>

    {{-- Section 2 --}}
    <section class="section">
        <div class="container">
            <div class="mb-10 md:mb-25">
                <div class="relative w-full">
                    <div class="absolute -right-3 md:right-7 -top-3 md:-top-7 w-25 h-40 md:w-25 md:h-75 bg-primary -z-1">
                    </div>
                    <iframe class="w-full md:w-4/5 aspect-video text-center m-auto"
                        src="https://www.youtube.com/embed/jqeSKB5RBQs?si=7z9k74QUEaNaoHoY" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <div class="absolute -bottom-3 -left-2 md:left-7 md:-bottom-7 w-25 h-40 md:w-25 md:h-75 bg-accent -z-1">
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-4 gap-4">

                <div class="col-span-4 md:col-span-1">
                    <div class="bg-[#f5f3f3] rounded-xl p-4">
                        <div class="text-center">
                            <img src="{{ asset('/assets/icons/hand-2.svg') }}" alt=""
                                class="size-12 object-contain mx-auto mb-3">
                            <h3 class="font-primary text-lg text-primary font-bold mb-2 md:mb-4">Keagamaan</h3>
                            <p class="leading-relaxed text-secondary font-secondary text-xs md:text-sm">Menyelenggarakan
                                pembinaan rohani melalui semaan Al-Qur'an, pengajian, TPA, kajian kitab, mujahadah,
                                shalawat, dan hadroh.</p>
                        </div>
                    </div>
                </div>

                <div class="col-span-4 md:col-span-1">
                    <div class="bg-[#f5f3f3] rounded-xl p-4">
                        <div class="text-center">
                            <img src="{{ asset('/assets/icons/kesehatan.svg') }}" alt=""
                                class="size-12 object-contain mx-auto mb-3">
                            <h3 class="font-primary text-lg text-primary font-bold mb-2 md:mb-4">Kesehatan</h3>
                            <p class="leading-relaxed text-secondary font-secondary text-xs md:text-sm">Memberikan layanan
                                kesehatan gratis, sosialisasi, edukasi, dan pengobatan ringan bagi anak LKSA, lansia, dan
                                masyarakat.</p>
                        </div>
                    </div>
                </div>

                <div class="col-span-4 md:col-span-1">
                    <div class="bg-[#f5f3f3] rounded-xl p-4">
                        <div class="text-center">
                            <img src="{{ asset('/assets/icons/sosial.svg') }}" alt=""
                                class="size-12 object-contain mx-auto mb-3">
                            <h3 class="font-primary text-lg text-primary font-bold mb-2 md:mb-4">Sosial</h3>
                            <p class="leading-relaxed text-secondary font-secondary text-xs md:text-sm">Mengasuh anak yatim
                                piatu dan mendampingi lansia dengan bantuan pendidikan, ekonomi, rohani, dan kesehatan.</p>
                        </div>
                    </div>
                </div>

                <div class="col-span-4 md:col-span-1">
                    <div class="bg-[#f5f3f3] rounded-xl p-4">
                        <div class="text-center">
                            <img src="{{ asset('/assets/icons/pembangunan.svg') }}" alt=""
                                class="size-12 object-contain mx-auto mb-3">
                            <h3 class="font-primary text-lg text-primary font-bold mb-2 md:mb-4">Ekonomi Pembangunan</h3>
                            <p class="leading-relaxed text-secondary font-secondary text-xs md:text-sm">Mengelola usaha
                                pertanian, perikanan, peternakan, dan pembangunan untuk mendukung kemandirian yayasan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Tentang Kami Section --}}
    <section class="section">
        <div class="container">
            <div class="grid grid-cols-12 gap-5 md:gap-15 items-center place-items-center">
                <div class="col-span-12 md:col-span-6">
                    <span class="section-subtitle">Tentang Kami</span>
                    <h2 class="section-title mb-7">Panti Asuhan Al-Dzikro</h2>
                    <p class="section-description mb-7">
                        {!! $aboutUs !!}
                    </p>
                    <a href="#" class="cursor-pointer">
                        <button class="btn btn-primary mt-7 cursor-pointer">Selengkapnya</button>
                    </a>
                </div>
                <div class="col-span-12 md:col-span-6 text-center">
                    <div class="relative w-full">
                        <div class="absolute -right-3 -top-3 lg:-right-5 lg:-top-5 w-25 h-60 md:h-75 bg-primary -z-1"></div>
                        <img src="{{ asset("/storage/{$aboutImage}") }}" alt=""
                            class="w-full h-80 md:w-120 md:h-120 object-cover z-5">
                        <div class="absolute -left-3 -bottom-3 lg:-left-5 lg:-bottom-5 w-25 h-60 md:h-75 bg-accent -z-1">
                        </div>
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
                        <iframe src="https://www.youtube.com/embed/5OuZB7CinuU?si=jZlKeK3iuxXpV3lj"
                            title="YouTube video player" class="w-full aspect-3/2" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                    <div class="col-span-2 md:col-span-1">
                        <iframe src="https://www.youtube.com/embed/jqeSKB5RBQs?si=HM1SIJlWRe_DvPHf"
                            title="YouTube video player" class="w-full aspect-3/2" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
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
            @if ($facilities->count() > 0)
                <div class="grid grid-cols-12 gap-5">
                    @foreach ($facilities as $index => $facility)
                        <div class="col-span-12 md:col-span-6">
                            <div class="grid grid-cols-12">
                                @if ($index % 2 == 0)
                                    {{-- Image Left, Text Right --}}
                                    <div class="col-span-12 lg:col-span-6">
                                        <img src="{{ asset('storage/' . $facility->image_path) }}"
                                            alt="{{ $facility->name }}" class="w-full h-60 object-cover">
                                    </div>
                                    <div
                                        class="col-span-12 lg:col-span-6 {{ $index % 4 == 0 ? 'bg-primary' : 'bg-accent' }}">
                                        <div class="flex h-full p-6 md:p-7">
                                            <div class="lg:m-auto">
                                                <p
                                                    class="text-lg {{ $index % 4 == 0 ? 'text-white' : 'text-primary' }} font-bold font-primary">
                                                    {{ $facility->name }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    {{-- Text Left, Image Right --}}
                                    <div
                                        class="col-span-12 lg:col-span-6 {{ ($index - 1) % 4 == 0 ? 'bg-accent' : 'bg-primary' }}">
                                        <div class="flex h-full p-6 md:p-7">
                                            <div class="lg:m-auto">
                                                <p
                                                    class="text-lg {{ ($index - 1) % 4 == 0 ? 'text-primary text-end' : 'text-white text-end' }} font-bold font-primary">
                                                    {{ $facility->name }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <img src="{{ asset('storage/' . $facility->image_path) }}"
                                            alt="{{ $facility->name }}" class="w-full h-60 object-cover">
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-600">Belum ada data fasilitas</p>
            @endif
        </div>
    </section>

    {{-- Visi Misi Section --}}
    <section class="section bg-[#F3F3F3]">
        <div class="container">
            <div class="grid grid-cols-2 gap-5 md:gap-10 lg:gap-20 items-center">
                <div class="col-span-2 md:col-span-1">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="grid gap-4">
                            <div>
                                <img class="max-w-full rounded-base object-cover md:aspect-6/10"
                                    src="https://aldzikro.org/wp-content/uploads/2025/07/1-1_result-scaled.webp"
                                    alt="">
                            </div>
                            <div>
                                <img class="max-w-full rounded-base object-cover md:aspect-square"
                                    src="https://aldzikro.org/wp-content/uploads/2025/07/1-4_result.webp" alt="">
                            </div>
                        </div>
                        <div class="grid gap-4">
                            <div>
                                <img class="max-w-full rounded-base object-cover md:aspect-square"
                                    src="https://aldzikro.org/wp-content/uploads/2025/07/3-4_result.webp" alt="">
                            </div>
                            <div>
                                <img class="max-w-full rounded-base object-cover md:aspect-6/10"
                                    src="https://aldzikro.org/wp-content/uploads/2025/07/3-1_result-scaled.webp"
                                    alt="">
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
                                <p>{!! $vision !!}</p>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header">
                                <h3>Misi</h3>
                            </div>
                            <div class="accordion-content">
                                {!! $mission !!}
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header">
                                <h3>Tujuan</h3>
                            </div>
                            <div class="accordion-content">
                                {!! $purpose !!}
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
            <div class="grid grid-cols-2 gap-8 lg:gap-20">
                <div class="col-span-2 md:col-span-1">
                    <div class="relative w-full">
                        <div class="absolute -right-3 -top-3 lg:-right-5 lg:-top-5 w-25 h-60 md:h-75 bg-primary -z-1">
                        </div>
                        <img src="{{ asset('/assets/2-4_result.webp') }}" alt=""
                            class="w-full h-80 md:w-120 md:h-120 object-cover z-5">
                        <div class="absolute -left-3 -bottom-3 lg:-left-5 lg:-bottom-5 w-25 h-60 md:h-75 bg-accent -z-1">
                        </div>
                    </div>
                </div>
                <div class="col-span-2 md:col-span-1">
                    <h2 class="section-title mb-7">Kata Masyarakat Tentang Al-Dzikro</h2>
                    <div class="bg-accent p-8 lg:w-4/5">
                        @if ($testimonials->count() > 0)
                            <div class="swiper mySwiper">
                                <div class="swiper-wrapper mb-15">
                                    @foreach ($testimonials as $testimonial)
                                        <div class="swiper-slide">
                                            <p class="italic mb-3">"{{ $testimonial->description }}"</p>
                                            <div class="flex items-center gap-4">
                                                <div>
                                                    <img src="{{ asset('storage/' . $testimonial->photo_path) }}"
                                                        alt="{{ $testimonial->name }}"
                                                        class="size-12 rounded-full object-cover">
                                                </div>
                                                <div>
                                                    <h5 class="font-medium text-sm mb-0">{{ $testimonial->name }}</h5>
                                                    @if ($testimonial->position)
                                                        <p class="text-secondary text-sm">{{ $testimonial->position }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-pagination"></div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        @else
                            <p class="text-center text-gray-600">Belum ada testimoni</p>
                        @endif
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
            @if ($articles->count() > 0)
                <div class="grid grid-cols-12 gap-8">
                    @foreach ($articles as $article)
                        <div class="col-span-12 md:col-span-6 lg:col-span-4">
                            <a href="{{ route('article.show', $article->slug) }}" class="cursor-pointer">
                                <div class="article-card">
                                    <div class="article-image">
                                        @if ($article->image_path)
                                            <img src="{{ asset('storage/' . $article->image_path) }}"
                                                alt="{{ $article->title }}" class="w-full object-cover">
                                        @else
                                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                                <i class="fas fa-image text-gray-400 text-4xl"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="article-body">
                                        <h3 class="text-lg font-extrabold text-primary font-primary mb-8">
                                            {{ Str::limit($article->title, 60) }}</h3>
                                        <a href="{{ route('article.show', $article->slug) }}"
                                            class="text-primary text-xs uppercase font-medium hover:text-accent">Detail
                                            Artikel >></a>
                                    </div>
                                    <div class="article-footer">
                                        <span
                                            class="text-secondary text-xs">{{ $article->created_at->format('F d, Y') }}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-600">Belum ada artikel</p>
            @endif

        </div>
    </section>

    {{-- Floating WhatsApp Button --}}
    <a href="https://wa.me/628987729223?text=Halo%20Admin%20Yayasan%20Al-Dzikro,%20saya%20ingin%20bertanya%20tentang%20layanan%20yayasan."
        class="floating-wa" target="_blank" rel="noopener noreferrer" aria-label="Hubungi via WhatsApp">
        <i class='bx bxl-whatsapp'></i>
    </a>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true,
            },
        });

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
