<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<div class="max-w-xl mx-auto p-4 sm:p-6 lg:p-8 mt-10">
<form action="{{ route('comments.store', $chirp->id) }}" method="POST">
    @csrf
    <textarea
        name="comment"
        placeholder="コメントを入力しよう"
        class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
    >{{ old('message') }}</textarea>
    <x-primary-button class="mt-4">CHIRP</x-primary-button>
</form>
</div>
