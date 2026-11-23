@extends('layouts.mealup')

@section('title', 'Recipe')

@push('styles')
    <style>
        .recipe-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(min(100%, 240px), 1fr));
            gap: 16px;
            max-width: 1100px;
        }

        .recipe-card {
            padding: 20px;
            border: 1px solid #eadcc9;
            border-radius: 18px;
            background: #fff;
        }

        .recipe-card h3 {
            margin: 0 0 16px;
            font-size: 1.25rem;
        }

        .recipe-card-label {
            margin: 0 0 8px;
            color: #6e6056;
            font-size: 0.875rem;
            font-weight: 600;
        }

        .recipe-card-ingredients {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .recipe-card-ingredients li {
            padding: 4px 10px;
            border-radius: 999px;
            background: #e6f5eb;
            color: #185638;
            font-size: 0.875rem;
        }
        .recipe-detail-trigger {
            padding: 0;
            border: 0;
            background: transparent;
            color: inherit;
            font: inherit;
            text-align: left;
            text-decoration: underline;
            text-underline-offset: 4px;
            cursor: pointer;
        }

        .recipe-detail {
            width: min(640px, calc(100% - 32px));
            max-height: calc(100dvh - 32px);
            overflow-y: auto;
            padding: 24px;
            border: 1px solid #eadcc9;
            border-radius: 20px;
            background: #fff;
            color: #3b2010;
        }

        .recipe-detail::backdrop {
            background: rgb(59 32 16 / 50%);
        }

        .recipe-detail-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
        }

        .recipe-detail-header h2 {
            margin: 0;
        }

        .recipe-detail-header button {
            padding: 8px 12px;
            border: 1px solid #eadcc9;
            border-radius: 10px;
            background: #fbf7ee;
            color: inherit;
            font: inherit;
            cursor: pointer;
        }

        .recipe-detail li + li {
            margin-top: 8px;
        }
        .recipe-video {
            margin: 24px 0;
        }

        .recipe-video-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 10px;
        }

        .recipe-video-header h3 {
            margin: 0;
        }

        .recipe-video-badge {
            padding: 4px 10px;
            border-radius: 999px;
            background: #fff0cd;
            color: #714500;
            font-size: 0.875rem;
            font-weight: 600;
        }

        .recipe-video-preview {
            display: grid;
            justify-items: center;
            gap: 8px;
            padding: 32px 16px;
            border-radius: 16px;
            background: #3b2010;
            color: #fff;
            text-align: center;
        }

        .recipe-video-preview p {
            margin: 0;
        }

        .recipe-video-icon {
            display: grid;
            width: 44px;
            height: 44px;
            place-items: center;
            border-radius: 12px;
            background: #714500;
        }
        .recipe-search {
            max-width: 1100px;
            margin-bottom: 16px;
        }

        .recipe-search label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
        }

        .recipe-search input {
            width: 100%;
            padding: 10px 16px;
            border: 1px solid #d8c9b7;
            border-radius: 999px;
            background: #fff;
            color: inherit;
            font: inherit;
        }
        .recipe-filters {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 12px;
        }

        .recipe-filter {
            padding: 8px 16px;
            border: 1px solid #3b2010;
            border-radius: 999px;
            background: #fff;
            color: #3b2010;
            font: inherit;
            cursor: pointer;
        }

        .recipe-filter[aria-pressed="true"] {
            background: #3b2010;
            color: #fff;
        }
        .recipe-modes {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 16px;
        }

        .recipe-modes a {
            display: inline-block;
            text-decoration: none;
        }

        .recipe-modes a[aria-current="page"] {
            background: #3b2010;
            color: #fff;
        }

        .recipe-card-missing {
            margin: 12px 0 0;
            color: #714500;
            font-size: 0.875rem;
        }
    .recipe-detail-ingredients {
    padding: 0;
    list-style: none;
    }

    .recipe-detail-ingredients li {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 8px;
        padding: 10px 12px;
        border: 1px solid #eadcc9;
        border-radius: 12px;
    }

    .recipe-ingredient-status {
        padding: 4px 10px;
        border-radius: 999px;
        background: #d7f0e2;
        color: #185638;
        font-size: 0.8125rem;
        font-weight: 600;
    }

    .recipe-ingredient-status[data-state="missing"] {
        background: #fff0cd;
        color: #714500;
    }

    .recipe-staples-note {
        margin-top: -8px;
        color: #6e6056;
        font-size: 0.875rem;
    }
        .recipe-page-header { display: flex; align-items: flex-end; justify-content: space-between; flex-wrap: wrap; gap: 16px; margin-bottom: 24px; }
        .recipe-page-header p { margin: 8px 0 0; color: #74685f; font-size: 1.075rem; }
        .recipe-modes { margin: 0; padding: 5px; border: 1px solid var(--meal-border); border-radius: 25px; background: #fff; }
        .recipe-modes .recipe-filter { border-color: transparent; font-weight: 650; }
        .recipe-checked { margin-bottom: 24px; padding: 22px 24px; border: 1px solid var(--meal-border); border-radius: 20px; background: #fff; }
        .recipe-checked-header { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px; margin-bottom: 12px; }
        .recipe-checked-header h2 { margin: 0; font-size: 1.15rem; }
        .recipe-checked-header a { padding: 8px 12px; border: 1px solid #e9cda0; border-radius: 12px; background: #fbf3e3; color: #714500; font-weight: 650; text-decoration: none; }
        .recipe-checked .recipe-card-ingredients li { background: var(--meal-brown); color: #fff; }
        .recipe-search, .recipe-grid { max-width: none; }
        .recipe-search label { position: absolute; width: 1px; height: 1px; overflow: hidden; clip-path: inset(50%); }
        .recipe-search input { min-height: 48px; }
        .recipe-grid { grid-template-columns: repeat(auto-fill, minmax(min(100%, 250px), 1fr)); gap: clamp(16px, 2vw, 28px); }
        .recipe-card { position: relative; overflow: hidden; padding: 0; box-shadow: 0 6px 24px rgb(59 32 16 / 8%); }
        .recipe-card:hover, .recipe-card:focus-within { border-color: #b77e35; }
        .recipe-card-body { padding: 18px; }
        .recipe-card h3 { margin-bottom: 12px; }
        .recipe-card .recipe-detail-trigger { text-decoration: none; font-weight: 700; }
        .recipe-detail-trigger::after { position: absolute; inset: 0; content: ''; }
        .recipe-card-media { position: relative; aspect-ratio: 1.65; background: #eadcc9; }
        .recipe-card-media img { display: block; width: 100%; height: 100%; object-fit: cover; }
        .recipe-card-media .recipe-video-badge { position: absolute; top: 12px; left: 12px; background: var(--meal-brown); color: #fff0cd; }
        .recipe-detail { width: min(1050px, calc(100% - 32px)); max-height: calc(100dvh - 44px); padding: clamp(16px, 3vw, 30px); background: var(--meal-cream); }
        .recipe-detail-header { align-items: center; padding-bottom: 18px; border-bottom: 1px solid var(--meal-border); }
        .recipe-detail-header form { margin: 0; }
        .recipe-detail-header button { width: 40px; height: 40px; padding: 0; border-radius: 50%; background: #fff; font-size: 1.4rem; }
        .recipe-detail-category { display: inline-block; margin-bottom: 7px; padding: 3px 10px; border: 1px solid var(--meal-border); border-radius: 999px; background: #fff; font-size: .8rem; }
        .recipe-detail-grid { display: grid; grid-template-columns: minmax(0, 1.2fr) minmax(0, 1fr); align-items: start; gap: 18px; margin-top: 20px; }
        .recipe-detail-grid .recipe-video { margin: 0; }
        .recipe-video-preview { min-height: 230px; align-content: center; background-image: linear-gradient(rgb(59 32 16 / 78%), rgb(59 32 16 / 84%)), var(--recipe-cover); background-size: cover; background-position: center; }
        .recipe-detail-panel { padding: 16px 18px; border: 1px solid var(--meal-border); border-radius: 16px; background: #fff; }
        .recipe-detail-panel + .recipe-detail-panel { margin-top: 16px; }
        .recipe-detail-panel h3:first-child { margin-top: 0; }
        .recipe-detail-panel ol { margin-bottom: 0; padding-left: 20px; line-height: 1.5; }
        .recipe-detail .recipe-card-ingredients li { margin-top: 0; }
        @media (max-width: 850px) { .recipe-detail-grid { grid-template-columns: minmax(0, 1fr); } }
        .recipe-results-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
            margin: 0 0 16px;
        }

        .recipe-results-heading h2 { margin: 0; }

        .recipe-priority {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            border: 1px solid var(--meal-border);
            border-radius: 999px;
            background: #fff;
            color: inherit;
            font-weight: 650;
            text-decoration: none;
        }

        .recipe-priority span {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #91847a;
        }

        .recipe-priority[data-enabled="true"] {
            border-color: #e4af55;
            background: #fff0cd;
            color: #714500;
        }

        .recipe-priority[data-enabled="true"] span { background: #c77a0a; }

        .recipe-use-soon-label {
            margin: 12px 0 0;
            color: #714500;
            font-size: .85rem;
            font-weight: 650;
        }
        .recipe-checked .recipe-card-ingredients li {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 8px 4px 12px;
        }

        .recipe-remove-ingredient {
            display: inline-grid;
            width: 26px;
            height: 26px;
            place-items: center;
            border-radius: 50%;
            color: inherit;
            font-size: 1.1rem;
            line-height: 1;
            text-decoration: none;
        }

        .recipe-remove-ingredient:hover,
        .recipe-remove-ingredient:focus-visible {
            background: rgb(255 255 255 / 18%);
        }
        .recipe-card-duration {
            position: absolute;
            right: 12px;
            bottom: 12px;
            padding: 4px 10px;
            border-radius: 999px;
            background: #fbf7ee;
            color: var(--meal-brown);
            font-size: .8rem;
            font-weight: 700;
        }

        .recipe-detail-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(min(100%, 115px), 1fr));
            gap: 10px;
            margin: 16px 0 0;
        }

        .recipe-detail-stats > div {
            display: grid;
            align-content: center;
            gap: 5px;
            padding: 12px 8px;
            border: 1px solid var(--meal-border);
            border-radius: 14px;
            background: #fff;
            text-align: center;
        }

        .recipe-detail-stats dt {
            color: #74685f;
            font-size: .85rem;
        }

        .recipe-detail-stats dd {
            margin: 0;
            font-weight: 700;
        }

        .recipe-detail-stats dd[data-ready="true"] { color: #185638; }
        .recipe-detail-stats dd[data-ready="false"] { color: #714500; }
        .recipe-available-ingredients:not([hidden]) {
            margin-top: 10px;
        }

        .recipe-checked .recipe-available-ingredients li {
            padding: 0;
            background: transparent;
            color: var(--meal-brown);
        }

        .recipe-add-ingredient {
            padding: 6px 12px;
            border: 1px solid #e9cda0;
            border-radius: 999px;
            background: #fbf3e3;
            color: inherit;
            font: inherit;
            cursor: pointer;
        }

        .recipe-add-ingredient:hover {
            background: #f4e7cd;
        }
        .recipe-ingredient-info {
            display: grid;
            flex: 1 1 8rem;
            gap: 3px;
            min-width: 0;
            overflow-wrap: anywhere;
        }

        .recipe-ingredient-stock {
            color: #6e6056;
            font-size: .8rem;
            line-height: 1.4;
        }
        .recipe-cooked {
            margin-top: 16px;
            padding: 16px;
            border: 1px solid var(--meal-border);
            border-radius: 14px;
            background: #fff;
        }

        .recipe-cooked summary {
            color: var(--meal-brown);
            font-weight: 700;
            cursor: pointer;
        }

        .recipe-cooked p {
            margin: 12px 0;
            color: #6e6056;
            font-size: .875rem;
        }

        .recipe-cooked-fields {
            display: grid;
            gap: 8px;
        }

        .recipe-cooked-fields label {
            display: grid;
            gap: 4px;
            font-size: .875rem;
            font-weight: 650;
        }

        .recipe-cooked-fields input {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid var(--meal-border);
            border-radius: 9px;
            color: inherit;
            font: inherit;
        }

        .recipe-cooked-save {
            margin-top: 12px;
            padding: 9px 13px;
            border: 0;
            border-radius: 10px;
            background: var(--meal-brown);
            color: #fff;
            font: inherit;
            font-weight: 650;
            cursor: pointer;
        }
        .recipe-recently-cooked {
            margin-top: 24px;
            padding: 18px 22px;
            border: 1px solid var(--meal-border);
            border-radius: 16px;
            background: #fff;
        }

        .recipe-recently-cooked h2 {
            margin: 0 0 10px;
            font-size: 1.15rem;
        }

        .recipe-cooked-history {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .recipe-cooked-history li {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 4px 16px;
            padding: 8px 0;
        }

        .recipe-cooked-history li + li { border-top: 1px solid var(--meal-border); }
        .recipe-cooked-history time { color: #6e6056; font-size: .875rem; }
    </style>
@endpush

@php
    $normalize = fn (string $name) => mb_strtolower(trim($name));

    $selectedIngredients = collect((array) request()->query('ingredients', []))
        ->filter(fn ($name) => is_string($name) && trim($name) !== '')
        ->map(fn ($name) => trim($name))
        ->unique($normalize)
        ->values();

    $selectedNames = $selectedIngredients->map($normalize);
    $useSoonNames = collect((array) request()->query('use_soon', []))
        ->filter(fn ($name) => is_string($name) && trim($name) !== '')
        ->map($normalize)
        ->filter(fn ($name) => $selectedNames->containsStrict($name))
        ->unique()
        ->values();

    $prioritizeUseSoon = request()->query('priority') !== 'off';

        $recipes = collect(config('mealup.recipes', []));

        $recipes = $recipes->map(function (array $recipe) use ($selectedNames, $useSoonNames, $normalize) {
            $recipe['missing_ingredients'] = collect($recipe['ingredients'])
                ->reject(fn ($ingredient) => $selectedNames->containsStrict($normalize($ingredient)))
                ->values()
                ->all();

            $recipe['use_soon_count'] = collect($recipe['ingredients'])
                ->map($normalize)
                ->unique()
                ->filter(fn ($name) => $useSoonNames->containsStrict($name))
                ->count();

            return $recipe;
        });

        $readyRecipes = $recipes->filter(fn (array $recipe) => $recipe['missing_ingredients'] === []);

        $showCatalog = request()->query('mode') === 'catalog';
        $visibleRecipes = $showCatalog ? $recipes : $readyRecipes;
        if ($prioritizeUseSoon) {
            $visibleRecipes = $visibleRecipes->sortByDesc('use_soon_count');
        }

        $recipeQuery = [
            'ingredients' => $selectedIngredients->all(),
            'use_soon' => $useSoonNames->all(),
        ];

        if (!$prioritizeUseSoon) {
            $recipeQuery['priority'] = 'off';
        }

        $priorityQuery = array_merge($recipeQuery, [
            'priority' => $prioritizeUseSoon ? 'off' : 'on',
        ]);

        if ($showCatalog) {
            $priorityQuery['mode'] = 'catalog';
        }
@endphp

@section('content')
    <header class="recipe-page-header">
        <div>
            <h1>Recipes</h1>
            <p>Find recipes you can cook using your checked Pantry ingredients.</p>
        </div>
            <nav class="recipe-modes" aria-label="Daftar resep">
                <a class="recipe-filter"
                href="{{ route('recipes.index', $recipeQuery) }}"
                @if (!$showCatalog) aria-current="page" @endif>
                    100% Ready to Cook ({{ $readyRecipes->count() }})
                </a>

                <a class="recipe-filter"
                href="{{ route('recipes.index', array_merge($recipeQuery, ['mode' => 'catalog'])) }}"
                @if ($showCatalog) aria-current="page" @endif>
                    Explore All Catalog ({{ $recipes->count() }})
                </a>
            </nav>
    </header>

    <section class="recipe-checked" aria-labelledby="selected-ingredients-heading">
        <div class="recipe-checked-header">
            <h2 id="selected-ingredients-heading">Your Checked Ingredients</h2>
            <a href="{{ route('pantry.index') }}">Edit Pantry Selection</a>
        </div>

        @if ($selectedIngredients->isEmpty())
            <p id="recipe-selection-help">Pilih bahan di Pantry untuk melihat rekomendasi resep.</p>
        @else
            <ul class="recipe-card-ingredients">
                @foreach ($selectedIngredients as $ingredient)
                    @php
                        $removedName = $normalize($ingredient);
                        $remainingQuery = array_merge($recipeQuery, [
                            'ingredients' => $selectedIngredients
                                ->reject(fn ($name) => $normalize($name) === $removedName)
                                ->values()
                                ->all(),
                            'use_soon' => $useSoonNames
                                ->reject(fn ($name) => $name === $removedName)
                                ->values()
                                ->all(),
                        ]);

                        if ($showCatalog) {
                            $remainingQuery['mode'] = 'catalog';
                        }
                    @endphp
                    <li>
                        {{ $ingredient }}
                        <a class="recipe-remove-ingredient"
                           href="{{ route('recipes.index', $remainingQuery) }}"
                           data-ingredient-name="{{ $ingredient }}"
                           aria-label="Batalkan pilihan {{ $ingredient }}">×</a>
                    </li>
                @endforeach
            </ul>
        @endif

        <ul id="recipe-available-ingredients"
            class="recipe-card-ingredients recipe-available-ingredients"
            aria-label="Bahan Pantry yang bisa ditambahkan" hidden></ul>
    </section>

        <section aria-labelledby="ready-recipes-heading">
            <div class="recipe-results-heading">
                <h2 id="ready-recipes-heading">
                    {{ $showCatalog ? 'Explore All Catalog' : '100% Ready to Cook' }}
                </h2>
                <a class="recipe-priority"
                   href="{{ route('recipes.index', $priorityQuery) }}"
                   data-enabled="{{ $prioritizeUseSoon ? 'true' : 'false' }}">
                    <span aria-hidden="true"></span>
                    Use Soon Priority: {{ $prioritizeUseSoon ? 'ON' : 'OFF' }}
                </a>
            </div>


            @if ($visibleRecipes->isEmpty())
                <p>{{ $selectedIngredients->isEmpty()
                    ? 'Pilih bahan di Pantry atau buka katalog untuk menjelajahi resep.'
                    : 'Belum ada resep yang cocok dengan bahan pilihanmu.' }}</p>
            @else
                <div class="recipe-search">
                    <label for="recipe-search-input">Search recipes or ingredients</label>
                    <input type="search"
                        id="recipe-search-input"
                        placeholder="e.g., Omelet or Spinach">
                <div class="recipe-filters" role="group" aria-label="Kategori resep">
                    @foreach (['All', 'Main Course', 'Snack', 'Dessert', 'Others'] as $category)
                        <button type="button"
                                class="recipe-filter"
                                data-category="{{ $category }}"
                                aria-pressed="{{ $category === 'All' ? 'true' : 'false' }}">
                            {{ $category }}
                        </button>
                    @endforeach
                </div>
                    <p id="recipe-search-empty" role="status" hidden>
                        Tidak ada resep yang sesuai dengan pencarian atau kategori ini.
                    </p>
                </div>
                <div class="recipe-grid">
                    @foreach ($visibleRecipes as $recipe)
                        @php
                            $cover = match ($recipe['name']) {
                                'Sup Ayam Telur Bayam' => '9c08e.png',
                                'Omelet Bayam' => '59b25.png',
                                'Ayam Panggang' => '13049.png',
                                default => '2aef4.png',
                            };
                        @endphp
                        <article class="recipe-card"
                            data-recipe-name="{{ $recipe['name'] }}"
                            data-recipe-ingredients="{{ implode(', ', $recipe['ingredients']) }}"
                            data-recipe-category="{{ $recipe['category'] }}">
                            <div class="recipe-card-media">
                                <img src="{{ asset('assets/' . $cover) }}" alt="" loading="lazy" width="400" height="240">
                                <span class="recipe-video-badge">▶ Video · PRO</span>
                                <span class="recipe-card-duration">{{ $recipe['prep_cook_minutes'] }} min</span>
                            </div>
                            <div class="recipe-card-body">
                            <h3>
                                <button type="button"
                                        class="recipe-detail-trigger"
                                        data-recipe-dialog="recipe-detail-{{ $loop->iteration }}"
                                        aria-haspopup="dialog">
                                    {{ $recipe['name'] }}
                                </button>
                            </h3>
                            <p class="recipe-card-label">Main Ingredients</p>

                            <ul class="recipe-card-ingredients">
                                @foreach ($recipe['ingredients'] as $ingredient)
                                    <li>{{ $ingredient }}</li>
                                @endforeach
                            </ul>
                            @if ($recipe['use_soon_count'] > 0)
                                <p class="recipe-use-soon-label">
                                    Uses {{ $recipe['use_soon_count'] }} Use Soon {{ $recipe['use_soon_count'] === 1 ? 'ingredient' : 'ingredients' }}
                                </p>
                            @endif
                            @if ($recipe['missing_ingredients'] !== [])
                                <p class="recipe-card-missing">
                                    <strong>Belum dipilih:</strong>
                                    {{ implode(', ', $recipe['missing_ingredients']) }}
                                </p>
                            @endif
                            </div>
                        </article>
                        <dialog id="recipe-detail-{{ $loop->iteration }}"
                                class="recipe-detail"
                                aria-labelledby="recipe-title-{{ $loop->iteration }}">
                            <div class="recipe-detail-header">
                                <div>
                                    <span class="recipe-detail-category">{{ $recipe['category'] }}</span>
                                    <h2 id="recipe-title-{{ $loop->iteration }}">{{ $recipe['name'] }}</h2>
                                </div>

                                <form method="dialog">
                                    <button type="submit" aria-label="Tutup detail resep" autofocus>×</button>
                                </form>
                            </div>
                            <div class="recipe-detail-grid">
                            <div>
                            <section class="recipe-video"
                                    aria-labelledby="recipe-video-title-{{ $loop->iteration }}">
                                <div class="recipe-video-header">
                                    <h3 id="recipe-video-title-{{ $loop->iteration }}">Video tutorial</h3>
                                    <span class="recipe-video-badge">Premium</span>
                                </div>

                                <div class="recipe-video-preview" style="--recipe-cover: url('{{ asset('assets/' . $cover) }}')">
                                    <span class="recipe-video-icon" aria-hidden="true">🔒</span>
                                    <p><strong>Video memasak terkunci</strong></p>
                                    <p>Video langkah demi langkah tersedia untuk pengguna Premium.</p>
                                </div>
                            </section>

                            @php
                                $missingCount = count($recipe['missing_ingredients']);
                            @endphp
                            <dl class="recipe-detail-stats">
                                <div>
                                    <dt>Prep &amp; Cook</dt>
                                    <dd>{{ $recipe['prep_cook_minutes'] }} min</dd>
                                </div>
                                <div>
                                    <dt>Servings</dt>
                                    <dd>{{ $recipe['servings'] }} {{ $recipe['servings'] === 1 ? 'serving' : 'servings' }}</dd>
                                </div>
                                <div>
                                    <dt>Readiness</dt>
                                    <dd data-ready="{{ $missingCount === 0 ? 'true' : 'false' }}">
                                        {{ $missingCount === 0
                                            ? '100% Ready ✓'
                                            : $missingCount . ($missingCount === 1 ? ' ingredient missing' : ' ingredients missing') }}
                                    </dd>
                                </div>
                            </dl>

                            @if ($missingCount === 0)
                                <details class="recipe-cooked"
                                         data-recipe-name="{{ $recipe['name'] }}"
                                         data-pantry-url="{{ route('pantry.index') }}">
                                    <summary>Mark as Cooked &amp; Update Pantry</summary>
                                    <p>Isi stok tersisa, misalnya 150 g. Masukkan 0 jika stok habis.</p>
                                    <form class="recipe-cooked-form">
                                        <div class="recipe-cooked-fields"></div>
                                        <p class="recipe-cooked-status" role="status" hidden></p>
                                        <button type="submit" class="recipe-cooked-save">Save &amp; Back to Pantry</button>
                                    </form>
                                </details>
                            @endif
                            </div>
                            <div>
                            <section class="recipe-detail-panel">
                                <h3>Bahan utama</h3>

                                <ul class="recipe-detail-ingredients">
                                    @foreach ($recipe['ingredients'] as $ingredient)
                                        @php
                                            $isMissing = in_array($ingredient, $recipe['missing_ingredients'], true);
                                        @endphp

                                        <li data-pantry-ingredient="{{ $ingredient }}">
                                            <div class="recipe-ingredient-info">
                                                <strong>{{ $ingredient }}</strong>
                                                <small class="recipe-ingredient-stock">Stok belum tercatat di tab ini.</small>
                                            </div>

                                            <span class="recipe-ingredient-status"
                                                data-state="{{ $isMissing ? 'missing' : 'checked' }}">
                                                {{ $isMissing ? 'Belum dipilih' : 'Sudah dicentang' }}
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>

                                <h3>Bahan dapur dasar</h3>
                                <p class="recipe-staples-note">Diasumsikan tersedia.</p>

                                <ul class="recipe-card-ingredients">
                                    @foreach ($recipe['staples'] as $staple)
                                        <li>{{ $staple }}</li>
                                    @endforeach
                                </ul>

                            </section>
                            <section class="recipe-detail-panel">
                            <h3>Langkah memasak</h3>
                            <ol>
                                @foreach ($recipe['steps'] as $step)
                                    <li>{{ $step }}</li>
                                @endforeach
                            </ol>
                            </section>
                            </div>
                            </div>
                        </dialog>
                    @endforeach
                </div>
            @endif
        </section>
    <section id="recipe-recently-cooked" class="recipe-recently-cooked"
             aria-labelledby="recently-cooked-heading" hidden>
        <h2 id="recently-cooked-heading">Recently Cooked</h2>
        <ul class="recipe-cooked-history"></ul>
    </section>

    <script>
        const pantryStorageKey = 'mealup.pantry.v1';
        const cookedHistoryKey = 'mealup.cooked.v1';
        const cookedHistorySection = document.querySelector('#recipe-recently-cooked');
        const cookedHistoryList = cookedHistorySection.querySelector('.recipe-cooked-history');
        const cookedHistoryDate = new Intl.DateTimeFormat('id-ID', {
            dateStyle: 'medium',
            timeStyle: 'short',
        });

        function readCookedHistory() {
            const saved = sessionStorage.getItem(cookedHistoryKey);

            if (saved === null) {
                return [];
            }

            let entries;
            try {
                entries = JSON.parse(saved);
            } catch {
                return [];
            }

            return Array.isArray(entries)
                ? entries.filter((entry) => (
                    typeof entry?.name === 'string'
                    && typeof entry.cookedAt === 'string'
                    && Number.isFinite(Date.parse(entry.cookedAt))
                ))
                : [];
        }

        function recordCookedRecipe(name) {
            const recent = [{ name, cookedAt: new Date().toISOString() }, ...readCookedHistory()];
            sessionStorage.setItem(cookedHistoryKey, JSON.stringify(recent.slice(0, 5)));
        }

        function renderCookedHistory() {
            let entries = [];
            try {
                entries = readCookedHistory();
            } catch (error) {
                console.warn('Riwayat memasak tidak bisa dibaca di tab ini.', error);
            }

            cookedHistoryList.replaceChildren();

            entries.slice(0, 5).forEach((entry) => {
                const item = document.createElement('li');
                const name = document.createElement('strong');
                const time = document.createElement('time');

                name.textContent = entry.name;
                time.dateTime = entry.cookedAt;
                time.textContent = cookedHistoryDate.format(new Date(entry.cookedAt));
                item.append(name, time);
                cookedHistoryList.append(item);
            });

            cookedHistorySection.hidden = cookedHistoryList.childElementCount === 0;
        }

        const normalizeIngredient = (value) => value.trim().toLowerCase();
        const isOutOfStock = (ingredient) => ingredient?.quantity?.trim?.() === '0';

        function readPantryIngredients() {
            const saved = sessionStorage.getItem(pantryStorageKey);
            const ingredients = saved === null ? [] : JSON.parse(saved);

            return Array.isArray(ingredients) ? ingredients : [];
        }

        function showRecipeIngredientStock(dialog) {
            let pantryIngredients = [];

            try {
                pantryIngredients = readPantryIngredients();
            } catch (error) {
                console.warn('Stok Pantry tidak bisa dibaca di tab ini.', error);
            }

            const stockByName = new Map();

            pantryIngredients.forEach((ingredient) => {
                if (typeof ingredient?.name !== 'string'
                    || typeof ingredient.quantity !== 'string'
                    || !ingredient.quantity.trim()) {
                    return;
                }

                const name = normalizeIngredient(ingredient.name);
                const quantity = ingredient.quantity.trim();
                const status = typeof ingredient.status === 'string' ? ingredient.status.trim() : '';
                const stockStatus = isOutOfStock(ingredient) ? 'Out of Stock' : status;
                const description = stockStatus ? `${quantity} (${stockStatus})` : quantity;
                const stock = stockByName.get(name) ?? [];

                stock.push(description);
                stockByName.set(name, stock);
            });

            dialog.querySelectorAll('[data-pantry-ingredient]').forEach((item) => {
                const name = normalizeIngredient(item.dataset.pantryIngredient);
                const stock = stockByName.get(name);

                item.querySelector('.recipe-ingredient-stock').textContent = stock
                    ? `Stok: ${stock.join(' · ')}`
                    : 'Stok belum tercatat di tab ini.';
            });
        }

        function prepareCookedForm(dialog) {
            const details = dialog.querySelector('.recipe-cooked');

            if (!details) {
                return;
            }

            const form = details.querySelector('.recipe-cooked-form');
            const fields = form.querySelector('.recipe-cooked-fields');
            const status = form.querySelector('.recipe-cooked-status');
            const submitButton = form.querySelector('.recipe-cooked-save');
            const requiredNames = new Set(Array.from(
                dialog.querySelectorAll('[data-pantry-ingredient]'),
                (item) => normalizeIngredient(item.dataset.pantryIngredient)
            ));

            function showStatus(message) {
                status.textContent = message;
                status.hidden = false;
            }

            details.open = false;
            form.querySelector('.recipe-cooked-return')?.remove();
            fields.replaceChildren();
            status.hidden = true;
            submitButton.hidden = true;
            form.onsubmit = (event) => event.preventDefault();

            let pantryIngredients;
            try {
                pantryIngredients = readPantryIngredients();
            } catch {
                showStatus('Stok Pantry tidak bisa dibaca di tab ini.');
                return;
            }

            const entries = pantryIngredients.flatMap((ingredient, index) => {
                if (ingredient?.checked !== true
                    || isOutOfStock(ingredient)
                    || typeof ingredient.name !== 'string'
                    || !requiredNames.has(normalizeIngredient(ingredient.name))) {
                    return [];
                }

                return [{ ingredient, index }];
            });
            const namesFound = new Set(entries.map(({ ingredient }) => normalizeIngredient(ingredient.name)));

            if (!entries.length || namesFound.size !== requiredNames.size) {
                showStatus('Pilih semua bahan utama di Pantry pada tab ini sebelum memperbarui stok.');
                return;
            }

            const inputs = entries.map(({ ingredient }) => {
                const label = document.createElement('label');
                label.textContent = ingredient.name;

                if (ingredient.expires) {
                    const [year, month, day] = ingredient.expires.split('-');
                    label.textContent += ` · kedaluwarsa ${day}/${month}/${year}`;
                }

                const input = document.createElement('input');
                input.type = 'text';
                input.required = true;
                input.value = ingredient.quantity;
                input.addEventListener('input', () => input.setCustomValidity(''));
                label.append(input);
                fields.append(label);

                return input;
            });

            submitButton.hidden = false;
            const originalStock = JSON.stringify(pantryIngredients);

            form.onsubmit = (event) => {
                event.preventDefault();
                status.hidden = true;

                const quantities = inputs.map((input) => input.value.trim());
                const blankIndex = quantities.indexOf('');

                if (blankIndex !== -1) {
                    inputs[blankIndex].setCustomValidity('Isi stok tersisa, atau masukkan 0 jika habis.');
                    inputs[blankIndex].reportValidity();
                    return;
                }

                try {
                    const currentStock = readPantryIngredients();

                    if (JSON.stringify(currentStock) !== originalStock) {
                        showStatus('Stok Pantry berubah. Tutup dan buka kembali detail resep untuk memuat data terbaru.');
                        return;
                    }

                    entries.forEach(({ index }, entryIndex) => {
                        const quantity = quantities[entryIndex];
                        currentStock[index].quantity = quantity;

                        if (quantity === '0') {
                            currentStock[index].checked = false;
                        }
                    });

                    sessionStorage.setItem(pantryStorageKey, JSON.stringify(currentStock));
                } catch {
                    showStatus('Perubahan stok tidak bisa disimpan di tab ini.');
                    return;
                }

                try {
                    recordCookedRecipe(details.dataset.recipeName);
                } catch (error) {
                    showStatus('Stok sudah disimpan, tetapi riwayat memasak tidak bisa dicatat di tab ini.');
                    submitButton.hidden = true;
                    const pantryLink = document.createElement('a');
                    pantryLink.className = 'recipe-cooked-return';
                    pantryLink.href = details.dataset.pantryUrl;
                    pantryLink.textContent = 'Kembali ke Pantry';
                    form.append(pantryLink);
                    form.onsubmit = (submitEvent) => submitEvent.preventDefault();
                    return;
                }

                window.location.assign(details.dataset.pantryUrl);
            };
        }

        function removePantrySelection(name) {
            const removedName = normalizeIngredient(name);

            try {
                const ingredients = readPantryIngredients();

                ingredients.forEach((ingredient) => {
                    if (typeof ingredient?.name === 'string'
                        && normalizeIngredient(ingredient.name) === removedName) {
                        ingredient.checked = false;
                    }
                });

                sessionStorage.setItem(pantryStorageKey, JSON.stringify(ingredients));
            } catch (error) {
                console.warn('Pilihan Pantry tidak bisa diperbarui di tab ini.', error);
            }
        }

        document.querySelectorAll('.recipe-remove-ingredient').forEach((link) => {
            link.addEventListener('click', (event) => {
                if (event.defaultPrevented || event.button !== 0
                    || event.ctrlKey || event.metaKey || event.shiftKey || event.altKey) {
                    return;
                }

                removePantrySelection(link.dataset.ingredientName);
            });
        });

        const availableIngredientsList = document.querySelector('#recipe-available-ingredients');
        const selectionHelp = document.querySelector('#recipe-selection-help');
        const currentRecipeQuery = {{ \Illuminate\Support\Js::from($recipeQuery) }};

        function recipeSelectionUrl(ingredients, useSoon) {
            const nextUrl = new URL(window.location.href);

            for (const key of [...nextUrl.searchParams.keys()]) {
                if (/^(ingredients|use_soon)(?:\[.*\])?$/.test(key)) {
                    nextUrl.searchParams.delete(key);
                }
            }

            ingredients.forEach((name) => nextUrl.searchParams.append('ingredients[]', name));
            useSoon.forEach((name) => nextUrl.searchParams.append('use_soon[]', name));

            return nextUrl.href;
        }

        function addRecipeIngredient(ingredient) {
            const name = normalizeIngredient(ingredient.name);
            let matching;

            try {
                const pantryIngredients = readPantryIngredients();
                matching = pantryIngredients.find((item) => (
                    typeof item?.name === 'string'
                    && normalizeIngredient(item.name) === name
                    && !isOutOfStock(item)
                ));

                if (!matching) {
                    renderAvailableIngredients();
                    return;
                }

                matching.checked = true;
                sessionStorage.setItem(pantryStorageKey, JSON.stringify(pantryIngredients));
            } catch (error) {
                console.warn('Pilihan Pantry tidak bisa diperbarui di tab ini.', error);
                return;
            }

            const ingredients = [...currentRecipeQuery.ingredients, matching.name.trim()];
            const useSoon = matching.status === 'Use Soon'
                ? [...currentRecipeQuery.use_soon, name]
                : currentRecipeQuery.use_soon;

            window.location.assign(recipeSelectionUrl(ingredients, useSoon));
        }

        function renderAvailableIngredients() {
            const shownNames = new Set(currentRecipeQuery.ingredients.map(normalizeIngredient));
            let pantryIngredients;

            try {
                pantryIngredients = readPantryIngredients();
            } catch (error) {
                console.warn('Isi Pantry tidak bisa dibaca di tab ini.', error);
                pantryIngredients = [];
            }

            const emptyNames = new Set();
            const availableNames = new Set();

            pantryIngredients.forEach((ingredient) => {
                if (typeof ingredient?.name === 'string') {
                    const name = normalizeIngredient(ingredient.name);
                    (isOutOfStock(ingredient) ? emptyNames : availableNames).add(name);
                }
            });

            const isAvailable = (name) => !emptyNames.has(name) || availableNames.has(name);
            const ingredients = currentRecipeQuery.ingredients.filter((name) => isAvailable(normalizeIngredient(name)));

            if (ingredients.length !== currentRecipeQuery.ingredients.length) {
                const useSoon = currentRecipeQuery.use_soon.filter(isAvailable);
                window.location.replace(recipeSelectionUrl(ingredients, useSoon));
                return;
            }

            availableIngredientsList.replaceChildren();

            pantryIngredients.forEach((ingredient) => {
                const name = typeof ingredient?.name === 'string'
                    ? normalizeIngredient(ingredient.name)
                    : '';

                if (!name || shownNames.has(name) || isOutOfStock(ingredient)) {
                    return;
                }

                shownNames.add(name);
                const item = document.createElement('li');
                const button = document.createElement('button');
                button.type = 'button';
                button.className = 'recipe-add-ingredient';
                button.textContent = `+ ${ingredient.name}`;
                button.setAttribute('aria-label', `Pilih ${ingredient.name}`);
                button.addEventListener('click', () => addRecipeIngredient(ingredient));
                item.append(button);
                availableIngredientsList.append(item);
            });

            const hasOptions = availableIngredientsList.childElementCount > 0;
            availableIngredientsList.hidden = !hasOptions;

            if (selectionHelp) {
                selectionHelp.textContent = hasOptions
                    ? 'Pilih bahan di bawah untuk melihat rekomendasi resep.'
                    : 'Pilih bahan di Pantry untuk melihat rekomendasi resep.';
            }
        }

        renderCookedHistory();
        renderAvailableIngredients();
        window.addEventListener('pageshow', (event) => {
            if (event.persisted) {
                renderCookedHistory();
                renderAvailableIngredients();
            }
        });

        const pantryNavCount = document.querySelector('#mealup-pantry-count');
        const recipeNavCount = document.querySelector('#mealup-recipe-count');

        pantryNavCount.textContent = {{ $selectedIngredients->count() }};
        pantryNavCount.hidden = Number(pantryNavCount.textContent) === 0;
        recipeNavCount.textContent = {{ $readyRecipes->count() }};
        recipeNavCount.hidden = pantryNavCount.hidden;

        document.querySelectorAll('.recipe-detail-trigger').forEach((button) => {
            button.addEventListener('click', () => {
                const dialog = document.getElementById(button.dataset.recipeDialog);

                showRecipeIngredientStock(dialog);
                prepareCookedForm(dialog);
                dialog.showModal();
            });
        });
        const recipeSearchInput = document.querySelector('#recipe-search-input');

        if (recipeSearchInput) {
            const recipeCards = document.querySelectorAll('.recipe-grid .recipe-card');
            const recipeSearchEmpty = document.querySelector('#recipe-search-empty');
            const recipeFilterButtons = document.querySelectorAll('.recipe-filters button[data-category]');

            let activeCategory = 'All';

            function filterRecipeCards() {
                const searchTerm = recipeSearchInput.value.trim().toLowerCase();
                let visibleCount = 0;

                recipeCards.forEach((card) => {
                    const name = card.dataset.recipeName.toLowerCase();
                    const ingredients = card.dataset.recipeIngredients.toLowerCase();

                    const matchesSearch = name.includes(searchTerm)
                        || ingredients.includes(searchTerm);
                    const matchesCategory = activeCategory === 'All'
                        || card.dataset.recipeCategory === activeCategory;
                    const shouldShow = matchesSearch && matchesCategory;

                    card.hidden = !shouldShow;

                    if (shouldShow) {
                        visibleCount += 1;
                    }
                });

                recipeSearchEmpty.hidden = visibleCount > 0;
            }

            recipeSearchInput.addEventListener('input', filterRecipeCards);

            recipeFilterButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    activeCategory = button.dataset.category;

                    recipeFilterButtons.forEach((filterButton) => {
                        filterButton.setAttribute('aria-pressed', String(filterButton === button));
                    });

                    filterRecipeCards();
                });
            });

            filterRecipeCards();
        }
    </script>
@endsection