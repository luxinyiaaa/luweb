<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- outer large frame -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="text-center">
                        <h1 class="text-2xl font-semibold">
                            Edit Upload
                        </h1>
                    </div>

                    <!-- Form Error Messages -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mt-6">
                        <form action="{{ route('uploads.update', $upload->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <!-- Original name field -->
                            <div class="form-group mb-4">
                                <label for="originalName" class="block text-sm font-medium text-gray-700">Original Name:</label>
                                <input type="text" class="form-control block w-full px-3 py-2 border border-gray-300 rounded-md" 
                                id="originalName" name="originalName" value="{{ old('originalName', $upload->originalName) }}" required>
                            </div>

                            <!-- Excerpt Field -->
                            <div class="form-group mb-4">
                                <label for="excerpt" class="block text-sm font-medium text-gray-700">Excerpt:</label>
                                <textarea class="form-control block w-full px-3 py-2 border border-gray-300 rounded-md"
                                 id="excerpt" name="excerpt" required>{{ old('excerpt', $upload->excerpt) }}</textarea>
                            </div>

                            <div class="form-group mb-4">
                                <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                                <textarea class="form-control block w-full px-3 py-2 border border-gray-300 rounded-md" 
                                id="description" name="description" required>{{ old('description', $upload->description) }}</textarea>
                            </div>

                            <!-- File Upload Fields -->
                            <div class="form-group mb-4">
                                <label for="upload" class="block text-sm font-medium text-gray-700">File:</label>
                                <input type="file" class="form-control-file" id="upload" name="upload">
                            </div>

                            
                            <div class="flex justify-center">
                                <button type="submit" class="btn btn-primary">Update Upload</button>
                            </div>
                        </form>
                    </div>

                    <div class="mt-4 text-center">
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-600 underline">Go back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


