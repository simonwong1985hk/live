<form method="GET" action="{{ route(Route::currentRouteName()) }}">
    <input type="text" name="search" placeholder="Find something" value="{{ request('search') }}" class="text-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
</form>