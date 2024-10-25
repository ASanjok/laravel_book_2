<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <ul class="flex border-b">
                    <li class="mr-1">
                        <a href="{{ route('books') }}" class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold">
                            Books
                        </a>
                    </li>
                    <li class="mr-1">
                        <a href="{{ route('account') }}" class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold">
                            My Account
                        </a>
                    </li>
                </ul>

                <div class="mt-4">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
