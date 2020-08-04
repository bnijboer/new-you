<x-app>

    <div class="flex">
        <div class="bg-pink-300 rounded-lg w-1/3 p-4 mx-auto">
            <div class="text-center text-2xl py-2">
                Your Profile
            </div>

            <div class="mt-8">

                <div class="flex justify-between">
                    <div class="font-bold">
                        Username:
                    </div>
                    <div>
                        {{ auth()->user()->username }}
                    </div>
                </div>

                <div class="flex justify-between">
                    <div class="font-bold">
                        Email
                    </div>
                    <div>
                        {{ auth()->user()->email }}
                    </div>
                </div>

                <div class="flex justify-between">
                    <div class="font-bold">
                        Gender:
                    </div>
                    <div>
                        {{ $profile->gender }}
                    </div>
                </div>

                <div class="flex justify-between">
                    <div class="font-bold">
                        Age:
                    </div>
                    <div>
                        {{ $profile->age }}
                    </div>
                </div>

                <div class="flex justify-between">
                    <div class="font-bold">
                        Height:
                    </div>
                    <div>
                        {{ $profile->height }} cm
                    </div>
                </div>

                <div class="flex justify-between">
                    <div class="font-bold">
                        Current weight:
                    </div>
                    <div>
                        {{ $profile->current_weight }} kg
                    </div>
                </div>

                <div class="flex justify-between">
                    <div class="font-bold">
                        Target weight:
                    </div>
                    <div>
                        {{ $profile->target_weight }} kg
                    </div>
                </div>

                <div class="flex justify-between">
                    <div class="font-bold">
                        Diet intensity:
                    </div>
                    <div>
                        {{ $profile->diet_intensity }}
                    </div>
                </div>

                <div class="mt-6">
                    <div class="flex justify-end">
                        <div class="mr-3">
                            <form action="/profile/{{ $profile->id }}/edit" method="GET">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                    type="submit">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-app>