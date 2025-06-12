<!DOCTYPE html>
<html lang="en"></html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="min-h-full">
  <nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="shrink-0">
            <img class="size-8" src="https://laracasts.com/images/logo/logo-triangle.svg" alt="Your Company">
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
                <a href="/" class="block px-4 py-2 text-sm text-white" role="menuitem" tabindex="-1" id="user-menu-item-0">Home</a>
                <a href="/contact" class="block px-4 py-2 text-sm text-white" role="menuitem" tabindex="-1" id="user-menu-item-1">Contact</a>
                <a href="/jobs" class="block px-4 py-2 text-sm text-white" role="menuitem" tabindex="-1" id="user-menu-item-2">Jobs</a>
            </div>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            @guest
            <a href="/login" class="block px-4 py-2 text-sm text-white" role="menuitem" tabindex="-1" :active="request()->is('login')" id="user-menu-item-3">Login</a>
            <a href="/register" class="block px-4 py-2 text-sm text-white" role="menuitem" tabindex="-1" :active="request()->is('register')" id="user-menu-item-4">Register</a>
            @endguest
            @auth
              <button type="submit" class="block px-4 py-2 text-sm text-white" role="menuitem" tabindex="-1" id="user-menu-item-5" form="logout-form">
                Logout
              </button>
                <form id="logout-form" action="/logout" method="POST" class="hidden">
                    @csrf
                </form>
            @endauth
          </div>
        </div>
      </div>
    </div>
  </nav>

  <header class="bg-white shadow-sm">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{$heading}}</h1>
    </div>
  </header>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      {{$slot}}
    </div>
  </main>
</div>

</body>
</html>
