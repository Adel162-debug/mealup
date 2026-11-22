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
    </style>
</head>

@stack('styles')

<body>
    <div class="mealup-layout">
        <aside class="mealup-sidebar">
            <img class="mealup-logo"
                 src="{{ asset('assets/73d6a.png') }}"
                 alt="MealUp">

            <nav class="mealup-nav" aria-label="Navigasi utama">
                <a class="mealup-nav-item" href="{{ url('/home') }}">Home</a>

                <a class="mealup-nav-item" href="{{ route('pantry.index') }}"
                   @if (request()->routeIs('pantry.index')) aria-current="page" @endif>
                    Pantry
                </a>

                <a class="mealup-nav-item" href="{{ route('recipes.index') }}"
                   @if (request()->routeIs('recipes.index')) aria-current="page" @endif>
                    Recipe
                </a>

                <span class="mealup-nav-item" aria-disabled="true">Saved</span>
            </nav>
        </aside>

        <main class="mealup-main">
            @yield('content')
        </main>
    </div>
</body>
</html>