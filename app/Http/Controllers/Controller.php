<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index(Request $request)
    {
        $normalize = fn (string $name) => mb_strtolower(trim($name));

        $selectedIngredients = collect(
            (array) $request->query('ingredients', [])
        )
            ->filter(fn ($name) => is_string($name) && trim($name) !== '')
            ->map(fn ($name) => trim($name))
            ->unique($normalize)
            ->values();

        $selectedNames = $selectedIngredients->map($normalize);

        $useSoonNames = collect(
            (array) $request->query('use_soon', [])
        )
            ->filter(fn ($name) => is_string($name) && trim($name) !== '')
            ->map(fn ($name) => trim($name))
            ->filter(fn ($name) => $selectedNames->containsStrict($normalize($name)))
            ->unique()
            ->values();

        $prioritizeUseSoon = $request->query('priority') !== 'off';

        $recipes = collect(config('mealup.recipes', []));

        $recipes = $recipes->map(function (array $recipe) use (
            $selectedNames,
            $useSoonNames,
            $normalize
        ) {
            $recipe['missing_ingredients'] = collect($recipe['ingredients'])
                ->reject(fn ($ingredient) =>
                    $selectedNames->containsStrict($normalize($ingredient))
                )
                ->values()
                ->all();

            $recipe['use_soon_ingredients'] = collect($recipe['ingredients'])
                ->filter(fn ($name) =>
                    $useSoonNames->containsStrict($normalize($name))
                )
                ->unique($normalize)
                ->values()
                ->all();

            $recipe['use_soon_count'] = count(
                $recipe['use_soon_ingredients']
            );

            return $recipe;
        });

        $readyRecipes = $recipes->filter(
            fn (array $recipe) => $recipe['missing_ingredients'] === []
        );

        $showCatalog = $request->query('mode') === 'catalog';

        $visibleRecipes = $showCatalog
            ? $recipes
            : $readyRecipes;

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

        return view('recipe', compact(
            'normalize',
            'selectedIngredients',
            'selectedNames',
            'useSoonNames',
            'prioritizeUseSoon',
            'recipes',
            'readyRecipes',
            'showCatalog',
            'visibleRecipes',
            'recipeQuery',
            'priorityQuery'
        ));
    }
}
