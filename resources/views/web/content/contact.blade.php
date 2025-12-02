@include('web.layouts.header')
@include('web.layouts.navbar')

<div class="font-sans bg-gradient-to-br from-[#f8fafc] via-[#f1f5f9] to-[#e2e8f0] min-h-screen py-20">

  <div class="container mx-auto px-6 mt-20">
    <!-- Header Section -->
    <div class="text-center mb-16">
      <h1 class="text-5xl font-bold text-gray-900 mb-4 tracking-tight">Get In Touch With Us</h1>
      <p class="text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
        We're here to help and answer any question you might have. We look forward to hearing from you.
      </p>
    </div>

    <div class="flex flex-col lg:flex-row justify-center items-start gap-8 max-w-6xl mx-auto">

      <!-- Left Contact Form -->
      <div class="w-full lg:w-1/2 bg-white rounded-3xl p-8 shadow-xl border border-gray-100 hover:shadow-2xl transition-all duration-300">
        <div class="mb-8">
          <h2 class="text-2xl font-bold text-gray-900 mb-2">Send us a message</h2>
          <p class="text-gray-600">Fill out the form below and we'll get back to you as soon as possible.</p>
        </div>

        <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
          @csrf
          
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name</label>
            <input type="text" name="name" placeholder="shby..." class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:bg-white transition-all duration-200 outline-none" required>
          </div>

          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
            <input type="email" name="email" placeholder="shby@example.com" class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:bg-white transition-all duration-200 outline-none" required>
          </div>

          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
            <input type="tel" name="phone" placeholder="+92 300 1234567" class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:bg-white transition-all duration-200 outline-none" required>
          </div>

          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Service</label>
            <select name="service" class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:bg-white transition-all duration-200 outline-none">
              <option value="">Select a service</option>
              <option value="lens_fitting">Lens Fitting</option>
              <option value="virtual_tryon">Virtual Try-On</option>
              <option value="subscription">Subscription Support</option>
            </select>
          </div>

          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Message</label>
            <textarea name="message" rows="4" placeholder="Tell us more about your inquiry..." class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:bg-white transition-all duration-200 outline-none resize-none"></textarea>
          </div>

          <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold py-4 rounded-xl shadow-lg hover:shadow-xl hover:from-blue-700 hover:to-blue-800 transform hover:-translate-y-0.5 transition-all duration-200">
            Send Message
          </button>
        </form>
      </div>

      <!-- Right Contact Info -->
      <div class="w-full lg:w-1/2 space-y-6">
        
        <!-- Contact Information Card -->
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8 hover:shadow-2xl transition-all duration-300">
          <div class="flex items-center gap-3 mb-6">
            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <div>
              <h3 class="text-xl font-bold text-gray-900">Contact Information</h3>
              <p class="text-sm text-gray-600">We're available 24/7</p>
            </div>
          </div>

          <div class="space-y-5">
            <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-gray-50 transition-all duration-200 group">
              <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center flex-shrink-0 group-hover:bg-blue-100 transition-colors duration-200">
                <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                </svg>
              </div>
              <div>
                <p class="text-sm font-semibold text-gray-500 mb-1">Phone</p>
                <p class="text-gray-900 font-medium">+92 325 2703679</p>
              </div>
            </div>

            <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-gray-50 transition-all duration-200 group">
              <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center flex-shrink-0 group-hover:bg-blue-100 transition-colors duration-200">
                <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                  <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                </svg>
              </div>
              <div>
                <p class="text-sm font-semibold text-gray-500 mb-1">Email</p>
                <p class="text-gray-900 font-medium break-all">muhammadshoaib10808@gmail.com</p>
              </div>
            </div>

            <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-gray-50 transition-all duration-200 group">
              <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center flex-shrink-0 group-hover:bg-blue-100 transition-colors duration-200">
                <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                </svg>
              </div>
              <div>
                <p class="text-sm font-semibold text-gray-500 mb-1">Address</p>
                <p class="text-gray-900 font-medium">Danish Optics, Satellite Town, Rawalpindi, Pakistan</p>
              </div>
            </div>
          </div>
        </div>

       
        <!-- Social Links Card -->
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8 hover:shadow-2xl transition-all duration-300">
          <h3 class="text-xl font-bold text-gray-900 mb-6">Connect With Us</h3>
          <div class="flex gap-4">
            <a href="#" class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 hover:bg-blue-600 hover:text-white hover:scale-110 transition-all duration-300 shadow-sm hover:shadow-md">
              <i class="fab fa-facebook-f text-lg"></i>
            </a>
            <a href="#" class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 hover:bg-blue-600 hover:text-white hover:scale-110 transition-all duration-300 shadow-sm hover:shadow-md">
              <i class="fab fa-twitter text-lg"></i>
            </a>
            <a href="#" class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 hover:bg-blue-600 hover:text-white hover:scale-110 transition-all duration-300 shadow-sm hover:shadow-md">
              <i class="fab fa-linkedin-in text-lg"></i>
            </a>
            <a href="#" class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 hover:bg-blue-600 hover:text-white hover:scale-110 transition-all duration-300 shadow-sm hover:shadow-md">
              <i class="fab fa-instagram text-lg"></i>
            </a>
          </div>
        </div>

      </div>

    </div>
  </div>

  @if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
  @endif


</div>


@include('web.layouts.footer')
</body>
