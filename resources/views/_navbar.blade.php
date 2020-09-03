<div class="bg-gray-300 shadow-lg p-2">
    <ul class="flex justify-between">
        <li>
            <ul class="flex">
                <li>
                    <a class="inline-block border border-blue-500 rounded py-2 px-4 bg-blue-500 hover:bg-blue-700 text-white" href="{{ url('/') }}">
                        {{ config('app.name') }}
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <ul class="flex">
                <li>
                    <a class="inline-block border border-white rounded hover:border-gray-200 text-blue-500 hover:bg-gray-200 py-2 px-4" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</div>