<x-master>
    <div class="border border-gray-300 rounded-lg">
        <div class="section-header">
            <div>
                <h1>Add Product</h1>
            </div>

        </div>
        <div class="section-main">
            <div class="form">

                <form action="/products" method="POST">
                    @csrf

                    <div class="input-field">
                        <label for="name">Product name: </label>
                        <input type="text" name="name" id="name" placeholder="Product name" value="{{ old('name') }}">
                    </div>
                    @error('name')
                    <div class="error-message">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror

                    <div class="input-field">
                        <label for="energy">Energy in calories: </label>
                        <input type="number" name="energy" id="energy" placeholder="Caloric value"
                            value="{{ old('energy') }}">
                    </div>
                    @error('energy')
                    <div class="error-message">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror

                    <div class="input-field">
                        <label for="protein">Protein in grams: </label>
                        <input type="number" name="protein" id="protein" placeholder="Protein value"
                            value="{{ old('protein') }}">
                    </div>
                    @error('protein')
                    <div class="error-message">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror

                    <div class="input-field">
                        <label for="fat">Fat in grams: </label>
                        <input type="number" name="fat" id="fat" placeholder="Fat value" value="{{ old('fat') }}">
                    </div>
                    @error('fat')
                    <div class="error-message">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror

                    <div class="input-field">
                        <label for="carbs">Carbohydrates in grams: </label>
                        <input type="number" name="carbohydrates" id="carbs" placeholder="Carbohydrate value"
                            value="{{ old('carbs') }}">
                    </div>
                    @error('carbohydrates')
                    <div class="error-message">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror

                    <div class="submit-button">
                        <button type="submit">Add</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-master>