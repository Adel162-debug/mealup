@extends('layouts.mealup')

@section('title', 'Pantry')

@push('styles')
    <style>
        .pantry-table-wrapper {
            margin-top: 24px;
            overflow-x: auto;
            border: 1px solid #eadcc9;
            border-radius: 20px;
            background: #fff;
        }

        .pantry-table {
            width: 100%;
            min-width: 780px;
            border-collapse: collapse;
            text-align: left;
        }

        .pantry-table th,
        .pantry-table td {
            padding: 16px;
            white-space: nowrap;
        }

        .pantry-table thead {
            background: #3b2010;
            color: #fff;
        }

        .pantry-table tbody tr + tr {
            border-top: 1px solid #eee5d8;
        }

        .pantry-table tbody tr:has(input:checked) {
            background: #faf2e3;
        }

        .pantry-table input[type="checkbox"] {
            width: 18px;
            height: 18px;
            margin: 0;
            vertical-align: middle;
            accent-color: #3b2010;
        }

        .pantry-heading,
        .pantry-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
        }

        .pantry-heading h1 {
            margin: 0;
            font-size: clamp(2rem, 4vw, 3rem);
        }

        .pantry-heading p {
            margin: 4px 0 0;
            color: #6e6056;
        }

        .pantry-toolbar {
            margin-top: 28px;
        }

        .pantry-filters {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .pantry-add,
        .pantry-filter {
            padding: 10px 18px;
            border: 1px solid #3b2010;
            font: inherit;
            font-weight: 600;
        }

        .pantry-add {
            border-radius: 14px;
            background: #3b2010;
            color: #fff;
        }

        .pantry-filter {
            border-radius: 999px;
            background: #fff;
            color: #3b2010;
        }

        .pantry-filter[aria-pressed="true"] {
            background: #3b2010;
            color: #fff;
        }

        .pantry-search {
            width: min(100%, 300px);
            padding: 10px 16px;
            border: 1px solid #d8c9b7;
            border-radius: 999px;
            background: #fff;
            color: #3b2010;
            font: inherit;
        }
    </style>
@endpush

@section('content')
    <header class="pantry-heading">
        <div>
            <h1>Pantry</h1>
            <p>Check the ingredients you have to find recipes you can cook right now.</p>
        </div>

        <button type="button" class="pantry-add" disabled>
            <span aria-hidden="true">+</span> Add Ingredients
        </button>
    </header>

    <div class="pantry-toolbar">
        <div class="pantry-filters" role="group" aria-label="Kategori bahan">
            @foreach (['All', 'Veggies', 'Meat', 'Others'] as $category)
                <button type="button"
                        class="pantry-filter"
                        data-category="{{ $category }}"
                        aria-pressed="{{ $category === 'All' ? 'true' : 'false' }}">
                    {{ $category }}
                </button>
            @endforeach
        </div>

        <input type="search"
               class="pantry-search"
               aria-label="Cari bahan"
               placeholder="Search ingredients">
    </div>
    @php
    $ingredients = [
        ['name' => 'Chicken', 'category' => 'Meat', 'quantity' => '200 g',
         'purchased' => '02/10/2026', 'expires' => '05/10/2026', 'status' => 'Good'],

        ['name' => 'Eggs', 'category' => 'Others', 'quantity' => '6 pcs',
         'purchased' => '02/10/2026', 'expires' => '12/10/2026', 'status' => 'Fresh'],

        ['name' => 'Spinach', 'category' => 'Veggies', 'quantity' => '1 pack',
         'purchased' => '02/10/2026', 'expires' => '03/10/2026', 'status' => 'Use Soon'],
    ];
@endphp

<div class="pantry-table-wrapper">
    <table class="pantry-table" aria-label="Daftar bahan Pantry">
        <thead>
            <tr>
                <th scope="col">Select</th>
                <th scope="col">Ingredient</th>
                <th scope="col">Category</th>
                <th scope="col">Qty</th>
                <th scope="col">Purchase Date</th>
                <th scope="col">Expiry Date</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($ingredients as $ingredient)
                <tr data-ingredient-name="{{ $ingredient['name'] }}"
                    data-category="{{ $ingredient['category'] }}">

                    <th scope="row">{{ $ingredient['name'] }}</th>
                    <td>{{ $ingredient['category'] }}</td>
                    <td>{{ $ingredient['quantity'] }}</td>
                    <td>{{ $ingredient['purchased'] }}</td>
                    <td>{{ $ingredient['expires'] }}</td>
                    <td>{{ $ingredient['status'] }}</td>
                    <td>
                        <button type="button"
                                aria-label="Edit {{ $ingredient['name'] }}"
                                disabled>Edit</button>
                    </td>
                </tr>
            @endforeach
            <tr id="pantry-empty-state" hidden>
                <td colspan="8">No ingredients found.</td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    const searchInput = document.querySelector('.pantry-search');
    const filterButtons = document.querySelectorAll('.pantry-filter');
    const ingredientRows = document.querySelectorAll(
        '.pantry-table tbody tr[data-ingredient-name]'
    );
    const emptyState = document.querySelector('#pantry-empty-state');

    let activeCategory = 'All';

    function filterIngredients() {
        const searchTerm = searchInput.value.trim().toLowerCase();
        let hasResults = false;

        ingredientRows.forEach((row) => {
            const ingredientName = row.dataset.ingredientName.toLowerCase();
            const matchesSearch = ingredientName.includes(searchTerm);
            const matchesCategory = activeCategory === 'All'
                || row.dataset.category === activeCategory;

            const shouldShow = matchesSearch && matchesCategory;
            row.hidden = !shouldShow;

            if (shouldShow) {
                hasResults = true;
            }
        });

        emptyState.hidden = hasResults;
    }

    searchInput.addEventListener('input', filterIngredients);

    filterButtons.forEach((button) => {
        button.addEventListener('click', () => {
            activeCategory = button.dataset.category;

            filterButtons.forEach((filterButton) => {
                const isActive = filterButton === button;
                filterButton.setAttribute('aria-pressed', String(isActive));
            });

            filterIngredients();
        });
    });

    filterIngredients();
</script>
@endsection

