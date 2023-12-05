<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div style="width: 50%; background: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); border-radius: 8px;">
            <form method="POST" action="{{ url('/uploads') }}" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 20px;">
                @csrf
                <input type="file" name="upload" style="border: 1px solid #ccc; padding: 10px; border-radius: 4px;">
                <input type="text" name="slug" placeholder="Slug" required style="border: 1px solid #ccc; padding: 10px; border-radius: 4px;">
                <textarea name="excerpt" placeholder="Excerpt" style="border: 1px solid #ccc; padding: 10px; border-radius: 4px;"></textarea>
                <textarea name="description" placeholder="Description" style="border: 1px solid #ccc; padding: 10px; border-radius: 4px;"></textarea>
                <input type="submit" value="Save Upload" style="background: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">
            </form>

            @if (!empty($id))
                <div style="text-align: center; margin-top: 20px;">
                    <a href="{{ url('/uploads', [$id, $originalName]) }}">{{ $id }} {{ $originalName }}</a>
                    <br>
                    @if (substr($mimeType, 0, 5) == 'image')
                        <img src="{{ url('/uploads', [$id, $originalName]) }}" style="max-width: 100%; height: auto; margin-top: 10px;">
                    @endif
                </div>
            @endif

            <div style="text-align: center; margin-top: 20px;">
                <a href="{{ url('/dashboard') }}" style="color: #3174C7; text-decoration: none;">Go back</a>
            </div>
        </div>
    </div>
</x-app-layout>
