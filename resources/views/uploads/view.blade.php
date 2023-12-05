<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div style="width: 50%; box-shadow: 0 2px 4px rgba(0,0,0,0.2);">
            <div style="padding: 20px;">
                <h1>{{ $upload->originalName }}</h1>
                <p><strong>Slug:</strong> {{ $upload->slug }}</p>
                <p><strong>Excerpt:</strong> {{ $upload->excerpt }}</p>
                <p><strong>Description:</strong> {{ $upload->description }}</p>
                <div style="text-align: center; margin-top: 20px;">
                    <img src="{{ url('/uploads', [$id, $originalName]) }}" style="max-width: 100%; height: auto;" alt="{{ $upload->originalName }}">
                </div>
                <div style="text-align: center; margin-top: 20px;">
                    <a href="{{ url('/dashboard') }}">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

