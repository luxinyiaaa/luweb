<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    
    <div style="border: 2px solid #DDD; padding: 20px; border-radius: 10px; margin: 20px;">

        
        @foreach ($results as $result)
            <div style="border: 1px solid #CCC; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
                <p>{{ $result->originalName }}</p>
            </div>
        @endforeach

    </div>

    <div style="text-align: center; margin-top: 20px;">
        <a href="{{ url('/dashboard') }}" style="color: #3174C7; text-decoration: none;">Go back</a>
    </div>
</x-app-layout>
