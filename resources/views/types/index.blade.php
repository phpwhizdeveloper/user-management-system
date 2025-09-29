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
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Types</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('types.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block add-btn">Add Type</a> 
                
                @if(session('success'))
                    <div class="text-green-600 mb-4">{{ session('success') }}</div>
                @endif

                <table class="min-w-full border">
                    <thead>
                        <tr class="border-b">
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Image</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($types as $type)
                            <tr class="border-b text-center">
                                <td class="px-4 py-2">{{ $type->id }}</td>
                                <td class="px-4 py-2">{{ $type->name }}</td>
                                <td class="px-4 py-2">
                                    @if($type->image)
                                        {{-- <img src="{{ asset('storage/types/' . $type->image) }}" width="50" alt="{{ $type->name }}"> --}}
                                        <img src="{{ asset('storage/' . $type->image) }}" width="50" alt="{{ $type->name }}">
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('types.edit', $type->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded edit-btn">Edit</a>
                                    <form action="{{ route('types.destroy', $type->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this type?');">
                                        @csrf
                                        @method('DELETE')
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
            </div>
        </div>
    </div>
</x-app-layout>
