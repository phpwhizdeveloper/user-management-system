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
        <h2 class="font-semibold text-xl">Users</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <div class="p-6">
                    <a href="{{ route('users.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded add-btn">Add User</a>

                    <table class="w-full mt-4 border">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="p-2">ID</th>
                                <th class="p-2">Name</th>
                                <th class="p-2">Email</th>
                                <th class="p-2">Type</th>
                                <th class="p-2">Categories</th>
                                <th class="p-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr class="border-t">
                                    <td class="p-2">{{ $user->id }}</td>
                                    <td class="p-2">{{ $user->name }}</td>
                                    <td class="p-2">{{ $user->email }}</td>
                                    <td class="p-2">{{ $user->type?->name }}</td>
                                    <td class="p-2">
                                        @foreach($user->categories as $cat)
                                            <span class="bg-gray-200 px-2 py-1 rounded">{{ $cat->name }},</span>
                                        @endforeach
                                    </td>
                                    <td class="p-2">
                                        <a href="{{ route('users.edit',$user->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded edit-btn">Edit</a> &nbsp;
                                        <form action="{{ route('users.delete',$user->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button class="bg-red-500 text-white px-2 py-1 rounded delete-btn" onclick="return confirm('Delete this user?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">{{ $users->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
