<x-front-layout>
  <!-- Main Content -->
  <section class="bg-darkGrey relative py-[70px] h-[1000px] sm:h-fit">
    <div class="container">
      <header class="mb-[30px]">
        <h2 class="font-bold text-dark text-[26px] mb-1">
          Checkout & Drive Faster
        </h2>
        <p class="text-base text-secondary">We will help you get ready today</p>
      </header>

      <div class="flex items-center gap-5 lg:justify-between">
        <!-- Form Card -->
        <form action="{{ route('front.payment.update', $bookings->id) }}" method="POST"
              class="bg-white p-[30px] pb-10 rounded-3xl max-w-[490px] w-full" id="checkoutForm">
          @csrf
          @method('post')
          <div class="flex flex-col gap-[30px]">
            <div class="flex flex-col gap-4">
              <h5 class="text-lg font-semibold">
                Review Order
              </h5>
              <!-- Items -->
              <div class="flex items-center justify-between">
                <p class="text-base font-normal">
                  Motor choosen
                </p>
                <p class="text-base font-semibold">
                  {{ $bookings->item->brand->name }} {{ $bookings->item->name }}
                </p>
              </div>
              <!-- Items -->
              <div class="flex items-center justify-between">
                <p class="text-base font-normal">
                  Total day
                </p>
                <p class="text-base font-semibold">
                  {{ $bookings->start_date->diffInDays($bookings->end_date) }} days
                </p>
              </div>
              <!-- Items -->
              <div class="flex items-center justify-between">
                <p class="text-base font-normal">
                  Price
                </p>
                <p class="text-base font-semibold">
                  Rp {{ $bookings->item->price }} per day
                </p>
              </div>
              <!-- Items -->
              <div class="flex items-center justify-between">
                <p class="text-base font-normal">
                  TAX (1%)
                </p>
                <p class="text-base font-semibold">
                  Rp {{ $bookings->item->price * $bookings->start_date->diffInDays($bookings->end_date) * (1 / 100) }}
                </p>
              </div>
              <!-- Items -->
              <div class="flex items-center justify-between">
                <p class="text-base font-normal">
                  Grand total
                </p>
                <p class="text-base font-semibold">
                  Rp {{ $bookings->total_price }}
                </p>
              </div>
            </div>
            <div class="flex flex-col gap-4">
              <h5 class="text-lg font-semibold">
                Payment Method
              </h5>
              <div class="grid md:grid-cols-2 gap-4 md:gap-[30px] items-center ">
                <div class="relative boxPayment col-span-2 mt-0" >
                  <input type="radio" value="midtrans" name="payment_method" id="midtrans"
                         class="absolute inset-0 z-50 opacity-0 cursor-pointer" checked >
                  <label for="midtrans"
                         class="flex items-center justify-center gap-4 border border-grey rounded-[20px] p-5 min-h-[80px]">
                    <img src="/svgs/logo-midtrans.svg" alt="">
                    <p class="text-base font-semibold">
                      Midtrans
                    </p>
                  </label>
                </div>
              </div>
            </div>
            <!-- CTA Button -->
            <div class="col-span-2 mt-5">
              <!-- Button Primary -->
              <div class="p-1 rounded-full bg-primary group">
                <a href="#!" class="btn-primary" id="checkoutButton">
                  <p>
                    Continue
                  </p>
                  <img src="/svgs/ic-arrow-right.svg" alt="">
                </a>
              </div>
            </div>
          </div>
        </form>
        <img src="/images/variolandingg.webp" class="right-0 lg:w-[904px] max-h-[522px] hidden sm:block" alt="">
      </div>
    </div>
  </section>
  <script>
    // on checkoutButton click, submit the form
    $('#checkoutButton').click(function() {
      $('#checkoutForm').submit();
    });
  </script>
</x-front-layout>
