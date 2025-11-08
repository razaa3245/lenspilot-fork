<section class="w-full bg-gradient-to-br from-blue-50 via-blue-100 to-cyan-50 py-14">
  <div class="max-w-4xl mx-auto px-2">
    <div class="bg-white shadow-xl rounded-2xl flex flex-col md:flex-row justify-around items-center gap-10 py-10 px-5 md:px-12 transition-all duration-500 hover:shadow-2xl">
      
      <!-- Active Shops -->
      <div class="flex flex-col items-center group">
        <div class="relative">
          <span class="absolute text-blue-100 text-7xl opacity-40 -top-10 left-1/2 -translate-x-1/2 select-none animate-pulse z-0" aria-hidden="true"></span>
          <h2 class="text-4xl md:text-5xl font-extrabold text-blue-700 z-10 relative animate-bounce">
            <span id="shops-count">0</span>+
          </h2>
        </div>
        <p class="text-gray-500 mt-2 text-lg font-medium tracking-wide">Active Shops</p>
      </div>
      
      <!-- Try-Ons Daily -->
      <div class="flex flex-col items-center group">
        <div class="relative">
          <span class="absolute text-blue-100 text-7xl opacity-40 -top-10 left-1/2 -translate-x-1/2 select-none animate-pulse z-0" aria-hidden="true"></span>
          <h2 class="text-4xl md:text-5xl font-extrabold text-blue-700 z-10 relative animate-bounce">
            <span id="tryons-count">0</span>k+
          </h2>
        </div>
        <p class="text-gray-500 mt-2 text-lg font-medium tracking-wide">Try-Ons Daily</p>
      </div>
      
      <!-- Satisfaction -->
      <div class="flex flex-col items-center group">
        <div class="relative">
          <span class="absolute text-blue-100 text-7xl opacity-40 -top-10 left-1/2 -translate-x-1/2 select-none animate-pulse z-0" aria-hidden="true"></span>
          <h2 class="text-4xl md:text-5xl font-extrabold text-blue-700 z-10 relative animate-bounce">
            <span id="satisfaction-count">0</span>%
          </h2>
        </div>
        <p class="text-gray-500 mt-2 text-lg font-medium tracking-wide">Satisfaction</p>
      </div>
    </div>
  </div>
  <script>
    // Animated Counter Function
    function animateValue(id, start, end, duration) {
      let range = end - start;
      let current = start;
      let increment = end > start ? 1 : -1;
      let stepTime = Math.abs(Math.floor(duration / range));
      let obj = document.getElementById(id);
      if (!obj) return;
      let timer = setInterval(function() {
        current += increment;
        obj.textContent = current;
        if (current == end) {
          clearInterval(timer);
        }
      }, stepTime);
    }
    // Start the animations after page load
    document.addEventListener("DOMContentLoaded", function() {
      animateValue("shops-count", 0, 500, 1300);
      animateValue("tryons-count", 0, 50, 1000);
      animateValue("satisfaction-count", 0, 98, 1500);
    });
  </script>
</section>
