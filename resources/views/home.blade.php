<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Up - Home Dashboard</title>
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
    <style>
        body {
            background: #fbf7ee;
            color: #43271b;
            font-family: 'Poppins', sans-serif;
        }
        .app-shell {
            min-height: 100vh;
            overflow-x: hidden;
            display: flex;
        }
        .sidebar {
            position: fixed;
            z-index: 30;
            inset: 0 auto 0 0;
            display: flex;
            flex-direction: column;
            width: 271px;
            padding: 24px 20px;
            overflow-y: auto;
            background: #fff;
            border-right: 1px solid #eee5d8;
        }

        .meal-sidebar-brand {
            display: flex;
            justify-content: center;
            margin: 10px 0 36px;
        }

        .meal-sidebar-brand img {
            display: block;
            width: 170px;
            height: auto;
        }

        .meal-sidebar-menu {
            display: grid;
            gap: 8px;
        }

        .meal-sidebar-item {
            display: flex;
            align-items: center;
            gap: 14px;
            width: 100%;
            min-height: 52px;
            padding: 10px 16px;
            border: 0;
            border-left: 5px solid transparent;
            border-radius: 14px;
            background: transparent;
            color: #3b2010;
            font-weight: 600;
            text-align: left;
            text-decoration: none;
        }

        .meal-sidebar-icon {
            display: inline-grid;
            width: 24px;
            place-items: center;
            font-size: 22px;
            line-height: 1;
        }

        .meal-sidebar-item:hover:not(:disabled) {
            background: #fbf7ee;
        }

        .meal-sidebar-item[aria-current="page"],
        .meal-sidebar-item[aria-current="page"]:hover {
            border-left-color: #b06800;
            background: #3b2010;
            color: #fff;
        }

        .meal-sidebar-item:focus-visible {
            outline: 2px solid #b06800;
            outline-offset: 2px;
        }

        .meal-sidebar-item:disabled {
            opacity: 0.55;
            cursor: default;
        }

        .meal-sidebar-footer {
            margin-top: auto;
            padding-top: 16px;
            border-top: 1px solid #eee5d8;
        }
        .main-content {
            position: relative;
            min-height: 100vh;
            margin-left: 271px;
            flex: 1;
        }
        /* Gelombang be5a8.svg khusus Laravel Blade */
        .hero-header {
            background-image: url("{{ asset('assets/be5a8.svg') }}");
            background-repeat: no-repeat;
            background-position: right -40px center;
            background-size: 65% auto;
        }
    </style>
</head>
<body class="bg-mealCream text-mealBrown font-sans antialiased selection:bg-amber-200">

    <div class="app-shell">
<!-- SIDEBAR -->
<aside id="sidebar" class="sidebar">
    <a href="{{ url('/home') }}" class="meal-sidebar-brand">
        <img src="{{ asset('assets/73d6a.png') }}" alt="Meal Up">
    </a>

    <nav class="meal-sidebar-menu" aria-label="Navigasi utama">
        <a href="{{ url('/home') }}" class="meal-sidebar-item" aria-current="page">
            <span class="meal-sidebar-icon" aria-hidden="true">⌂</span>
            <span>Home</span>
        </a>

        <button type="button" class="meal-sidebar-item" onclick="openDialog('pantry')">
            <span class="meal-sidebar-icon" aria-hidden="true">▣</span>
            <span>Pantry</span>
        </button>

        <button type="button" class="meal-sidebar-item" onclick="openDialog('recipes')">
            <span class="meal-sidebar-icon" aria-hidden="true">▤</span>
            <span>Recipe</span>
        </button>

        <button type="button" class="meal-sidebar-item" disabled>
            <span class="meal-sidebar-icon" aria-hidden="true">★</span>
            <span>Saved</span>
        </button>
    </nav>

    <div class="meal-sidebar-footer">
        <button type="button" class="meal-sidebar-item" disabled>
            <span class="meal-sidebar-icon" aria-hidden="true">↪</span>
            <span>Logout</span>
        </button>
    </div>
</aside>
        </aside>

        <!-- MAIN CONTENT AREA -->
        <main class="main-content">
            <!-- HERO SECTION -->
            <header class="relative min-h-[540px] overflow-hidden bg-mealCream hero-header flex items-center px-8 lg:px-12 py-16">
                <div class="grid grid-cols-1 lg:grid-cols-[45%_55%] items-center w-full max-w-[1300px] z-10 mx-auto">
                    <div class="py-6 z-20">
                        <h1 class="text-[42px] lg:text-[58px] font-bold font-serif leading-tight">
                            Welcome back, <span class="text-mealAccent">Chef!</span>
                        </h1>
                        <p class="mt-4 text-[18px] lg:text-[20px] font-medium text-gray-700 max-w-lg">
                            Let's check what ingredients you have in your pantry and whip up something delicious today.
                        </p>
                        <button onclick="openDialog('recipes')" class="mt-6 inline-flex items-center justify-center px-6 py-3 rounded-xl bg-mealAccent text-white font-semibold text-lg shadow-lg hover:bg-amber-700 transition cursor-pointer">
                            Find Recipes Now 🍳
                        </button>
                    </div>

                    <!-- AREA GAMBAR UTAMA UKURAN 640px x 660px + HIASAN SVG -->
                    <div class="relative w-[640px] h-[660px] flex items-center justify-center mx-auto lg:mx-0 z-10 pointer-events-none">
                        
                        <img src="{{ asset('assets/cdea1.png') }}" alt="Delicious Dish" class="w-[640px] h-[660px] object-contain drop-shadow-2xl rotate-[5deg] z-10" />

                        <!-- Hiasan SVG Doodle -->
                        <img src="{{ asset('assets/375a6.svg') }}" alt="" class="absolute top-[80px] left-[40px] w-12 h-12 rotate-[-15deg] z-20 opacity-90" />
                        <img src="{{ asset('assets/84885.svg') }}" alt="" class="absolute top-[120px] right-[60px] w-14 h-14 rotate-[25deg] z-20 opacity-90" />
                        <img src="{{ asset('assets/b9d49.svg') }}" alt="" class="absolute bottom-[100px] left-[80px] w-16 h-16 rotate-[10deg] z-20 opacity-90" />
                        <img src="{{ asset('assets/d1ff1.svg') }}" alt="" class="absolute bottom-[80px] right-[90px] w-14 h-14 rotate-[-20deg] z-20 opacity-90" />
                        <img src="{{ asset('assets/ef6de.svg') }}" alt="" class="absolute top-[280px] left-[10px] w-12 h-12 rotate-[45deg] z-20 opacity-90" />
                        <img src="{{ asset('assets/164fe.svg') }}" alt="" class="absolute top-[240px] right-[20px] w-12 h-12 rotate-[-30deg] z-20 opacity-90" />

                    </div>
                </div>
            </header>

            <!-- DASHBOARD CONTENT -->
            <div class="relative z-20 w-full max-w-[1150px] mx-auto px-6 pb-20 mt-4">
                <!-- USE SOON SECTION -->
                <section class="rounded-2xl p-8 lg:p-10 bg-mealBrown text-white shadow-2xl">
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 border-b border-white/10 pb-6">
                        <h2 class="text-[32px] lg:text-[38px] font-bold tracking-tight">Use Soon</h2>
                        <button onclick="openDialog('pantry')" class="px-5 py-2.5 rounded-lg bg-mealAccent text-white font-semibold hover:bg-amber-700 transition cursor-pointer shadow-md">
                            Manage Pantry
                        </button>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                        <!-- Card 1: Spinach -->
                        <div class="overflow-hidden rounded-xl bg-[#371f16] text-white shadow-lg hover:-translate-y-1.5 transition border border-white/10">
                            <div class="h-[180px] overflow-hidden bg-white flex items-center justify-center p-2">
                                <img src="{{ asset('assets/59b25.png') }}" alt="Spinach" class="w-full h-full object-contain" />
                            </div>
                            <div class="p-4">
                                <strong class="block text-[20px] font-bold">Spinach</strong>
                                <span class="inline-block mt-3 px-3 py-1 bg-mealAccent text-white text-xs rounded-full font-semibold">Expires tomorrow</span>
                            </div>
                        </div>
                        <!-- Card 2: Tomat -->
                        <div class="overflow-hidden rounded-xl bg-[#371f16] text-white shadow-lg hover:-translate-y-1.5 transition border border-white/10">
                            <div class="h-[180px] overflow-hidden bg-white flex items-center justify-center p-2">
                                <img src="{{ asset('assets/9e8de.png') }}" alt="Tomat" class="w-full h-full object-contain" />
                            </div>
                            <div class="p-4">
                                <strong class="block text-[20px] font-bold">Tomat</strong>
                                <span class="inline-block mt-3 px-3 py-1 bg-rose-700 text-white text-xs rounded-full font-semibold">Expires in 2 days</span>
                            </div>
                        </div>
                        <!-- Card 3: Chicken -->
                        <div class="overflow-hidden rounded-xl bg-[#371f16] text-white shadow-lg hover:-translate-y-1.5 transition border border-white/10">
                            <div class="h-[180px] overflow-hidden bg-white flex items-center justify-center p-2">
                                <img src="{{ asset('assets/13049.png') }}" alt="Chicken" class="w-full h-full object-contain" />
                            </div>
                            <div class="p-4">
                                <strong class="block text-[20px] font-bold">Chicken</strong>
                                <span class="inline-block mt-3 px-3 py-1 bg-red-800 text-white text-xs rounded-full font-semibold">Expires today</span>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- RECENT RECIPES SECTION -->
                <section class="pt-16 pb-10">
                    <div class="flex items-center justify-between gap-6">
                        <h2 class="text-[32px] lg:text-[38px] font-bold text-mealBrown">Recent Recipes</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                        <!-- Meal Card 1: Soto Ayam Banjar -->
                        <div class="grid grid-cols-[40%_60%] items-center overflow-hidden rounded-2xl bg-white text-mealBrown shadow-md border border-mealBrown/10 hover:shadow-xl transition">
                            <img src="{{ asset('assets/9c08e.png') }}" alt="Soto Ayam Banjar" class="w-full h-full min-h-[140px] object-cover" />
                            <div class="p-5 flex flex-col justify-center">
                                <h3 class="font-bold text-[20px]">Soto Ayam Banjar</h3>
                                <p class="mt-1 text-xs text-gray-600">Traditional warm aromatic soup</p>
                            </div>
                        </div>
                        <!-- Meal Card 2: Ayam Serundeng -->
                        <div class="grid grid-cols-[40%_60%] items-center overflow-hidden rounded-2xl bg-white text-mealBrown shadow-md border border-mealBrown/10 hover:shadow-xl transition">
                            <img src="{{ asset('assets/67fe4.png') }}" alt="Ayam Serundeng" class="w-full h-full min-h-[140px] object-cover" />
                            <div class="p-5 flex flex-col justify-center">
                                <h3 class="font-bold text-[20px]">Ayam Serundeng</h3>
                                <p class="mt-1 text-xs text-gray-600">Crispy spiced fried chicken</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>

    <!-- MODAL / DIALOG POPUP -->
    <div id="appModal" class="fixed inset-0 z-50 hidden place-items-center bg-black/60 px-5 backdrop-blur-sm">
        <div class="relative w-full max-w-[620px] max-h-[calc(100vh-48px)] overflow-y-auto rounded-[18px] bg-mealCream p-[42px] shadow-2xl">
            <button onclick="closeDialog()" class="absolute right-5 top-4 w-9 h-9 rounded-full bg-gray-200 text-mealBrown font-bold text-xl flex items-center justify-center hover:bg-gray-300 transition cursor-pointer border-0">
                &times;
            </button>
            <div id="modalContent"></div>
        </div>
    </div>

    <!-- SCRIPT INTERAKTIF -->
    <script>
        function openDialog(type) {
            const modal = document.getElementById('appModal');
            const content = document.getElementById('modalContent');

            if (type === 'pantry') {
                content.innerHTML = `
                    <span class="text-mealAccent font-semibold text-sm tracking-widest uppercase">Inventory</span>
                    <h2 class="mt-1 mb-6 text-[32px] font-bold text-mealBrown">Your Pantry Stock</h2>
                    <div class="grid gap-3">
                        <div class="grid grid-cols-[64px_1fr_auto] items-center gap-3.5 bg-white p-2.5 rounded-xl shadow-sm">
                            <img src="{{ asset('assets/59b25.png') }}" alt="" class="w-16 h-16 rounded-lg object-contain bg-gray-50 p-1">
                            <div>
                                <strong class="font-bold">Spinach</strong>
                                <small class="text-xs text-gray-500 block">Qty: 2 bunches • Expires tomorrow</small>
                            </div>
                            <span class="px-3 py-1 bg-rose-100 text-rose-800 text-xs rounded-full font-semibold">Use Soon</span>
                        </div>
                        <div class="grid grid-cols-[64px_1fr_auto] items-center gap-3.5 bg-white p-2.5 rounded-xl shadow-sm">
                            <img src="{{ asset('assets/9e8de.png') }}" alt="" class="w-16 h-16 rounded-lg object-contain bg-gray-50 p-1">
                            <div>
                                <strong class="font-bold">Tomat</strong>
                                <small class="text-xs text-gray-500 block">Qty: 5 pcs • Expires in 2 days</small>
                            </div>
                            <span class="px-3 py-1 bg-amber-100 text-amber-800 text-xs rounded-full font-semibold">Active</span>
                        </div>
                    </div>
                    <button onclick="alert('Fitur tambah bahan aktif!')" class="mt-6 w-full py-3 rounded-lg bg-mealBrown text-white font-semibold hover:bg-mealAccent transition cursor-pointer">
                        + Add New Ingredient
                    </button>
                `;
            } else if (type === 'recipes') {
                content.innerHTML = `
                    <span class="text-mealAccent font-semibold text-sm tracking-widest uppercase">AI Assistant</span>
                    <h2 class="mt-1 mb-6 text-[32px] font-bold text-mealBrown">Smart Recipe Generator</h2>
                    <div class="flex gap-2">
                        <input type="text" placeholder="Masukkan bahan yang ingin dimasak..." class="flex-1 border-2 border-amber-200 rounded-lg p-3 bg-white focus:outline-none focus:border-mealAccent">
                        <button onclick="alert('Mencari resep terbaik...')" class="px-5 py-3 rounded-lg bg-mealBrown text-white font-semibold hover:bg-mealAccent transition cursor-pointer">Cari</button>
                    </div>
                    <div class="mt-6 p-4 bg-white rounded-xl shadow-sm">
                        <h4 class="font-bold text-lg text-mealBrown">Rekomendasi Hari Ini:</h4>
                        <p class="text-sm text-gray-600 mt-1">Soto Ayam Banjar & Ayam Serundeng - Menu istimewa menggunakan bahan stok dapur Anda.</p>
                    </div>
                `;
            }

            modal.classList.remove('hidden');
            modal.classList.add('grid');
        }

        function closeDialog() {
            const modal = document.getElementById('appModal');
            modal.classList.remove('grid');
            modal.classList.add('hidden');
        }

        window.onclick = function(event) {
            const modal = document.getElementById('appModal');
            if (event.target === modal) {
                closeDialog();
            }
        }
    </script>
</body>
</html>