<style>
    .min-w-full {
        width: 100%;
    }
    .text-center{
        text-align: center;
    }
    .add-btn {
        color: #ffffff;
        background: #0093ff;
    }
    .edit-btn {
        color: #ffffff;
        background: #b7ff00;
    }
    .delete-btn {
        color: #ffffff;
        background: #ff0000;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Categories</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block add-btn">Add Category</a>

                @if(session('success'))
                    <div class="text-green-600 mb-4">{{ session('success') }}</div>
                @endif

                <table class="min-w-full border">
                    <thead>
                        <tr class="border-b">
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Type</th>
                            <th class="px-4 py-2">Image</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $category->id }}</td>
                            <td class="px-4 py-2">{{ $category->name }}</td>
                            <td class="px-4 py-2">{{ $category->type->name }}</td>
                            <td class="px-4 py-2">
                                @if($category->image)
                                    <img src="{{ asset('storage/'.$category->image) }}" width="50" alt="{{ $category->name }}">
                                @endif
                            </td>
                            <td class="px-4 py-2">
                                <a href="{{ route('categories.edit', $category->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded edit-btn">Edit</a>
                                <form action="{{ route('categories.delete', $category->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this category?');">
                                    @csrf
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded delete-btn">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4">No data found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
