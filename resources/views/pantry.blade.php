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
                    <td>
                <input type="checkbox"
                    aria-label="Pilih {{ $ingredient['name'] }}">
                </td>

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

<form id="pantry-recipe-form"
      class="pantry-selection"
      action="{{ route('recipes.index') }}"
      method="get"
      hidden>
    <div aria-live="polite">
        <strong id="pantry-selection-count"></strong>
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

<script>
    const searchInput = document.querySelector('.pantry-search');
    const filterButtons = document.querySelectorAll('.pantry-filter');
    const emptyState = document.querySelector('#pantry-empty-state');
    const pantryTable = document.querySelector('.pantry-table');
    const selectionForm = document.querySelector('#pantry-recipe-form');
    const selectionCount = document.querySelector('#pantry-selection-count');
    const selectionList = document.querySelector('#pantry-selection-list');
    const selectionFields = document.querySelector('#pantry-selection-fields');
    const clearSelectionButton = document.querySelector('#pantry-clear-selection');

    function getCheckedIngredients() {
        return pantryTable.querySelectorAll('tbody input[type="checkbox"]:checked');
    }

    function updateSelection() {
        const checkedIngredients = getCheckedIngredients();
        const count = checkedIngredients.length;

        selectionForm.hidden = count === 0;
        selectionCount.textContent = count === 1
            ? '1 ingredient checked'
            : `${count} ingredients checked`;

        selectionList.replaceChildren();
        selectionFields.replaceChildren();

        checkedIngredients.forEach((checkbox) => {
            const name = checkbox.closest('tr').dataset.ingredientName;

            const listItem = document.createElement('li');
            listItem.textContent = name;
            selectionList.append(listItem);

            const field = document.createElement('input');
            field.type = 'hidden';
            field.name = 'ingredients[]';
            field.value = name;
            selectionFields.append(field);
        });
    }

    pantryTable.addEventListener('change', (event) => {
        if (event.target.matches('input[type="checkbox"]')) {
            updateSelection();
        }
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

    updateSelection();

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

    addIngredientButton.addEventListener('click', () => {
        addIngredientDialog.showModal();
    });

    const addIngredientForm = document.querySelector('#pantry-add-form');
    const nameInput = addIngredientForm.elements.namedItem('name');
    const quantityInput = addIngredientForm.elements.namedItem('quantity');
    const expiryInput = addIngredientForm.elements.namedItem('expires');

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

        const row = document.createElement('tr');
        row.dataset.ingredientName = name;
        row.dataset.category = category;

        const checkbox = document.createElement('input');
        checkbox.type = 'checkbox';
        checkbox.checked = true;
        checkbox.setAttribute('aria-label', `Pilih ${name}`);
        row.insertCell().append(checkbox);

        const nameCell = document.createElement('th');
        nameCell.scope = 'row';
        nameCell.textContent = name;
        row.append(nameCell);

        const [purchaseYear, purchaseMonth, purchaseDay] = purchased.split('-');
        const [expiryYear, expiryMonth, expiryDay] = expires.split('-');

        [
            category,
            quantity,
            `${purchaseDay}/${purchaseMonth}/${purchaseYear}`,
            expires ? `${expiryDay}/${expiryMonth}/${expiryYear}` : '—',
            status,
        ].forEach((value) => {
            row.insertCell().textContent = value;
        });

        const editButton = document.createElement('button');
        editButton.type = 'button';
        editButton.textContent = 'Edit';
        editButton.disabled = true;
        editButton.setAttribute('aria-label', `Edit ${name}`);
        row.insertCell().append(editButton);

        emptyState.before(row);
        filterIngredients();
        updateSelection();
        addIngredientForm.reset();
        addIngredientDialog.close();
    });
</script>
@endsection

