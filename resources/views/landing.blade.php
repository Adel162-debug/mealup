<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Up - Food Waste Prevention</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        mealBrown: '#43271b',
                        mealCream: '#fbf7ee',
                        mealAccent: '#b06800',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-mealCream text-mealBrown font-sans antialiased selection:bg-amber-200 overflow-x-hidden">

    <!-- NAVBAR -->
    <header class="sticky top-0 z-40 h-[92px] bg-white lg:h-[139px] shadow-sm">
        <div class="mx-auto flex h-full max-w-[1440px] items-center px-5 sm:px-8 lg:px-10">
            <!-- Logo -->
            <button onclick="window.scrollTo({ top: 0, behavior: 'smooth' })" class="shrink-0 transition-transform hover:scale-105 cursor-pointer bg-transparent border-0">
                <img alt="Meal Up" class="h-auto w-[132px] lg:w-[188px]" src="{{ asset('assets/73d6a.png') }}" />
            </button>

            <!-- Menu Navigasi -->
            <nav class="ml-10 hidden items-center gap-14 md:flex lg:ml-16 lg:gap-[71px]">
                <a href="#about" class="font-semibold text-xl text-black hover:text-mealAccent transition">About</a>
                <a href="#features" class="font-semibold text-xl text-black hover:text-mealAccent transition">Feature</a>
                <a href="#contact" class="font-semibold text-xl text-black hover:text-mealAccent transition">Contact</a>
            </nav>

            <!-- Tombol Auth -->
            <div class="ml-auto flex items-center gap-2.5 sm:gap-3">
                <button onclick="openModal('signin')" class="min-w-[72px] sm:min-w-[92px] lg:w-[173px] cursor-pointer rounded-lg border border-black bg-white px-3 py-2 text-xs sm:text-sm lg:text-lg font-semibold text-mealBrown hover:bg-mealCream transition">
                    Sign in
                </button>
                <button onclick="openModal('signup')" class="min-w-[72px] sm:min-w-[92px] lg:w-[173px] cursor-pointer rounded-lg bg-mealBrown px-3 py-2 text-xs sm:text-sm lg:text-lg font-semibold text-white hover:bg-mealAccent transition shadow-md">
                    Sign up
                </button>
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main>
        <!-- HERO SECTION DENGAN SVG GELOMBANG ATAS -->
        <section id="about" class="relative isolate min-h-[760px] overflow-hidden px-5 pb-20 pt-16 sm:px-8 lg:min-h-[895px] lg:px-10 lg:pt-0 flex items-center">
            
            <!-- Gelombang SVG Hero -->
            <img alt="" class="pointer-events-none absolute -right-[280px] -top-[250px] -z-10 hidden h-[1120px] w-[1048px] rotate-[-88.77deg] lg:block" src="{{ asset('assets/82f3e.svg') }}" />

            <div class="mx-auto grid max-w-[1360px] items-center lg:grid-cols-[47%_53%] w-full">
                <div class="relative z-20 pt-4 lg:pt-0">
                    <h1 class="text-[52px] leading-[1.08] sm:text-[66px] lg:text-[90px] font-bold">
                        <span class="text-mealAccent">Cook “less” with</span> Meal Up
                    </h1>
                    <p class="mt-7 max-w-[470px] text-base leading-relaxed text-black lg:ml-[5px] lg:mt-8 lg:text-[22px]">
                        lorem ipsum jabaolhdsbdibdudb<br>djbdjdbjbdjbjddvd
                    </p>
                    <button onclick="scrollToFeatures()" class="mt-8 min-h-[66px] w-[260px] rounded-lg bg-mealBrown px-6 py-4 text-[22px] lg:text-[32px] font-semibold text-white hover:bg-mealAccent transition shadow-xl cursor-pointer">
                        Get Started!
                    </button>
                </div>

                <!-- Ilustrasi Makanan -->
                <div class="relative mt-10 h-[440px] sm:h-[530px] lg:mt-0 lg:h-[895px]">
                    <div class="absolute right-[4%] top-[0%] h-[45%] w-[48%] rotate-[5deg]">
                        <img alt="Noodle soup" class="h-full w-full object-contain drop-shadow-lg" src="{{ asset('assets/a77d2.png') }}" />
                    </div>
                    <div class="absolute bottom-[4%] right-[-6%] h-[51%] w-[56%]">
                        <img alt="Chicken soup" class="h-full w-full object-contain drop-shadow-lg" src="{{ asset('assets/326a9.png') }}" />
                    </div>
                    <div class="absolute left-[-2%] top-[18%] z-10 h-[68%] w-[72%]">
                        <img alt="Fried rice" class="h-full w-full object-contain drop-shadow-xl" src="{{ asset('assets/cdea1.png') }}" />
                    </div>
                </div>
            </div>
        </section>

        <!-- FEATURES SECTION -->
        <section id="features" class="relative isolate overflow-hidden px-5 pb-24 pt-16 sm:px-8 lg:min-h-[845px] lg:px-10 lg:pb-[114px] lg:pt-[88px] bg-amber-50/30">
            <img alt="" class="pointer-events-none absolute -right-[365px] top-[18px] -z-20 h-[760px] w-[650px] -scale-y-100 rotate-[-91deg] opacity-80" src="{{ asset('assets/6a3ac.svg') }}" />
            <img alt="" class="pointer-events-none absolute -bottom-[420px] -left-[320px] -z-20 h-[760px] w-[650px] -scale-y-100 rotate-[-91deg] opacity-80" src="{{ asset('assets/6a3ac.svg') }}" />

            <h2 class="text-center text-[48px] sm:text-[60px] lg:text-[75px] font-bold text-mealBrown">
                Our Features
            </h2>

            <div class="mx-auto mt-14 grid max-w-[1220px] gap-8 md:grid-cols-3 lg:mt-[72px] lg:gap-[66px]">
                <article class="group rounded-[10px] bg-mealBrown p-[25px] text-white shadow-lg transition duration-300 hover:-translate-y-3">
                    <div class="aspect-square overflow-hidden rounded-[10px] bg-white">
                        <img alt="Pantry" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" src="{{ asset('assets/2aef4.png') }}" />
                    </div>
                    <h3 class="mt-6 text-center text-[26px] lg:text-[32px] font-bold">Your Pantry</h3>
                    <p class="mt-5 text-[16px] lg:text-[20px] text-gray-200">Keep track of ingredients and stock</p>
                </article>

                <article class="group rounded-[10px] bg-mealBrown p-[25px] text-white shadow-lg transition duration-300 hover:-translate-y-3">
                    <div class="aspect-square overflow-hidden rounded-[10px] bg-white">
                        <img alt="Recipe Ideas" class="h-full w-full object-cover object-[center_46%] transition duration-500 group-hover:scale-105" src="{{ asset('assets/7311b.png') }}" />
                    </div>
                    <h3 class="mt-6 text-center text-[26px] lg:text-[32px] font-bold">Smart Recipe Ideas</h3>
                    <p class="mt-5 text-[16px] lg:text-[20px] text-gray-200">Find meals using ingredients you already have</p>
                </article>

                <article class="group rounded-[10px] bg-mealBrown p-[25px] text-white shadow-lg transition duration-300 hover:-translate-y-3">
                    <div class="aspect-square overflow-hidden rounded-[10px] bg-white">
                        <img alt="Expiry Reminder" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" src="{{ asset('assets/c6596.png') }}" />
                    </div>
                    <h3 class="mt-6 text-center text-[26px] lg:text-[32px] font-bold">Expiry Reminder</h3>
                    <p class="mt-5 text-[16px] lg:text-[20px] text-gray-200">Know what to use soon</p>
                </article>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <footer id="contact" class="relative z-10 bg-mealBrown px-5 py-10 text-white sm:px-8 lg:min-h-[308px] lg:px-10 lg:py-12">
        <div class="mx-auto max-w-[1350px]">
            <div class="grid items-center gap-9 md:grid-cols-[304px_1fr_1fr] md:gap-16">
                <img alt="Meal Up" class="h-auto w-[260px] lg:w-[304px]" src="{{ asset('assets/52a41.png') }}" />
                <div>
                    <h2 class="text-[20px] font-semibold lg:text-[23px]">Contact Us</h2>
                    <a href="mailto:mealup@gmail.com" class="mt-4 flex items-center gap-3 text-sm lg:text-[16px] hover:opacity-70 transition">
                        <img alt="Email" class="h-6 w-7 object-contain" src="{{ asset('assets/02259.png') }}" />
                        mealup@gmail.com
                    </a>
                </div>
                <div>
                    <h2 class="text-[20px] font-semibold lg:text-[23px]">Connect with Us</h2>
                    <div class="mt-4 w-[180px]">
                        <img alt="Social media" class="h-auto w-full" src="{{ asset('assets/c65f1.png') }}" />
                    </div>
                </div>
            </div>
            <div class="relative mt-8 pt-5 border-t border-white/25">
                <img alt="© 2024 Meal Up. All rights reserved." class="h-auto w-[190px]" src="{{ asset('assets/3217c.png') }}" />
            </div>
        </div>
    </footer>

    <!-- MODAL POPUP SIGN IN / SIGN UP -->
    <div id="authModal" class="fixed inset-0 z-50 hidden place-items-center bg-black/60 px-5">
        <div class="relative w-full max-w-md rounded-2xl bg-mealCream p-8 shadow-2xl">
            <button onclick="closeModal()" class="absolute right-5 top-4 text-3xl leading-none text-mealBrown hover:rotate-90 transition-transform cursor-pointer bg-transparent border-0">
                &times;
            </button>
            <img class="mb-6 h-auto w-36" src="{{ asset('assets/73d6a.png') }}" alt="Meal Up" />
            
            <div id="modalBody"></div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script>
        function scrollToFeatures() {
            document.getElementById('features').scrollIntoView({ behavior: 'smooth' });
        }

        function openModal(mode) {
            const modal = document.getElementById('authModal');
            const modalBody = document.getElementById('modalBody');
            const isSignup = mode === 'signup';

            modalBody.innerHTML = `
                <h2 class="text-3xl font-bold text-mealBrown">${isSignup ? 'Create an account' : 'Welcome back'}</h2>
                <p class="mt-2 text-sm text-[#6d554b]">${isSignup ? 'Start making the most of every ingredient.' : 'Sign in to continue planning your meals.'}</p>
                <form class="mt-7 space-y-4" onsubmit="handleFormSubmit(event, '${mode}')">
                    ${isSignup ? `
                        <label class="block text-sm font-semibold text-mealBrown">
                            Name
                            <input class="mt-1.5 w-full rounded-lg border border-mealBrown/30 bg-white p-3 text-mealBrown focus:outline-none focus:ring-2 focus:ring-mealAccent" placeholder="Your name" required type="text">
                        </label>
                    ` : ''}
                    <label class="block text-sm font-semibold text-mealBrown">
                        Email
                        <input class="mt-1.5 w-full rounded-lg border border-mealBrown/30 bg-white p-3 text-mealBrown focus:outline-none focus:ring-2 focus:ring-mealAccent" placeholder="you@example.com" required type="email">
                    </label>
                    <label class="block text-sm font-semibold text-mealBrown">
                        Password
                        <input class="mt-1.5 w-full rounded-lg border border-mealBrown/30 bg-white p-3 text-mealBrown focus:outline-none focus:ring-2 focus:ring-mealAccent" placeholder="At least 6 characters" required type="password" minlength="6">
                    </label>
                    <button type="submit" class="w-full rounded-lg bg-mealBrown py-3 text-white font-semibold hover:bg-mealAccent transition shadow-md cursor-pointer mt-2">
                        ${isSignup ? 'Sign up' : 'Sign in'}
                    </button>
                </form>
            `;
            modal.classList.remove('hidden');
            modal.classList.add('grid');
        }

        function closeModal() {
            const modal = document.getElementById('authModal');
            modal.classList.remove('grid');
            modal.classList.add('hidden');
        }

        function handleFormSubmit(e, mode) {
            e.preventDefault();
            alert(mode === 'signup' ? 'Akun berhasil dibuat! Mengalihkan ke beranda...' : 'Login berhasil! Mengalihkan ke beranda...');
            window.location.href = '/home'; // Nanti bisa disesuaikan route Laravel-nya
        }

        window.onclick = function(event) {
            const modal = document.getElementById('authModal');
            if (event.target === modal) {
                closeModal();
            }
        }
    </script>
</body>
</html>