
<x-front-layout>
  
  <!-- Hero -->
  <section class=" relative pb-[100px] pt-[30px] bg-navbar" >
    <div class="flex flex-col items-center justify-center gap-[80px]">
      <!-- Preview Image -->
      <div class="relative">
  <div class="absolute z-0 hidden lg:flex justify-center items-center w-full h-full">
    <div class="font-extrabold text-[200px] text-black opacity-30 tracking-[-0.06em] leading-[101%] flex flex-col items-center">
      <div data-aos="fade-right" data-aos-delay="300">
        MOTORENTAL
      </div>
      <div data-aos="fade-left" data-aos-delay="600">
        BENHIL47
      </div>
    </div>
  </div>
  <img src="/images/landingv.png" class="w-full max-w-[703px] z-10 relative " alt="" data-aos="zoom-in"
       data-aos-delay="950">
</div>

      <div class="flex flex-col lg:flex-row items-center justify-around lg:gap-[60px] gap-5">
       
        <!-- Button Primary -->
        <div class="p-1 rounded-full bg-dadada" data-aos="zoom-in" data-aos-delay="1500">
          <a href="#popularMotor" class="btn-primary  ">
            <p class="transition-all duration-[320ms] translate-x-3 group-hover:-translate-x-1">
              Rent Now
            </p>
            <img src="/svgs/ic-arrow-right.svg"
                 class="opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-[320ms]"
                 alt="">
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Popular Motor -->
  <section class="bg-lalala" id="popularMotor">
  <div class="container relative py-[100px]">
    <header class="mb-[30px]">
      <h2 class="font-bold text-dark text-[26px] mb-1">
        Available MotorCycles
      </h2>
      <p class="text-base text-secondary">Start your big day</p>
    </header>

    <!-- Motor -->
    <div class="flex overflow-x-auto gap-[29px]">
      @foreach ($items as $item)
        <!-- Card -->
        <div class="card-popular flex-shrink-0">
          <div>
            <h5 class="text-lg text-dark font-bold mb-[2px]">
              {{ $item->name }}
            </h5>
            <p class="text-sm font-normal text-secondary">
              {{ $item->type ? $item->type->name : '-' }}
            </p>
            <a href="{{ route('front.detail', $item->slug) }}" class="absolute inset-0"></a>
          </div>
          <img src="{{ $item->thumbnail }}" class="rounded-[18px] min-w-[216px] w-full h-[150px]" alt="">
          <div class="flex items-center justify-between gap-1">
            <!-- Price -->
            <p class="text-sm font-normal text-secondary">
              <span class="text-base font-bold text-primary">Rp {{ $item->price }}</span>/day
            </p>
            <!-- Rating -->
            <p class="text-dark text-xs font-semibold flex items-center gap-[2px]">
              ({{ $item->star }}/5)
              <img src="/svgs/ic-star.svg" alt="">
            </p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

  <!-- Extra Benefits -->
  <section class="relative pt-[100px] bg-dadada opacity-95">
  <div class="flex items-center flex-col md:flex-row flex-wrap justify-center gap-8 lg:gap-[120px] px-4">
    <img src="/images/rating.png" class="w-full lg:max-w-[476px] mb-20" alt="">
    <div class="max-w-[268px] w-full">
      <div class="flex flex-col gap-[50px]">
        <header>
          <h2 class="font-bold text-white text-[26px] mb-1">
            Extra Benefits
          </h2>
          <p class="text-white text-secondary">You drive safety and famous</p>
        </header>
        <!-- Benefits Item -->
        <div class="flex items-center gap-4">
          <div class="bg-nanana rounded-[26px] p-[19px]">
            <img src="/svgs/ic-car.svg" alt="">
          </div>
          <div>
            <h5 class="text-lg text-white font-bold mb-[2px]">
              Delivery
            </h5>
            <p class="text-white font-normal text-secondary">Duduk santai, motor sampai</p>
          </div>
        </div>
        <div class="flex items-center gap-4">
          <div class="bg-nanana rounded-[26px] p-[17px]">
            <img src="/svgs/ic-card.svg" alt="">
          </div>
          <div>
            <h5 class="text-lg text-white font-bold mb-[2px]">
              Pricing
            </h5>
            <p class="text-white font-normal text-secondary">Biaya termurah</p>
          </div>
        </div>
        <div class="flex items-center gap-4">
          <div class="bg-nanana rounded-[26px] p-[17px]">
            <img src="/svgs/ic-securityuser.svg" alt="">
          </div>
          <div>
            <h5 class="text-lg text-white font-bold mb-[2px]">
              Secure
            </h5>
            <p class="text-white font-normal text-secondary">Data Aman</p>
          </div>
        </div>
        <div class="flex items-center gap-4">
          <div class="bg-nanana rounded-[26px] p-[19px]">
            <img src="/svgs/ic-convert3dcube.svg" alt="">
          </div>
          <div>
            <h5 class="text-lg text-white font-bold mb-[2px]">
              Fast Trade
            </h5>
            <p class="text-white font-normal text-secondary">Ganti motor bila bermasalah</p>
          </div>
        </div>
      </div>
      <!-- CTA Button -->
      <div class="mt-[100px]">
        <!-- Add your CTA button code here -->
      </div>
    </div>
  </div>
</section>

  <!-- FAQ -->
  <section class=" relative py-[100px] bg-lalala px-4">
    <header class="text-center mb-[50px]">
      <h2 class="font-bold text-dark text-[26px] mb-1">
        Frequently Asked Questions
      </h2>
      <p class="text-base text-secondary">Learn more about MRB47 and get a success</p>
    </header>

    <!-- Questions -->
    <div class="grid md:grid-cols-2 gap-x-[50px] gap-y-6 max-w-[910px] w-full mx-auto px-4">
      <a href="#!" class="px-6 py-4 border rounded-[24px] border-dark h-min accordion max-w-[430px]"
         id="faq1">
        <div class="flex items-center justify-between gap-1">
          <p class="text-base font-semibold text-dark">
          Apa saja persyaratan untuk menyewa motor di BenhilMotoRental47?
          </p>
          <img src="/svgs/ic-chevron-down-rounded.svg" class="transition-all" alt="">
        </div>
        <div class="hidden pt-4 max-w-[335px]" id="faq1-content">
          <p class="text-base text-dark leading-[26px]">
          Untuk menyewa motor di BenhilMotoRental47, Anda harus memiliki SIM C yang masih 
          berlaku dan dokumen identitas lainnya, seperti KTP atau paspor. 
          </p>
        </div>
      </a>
      <a href="#!" class="px-6 py-4 border rounded-[24px] border-dark h-min accordion max-w-[430px]"
         id="faq2">
        <div class="flex items-center justify-between gap-1">
          <p class="text-base font-semibold text-dark">
          Bagaimana jika motor mengalami kerusakan selama masa penyewaan?
          </p>
          <img src="/svgs/ic-chevron-down-rounded.svg" class="transition-all" alt="">
        </div>
        <div class="hidden pt-4 max-w-[335px]" id="faq2-content">
          <p class="text-base text-dark leading-[26px]">
          Segala kerusakaan selama penyewaan motor menjadi
          tanggung jawab penyewa, tetapi terlebih dahulu 
          hubungi pihak sewa motor.
          </p>
        </div>
      </a>
      <a href="#!" class="px-6 py-4 border rounded-[24px] border-dark h-min accordion max-w-[430px]"
         id="faq3">
        <div class="flex items-center justify-between gap-1">
          <p class="text-base font-semibold text-dark">
          Apakah tidak memiliki SIM C dapat menyewa motor?
          </p>
          <img src="/svgs/ic-chevron-down-rounded.svg" class="transition-all" alt="">
        </div>
        <div class="hidden pt-4 max-w-[335px]" id="faq3-content">
          <p class="text-base text-dark leading-[26px]">
            Tidak bisa, penyewa harus memiliki SIM C terlebih dahulu
          </p>
        </div>
      </a>
      <a href="#!" class="px-6 py-4 border rounded-[24px] border-dark h-min accordion max-w-[430px]"
         id="faq4">
        <div class="flex items-center justify-between gap-1">
          <p class="text-base font-semibold text-dark">
          Apakah ada batasan jarak perjalanan dalam penyewaan motor?
          </p>
          <img src="/svgs/ic-chevron-down-rounded.svg" class="transition-all" alt="">
        </div>
        <div class="hidden pt-4 max-w-[335px]" id="faq4-content">
          <p class="text-base text-dark leading-[26px]">
            Selama dikawasan JaBoDeTaBek diperbolehkan
          </p>
        </div>
      </a>
      <a href="#!" class="px-6 py-4 border rounded-[24px] border-dark h-min accordion max-w-[430px]"
         id="faq5">
        <div class="flex items-center justify-between gap-1">
          <p class="text-base font-semibold text-dark">
          Bagaimana cara cara customer dapat menghubungi dari pihak BenhilMotoRental47? 
          </p>
          <img src="/svgs/ic-chevron-down-rounded.svg" class="transition-all" alt="">
        </div>
        <div class="hidden pt-4 max-w-[335px]" id="faq5-content">
          <p class="text-base text-dark leading-[26px]">
            Kamu dapat menghubungi via chat
            whatsapp : +62 812-8863-793
          </p>
        </div>
      </a>
      <a href="#!" class="px-6 py-4 border rounded-[24px] border-dark h-min accordion max-w-[430px]"
         id="faq6">
        <div class="flex items-center justify-between gap-1">
          <p class="text-base font-semibold text-dark">
          Bisakah saya mengembalikan motor lebih awal dari waktu sewa yang ditentukan?
          </p>
          <img src="/svgs/ic-chevron-down-rounded.svg" class="transition-all" alt="">
        </div>
        <div class="hidden pt-4 max-w-[335px]" id="faq6-content">
          <p class="text-base text-dark leading-[26px]">
            Ya, tetapi kami tidak mengembalikan uang jika motor 
            dikembalikan lebih awal,
          </p>
        </div>
      </a>
    </div>
  </section>

  <!-- Return Motor -->
<section class="relative bg-navbar">
  <div class="container py-20">
    <div class="flex flex-col">
      <header class="mb-[50px] max-w-[360px] w-full">
        <h2 class="font-bold text-white text-[26px] mb-4">
          Saatnya Pulang  <br>
          Tunggangan Setia, Motor!
        </h2>
        <p class="text-base text-subtlePars">Kamu dapat mengembailkan motor setelah selesai meminjam.</p>
      </header>
      <!-- Button Primary -->
      <div class="p-1 rounded-full bg-dadada w-max">
        @if($isbtndisable)
          <a class="btn-primary disabled:opacity-50">
            <p class="transition-all duration-[320ms] translate-x-3 group-hover:-translate-x-1">
              Return Motor
            </p>
            <img src="/svgs/ic-arrow-right.svg"
                class="opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-[320ms]"
                alt="">
          </a>
        @else
          <a href="{{ route('front.returnMotor') }}" class="btn-primary" onclick="showAlert()">
            <p class="transition-all duration-[320ms] translate-x-3 group-hover:-translate-x-1">
              Return Motor
            </p>
            <img src="/svgs/ic-arrow-right.svg"
                class="opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-[320ms]"
                alt="">
          </a>
        @endif  
      </div>
    </div>
    <div class="absolute bottom-[-0px] right-0 lg:w-[904px] max-h-[522px] hidden lg:block">
      <img src="/images/variolandingg.webp" class="w-full max-w-[1003px] z-10 relative" alt="">
    </div>
  </div>
</section>

<script>
  function showAlert() {
    alert("Motor sudah dikembalikan.");
  }
</script>

  
  <section class=" relative py-[40px] bg-lalala "id="mapss">
    <div class="w-full flex h-[400px] px-4 sm:px-24">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.4059894639327!2d106.80524497450135!3d-6.210062860828255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f71e5c942ac1%3A0x46d858a8c4608cf4!2sMotoRental%20Benhil%2047!5e0!3m2!1sen!2sid!4v1689947091993!5m2!1sen!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
  <!-- <div class="grid md:grid-cols-2 gap-x-[50px] gap-y-6 w-8 h-8 bg-red-200 mx-auto items-center">
    </div> -->
  </section>


  <footer class="py-10 md:pt-[50px] md:pb-[50px] " >
  <!-- ... -->
  
      <div class="flex items-center justify-center gap-5 mt-5">
      <a href="https://api.whatsapp.com/send?phone=628128863793" class="text-primary hover:text-primary-dark transition-colors social-icon" target="_blank">
        <i class="fab fa-whatsapp fa-2x"></i>
      </a>
      <a href="https://www.instagram.com/motorentalbenhil47/" class="text-primary hover:text-primary-dark transition-colors social-icon" target="_blank">
        <i class="fab fa-instagram fa-2x"></i>
      </a>
      <a href="#" class="text-primary hover:text-primary-dark transition-colors social-icon" target="_blank">
        <i class="fab fa-facebook fa-2x"></i>
      </a>
      <!-- Add more social media icons as needed -->
    </div>
  
  <p class="text-base text-center text-secondary mt-5 px-4">
    All Rights Reserved. Copyright Naraathrum 2023.
    
  </p>
</footer>

<style>
  .social-icon {
    margin-right: 15px; /* Adjust the value to set the desired spacing */
  }
  .social-icon i {
    color: #874732;
  }

  .social-icon:hover i {
    color: #874732; /* You can change this to a darker shade if you want */
  }
</style>
</x-front-layout>