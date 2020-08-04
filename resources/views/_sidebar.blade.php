<div class="bg-purple-300 rounded-lg p-4 mx-4">
    <div class="flex justify-end">
        <ul>
            <li>
                <a class="font-bold text-lg mb-4 block" href="/meals">Dashboard</a>
            </li>
            <li>
                <a class="font-bold text-lg mb-4 block" href="/profile/{{ auth()->id() }}">Profile</a>
            </li>
            <li>
                <a class="font-bold text-lg mb-4 block" href="/products">All Products</a>
            </li>
            <li>
                <a class="font-bold text-lg mb-4 block" href="/products/create">New Product</a>
            </li>
            <li>
                <a class="font-bold text-lg mb-4 block" href="/meals/create">New Meal</a>
            </li>
        </ul>
    </div>
</div>