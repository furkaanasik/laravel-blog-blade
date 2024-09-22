<x-layout>

    <h1 class="title">Welcome back!</h1>

    <div
        class="mx-auto p-6 max-w-screen-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

        <form action="{{ route('login') }}" method="POST">
            @csrf

            {{-- Email --}}
            <div class = "mb-4">
                <label for="email" class="label">Email</label>
                <input type="text" id="email" name="email"
                    class="input @error('email') border-red-500 @enderror"">
                @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror

            </div>

            {{-- Password --}}
            <div class = "mb-4">
                <label for="password" class="label">Password</label>
                <input type="password" id="password" name="password"
                    class="input @error('password') border-red-500 @enderror"">
                @error('password')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            {{-- Remember me --}}
            <div class="flex items-center mb-4">
                <input type="checkbox" id="remember" name="remember" class="mr-2">
                <label for="remember" class="text-sm">Remember me</label>
            </div>

            {{-- Submit --}}
            <div
                class="items-center px-3 py-2  text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <button
                    class="w-full h-full items-center px-3 py-2  text-sm font-medium text-center text-white btn">Login</button>
            </div>

            @error('failed')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </form>
</x-layout>
