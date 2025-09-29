
<style>
    .cards-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 20px;
    padding: 20px;
    }

    .card {
    background: linear-gradient(135deg, #6a11cb, #2575fc);
    color: #fff;
    padding: 20px;
    border-radius: 16px;
    box-shadow: 0 6px 12px rgba(0,0,0,0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
    }

    .card h3 {
    margin-top: 0;
    font-size: 20px;
    }

    .card p {
    font-size: 14px;
    line-height: 1.6;
    }

    .card:hover {
    transform: translateY(-8px) scale(1.03);
    box-shadow: 0 10px 18px rgba(0,0,0,0.3);
    }
</style>
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
                   <div class="cards-container">
                        <div class="card">
                            <h3>Types</h3>
                            <p class="text-2xl">{{ $typesCount }}</p>
                        </div>
                        <div class="card">
                            <h3>Categories</h3>
                            <p class="text-2xl">{{ $categoriesCount }}</p>
                        </div>
                        <div class="card">
                            <h3>Users</h3>
                            <p class="text-2xl">{{ $usersCount }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
