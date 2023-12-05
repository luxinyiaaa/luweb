<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
 <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                 <div class="flex justify-end">
                        @auth
                            @if(Auth::user()->is_admin)
                                <a href="./uploads/create" class="btn btn-success">Add file</a>
                            @endif
                        @endauth
                </div>
                <ol class="list-decimal list-inside">
                    @foreach ($uploads as $upload)
                        <li class="mb-4 p-2 border-b">
                         <div class="flex justify-between items-center">
                                <div>
                                        {{ $upload->id }} - 
                                        <a href="{{ url("/view/{$upload->id}") }}" class="text-blue-600">{{ $upload->originalName }}</a>
                                        <div class="text-sm text-gray-600">Path: {{$upload->path}}</div>
                                </div>
                                  @auth
                                    @if(Auth::user()->is_admin)
                                            <div>
                                                <a href="{{ url("/edit/{$upload->id}") }}" class="btn btn-primary btn-sm">Update</a> 
                                                <form action="{{ url("/uploads/{$upload->id}") }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </div>
                                        @endif
                                    @endauth
                                </div>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
