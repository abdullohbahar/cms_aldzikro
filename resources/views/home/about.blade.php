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