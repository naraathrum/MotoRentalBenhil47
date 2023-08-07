<x-front-layout>

  <!-- Main Content -->
  <section class="bg-darkGrey relative py-[70px]">
    <div class="container">
      <div class="flex flex-col items-center">
        <header class="mb-[30px] text-center">
          <h2 class="font-bold text-dark text-[26px] mb-1">
            Sign In & Drive
          </h2>
          <p class="text-base text-secondary">We will help you get ready today</p>
        </header>
        <!-- Form Card -->  
        <form method="POST" action="{{ route('login') }}" id="loginForm"
              class="bg-white p-[30px] pb-10 rounded-3xl max-w-[490px] w-full">
          @csrf
          <div class="grid grid-cols-2 items-center gap-y-6 gap-x-4 lg:gap-x-[30px]">
            <!-- Validation Errors -->
            <div class="flex flex-col col-span-2 gap-3">
              <x-jet-validation-errors />
              @if (session('status'))
                <div class="mb-4 text-sm font-medium text-green-600">
                  {{ session('status') }}
                </div>
              @endif
            </div>

            <!-- Email -->
            <div class="flex flex-col col-span-2 gap-3">
              <label for="" class="text-base font-semibold text-dark">
                Email Address
              </label>
              <input type="email" name="email" id="email"
                     class="text-base font-medium focus:border-primary focus:outline-none placeholder:text-secondary placeholder:font-normal px-[26px] py-4 border border-grey rounded-[50px]"
                     placeholder="Insert Email Address" value="{{ old('email') }}" autofocus required>
            </div>
            <!-- Password -->
            <div class="flex flex-col col-span-2 gap-3">
              <label for="" class="text-base font-semibold text-dark">
                Password
              </label>
              <input type="password" name="password" id="password"
                     class="text-base font-medium focus:border-primary focus:outline-none placeholder:text-secondary placeholder:font-normal px-[26px] py-4 border border-grey rounded-[50px]"
                     placeholder="Insert password" required>
              @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                   class="mt-1 text-base text-right underline text-secondary underline-offset-2">
                  Forgot My Password
                </a>
              @endif
            </div>
            <!-- Sign In Button -->
            <div class="col-span-2 mt-[26px]">
              <!-- Button Primary -->
              <div class="p-1 rounded-full bg-primary group">
                <a href="#!" class="btn-primary" id="loginButton">
                  <p>
                    Sign In
                  </p>
                  <img src="/svgs/ic-arrow-right.svg" alt="">
                </a>
                <button type="submit" class="hidden"></button>
              </div>
            </div>
            @if (Route::has('register'))
              <!-- Create New Account Button -->
              <div class="col-span-2">
                <a href="{{ route('register') }}" class="btn-secondary">
                  <p>Create New Account</p>
                </a>
              </div>
            @endif
          </div>
        </form>
      </div>
    </div>
  </section>

  <script>
    $('#loginButton').click(function() {
      $('#loginForm').submit();
    });
  </script>
</x-front-layout>
