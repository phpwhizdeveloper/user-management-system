<style>
    .add-btn {
        color: #ffffff;
        background: #0093ff;
    }
</style>
<x-app-layout>
    <x-slot name="header"><h2>Add User</h2></x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <div class="p-6">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <label>Name</label>
                        <input type="text" name="name" class="border p-2 w-full">

                        <label>Email</label>
                        <input type="email" name="email" class="border p-2 w-full">

                        <label>Password</label>
                        <input type="password" name="password" class="border p-2 w-full">

                        <label class="block mt-2">Type</label>
                        <select name="type_id" id="typeSelect" class="border p-2 w-full">
                            <option value="">-- Select Type --</option>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}"
                                    {{ old('type_id', $user->type_id ?? '') == $type->id ? 'selected' : '' }}>
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>

                        <label class="block mt-2">Categories</label>
                        <select name="categories[]" id="categorySelect" multiple class="border p-2 w-full">
                            {{-- options will be filled dynamically --}}
                            @if(isset($user))
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}"
                                        {{ $user->categories->contains($cat->id) ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            @endif
                        </select>

                        <button class="bg-blue-600 text-white px-4 py-2 rounded mt-3 add-btn">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $('#typeSelect').on('change', function () {
        var typeId = $(this).val();

        if (typeId) {
            $.ajax({
                url: "{{ url('/categories/by-type') }}/" + typeId,
                type: "GET",
                success: function (data) {
                    $('#categorySelect').empty();
                    $.each(data, function (key, category) {
                        $('#categorySelect').append(
                            '<option value="' + category.id + '">' + category.name + '</option>'
                        );
                    });
                }
            });
        } else {
            $('#categorySelect').empty();
        }
    });
});
</script>

