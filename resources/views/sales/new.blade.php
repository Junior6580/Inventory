@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-primary card-outline shadow">
                    <div class="card-header">{{ $title }}</div>

                    <div class="card-body">
                        <form action="{{ route('sale.saved') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Vendedor</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ auth()->user()->person->full_name }}" readonly>
                            </div>
                            <input type="hidden" class="form-control" id="person_id" name="person_id"
                            value="{{ auth()->user()->person->id }}">
                            <div class="mb-3">
                                <label for="voucher_code" class="form-label">Código</label>
                                <input type="number" class="form-control" id="voucher_code" name="voucher_code" required>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Fecha</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                            <div class="mb-3">
                                <label for="client_id" class="form-label">Buscar cliente por número de documento</label>
                                <input type="text" class="form-control" id="search-input" name="search-input"
                                    placeholder="Ingresar número o nombre">
                                <select class="form-control" name="client_id" aria-label="Selecciona un Aprendiz"
                                    id="client-select" multiple="multiple" required>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}">
                                            {{ $client->person->document_number }} {{ $client->person->full_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="product_id" class="form-label">Buscar producto por nombre</label>
                                <input type="text" class="form-control product-search"
                                    placeholder="Ingresar nombre del producto">
                                <select class="form-control product-select" name="product_id[]" multiple="multiple" required>
                                    @foreach ($products as $product)
                                    <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                        {{ $product->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Cantidad</label>
                                <input type="number" class="form-control quantity" name="quantity[]" required>
                            </div>
                            <div class="mb-3">
                                <label for="unit_price" class="form-label">Precio Unitario</label>
                                <input type="number" class="form-control price" name="unit_price[]" value="0" readonly>
                            </div>
                            <div id="item-container">
                                <!-- Aquí se agregarán los nuevos ítems -->
                            </div>

                            <button type="button" class="btn btn-primary" id="add-item">Agregar Item</button>

                            <button type="submit" class="btn btn-success">Registrar venta</button>
                            <a href="{{ route('sales') }}" class="btn btn-danger btn-xl">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to load the unit price based on the selected product
        function loadUnitPrice(select) {
            const selectedOptions = Array.from(select.selectedOptions);
            const prices = selectedOptions.map(option => parseFloat(option.getAttribute('data-price')));
            const totalPrice = prices.reduce((acc, price) => acc + price, 0);
            select.parentNode.nextElementSibling.querySelector('.price').value = totalPrice.toFixed(2);
        }

        // Function to apply product search in text input elements
        function applyProductSearch(input) {
            const searchText = input.value.trim().toLowerCase();
            const select = input.nextElementSibling;
            for (let option of select.options) {
                const optionText = option.text.toLowerCase();
                const isMatch = optionText.includes(searchText);
                option.hidden = !isMatch;
            }
        }

        // Function to add a new item element
        function addItem() {
            const newItem = document.createElement('div');
            newItem.classList.add('item', 'mb-3');
            newItem.innerHTML = `
                <div class="mb-3">
                    <label for="product_id" class="form-label">Buscar producto por nombre</label>
                    <input type="text" class="form-control product-search" placeholder="Ingresar nombre del producto">
                    <select class="form-control product-select" name="product_id[]" multiple="multiple" required>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Cantidad</label>
                    <input type="number" class="form-control quantity" name="quantity[]" required>
                </div>
                <div class="mb-3">
                    <label for="unit_price" class="form-label">Precio Unitario</label>
                    <input type="number" class="form-control price" name="unit_price[]" value="0" readonly>
                </div>
                <button type="button" class="btn btn-danger btn-sm remove-item">Eliminar</button>
            `;
            document.getElementById("item-container").appendChild(newItem);

            const productSearchInput = newItem.querySelector('.product-search');
            const productSelect = newItem.querySelector('.product-select');

            productSearchInput.addEventListener("input", function() {
                applyProductSearch(this);
            });

            productSelect.addEventListener("change", function() {
                loadUnitPrice(this);
            });

            // Apply product search and load prices when adding a new item
            applyProductSearch(productSearchInput);
            loadUnitPrice(productSelect);
        }

        // Event listener for the add item button
        document.getElementById("add-item").addEventListener("click", function() {
            addItem();
        });

        // Event listener for removing items
        document.getElementById("item-container").addEventListener("click", function(e) {
            if (e.target && e.target.classList.contains("remove-item")) {
                e.target.parentNode.remove();
            }
        });

        // Event listener for changing product selection
        document.querySelectorAll('.product-select').forEach(function(select) {
            select.addEventListener("change", function() {
                loadUnitPrice(this);
            });
        });

        // Event listener for product search in existing elements
        document.querySelectorAll('.product-search').forEach(function(input) {
            input.addEventListener("input", function() {
                applyProductSearch(this);
            });
        });

        // Apply product search and load prices to existing elements
        document.querySelectorAll('.product-search').forEach(function(input) {
            applyProductSearch(input);
        });

        document.querySelectorAll('.product-select').forEach(function(select) {
            loadUnitPrice(select);
        });
    </script>
@endsection
