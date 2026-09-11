@if (session('success'))
    <div
        x-data="{ show: true }"
        x-show="show"
        x-init="setTimeout(() => show = false, 4000)"
        x-transition
        class="mb-4 flex items-center justify-between rounded-lg bg-green-50 border border-green-200 px-4 py-3 text-sm text-green-800"
    >
        <span>{{ session('success') }}</span>
        <button @click="show = false" class="text-green-600 hover:text-green-800">✕</button>
    </div>
@endif