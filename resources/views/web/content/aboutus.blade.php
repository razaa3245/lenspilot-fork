
@include('web.layouts.navbar')

<main class="relative z-10 max-w-7xl mx-auto px-6 py-20 bg-gradient-to-br from-white via-slate-50 to-cyan-50 text-slate-800 font-sans min-h-screen overflow-x-hidden">

  <!-- Title -->

  <div class="text-center mb-20">
    <h1 class="text-5xl md:text-6xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-700 via-gray-700 to-gray-900">
    About Us
  </h1>
    <p class="mt-4 text-lg text-slate-600 max-w-2xl mx-auto">
      Shaping the future of eyewear with AI + AR — blending innovation and human vision.
    </p>
  </div>

  <!-- About Cards -->

  <div class="grid md:grid-cols-3 gap-10">
    <div class="bg-white border border-slate-200 p-8 rounded-3xl shadow-md hover:shadow-cyan-200 hover:-translate-y-2 transition-all duration-500">
      <h2 class="text-2xl font-bold mb-4 text-black-700">Our Vision</h2>
      <p class="text-slate-600 leading-relaxed">
        Redefining eyewear shopping through immersive, accessible, and personalized AR technology.
      </p>
    </div>

<div class="bg-white border border-slate-200 p-8 rounded-3xl shadow-md hover:shadow-blue-200 hover:-translate-y-2 transition-all duration-500">
  <h2 class="text-2xl font-bold mb-4 text-black-700">Our Mission</h2>
  <p class="text-slate-600 leading-relaxed">
    To empower retailers with intelligent, data-driven AR tools that elevate every customer's eyewear experience.
  </p>
</div>

<div class="bg-white border border-slate-200 p-8 rounded-3xl shadow-md hover:shadow-indigo-200 hover:-translate-y-2 transition-all duration-500">
  <h2 class="text-2xl font-bold mb-4 text-black-700">Why Choose Us?</h2>
  <p class="text-slate-600 leading-relaxed">
    Trusted by top optical brands — our secure, elegant AR integrations redefine visual engagement.
  </p>
</div>
  </div>

  <!-- AR Feature -->

  <section class="mt-24 grid md:grid-cols-2 gap-16 items-center">
    <div class="bg-white border border-slate-200 rounded-3xl p-8 shadow-md hover:shadow-cyan-200 hover:-translate-y-2 transition-all duration-500">
      <h2 class="text-3xl font-bold mb-4 text-transparent bg-clip-text bg-gradient-to-r from-cyan-600 to-blue-700">Immersive AR Experience</h2>
      <p class="text-slate-600 mb-6 leading-relaxed">
        Our AR engine provides ultra-realistic, app-free virtual try-ons — fast, precise, and powered by AI.
      </p>
      <ul class="text-slate-700 space-y-2">
        
        <li> Seamless mobile compatibility</li>
        <li> AI facial mapping accuracy</li>
        <li> One-scan QR integration</li>
      </ul>
    </div>

<div class="relative">
  <img src="{{ asset('images/img1.jpeg') }}" alt="AR Illustration"
       class="rounded-3xl border border-slate-200 shadow-lg hover:shadow-cyan-300 hover:scale-105 transition-transform duration-700">
</div>


  </section>

  <!-- Team Section -->

<section class="mt-32 text-center">
  <h2 class="text-4xl font-extrabold mb-6 text-transparent bg-clip-text bg-gradient-to-r from-cyan-600 via-blue-700 to-indigo-700">
    Meet the Team
  </h2>
  <p class="text-slate-600 mb-12">The innovators bringing vision to life through technology.</p>

  <div class="grid md:grid-cols-3 gap-10 justify-items-center">
    <!-- Team Card 1 -->
    <div class="relative group w-72 h-96 bg-white border border-slate-200 rounded-3xl shadow-lg overflow-hidden transform transition-all duration-700 hover:-translate-y-6 hover:shadow-2xl hover:shadow-cyan-300">
      <img src="{{ asset('images/hunain.png') }}" class="w-full h-full object-cover scale-100 group-hover:scale-110 transition-transform duration-700 ease-out" alt="Team Member">
      <div class="absolute inset-0 bg-gradient-to-t from-slate-900/70 via-slate-800/20 to-transparent opacity-90 group-hover:opacity-100 transition-all duration-700"></div>
      <div class="absolute inset-x-0 bottom-0 p-6 transform group-hover:-translate-y-2 transition-transform duration-700">
        <h3 class="text-lg font-bold text-white">Syed Hunain Ahmed</h3>
        <p class="text-slate-200 text-sm">Lead AR Engineer</p>
      </div>
      
    </div>

<!-- Team Card 2 -->
<div class="relative group w-72 h-96 bg-white border border-slate-200 rounded-3xl shadow-lg overflow-hidden transform transition-all duration-700 hover:-translate-y-6 hover:shadow-2xl hover:shadow-blue-300">
  <img src="{{ asset('images/shoaib.png') }}" class="w-full h-full object-cover scale-100 group-hover:scale-110 transition-transform duration-700 ease-out" alt="Team Member">
  <div class="absolute inset-0 bg-gradient-to-t from-slate-900/70 via-slate-800/20 to-transparent opacity-90 group-hover:opacity-100 transition-all duration-700"></div>
  <div class="absolute inset-x-0 bottom-0 p-6 transform group-hover:-translate-y-2 transition-transform duration-700">
    <h3 class="text-lg font-bold text-white">Muhammad Shoaib Akhtar</h3>
    <p class="text-slate-200 text-sm">Frontend Designer</p>
  </div>
  
</div>

<!-- Team Card 3 -->
<div class="relative group w-72 h-96 bg-white border border-slate-200 rounded-3xl shadow-lg overflow-hidden transform transition-all duration-700 hover:-translate-y-6 hover:shadow-2xl hover:shadow-indigo-300">
  <img src="{{ asset('images/ahmed.png') }}" class="w-full h-full object-cover scale-100 group-hover:scale-110 transition-transform duration-700 ease-out" alt="Team Member">
  <div class="absolute inset-0 bg-gradient-to-t from-slate-900/70 via-slate-800/20 to-transparent opacity-90 group-hover:opacity-100 transition-all duration-700"></div>
  <div class="absolute inset-x-0 bottom-0 p-6 transform group-hover:-translate-y-2 transition-transform duration-700">
    <h3 class="text-lg font-bold text-white">Muhammad Ahmed Raza</h3>
    <p class="text-slate-200 text-sm">AI / Computer Vision Specialist</p>
  </div>
  
</div>


  </div>
</section>


  <!-- Trusted By -->

  <section class="mt-24 flex justify-center">
    <div class="text-center bg-white border border-slate-200 rounded-3xl p-10 shadow-md hover:shadow-cyan-200 hover:-translate-y-2 transition-all duration-500 w-full md:w-3/4 lg:w-2/3">
      <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-600 to-blue-700 mb-6">Trusted By</h2>
      <div class="flex flex-wrap justify-center gap-10">
        <img src="{{ asset('images/company2.png') }}" class="w-24 opacity-70 hover:opacity-100 transition" alt="Nike">
        <img src="{{ asset('images/company3.jpg') }}" class="w-16 opacity-70 hover:opacity-100 transition" alt="Apple">
        <img src="{{ asset('images/company4.jpg') }}" class="w-24 opacity-70 hover:opacity-100 transition" alt="Microsoft">
        <img src="{{ asset('images/company4.png') }}" class="w-28 opacity-70 hover:opacity-100 transition" alt="Google">
      </div>
    </div>
  </section>
</main>
@include('web.layouts.footer')