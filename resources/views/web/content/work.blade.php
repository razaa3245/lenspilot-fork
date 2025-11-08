<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<section class="bg-[#0b1e64] py-20 font-poppins relative overflow-hidden">
  <!-- Blue glow background -->
  <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_rgba(59,130,246,0.15),_transparent_70%)] blur-3xl"></div>

  <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center justify-center gap-10 md:gap-16 relative z-10 px-3 md:px-6">
    <!-- Left Section -->
    <div class="w-full lg:w-1/2 space-y-10">
      <div class="text-center lg:text-left">
        <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-4 leading-tight">
          How It Works
        </h1>
        <p class="text-[#e2e8f0] text-base md:text-lg mb-8 max-w-3xl mx-auto">
          Simple, seamless, and designed for in-store success. Here’s how it enhances the shopping experience for your customers.
        </p>
      </div>

      <!-- Step 1 -->
      <div class="rounded-2xl bg-white text-left shadow-xl p-6 md:p-8 transition-transform duration-300 hover:-translate-y-1">
        <h2 class="text-xl md:text-2xl text-[#1e3a8a] font-semibold mb-3">
          <a href="signup.blade.php" class="hover:underline">Shop Register</a>
        </h2>
        <p class="text-gray-700 text-base leading-relaxed">
          Sign up and choose your subscription plan. Get access to your dashboard integration where you can manage everything.
        </p>
      </div>

      <!-- Step 2 -->
      <div class="rounded-2xl bg-white text-left shadow-xl p-6 md:p-8 transition-transform duration-300 hover:-translate-y-1">
        <h2 class="text-xl md:text-2xl text-[#1e3a8a] font-semibold mb-3">
          Generate QR Code
        </h2>
        <p class="text-gray-700 text-base leading-relaxed">
          Instantly generate a QR code for visitors to scan and explore your virtual try-on service.
        </p>
      </div>

      <!-- Step 3 -->
      <div class="rounded-2xl bg-white text-left shadow-xl p-6 md:p-8 transition-transform duration-300 hover:-translate-y-1">
        <h2 class="text-xl md:text-2xl text-[#1e3a8a] font-semibold mb-3">
          Customer Scan
        </h2>
        <p class="text-gray-700 text-base leading-relaxed">
          Customers scan the QR code to access the AR try-on feature on their devices — no installs needed.
        </p>
      </div>
    </div>

    <!-- Right Section (Image Area) -->
    <div class="w-full lg:w-1/2 flex justify-center items-center relative mt-12 lg:mt-0">
      <div class="relative w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-[420px]">
        <img 
          src="{{ asset('images/working.jpeg') }}" 
          alt="Virtual Try-On" 
          class="w-full h-auto rounded-3xl shadow-2xl border-[6px] border-[#0b1e64] transition-transform duration-500 hover:scale-105"
        >
        <!-- Light glow effect -->
        <div class="absolute -inset-2 bg-blue-400/30 blur-3xl rounded-3xl -z-10"></div>
      </div>
    </div>
  </div>
</section>
