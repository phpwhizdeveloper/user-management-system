<style>
    .add-btn {
        color: #ffffff;
        background: #0093ff;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Category</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700">Type</label>
                        <select name="type_id" class="border px-3 py-2 w-full" required>
                            <option value="">Select Type</option>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}" @if($category->type_id == $type->id) selected @endif>{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Name</label>
                        <input type="text" name="name" class="border px-3 py-2 w-full" value="{{ $category->name }}" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Image</label>
                        <input type="file" name="image" class="border px-3 py-2 w-full">
                        @if($category->image)
                            <img src="{{ asset('storage/'.$category->image) }}" width="50" class="mt-2">
                        @endif
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded add-btn">Update</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
