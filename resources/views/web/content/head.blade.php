<main class="flex-1 grid grid-cols-1 md:grid-cols-12 gap-8 px-4 md:px-10 lg:px-20 py-10 items-center min-h-[580px]">
  <!-- Left Content -->
  <div class="col-span-1 md:col-span-6 flex flex-col justify-center h-full space-y-6 relative">
    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold text-gray-900 leading-tight">
      Transform Your Optical Shop with 
      <span class="text-blue-600">Virtual Try-On</span>
    </h1>

    <!-- IMAGE: Top for mobile, hidden on desktop -->
    <div class="block md:hidden w-full flex justify-center my-4">
      <img 
        src="{{ asset('images/img1.jpeg') }}" 
        alt=""
        class="w-full max-w-xs sm:max-w-md h-auto rounded-2xl shadow-lg hover:scale-105 transition duration-300 object-cover object-center"
        style="aspect-ratio: 1/1;"
      >
    </div>

    <p class="text-gray-600 text-base md:text-lg leading-relaxed">
      Empower your customers to visualize contact lenses instantly. 
      No installations, no complexity just scan and try.
    </p>

    <div class="flex flex-col sm:flex-row flex-wrap gap-4 mt-6">
      <a
        href="shopkeeper.blade.php"
        class="bg-blue-600 hover:bg-blue-700 transition-all duration-300 text-white px-6 py-3 rounded-xl shadow-lg hover:shadow-xl text-center"
      >
        Start Free Trial
      </a>
      <a
        href="#"
        class="border-2 border-blue-600 text-blue-600 hover:bg-blue-50 transition-all duration-300 px-6 py-3 rounded-xl text-center"
        onclick="openModal('demoModal'); return false;"
      >
        Watch Demo
      </a>
      <!-- Your demo modal code remains here -->
    </div>
    
  </div>

  <!-- Right Image: hidden on mobile, visible (normal) on desktop -->
  <div class="col-span-1 md:col-span-6 justify-center items-center h-full hidden md:flex">
    <img 
      src="{{ asset('images/img1.jpeg') }}" 
      alt=""
      class="w-full max-w-xs sm:max-w-md md:max-w-lg lg:max-w-[450px] h-auto rounded-2xl shadow-lg hover:scale-105 transition duration-300 object-cover object-center"
      style="aspect-ratio: 1/1;"
    >
  </div>
</main>
