@if (session('message'))
<div
    x-data="{ show: true }"
    x-init="setTimeout(() => show = false, 4000)"
    x-show="show"
    class="fixed bg-indigo-500 text-white py-2 px-4 rounded bottom-3 right-3"
>
    <p>{{ session("message") }}</p>
</div>
@endif
