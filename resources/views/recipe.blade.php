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

$recipes = collect([
    [
        'name' => 'Sup Ayam Telur Bayam',
        'category' => 'Main Course',
        'ingredients' => ['Chicken', 'Eggs', 'Spinach'],
        'steps' => [
            'Potong ayam kecil-kecil, lalu rebus dengan air, bawang putih, dan garam hingga matang.',
            'Kocok telur, lalu tuangkan perlahan sambil mengaduk kuah.',
            'Masukkan bayam dan masak sebentar hingga layu.',
        ],
    ],
    [
        'name' => 'Omelet Bayam',
        'category' => 'Main Course',
        'ingredients' => ['Eggs', 'Spinach'],
        'steps' => [
            'Kocok telur dengan sedikit garam dan masukkan bayam yang sudah diiris.',
            'Tuang campuran ke wajan dengan sedikit minyak.',
            'Masak hingga telur mengeras, lalu lipat dan sajikan.',
        ],
    ],
    [
        'name' => 'Ayam Panggang',
        'category' => 'Main Course',
        'ingredients' => ['Chicken'],
        'steps' => [
            'Bumbui potongan ayam dengan garam dan sedikit minyak.',
            'Panggang hingga permukaan kecokelatan dan bagian tengah matang.',
            'Diamkan sebentar sebelum disajikan.',
        ],
    ],
]);

        $recipes = $recipes->map(function (array $recipe) use ($selectedNames, $normalize) {
            $recipe['missing_ingredients'] = collect($recipe['ingredients'])
                ->reject(fn ($ingredient) => $selectedNames->containsStrict($normalize($ingredient)))
                ->values()
                ->all();

            return $recipe;
        });

        $readyRecipes = $recipes->filter(fn (array $recipe) => $recipe['missing_ingredients'] === []);

        $showCatalog = request()->query('mode') === 'catalog';
        $visibleRecipes = $showCatalog ? $recipes : $readyRecipes;
        $recipeQuery = ['ingredients' => $selectedIngredients->all()];
@endphp

@section('content')
    <h1>Recipes</h1>

    <section aria-labelledby="selected-ingredients-heading">
        <h2 id="selected-ingredients-heading">Your Checked Ingredients</h2>

        @if ($selectedIngredients->isEmpty())
            <p>Pilih bahan di Pantry untuk melihat rekomendasi resep.</p>
        @else
            <ul>
                @foreach ($selectedIngredients as $ingredient)
                    <li>{{ $ingredient }}</li>
                @endforeach
            </ul>
        @endif

        <a href="{{ route('pantry.index') }}">Back to Pantry</a>
    </section>

    @if ($selectedIngredients->isNotEmpty())
        <section aria-labelledby="ready-recipes-heading">
            <h2 id="ready-recipes-heading">
                {{ $showCatalog ? 'Explore All Catalog' : '100% Ready to Cook' }}
            </h2>

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
            @if ($visibleRecipes->isEmpty())
                <p>Belum ada resep yang cocok dengan bahan pilihanmu.</p>
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
                        <article class="recipe-card"
                            data-recipe-name="{{ $recipe['name'] }}"
                            data-recipe-ingredients="{{ implode(', ', $recipe['ingredients']) }}"
                            data-recipe-category="{{ $recipe['category'] }}">
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
                            @if ($recipe['missing_ingredients'] !== [])
                                <p class="recipe-card-missing">
                                    <strong>Belum dipilih:</strong>
                                    {{ implode(', ', $recipe['missing_ingredients']) }}
                                </p>
                            @endif
                        </article>
                        <dialog id="recipe-detail-{{ $loop->iteration }}"
                                class="recipe-detail"
                                aria-labelledby="recipe-title-{{ $loop->iteration }}">
                            <div class="recipe-detail-header">
                                <h2 id="recipe-title-{{ $loop->iteration }}">{{ $recipe['name'] }}</h2>

                                <form method="dialog">
                                    <button type="submit" autofocus>Tutup</button>
                                </form>
                            </div>
                            <section class="recipe-video"
                                    aria-labelledby="recipe-video-title-{{ $loop->iteration }}">
                                <div class="recipe-video-header">
                                    <h3 id="recipe-video-title-{{ $loop->iteration }}">Video tutorial</h3>
                                    <span class="recipe-video-badge">Premium</span>
                                </div>

                                <div class="recipe-video-preview">
                                    <span class="recipe-video-icon" aria-hidden="true">🔒</span>
                                    <p><strong>Video memasak terkunci</strong></p>
                                    <p>Video langkah demi langkah tersedia untuk pengguna Premium.</p>
                                </div>
                            </section>
                            <h3>Bahan utama</h3>
                            <ul>
                                @foreach ($recipe['ingredients'] as $ingredient)
                                    <li>{{ $ingredient }}</li>
                                @endforeach
                            </ul>

                            <h3>Langkah memasak</h3>
                            <ol>
                                @foreach ($recipe['steps'] as $step)
                                    <li>{{ $step }}</li>
                                @endforeach
                            </ol>
                        </dialog>
                    @endforeach
                </div>
            @endif
        </section>
    @endif
    <script>
        document.querySelectorAll('.recipe-detail-trigger').forEach((button) => {
            button.addEventListener('click', () => {
                const dialog = document.getElementById(button.dataset.recipeDialog);

                dialog.showModal();
            });
        });
        const recipeSearchInput = document.querySelector('#recipe-search-input');

        if (recipeSearchInput) {
            const recipeCards = document.querySelectorAll('.recipe-grid .recipe-card');
            const recipeSearchEmpty = document.querySelector('#recipe-search-empty');
            const recipeFilterButtons = document.querySelectorAll('.recipe-filter');

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