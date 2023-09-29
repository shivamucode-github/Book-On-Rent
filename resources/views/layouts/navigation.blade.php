<div class="hidden space-y-3 sm:-my-px sm:ml-1 sm:flex sm:flex-col sm:items-start">
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('admin.dashboard')">
        {{ __('Dashboard') }}
    </x-nav-link>
    <x-nav-link :href="route('users')" :active="request()->routeIs('users')">
        {{ __('Users') }}
    </x-nav-link>
    <x-nav-link :href="route('books')" :active="request()->routeIs('books')">
        {{ __('Books') }}
    </x-nav-link>
    <x-nav-link :href="route('orders')" :active="request()->routeIs('orders')">
        {{ __('Payments') }}
    </x-nav-link>
    <x-nav-link :href="route('orderStatus')" :active="request()->routeIs('orderStatus')">
        {{ __('Orders') }}
    </x-nav-link>
    <x-nav-link :href="route('categories')" :active="request()->routeIs('categories')">
        {{ __('Categories') }}
    </x-nav-link>
    <x-nav-link :href="route('authors')" :active="request()->routeIs('authors')">
        {{ __('Authors') }}
    </x-nav-link>
</div>
