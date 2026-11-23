<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Meal Up — Cook Less, Waste Less</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        mealBrown: '#43271b',
                        mealDark: '#2f1910',
                        mealCream: '#fbf7ee',
                        mealAccent: '#b06800',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-mealCream text-mealBrown font-sans antialiased selection:bg-amber-200 overflow-x-hidden">

    <!-- TOP BAR (PUTIH) -->
    <header class="sticky top-0 z-40 border-b border-mealBrown/10 bg-white text-mealBrown shadow-sm">
        <div class="mx-auto flex h-16 max-w-7xl items-center justify-between px-3 sm:px-5 lg:px-6">
            <nav class="hidden items-center gap-6 text-sm font-semibold md:flex">
                <a href="#about" class="hover:text-mealAccent transition">About</a>
                <a href="#features" class="hover:text-mealAccent transition">Features</a>
                <a href="#faq" class="hover:text-mealAccent transition">FAQ</a>
            </nav>

            <a href="{{ url('/') }}" class="flex items-center shrink-0">
                <img src="{{ asset('assets/73d6a.png') }}" alt="Meal Up" class="h-9 w-auto object-contain" />
            </a>

            <div class="flex items-center gap-2.5 text-sm font-semibold">
                <a href="{{ url('/home') }}" class="rounded-lg border border-mealBrown/30 bg-white px-3.5 py-1.5 text-mealBrown hover:bg-mealCream transition">
                    Sign in
                </a>
                <a href="{{ url('/home') }}" class="rounded-lg bg-mealBrown px-3.5 py-1.5 text-white hover:bg-mealAccent transition">
                    Sign up
                </a>
            </div>
        </div>
    </header>

    <!-- 1. HERO SECTION -->
    <section id="about" class="relative overflow-hidden bg-mealBrown text-white">
        <img
            src="{{ asset('assets/ba623.png') }}"
            alt=""
            aria-hidden="true"
            class="pointer-events-none absolute inset-0 h-full w-full object-cover opacity-25"
        />
        <div class="relative z-10 mx-auto flex min-h-[420px] max-w-5xl flex-col items-center justify-center px-4 py-16 text-center">
            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-amber-300">
                Smart Kitchen &amp; Food Waste Prevention
            </p>
            <h1 class="mt-3 max-w-2xl text-3xl font-bold leading-tight sm:text-5xl">
                Smart Pantry &amp; Recipes, Delivered to Your Daily Routine
            </h1>
            <p class="mt-4 max-w-xl text-sm text-amber-100/90 sm:text-base">
                Track ingredients before they expire and discover recipes you can cook right now with what you already have.
            </p>
            <div class="mt-7 flex flex-wrap items-center justify-center gap-3">
                <a href="{{ url('/home') }}" class="rounded-lg bg-mealAccent px-6 py-2.5 text-sm font-semibold text-white shadow-lg hover:bg-amber-600 transition">
                    Get Started
                </a>
                <a href="#features" class="rounded-lg border border-white/50 bg-white/10 px-6 py-2.5 text-sm font-semibold text-white hover:bg-white/20 transition">
                    Explore Features
                </a>
            </div>
        </div>
    </section>

   <!-- 2. MINI STEP STRIP (3 LANGKAH SINGKAT) -->
    <section class="border-b border-mealBrown/10 bg-white py-8">
        <div class="mx-auto grid max-w-6xl grid-cols-1 gap-4 px-4 sm:px-6 md:grid-cols-3">
            <div class="flex items-start gap-3.5 rounded-xl border border-mealBrown/10 bg-mealCream/60 p-4">
                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-mealBrown text-xs font-extrabold text-amber-300">
                    01
                </span>
                <div>
                    <h2 class="text-sm font-extrabold text-mealBrown">Log Your Pantry</h2>
                    <p class="mt-1 text-xs leading-relaxed text-gray-600">
                        Add ingredients you have at home and keep track of their freshness.
                    </p>
                </div>
            </div>

            <div class="flex items-start gap-3.5 rounded-xl border border-mealBrown/10 bg-mealCream/60 p-4">
                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-mealBrown text-xs font-extrabold text-amber-300">
                    02
                </span>
                <div>
                    <h2 class="text-sm font-extrabold text-mealBrown">Spot Use Soon</h2>
                    <p class="mt-1 text-xs leading-relaxed text-gray-600">
                        Prioritize items nearing expiry so nothing goes to waste.
                    </p>
                </div>
            </div>

            <div class="flex items-start gap-3.5 rounded-xl border border-mealBrown/10 bg-mealCream/60 p-4">
                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-mealBrown text-xs font-extrabold text-amber-300">
                    03
                </span>
                <div>
                    <h2 class="text-sm font-extrabold text-mealBrown">Cook What Matches</h2>
                    <p class="mt-1 text-xs leading-relaxed text-gray-600">
                        Pick recipes that fit ingredients already sitting in your kitchen.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 2B. SHOWCASE EVENT: BIFEST -->
    <section class="mx-auto max-w-6xl px-4 pt-10 pb-2 sm:px-6">
        <div class="rounded-2xl border border-mealBrown/15 bg-white p-6 shadow-sm sm:p-8">
            <div class="flex flex-col justify-between gap-6 lg:flex-row lg:items-center">
                <div class="max-w-2xl">
                    <span class="inline-block rounded-full bg-amber-100 px-3 py-1 text-xs font-extrabold uppercase tracking-wider text-mealAccent">
                        Live Web Showcase
                    </span>
                    <h2 class="mt-2.5 text-2xl font-bold text-mealBrown sm:text-3xl">
                        See you soon at BIFEST!
                    </h2>
                    <p class="mt-2 text-sm leading-relaxed text-gray-600">
                        Come visit our booth to try Meal Up directly, see how smart pantry tracking works, and discover recipes from everyday ingredients.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-3 sm:grid-cols-3 lg:shrink-0">
                    <div class="rounded-xl border border-mealBrown/10 bg-mealCream px-4 py-3">
                        <p class="text-[11px] font-bold uppercase tracking-wider text-gray-500">Date</p>
                        <p class="mt-0.5 text-sm font-extrabold text-mealBrown">24 November</p>
                    </div>
                    <div class="rounded-xl border border-mealBrown/10 bg-mealCream px-4 py-3">
                        <p class="text-[11px] font-bold uppercase tracking-wider text-gray-500">Location</p>
                        <p class="mt-0.5 text-sm font-extrabold text-mealBrown">Gerai Binusian</p>
                    </div>
                    <div class="rounded-xl border border-mealBrown/10 bg-mealCream px-4 py-3">
                        <p class="text-[11px] font-bold uppercase tracking-wider text-gray-500">Time</p>
                        <p class="mt-0.5 text-sm font-extrabold text-mealBrown">1 PM - 4 PM</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. 4-CARD FEATURE / CATEGORY GRID -->
    <section id="features" class="mx-auto max-w-6xl px-4 py-14 sm:px-6">
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
            <a href="{{ url('/pantry') }}" class="group relative h-64 overflow-hidden rounded-xl bg-mealBrown shadow-md">
                <img src="{{ asset('assets/2aef4.png') }}" alt="Pantry Stock" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent p-4 text-white">
                    <span class="text-sm font-bold">Pantry Stock</span>
                </div>
            </a>

            <a href="{{ url('/recipes') }}" class="group relative h-64 overflow-hidden rounded-xl bg-mealBrown shadow-md">
                <img src="{{ asset('assets/7311b.png') }}" alt="Smart Recipes" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent p-4 text-white">
                    <span class="text-sm font-bold">Smart Recipes</span>
                </div>
            </a>

            <a href="{{ url('/pantry') }}" class="group relative h-64 overflow-hidden rounded-xl bg-mealBrown shadow-md">
                <img src="{{ asset('assets/c6596.png') }}" alt="Expiry Alerts" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent p-4 text-white">
                    <span class="text-sm font-bold">Expiry Alerts</span>
                </div>
            </a>

            <a href="{{ url('/home') }}" class="group relative h-64 overflow-hidden rounded-xl bg-mealBrown shadow-md">
                <img src="{{ asset('assets/cdea1.png') }}" alt="Daily Meal Plan" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent p-4 text-white">
                    <span class="text-sm font-bold">Daily Meal Plan</span>
                </div>
            </a>
        </div>
    </section>

    <!-- 4. STORY SPLIT + THUMBNAIL STRIP -->
    <section class="mx-auto max-w-6xl px-4 pb-14 sm:px-6">
        <div class="grid items-center gap-10 lg:grid-cols-12">
            <div class="lg:col-span-6">
                <h2 class="text-3xl font-bold leading-tight text-mealBrown sm:text-4xl">
                    Meal Up &amp; the kitchen
                </h2>
                <p class="mt-5 max-w-lg text-base leading-relaxed text-gray-700 sm:text-lg">
                    Every ingredient in your fridge has a story and a shelf life. Meal Up helps you organize what you bought, spot items to use soon, and cook practical meals without unnecessary grocery trips.
                </p>
                <a href="{{ url('/home') }}" class="mt-7 inline-block rounded-xl border-2 border-mealBrown px-6 py-3 text-sm font-bold uppercase tracking-wider text-mealBrown hover:bg-mealBrown hover:text-white transition">
                    Open Dashboard
                </a>
            </div>

            <div class="flex justify-center lg:col-span-6 lg:justify-end">
                <div class="w-full max-w-md overflow-hidden rounded-2xl border border-mealBrown/10 bg-white shadow-md">
                    <img
                        src="{{ asset('assets/kitchen-prep.jpeg') }}"
                        alt="Preparing fresh ingredients in the kitchen"
                        class="h-64 w-full object-cover sm:h-72"
                    />
                </div>
            </div>
        </div>

        <!-- Barisan Foto Bulat (BG Putih, 10 Item Penuh 1 Baris, Tidak Terpotong) -->
        <div class="mt-12 grid grid-cols-5 items-center justify-items-center gap-3 sm:grid-cols-10 sm:gap-2.5">
            @foreach ([
                ['file' => '59b25.png', 'alt' => 'Spinach'],
                ['file' => '9e8de.png', 'alt' => 'Tomat'],
                ['file' => '13049.png', 'alt' => 'Chicken'],
                ['file' => 'blueberry.png', 'alt' => 'Blueberry'],
                ['file' => 'pepper.png', 'alt' => 'Black Pepper'],
                ['file' => 'avocado.png', 'alt' => 'Avocado'],
                ['file' => 'onion.png', 'alt' => 'Red Onion'],
                ['file' => 'coffee.png', 'alt' => 'Coffee Beans'],
                ['file' => 'leek.png', 'alt' => 'Leek'],
                ['file' => 'date.png', 'alt' => 'Date'],
            ] as $thumb)
                <div class="flex h-16 w-16 items-center justify-center overflow-hidden rounded-full border border-mealBrown/15 bg-white p-1.5 shadow-sm transition hover:scale-105 sm:h-20 sm:w-20">
                    <img
                        src="{{ asset('assets/' . $thumb['file']) }}"
                        alt="{{ $thumb['alt'] }}"
                        class="h-full w-full object-contain"
                    />
                </div>
            @endforeach
        </div>
    </section>

    <!-- 5. FEATURED SHOWCASE BANNER (ACCENT BLOCK) -->
    <section class="bg-mealBrown py-14 text-white">
        <div class="mx-auto grid max-w-6xl items-center gap-8 px-4 sm:px-6 lg:grid-cols-12">
            <div class="lg:col-span-4">
                <p class="text-xs uppercase tracking-widest text-amber-300">Ready to Cook</p>
                <h2 class="mt-1 text-3xl font-bold">Our Recipes</h2>
                <p class="mt-2 text-sm text-amber-100/80">
                    Match your checked pantry ingredients with everyday recipes.
                </p>
                <a href="{{ url('/recipes') }}" class="mt-5 inline-flex h-10 w-10 items-center justify-center rounded-full bg-mealAccent text-lg font-bold text-white hover:bg-amber-600 transition" aria-label="Lihat semua resep">
                    &rarr;
                </a>
            </div>

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-3 lg:col-span-8">
                <div class="overflow-hidden rounded-xl bg-white text-mealBrown shadow-md">
                    <img src="{{ asset('assets/9c08e.png') }}" alt="Soto Ayam Banjar" class="h-36 w-full object-cover" />
                    <div class="p-4">
                        <div class="flex items-center justify-between gap-2">
                            <h3 class="text-sm font-bold">Soto Ayam Banjar</h3>
                            <span class="text-xs font-bold text-mealAccent">15m</span>
                        </div>
                        <p class="mt-1 text-xs text-gray-600">Warm aromatic soup with pantry staples.</p>
                    </div>
                </div>

                <div class="overflow-hidden rounded-xl bg-white text-mealBrown shadow-md">
                    <img src="{{ asset('assets/67fe4.png') }}" alt="Ayam Serundeng" class="h-36 w-full object-cover" />
                    <div class="p-4">
                        <div class="flex items-center justify-between gap-2">
                            <h3 class="text-sm font-bold">Ayam Serundeng</h3>
                            <span class="text-xs font-bold text-mealAccent">25m</span>
                        </div>
                        <p class="mt-1 text-xs text-gray-600">Savory spiced chicken made easy.</p>
                    </div>
                </div>

                <div class="overflow-hidden rounded-xl bg-white text-mealBrown shadow-md">
                    <img src="{{ asset('assets/cdea1.png') }}" alt="Nasi Goreng Spesial" class="h-36 w-full object-cover" />
                    <div class="p-4">
                        <div class="flex items-center justify-between gap-2">
                            <h3 class="text-sm font-bold">Nasi Goreng Spesial</h3>
                            <span class="text-xs font-bold text-mealAccent">10m</span>
                        </div>
                        <p class="mt-1 text-xs text-gray-600">Quick leftover rice &amp; egg skillet.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. HOW IT'S MADE / WORKFLOW -->
    <section class="mx-auto max-w-5xl px-4 py-14 sm:px-6">
        <div class="grid items-center gap-6 text-center md:grid-cols-[120px_1fr_120px]">
            <div class="mx-auto flex items-center justify-center">
                <img
                    src="{{ asset('assets/326a9.png') }}"
                    alt=""
                    aria-hidden="true"
                    class="h-28 w-28 object-contain mix-blend-multiply opacity-90 sm:h-32 sm:w-32"
                />
            </div>

            <div>
                <h2 class="text-2xl font-bold text-mealBrown sm:text-3xl">How It Works</h2>
                <h3 class="mt-1 text-lg font-semibold text-mealAccent">The Meal Up Way</h3>
                <p class="mx-auto mt-3 max-w-xl text-sm leading-relaxed text-gray-700">
                    Log your groceries in seconds, get reminded before ingredients go bad, and pick recipes that fit what is already on your shelf. Less waste, simpler cooking, and more savings every week.
                </p>
            </div>

            <div class="mx-auto flex items-center justify-center">
                <img
                    src="{{ asset('assets/59b25.png') }}"
                    alt=""
                    aria-hidden="true"
                    class="h-28 w-28 object-contain mix-blend-multiply opacity-90 sm:h-32 sm:w-32"
                />
            </div>
        </div>
    </section>

    <!-- 7. TESTIMONIALS ("WHAT PEOPLE ARE SAYING") -->
    <section class="border-t border-mealBrown/10 bg-white py-14">
        <div class="mx-auto max-w-5xl px-4 text-center sm:px-6">
            <h2 class="text-2xl font-bold text-mealBrown sm:text-3xl">What people are saying</h2>
            <p class="mt-1 text-xs font-semibold text-mealAccent">★ ★ ★ ★ ★</p>

            <div class="mt-8 grid grid-cols-1 gap-5 md:grid-cols-3">
                <div class="rounded-xl border border-mealBrown/10 bg-mealCream p-5 text-left shadow-sm">
                    <p class="text-xs leading-relaxed text-gray-700">
                        “I used to forget veggies in the back of the fridge. Checking Meal Up before shopping saves me so much money.”
                    </p>
                    <p class="mt-4 text-xs font-bold text-mealBrown">Nadia Pratama</p>
                </div>

                <div class="rounded-xl border border-mealBrown/10 bg-mealCream p-5 text-left shadow-sm">
                    <p class="text-xs leading-relaxed text-gray-700">
                        “Super handy for anak kos! I just check what I have and immediately see what I can cook tonight.”
                    </p>
                    <p class="mt-4 text-xs font-bold text-mealBrown">Raka Wijaya</p>
                </div>

                <div class="rounded-xl border border-mealBrown/10 bg-mealCream p-5 text-left shadow-sm">
                    <p class="text-xs leading-relaxed text-gray-700">
                        “Clean interface, quick expiry reminders, and recipes that don't require buying ten extra ingredients.”
                    </p>
                    <p class="mt-4 text-xs font-bold text-mealBrown">Salsa Putri</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 8. FAQs -->
    <section id="faq" class="mx-auto max-w-4xl px-4 py-14 sm:px-6">
        <h2 class="text-center text-2xl font-bold text-mealBrown sm:text-3xl">FAQs</h2>
        <p class="mx-auto mt-2 max-w-lg text-center text-xs text-gray-600">
            Common questions about managing ingredients, expiry dates, and recipe matching on Meal Up.
        </p>

        <div class="mt-8 divide-y divide-mealBrown/15 rounded-2xl border border-mealBrown/15 bg-white px-6">
            <details class="group py-4">
                <summary class="flex cursor-pointer list-none items-center justify-between text-sm font-semibold text-mealBrown">
                    <span>How does Meal Up match recipes with my pantry?</span>
                    <span class="ml-4 text-lg font-bold text-mealAccent transition-transform group-open:rotate-45">+</span>
                </summary>
                <p class="mt-2 text-xs leading-relaxed text-gray-600">
                    Select the ingredients you have in your Pantry and Meal Up highlights recipes that match your available items.
                </p>
            </details>

            <details class="group py-4">
                <summary class="flex cursor-pointer list-none items-center justify-between text-sm font-semibold text-mealBrown">
                    <span>Can I add or edit ingredients anytime?</span>
                    <span class="ml-4 text-lg font-bold text-mealAccent transition-transform group-open:rotate-45">+</span>
                </summary>
                <p class="mt-2 text-xs leading-relaxed text-gray-600">
                    Yes, you can add new ingredients, update quantities, or adjust expiry dates directly from the Pantry page.
                </p>
            </details>

            <details class="group py-4">
                <summary class="flex cursor-pointer list-none items-center justify-between text-sm font-semibold text-mealBrown">
                    <span>How do expiry markers help prevent food waste?</span>
                    <span class="ml-4 text-lg font-bold text-mealAccent transition-transform group-open:rotate-45">+</span>
                </summary>
                <p class="mt-2 text-xs leading-relaxed text-gray-600">
                    Items nearing their expiry date are marked so you can prioritize cooking them first.
                </p>
            </details>

            <details class="group py-4">
                <summary class="flex cursor-pointer list-none items-center justify-between text-sm font-semibold text-mealBrown">
                    <span>Do I need an account to explore the app?</span>
                    <span class="ml-4 text-lg font-bold text-mealAccent transition-transform group-open:rotate-45">+</span>
                </summary>
                <p class="mt-2 text-xs leading-relaxed text-gray-600">
                    You can head straight to the home dashboard to explore your pantry and recipes.
                </p>
            </details>
        </div>
    </section>

   <!-- 9. FOOTER (SAMA DENGAN HOME) -->
    <footer id="contact" class="bg-mealDark py-12 text-white">
        <div class="mx-auto grid max-w-6xl grid-cols-2 gap-8 px-4 text-xs sm:px-6 md:grid-cols-5">
            <div class="col-span-2 md:col-span-1">
                <img src="{{ asset('assets/52a41.png') }}" alt="Meal Up" class="h-auto w-36" />
                <p class="mt-3 text-amber-100/70">Cook less, waste less with smart ingredient tracking.</p>
            </div>

            <div>
                <h3 class="font-bold uppercase tracking-wider text-amber-300">About</h3>
                <ul class="mt-3 space-y-2 text-amber-100/80">
                    <li><a href="#about" class="hover:text-white">Our Mission</a></li>
                    <li><a href="#features" class="hover:text-white">Features</a></li>
                    <li><a href="#faq" class="hover:text-white">FAQs</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-bold uppercase tracking-wider text-amber-300">Pages</h3>
                <ul class="mt-3 space-y-2 text-amber-100/80">
                    <li><a href="{{ url('/home') }}" class="hover:text-white">Home</a></li>
                    <li><a href="{{ url('/pantry') }}" class="hover:text-white">Pantry</a></li>
                    <li><a href="{{ url('/recipes') }}" class="hover:text-white">Recipes</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-bold uppercase tracking-wider text-amber-300">Account</h3>
                <ul class="mt-3 space-y-2 text-amber-100/80">
                    <li><a href="{{ url('/home') }}" class="hover:text-white">Sign in</a></li>
                    <li><a href="{{ url('/home') }}" class="hover:text-white">Sign up</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-bold uppercase tracking-wider text-amber-300">Contact</h3>
                <ul class="mt-3 space-y-2 text-amber-100/80">
                    <li><a href="mailto:mealup@gmail.com" class="hover:text-white">mealup@gmail.com</a></li>
                </ul>
                <img src="{{ asset('assets/c65f1.png') }}" alt="Social media" class="mt-3 h-auto w-28" />
            </div>
        </div>

        <div class="mx-auto mt-10 flex max-w-6xl flex-col items-center justify-between gap-4 border-t border-white/10 px-4 pt-6 text-xs text-amber-100/60 sm:flex-row sm:px-6">
            <img src="{{ asset('assets/3217c.png') }}" alt="© Meal Up" class="h-auto w-36 opacity-80" />
            <span>© {{ date('Y') }} Meal Up. All rights reserved.</span>
        </div>
    </footer>

</body>
</html>