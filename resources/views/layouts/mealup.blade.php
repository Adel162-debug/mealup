<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') · MealUp</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #fbf7ee;
            color: #3b2010;
            font-family: system-ui, sans-serif;
        }

        .mealup-layout {
            display: grid;
            grid-template-columns: 271px minmax(0, 1fr);
            min-height: 100vh;
        }

        .mealup-sidebar {
            position: sticky;
            top: 0;
            align-self: start;
            height: 100vh;
            overflow-y: auto;
            padding: 36px 20px;
            background: #fff;
            border-right: 1px solid #eee5d8;
        }

        .mealup-logo {
            display: block;
            width: 170px;
            max-width: 100%;
            height: auto;
            margin: 0 auto 36px;
        }

        .mealup-nav {
            display: grid;
            gap: 8px;
        }

        .mealup-nav-item {
            display: block;
            padding: 14px 16px;
            border-left: 5px solid transparent;
            border-radius: 14px;
            color: inherit;
            font-weight: 600;
            text-decoration: none;
        }

        .mealup-nav-item:hover[href] {
            background: #fbf7ee;
        }

        .mealup-nav-item[aria-current="page"],
        .mealup-nav-item[aria-current="page"]:hover {
            border-left-color: #b06800;
            background: #3b2010;
            color: #fff;
        }

        .mealup-nav-item[aria-disabled="true"] {
            color: #74685f;
        }

        .mealup-main {
            padding: 40px;
        }

        @media (max-width: 767px) {
            .mealup-layout {
                grid-template-columns: 1fr;
            }

            .mealup-sidebar {
                position: static;
                height: auto;
                padding: 16px;
                border-right: 0;
                border-bottom: 1px solid #eee5d8;
            }

            .mealup-logo {
                width: 130px;
                margin-bottom: 16px;
            }

            .mealup-nav {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .mealup-main {
                padding: 24px 16px;
            }
        }
        :root {
            --meal-cream: #f9f5ec;
            --meal-brown: #3b2010;
            --meal-gold: #a76a10;
            --meal-border: #eadcc9;
        }

        body { background: var(--meal-cream); }
        .mealup-layout { grid-template-columns: clamp(232px, 15.5vw, 294px) minmax(0, 1fr); }
        .mealup-sidebar { display: flex; flex-direction: column; padding: 42px 21px 26px; }
        .mealup-logo { margin-bottom: 48px; }
        .mealup-nav { gap: 10px; }
        .mealup-nav-item { display: flex; align-items: center; min-height: 54px; gap: 14px; font-size: 1.05rem; }
        .mealup-nav-icon { width: 22px; height: 22px; flex: none; }
        .mealup-nav-count { margin-inline-start: auto; min-width: 26px; padding: 3px 7px; border-radius: 999px; background: var(--meal-gold); color: #fff; text-align: center; font-size: .8rem; }
        #mealup-recipe-count { background: #d7f7e5; color: #185638; }
        .mealup-sidebar-footer { margin-top: auto; padding-top: 16px; border-top: 1px solid var(--meal-border); }
        .mealup-main { padding: clamp(25px, 3.2vw, 62px); min-width: 0; }
        .mealup-main h1 { margin: 0; font-size: clamp(2.2rem, 3vw, 3.2rem); line-height: 1.1; letter-spacing: -.045em; }
        :focus-visible { outline: 2px solid #a76a10; outline-offset: 3px; }

        @media (max-width: 767px) {
            .mealup-layout { grid-template-columns: minmax(0, 1fr); }
            .mealup-sidebar { padding: 16px; }
            .mealup-logo { margin-bottom: 16px; }
            .mealup-sidebar-footer { display: none; }
            .mealup-main { padding: 24px 16px; }
        }
        .mealup-demo-actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px 12px;
            margin-bottom: 16px;
        }

        .mealup-demo-reset {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 8px 14px;
            border: 1px solid var(--meal-border);
            border-radius: 999px;
            background: #fff;
            color: var(--meal-brown);
            font: inherit;
            font-size: .875rem;
            font-weight: 650;
            cursor: pointer;
        }

        .mealup-demo-reset:hover { border-color: var(--meal-gold); }
        .mealup-demo-reset span { color: var(--meal-gold); }

        .mealup-demo-error {
            margin: 0;
            color: #832f26;
            font-size: .875rem;
        }
    </style>
    @stack('styles')
</head>

<body>
    <div class="mealup-layout">
        <aside class="mealup-sidebar">
            <img class="mealup-logo"
                 src="{{ asset('assets/73d6a.png') }}"
                 alt="MealUp">

            <nav class="mealup-nav" aria-label="Navigasi utama">
                <a class="mealup-nav-item" href="{{ url('/home') }}"><svg class="mealup-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m3 10 9-7 9 7v9a1 1 0 0 1-1 1h-5v-6H9v6H4a1 1 0 0 1-1-1z"/></svg>Home</a>

                <a class="mealup-nav-item" href="{{ route('pantry.index') }}"
                   @if (request()->routeIs('pantry.index')) aria-current="page" @endif>
                    <svg class="mealup-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="4" rx="1"/><path d="M5 8v11h14V8M10 12h4"/></svg>
                    Pantry
                    <span id="mealup-pantry-count" class="mealup-nav-count" hidden></span>
                </a>

                <a class="mealup-nav-item" href="{{ route('recipes.index') }}"
                   @if (request()->routeIs('recipes.index')) aria-current="page" @endif>
                    <svg class="mealup-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 6c-3-2-6-2-9-1v14c3-1 6-1 9 1 3-2 6-2 9-1V5c-3-1-6-1-9 1zm0 0v14"/></svg>
                    Recipe
                    <span id="mealup-recipe-count" class="mealup-nav-count" hidden></span>
                </a>

                <span class="mealup-nav-item" role="link" aria-disabled="true"><svg class="mealup-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 4h12v16l-6-4-6 4z"/></svg>Saved</span>
            </nav>
            <div class="mealup-sidebar-footer">
                <span class="mealup-nav-item" role="link" aria-disabled="true"><svg class="mealup-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M10 4H4v16h6m-2-8h13m-4-4 4 4-4 4"/></svg>Logout</span>
            </div>
        </aside>

        <main class="mealup-main">
            @if (request()->routeIs('pantry.index', 'recipes.index'))
                <div class="mealup-demo-actions">
                    <p id="mealup-demo-error" class="mealup-demo-error" role="status" hidden></p>
                    <button type="button"
                            id="mealup-demo-reset"
                            class="mealup-demo-reset"
                            data-pantry-url="{{ route('pantry.index') }}"
                            data-on-pantry="{{ request()->routeIs('pantry.index') ? 'true' : 'false' }}">
                        <span aria-hidden="true">⟳</span> Reset Demo
                    </button>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
    <script>
        const resetDemoButton = document.querySelector('#mealup-demo-reset');

        resetDemoButton?.addEventListener('click', () => {
            const resetDemoError = document.querySelector('#mealup-demo-error');
            resetDemoError.hidden = true;

            const confirmed = window.confirm(
                'Kembalikan Pantry ke data contoh? Bahan tambahan, hasil edit, dan pilihan di tab ini akan dihapus.'
            );

            if (!confirmed) {
                return;
            }

            try {
                sessionStorage.removeItem('mealup.pantry.v1');
            } catch (error) {
                resetDemoError.textContent = 'Data demo tidak bisa direset di tab ini.';
                resetDemoError.hidden = false;
                return;
            }

            if (resetDemoButton.dataset.onPantry === 'true') {
                window.location.reload();
            } else {
                window.location.replace(resetDemoButton.dataset.pantryUrl);
            }
        });
    </script>
</body>
</html>