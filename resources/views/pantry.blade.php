@extends('layouts.mealup')

@section('title', 'Pantry')

@push('styles')
    <style>
        .pantry-dialog {
            width: min(560px, calc(100% - 32px));
            max-height: calc(100dvh - 32px);
            padding: 24px;
            overflow-y: auto;
            border: 1px solid #eadcc9;
            border-radius: 24px;
            background: #fff;
            color: #3b2010;
        }

        .pantry-dialog::backdrop {
            background: rgb(59 32 16 / 50%);
        }

        .pantry-dialog-header,
        .pantry-dialog-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .pantry-dialog-header {
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .pantry-dialog-header h2 {
            margin: 0;
        }

        .pantry-form-fields {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        .pantry-form-wide {
            grid-column: 1 / -1;
        }

        .pantry-form-fields label {
            display: grid;
            gap: 6px;
            font-weight: 600;
        }

        .pantry-form-fields input,
        .pantry-form-fields select {
            width: 100%;
            min-width: 0;
            padding: 10px 12px;
            border: 1px solid #d8c9b7;
            border-radius: 12px;
            background: #fbf7ee;
            color: inherit;
            font: inherit;
        }

        .pantry-dialog-actions {
            justify-content: flex-end;
            margin-top: 20px;
            padding-top: 16px;
            border-top: 1px solid #eee5d8;
        }

        .pantry-dialog button[formnovalidate] {
            padding: 8px;
            border: 0;
            background: transparent;
            color: inherit;
            font: inherit;
            cursor: pointer;
        }

        .pantry-dialog .pantry-add:disabled {
            opacity: 0.55;
        }

        @media (max-width: 480px) {
            .pantry-form-fields {
                grid-template-columns: 1fr;
            }
        }

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

        .pantry-selection {
            position: sticky;
            bottom: 12px;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
            margin-top: 20px;
            padding: 16px 20px;
            border: 1px solid #3b2010;
            border-radius: 16px;
            background: #fff;
            box-shadow: 0 8px 24px rgb(59 32 16 / 12%);
        }

        .pantry-selection[hidden] {
            display: none;
        }

        .pantry-selection-list {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin: 8px 0 0;
            padding: 0;
            list-style: none;
        }

        .pantry-selection-list li {
            padding: 4px 10px;
            border-radius: 999px;
            background: #faf2e3;
        }

        .pantry-selection-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        #pantry-clear-selection {
            padding: 8px 12px;
            border: 0;
            background: transparent;
            color: inherit;
            font: inherit;
            cursor: pointer;
        }
        .pantry-quick-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .pantry-quick-actions button {
            cursor: pointer;
        }

        .pantry-quick-actions .pantry-use-soon {
            border-color: #e4af55;
            background: #fff0cd;
            color: #714500;
        }
        .pantry-quick-fill {
            margin-bottom: 16px;
        }

        .pantry-quick-fill p {
            margin: 0 0 8px;
            color: #6e6056;
            font-size: 0.875rem;
            font-weight: 600;
        }

        .pantry-quick-fill-options {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .pantry-quick-fill-options button {
            padding: 5px 10px;
            border-color: #d8c9b7;
            background: #fbf7ee;
            font-size: 0.875rem;
            cursor: pointer;
        }
        .pantry-selection-list li {
        display: inline-flex;
        align-items: center;
        gap: 4px;
          }

        .pantry-remove-selection {
            display: grid;
            width: 24px;
            height: 24px;
            padding: 0;
            place-items: center;
            border: 0;
            border-radius: 50%;
            background: transparent;
            color: inherit;
            font: inherit;
            cursor: pointer;
        }

        .pantry-remove-selection:hover,
        .pantry-remove-selection:focus-visible {
            background: #eadcc9;
        }
        .pantry-in-basket,
        .pantry-status {
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 0.8125rem;
            font-weight: 700;
        }

        .pantry-in-basket {
            display: none;
            margin-inline-start: 6px;
            background: #3b2010;
            color: #fff;
        }

        .pantry-table tbody tr:has(input[type="checkbox"]:checked) .pantry-in-basket {
            display: inline-block;
        }

        .pantry-status {
            display: inline-block;
            background: #f2ece3;
            color: #3b2010;
        }

        .pantry-table tr[data-status="Fresh"] .pantry-status {
            background: #d7f0e2;
            color: #185638;
        }

        .pantry-table tr[data-status="Good"] .pantry-status {
            background: #dceef9;
            color: #174d70;
        }

        .pantry-table tr[data-status="Use Soon"] .pantry-status {
            background: #fff0cd;
            color: #714500;
        }
        .pantry-ready-note {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        margin-top: 20px;
        padding: 12px 16px;
        border: 1px solid #eadcc9;
        border-radius: 16px;
        background: #fff;
       }

        .pantry-ready-note p {
            margin: 0;
            font-size: 0.9375rem;
            line-height: 1.5;
        }

        .pantry-ready-icon {
            display: grid;
            flex: 0 0 28px;
            height: 28px;
            place-items: center;
            border-radius: 9px;
            background: #d7f0e2;
            color: #185638;
            font-weight: 700;
        }
        .pantry-ready-count {
            display: inline-block;
            margin-inline-start: 6px;
            padding: 4px 10px;
            border-radius: 999px;
            background: #d7f0e2;
            color: #185638;
            font-size: 0.875rem;
            font-weight: 700;
        }
        .pantry-heading { align-items: flex-start; }
        .pantry-heading p { margin-top: 8px; font-size: 1.075rem; }
        .pantry-toolbar { justify-content: flex-start; gap: 12px; margin-top: 32px; }
        .pantry-search { margin-inline-start: auto; }
        .pantry-add, .pantry-filter, .pantry-edit { cursor: pointer; }
        .pantry-heading .pantry-add, .pantry-selection-actions .pantry-add { min-height: 50px; }
        .pantry-table-wrapper { box-shadow: 0 10px 32px rgb(59 32 16 / 7%); }
        .pantry-table th, .pantry-table td { padding: 19px 16px; }
        .pantry-table thead th:not(:nth-child(2)), .pantry-table td { text-align: center; }
        .pantry-edit { padding: 6px; border: 0; background: transparent; color: inherit; font: inherit; font-weight: 650; text-decoration: underline; }
        .pantry-category { display: inline-block; padding: 4px 11px; border-radius: 999px; background: #fbebd0; color: #714500; font-size: .82rem; font-weight: 650; }
        tr[data-category="Meat"] .pantry-category { background: #fadad6; color: #832f26; }
        tr[data-category="Veggies"] .pantry-category { background: #d7f0e2; color: #185638; }
        .pantry-selection { max-width: 1020px; margin-inline: auto; }
        .pantry-dialog { padding: clamp(20px, 3vw, 34px); }
        .pantry-dialog-header button[formnovalidate] { font-size: 1.4rem; line-height: 1; }

        @media (max-width: 767px) {
            .pantry-search { width: 100%; margin-inline-start: 0; }
        }
        .pantry-table tr[data-out-of-stock="true"] .pantry-status,
        .pantry-expiry-marker[data-urgent="true"] {
            background: #f4e5e2;
            color: #832f26;
        }

        .pantry-expiry-marker {
            display: table;
            margin: 4px auto 0;
            padding: 3px 8px;
            border-radius: 999px;
            background: #fff0cd;
            color: #714500;
            font-size: .75rem;
            font-weight: 700;
        }
    </style>
@endpush

@section('content')
    <header class="pantry-heading">
        <div>
            <h1>Pantry</h1>
            <p>Check the ingredients you have to find recipes you can cook right now.</p>
        </div>

        <button type="button" class="pantry-add" id="pantry-open-dialog">
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

        <div class="pantry-quick-actions" role="group" aria-label="Pilihan cepat bahan">
            <button type="button" id="pantry-select-all" class="pantry-filter">
                Select All Available
            </button>

            <button type="button" id="pantry-select-use-soon" class="pantry-filter pantry-use-soon">
                Select Use Soon
            </button>
        </div>

        <input type="search"
               class="pantry-search"
               aria-label="Cari bahan"
               placeholder="Search ingredients">
    </div>
    <div class="pantry-ready-note">
        <span class="pantry-ready-icon" aria-hidden="true">✓</span>

        <p>
            <strong>Zero Missing Ingredients:</strong>
            Only recipes whose main ingredients are all checked appear in
            <strong>100% Ready to Cook</strong>.
            Basic staples like salt and oil are assumed available.
        </p>
    </div>
    @php
    $ingredients = [
        ['name' => 'Chicken', 'category' => 'Meat', 'quantity' => '200 g',
         'purchased' => today()->subDay()->format('d/m/Y'), 'expires' => today()->addDays(4)->format('d/m/Y'), 'status' => 'Good'],

        ['name' => 'Eggs', 'category' => 'Others', 'quantity' => '6 pcs',
         'purchased' => today()->subDay()->format('d/m/Y'), 'expires' => today()->addDays(8)->format('d/m/Y'), 'status' => 'Fresh'],

        ['name' => 'Spinach', 'category' => 'Veggies', 'quantity' => '1 pack',
         'purchased' => today()->subDay()->format('d/m/Y'), 'expires' => today()->addDay()->format('d/m/Y'), 'status' => 'Use Soon'],
    ];
@endphp

<div class="pantry-table-wrapper">
    <table class="pantry-table" aria-label="Daftar bahan Pantry">
        <thead>
            <tr>
                <th scope="col">
                    <input type="checkbox"
                        id="pantry-select-visible"
                        aria-label="Pilih semua bahan yang terlihat">
                </th>
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
                    data-category="{{ $ingredient['category'] }}"
                    data-status="{{ $ingredient['status'] }}">
                    <td>
                <input type="checkbox"
                    aria-label="Pilih {{ $ingredient['name'] }}">
                </td>

                    <th scope="row">
                        {{ $ingredient['name'] }}
                        <span class="pantry-in-basket" aria-hidden="true">In Basket</span>
                    </th>
                    <td><span class="pantry-category">{{ $ingredient['category'] }}</span></td>
                    <td>{{ $ingredient['quantity'] }}</td>
                    <td>{{ $ingredient['purchased'] }}</td>
                    <td><span class="pantry-expiry-date">{{ $ingredient['expires'] ?: '—' }}</span></td>
                    <td>
                        <span class="pantry-status">{{ $ingredient['status'] }}</span>
                    </td>
                    <td>
                        <button type="button"
                            class="pantry-edit"
                            aria-label="Edit {{ $ingredient['name'] }}">Edit</button>
                    </td>
                </tr>
            @endforeach
            <tr id="pantry-empty-state" hidden>
                <td colspan="8">No ingredients found.</td>
            </tr>
        </tbody>
    </table>
</div>

<form id="pantry-recipe-form"
      class="pantry-selection"
      action="{{ route('recipes.index') }}"
      method="get"
      hidden>
    <div aria-live="polite">
        <strong id="pantry-selection-count"></strong>
        <span id="pantry-ready-count" class="pantry-ready-count"></span>
        <ul id="pantry-selection-list" class="pantry-selection-list"></ul>
    </div>

    <div class="pantry-selection-actions">
        <button type="button" id="pantry-clear-selection">Clear</button>
        <button type="submit" class="pantry-add">Find Recipes →</button>
    </div>

    <div id="pantry-selection-fields" hidden></div>
</form>

<dialog id="pantry-add-dialog"
        class="pantry-dialog"
        aria-labelledby="pantry-dialog-title">
    <form id="pantry-add-form" method="dialog">
        <div class="pantry-dialog-header">
            <h2 id="pantry-dialog-title">Add Kost Ingredient</h2>
             <button type="submit" formnovalidate aria-label="Tutup popup">×</button>
        </div>
        <div id="pantry-quick-fill" class="pantry-quick-fill">
            <p id="pantry-quick-fill-label">Quick-fill common ingredients</p>

            <div class="pantry-quick-fill-options"
                role="group"
                aria-labelledby="pantry-quick-fill-label">
                @foreach (['Sawi Putih' => 'Veggies', 'Tempe' => 'Others', 'Mie Instan' => 'Others'] as $name => $category)
                    <button type="button"
                            class="pantry-filter"
                            data-name="{{ $name }}"
                            data-category="{{ $category }}">
                        + {{ $name }}
                    </button>
                @endforeach
            </div>
        </div>

        <div class="pantry-form-fields">
            <label class="pantry-form-wide">
                Ingredient Name
                <input type="text" name="name" placeholder="e.g., Tempe" required autofocus>
            </label>

            <label>
                Category
                <select name="category" required>
                    <option value="" disabled selected>Choose a category</option>
                    <option value="Veggies">Veggies</option>
                    <option value="Meat">Meat</option>
                    <option value="Others">Others</option>
                </select>
            </label>

            <label>
                Quantity
                <input type="text" name="quantity" placeholder="e.g., 250 g" required>
            </label>

            <label>
                Purchase Date
                <input type="date" name="purchased" required>
            </label>

            <label>
                <span>
                    Expiry Date<br>
                    <small style="font-weight: 400; color: #6e6056;">(optional)</small>
                </span>

                <input type="date" name="expires">
            </label>

            <label class="pantry-form-wide">
                Freshness Status
                <select name="status">
                    <option value="Fresh">Fresh</option>
                    <option value="Good">Good</option>
                    <option value="Use Soon">Use Soon</option>
                </select>
            </label>
        </div>

        <div class="pantry-dialog-actions">
            <button type="submit" formnovalidate>Cancel</button>
            <button type="submit" class="pantry-add">Save &amp; Check</button>
        </div>
    </form>
</dialog>

@php
    $recipeRequirements = collect(config('mealup.recipes', []))
        ->pluck('ingredients')
        ->all();
@endphp

<script>
    const searchInput = document.querySelector('.pantry-search');
    const filterButtons = document.querySelectorAll('.pantry-filters .pantry-filter');
    const emptyState = document.querySelector('#pantry-empty-state');
    const pantryTable = document.querySelector('.pantry-table');
    const selectVisibleCheckbox = document.querySelector('#pantry-select-visible');
    const pantryStorageKey = 'mealup.pantry.v1';
    const selectionForm = document.querySelector('#pantry-recipe-form');
    const pantryNavCount = document.querySelector('#mealup-pantry-count');
    const recipeNavCount = document.querySelector('#mealup-recipe-count');
    const selectionCount = document.querySelector('#pantry-selection-count');
    const readyRecipeCount = document.querySelector('#pantry-ready-count');
    const recipeRequirements = {{ \Illuminate\Support\Js::from($recipeRequirements) }};
    const selectionList = document.querySelector('#pantry-selection-list');
    const selectionFields = document.querySelector('#pantry-selection-fields');
    const clearSelectionButton = document.querySelector('#pantry-clear-selection');

    const selectAllButton = document.querySelector('#pantry-select-all');
    const selectUseSoonButton = document.querySelector('#pantry-select-use-soon');

    function checkMatchingIngredients(selector) {
        pantryTable.querySelectorAll(selector).forEach((checkbox) => {
            checkbox.checked = true;
        });

        updateSelection();
    }

    selectAllButton.addEventListener('click', () => {
        checkMatchingIngredients('tbody tr[data-ingredient-name] input[type="checkbox"]:enabled');
    });

    selectUseSoonButton.addEventListener('click', () => {
        checkMatchingIngredients('tbody tr[data-status="Use Soon"] input[type="checkbox"]:enabled');
    });

    function getCheckedIngredients() {
        return pantryTable.querySelectorAll('tbody input[type="checkbox"]:enabled:checked');
    }

    function getVisibleCheckboxes() {
        return Array.from(pantryTable.querySelectorAll(
            'tbody tr[data-ingredient-name]:not([hidden]) input[type="checkbox"]:enabled'
        ));
    }

    function syncSelectVisibleCheckbox() {
        const visibleCheckboxes = getVisibleCheckboxes();
        const visibleCount = visibleCheckboxes.length;
        const checkedCount = visibleCheckboxes.filter((checkbox) => checkbox.checked).length;

        selectVisibleCheckbox.disabled = visibleCount === 0;
        selectVisibleCheckbox.checked = visibleCount > 0 && checkedCount === visibleCount;
        selectVisibleCheckbox.indeterminate = checkedCount > 0 && checkedCount < visibleCount;
    }

    function updateSelection() {
        const checkedIngredients = getCheckedIngredients();
        const count = checkedIngredients.length;
        const normalizeIngredient = (name) => name.trim().toLowerCase();

        const selectedNames = new Set(Array.from(checkedIngredients, (checkbox) => {
            return normalizeIngredient(checkbox.closest('tr').dataset.ingredientName);
        }));

        const readyCount = recipeRequirements.filter((requiredIngredients) => {
            return requiredIngredients.every((ingredient) => {
                return selectedNames.has(normalizeIngredient(ingredient));
            });
        }).length;

        pantryNavCount.textContent = count;
        pantryNavCount.hidden = count === 0;
        recipeNavCount.textContent = readyCount;
        recipeNavCount.hidden = count === 0;

        readyRecipeCount.textContent = readyCount === 1
            ? '1 recipe ready to cook'
            : `${readyCount} recipes ready to cook`;

        selectionForm.hidden = count === 0;
        selectionCount.textContent = count === 1
            ? '1 ingredient checked'
            : `${count} ingredients checked`;

        selectionList.replaceChildren();
        selectionFields.replaceChildren();

        checkedIngredients.forEach((checkbox) => {
            const { ingredientName: name, status } = checkbox.closest('tr').dataset;

            const listItem = document.createElement('li');

            const ingredientLabel = document.createElement('span');
            ingredientLabel.textContent = name;

            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.className = 'pantry-remove-selection';
            removeButton.textContent = '×';
            removeButton.setAttribute('aria-label', `Batalkan pilihan ${name}`);

            removeButton.addEventListener('click', () => {
                checkbox.checked = false;
                updateSelection();

                const nextButton = selectionList.querySelector('.pantry-remove-selection');
                (nextButton ?? searchInput).focus();
            });

            listItem.append(ingredientLabel, removeButton);
            selectionList.append(listItem);

            const field = document.createElement('input');
            field.type = 'hidden';
            field.name = 'ingredients[]';
            field.value = name;
            selectionFields.append(field);

            if (status === 'Use Soon') {
                const useSoonField = field.cloneNode();
                useSoonField.name = 'use_soon[]';
                selectionFields.append(useSoonField);
            }
        });
        syncSelectVisibleCheckbox();
        savePantry();
    }

    pantryTable.addEventListener('change', (event) => {
    if (event.target === selectVisibleCheckbox) {
        getVisibleCheckboxes().forEach((checkbox) => {
            checkbox.checked = selectVisibleCheckbox.checked;
        });
    } else if (!event.target.matches('tbody input[type="checkbox"]')) {
        return;
    }

        updateSelection();
    });

    clearSelectionButton.addEventListener('click', () => {
        const checkedIngredients = getCheckedIngredients();
        const firstVisibleCheckbox = [...checkedIngredients].find(
            (checkbox) => !checkbox.closest('tr').hidden
        );

        checkedIngredients.forEach((checkbox) => {
            checkbox.checked = false;
        });

        updateSelection();
        (firstVisibleCheckbox ?? searchInput).focus();
    });


    let activeCategory = 'All';

    function filterIngredients() {
        const searchTerm = searchInput.value.trim().toLowerCase();
        let hasResults = false;

        const ingredientRows = document.querySelectorAll(
            '.pantry-table tbody tr[data-ingredient-name]'
        );
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
        syncSelectVisibleCheckbox();
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
    const addIngredientButton = document.querySelector('#pantry-open-dialog');
    const addIngredientDialog = document.querySelector('#pantry-add-dialog');

    const addIngredientForm = document.querySelector('#pantry-add-form');
    const nameInput = addIngredientForm.elements.namedItem('name');
    const quantityInput = addIngredientForm.elements.namedItem('quantity');
    const expiryInput = addIngredientForm.elements.namedItem('expires');

    const dialogTitle = document.querySelector('#pantry-dialog-title');
    const saveIngredientButton = addIngredientForm.querySelector('.pantry-add');
    const categoryInput = addIngredientForm.elements.namedItem('category');
    const purchaseInput = addIngredientForm.elements.namedItem('purchased');
    const statusInput = addIngredientForm.elements.namedItem('status');
    const quickFill = document.querySelector('#pantry-quick-fill');

    quickFill.querySelectorAll('button[data-name]').forEach((button) => {
        button.addEventListener('click', () => {
            nameInput.value = button.dataset.name;
            categoryInput.value = button.dataset.category;
            nameInput.setCustomValidity('');
            quantityInput.focus();
        });
    });

    let editingRow = null;
    function createIngredientRow({ name, category, quantity, purchased, expires, status, checked }) {
    const row = document.createElement('tr');
    row.dataset.ingredientName = name;
    row.dataset.category = category;
    row.dataset.status = status;

    const checkbox = document.createElement('input');
    checkbox.type = 'checkbox';
    const outOfStock = quantity.trim() === '0';
    row.dataset.outOfStock = String(outOfStock);
    checkbox.disabled = outOfStock;
    checkbox.checked = !outOfStock && checked;
    checkbox.setAttribute('aria-label', `Pilih ${name}`);
    row.insertCell().append(checkbox);

    const nameCell = document.createElement('th');
    nameCell.scope = 'row';
    nameCell.textContent = name;
    const basketBadge = document.createElement('span');
    basketBadge.className = 'pantry-in-basket';
    basketBadge.textContent = 'In Basket';
    basketBadge.setAttribute('aria-hidden', 'true');
    nameCell.append(basketBadge);
    row.append(nameCell);

    const categoryBadge = document.createElement('span');
    categoryBadge.className = 'pantry-category';
    categoryBadge.textContent = category;
    row.insertCell().append(categoryBadge);

    function formatDate(date) {
        if (!date) {
            return '—';
        }

        const [year, month, day] = date.split('-');
        return `${day}/${month}/${year}`;
    }

    [
        quantity,
        formatDate(purchased),
    ].forEach((value) => {
        row.insertCell().textContent = value;
    });
    const expiryDate = document.createElement('span');
    expiryDate.className = 'pantry-expiry-date';
    expiryDate.textContent = formatDate(expires);
    row.insertCell().append(expiryDate);

    const statusBadge = document.createElement('span');
    statusBadge.className = 'pantry-status';
    statusBadge.textContent = outOfStock ? 'Out of Stock' : status;
    row.insertCell().append(statusBadge);

    const editButton = document.createElement('button');
    editButton.type = 'button';
    editButton.className = 'pantry-edit';
    editButton.textContent = 'Edit';
    editButton.setAttribute('aria-label', `Edit ${name}`);
    row.insertCell().append(editButton);

    return row;
}

    function toDateInputValue(displayDate) {
        const [day, month, year] = displayDate.trim().split('/');

        return year ? `${year}-${month}-${day}` : '';
    }

    function getIngredientExpiry(row) {
        return toDateInputValue(row.querySelector('.pantry-expiry-date').textContent);
    }

    function expiryDaysLeft(expiry, today) {
        const expiryDay = Date.parse(expiry + 'T00:00:00Z');
        const currentDay = Date.UTC(today.getFullYear(), today.getMonth(), today.getDate());
        return (expiryDay - currentDay) / 86400000;
    }

    function updateExpiryMarkers() {
        const today = new Date();

        pantryTable.querySelectorAll('.pantry-expiry-date').forEach((dateLabel) => {
            const cell = dateLabel.parentElement;
            const remaining = expiryDaysLeft(toDateInputValue(dateLabel.textContent), today);
            let marker = cell.querySelector('.pantry-expiry-marker');

            if (!Number.isFinite(remaining) || remaining > 3) {
                marker?.remove();
                return;
            }

            if (!marker) {
                marker = document.createElement('span');
                marker.className = 'pantry-expiry-marker';
                cell.append(marker);
            }

            marker.dataset.urgent = String(remaining <= 0);
            marker.textContent = remaining < 0 ? 'Expired'
                : remaining === 0 ? 'Expires today'
                : remaining === 1 ? '1 day left' : remaining + ' days left';
        });
    }

    function openIngredientDialog(row = null) {
        editingRow = row;
        quickFill.hidden = row !== null;
        addIngredientForm.reset();

        nameInput.setCustomValidity('');
        quantityInput.setCustomValidity('');
        expiryInput.setCustomValidity('');

        dialogTitle.textContent = row ? 'Edit Ingredient' : 'Add Kost Ingredient';
        saveIngredientButton.textContent = row ? 'Save Changes' : 'Save & Check';

        if (row) {
            nameInput.value = row.dataset.ingredientName;
            categoryInput.value = row.dataset.category;
            quantityInput.value = row.cells[3].textContent.trim();
            purchaseInput.value = toDateInputValue(row.cells[4].textContent);
            expiryInput.value = getIngredientExpiry(row);
            statusInput.value = row.dataset.status;
        }

        addIngredientDialog.showModal();
    }

    addIngredientButton.addEventListener('click', () => {
        openIngredientDialog();
    });

    pantryTable.addEventListener('click', (event) => {
        const editButton = event.target.closest('.pantry-edit');

        if (editButton) {
            openIngredientDialog(editButton.closest('tr'));
        }
    });

    addIngredientForm.addEventListener('input', (event) => {
        event.target.setCustomValidity('');

        if (event.target.name === 'purchased') {
            expiryInput.setCustomValidity('');
        }
    });

    addIngredientForm.addEventListener('submit', (event) => {
        if (event.submitter?.formNoValidate) {
            return;
        }

        event.preventDefault();

        const formData = new FormData(addIngredientForm);
        const name = formData.get('name').trim();
        const quantity = formData.get('quantity').trim();
        const category = formData.get('category');
        const purchased = formData.get('purchased');
        const expires = formData.get('expires');
        const status = formData.get('status');

        if (!name || !quantity) {
            const emptyInput = !name ? nameInput : quantityInput;
            emptyInput.setCustomValidity('Isi kolom ini dengan teks.');
            emptyInput.reportValidity();
            return;
        }

        if (expires && expires < purchased) {
            expiryInput.setCustomValidity(
                'Tanggal kedaluwarsa harus sama dengan atau setelah tanggal pembelian.'
            );
            expiryInput.reportValidity();
            return;
        }

        const checked = editingRow
            ? editingRow.querySelector('input[type="checkbox"]').checked
            : true;

        const row = createIngredientRow({
            name,
            category,
            quantity,
            purchased,
            expires,
            status,
            checked,
        });

        const isEditing = editingRow !== null;

        if (isEditing) {
            editingRow.replaceWith(row);
        } else {
            emptyState.before(row);
        }

        filterIngredients();
        updateExpiryMarkers();
        updateSelection();
        addIngredientForm.reset();
        addIngredientDialog.close();
        editingRow = null;

        if (isEditing) {
            (row.hidden ? searchInput : row.querySelector('.pantry-edit')).focus();
        }
    });
    function savePantry() {
        const rows = pantryTable.querySelectorAll('tbody tr[data-ingredient-name]');

        const ingredients = Array.from(rows, (row) => ({
            name: row.dataset.ingredientName,
            category: row.dataset.category,
            quantity: row.cells[3].textContent.trim(),
            purchased: toDateInputValue(row.cells[4].textContent),
            expires: getIngredientExpiry(row),
            status: row.dataset.status,
            checked: row.querySelector('input[type="checkbox"]').checked,
        }));

        try {
            sessionStorage.setItem(pantryStorageKey, JSON.stringify(ingredients));
        } catch (error) {
            console.warn('Isi Pantry tidak bisa disimpan di tab ini.', error);
        }
    }

    function restorePantry() {
        try {
            const saved = sessionStorage.getItem(pantryStorageKey);

            if (saved === null) {
                return;
            }

            const ingredients = JSON.parse(saved);

            if (!Array.isArray(ingredients)) {
                return;
            }

            const restoredRows = ingredients.map(createIngredientRow);

            pantryTable.querySelectorAll('tbody tr[data-ingredient-name]').forEach((row) => {
                row.remove();
            });

            emptyState.before(...restoredRows);
        } catch (error) {
            console.warn('Isi Pantry sebelumnya tidak bisa dipulihkan.', error);
        }
    }

    function refreshPantryFromStorage() {
        restorePantry();
        filterIngredients();
        updateExpiryMarkers();
        updateSelection();
    }

    refreshPantryFromStorage();

    document.addEventListener('visibilitychange', () => {
        if (!document.hidden) {
            updateExpiryMarkers();
        }
    });

    window.addEventListener('pageshow', (event) => {
        if (event.persisted) {
            refreshPantryFromStorage();
        }
    });
</script>
@endsection

