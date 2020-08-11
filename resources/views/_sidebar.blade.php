<div class="p-4 mx-4">
    <ul>
        <li>
            <a class="font-bold text-lg mb-4 block" href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li>
            <a class="font-bold text-lg mb-4 block" href="/profile/{{ currentUser()->id }}">Profile</a>
        </li>
        <li>
            <a class="font-bold text-lg mb-4 block" href="/products">All Products</a>
        </li>
        <li>
            <a class="font-bold text-lg mb-4 block" href="/products/create">New Product</a>
        </li>
        <li>
            <a class="font-bold text-lg mb-4 block" href="/search">New Log</a>
        </li>
    </ul>
</div>