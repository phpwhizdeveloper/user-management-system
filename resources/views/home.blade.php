<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Home Page</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
        body { background: linear-gradient(to bottom right, #f0f2f5, #e0e7ff); min-height: 100vh; }

        /* Top Bar */
        .top-bar { background-color: #1f2937; padding: 15px 30px; display: flex; gap: 20px; align-items: center; }
        .top-bar select { padding: 8px 12px; border-radius: 5px; border: none; outline: none; font-size: 16px; }
        .top-bar label { color: #fff; font-weight: bold; }

        /* Hero Section */
        .hero { padding: 40px 30px; display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; }
        .hero-title { grid-column: 1 / -1; text-align: center; font-size: 32px; margin-bottom: 30px; color: #1f2937; }

        /* User Cards */
        .user-card { background: #fff; border-radius: 12px; padding: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transition: transform 0.3s, box-shadow 0.3s; }
        .user-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.2); }
        .user-card h3 { color: #1f2937; margin-bottom: 10px; }
        .user-card p { color: #4b5563; font-size: 14px; margin-bottom: 5px; }
    </style>
</head>
<body>

    <!-- Top Bar with Only Type Dropdown -->
    <div class="top-bar">
        <div>
            <label for="types">Filter by Type:</label>
            <select id="types">
                <option value="">All Types</option>
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="hero" id="user-cards">
        <div class="hero-title">Our Users</div>

        @foreach($users as $user)
            <div class="user-card">
                <h3>{{ $user->name }}</h3>
                <p>Email: {{ $user->email }}</p>
                <p>Type: {{ $user->type?->name ?? 'N/A' }}</p>
            </div>
        @endforeach
    </div>

    <!-- AJAX Script -->
    <script>
        const typeSelect = document.getElementById('types');
        const userCardsContainer = document.getElementById('user-cards');

        typeSelect.addEventListener('change', function() {
            const typeId = this.value;

            fetch(`/filter-users?type_id=${typeId}`)
                .then(response => response.json())
                .then(users => {
                    // Remove all existing cards
                    userCardsContainer.innerHTML = '<div class="hero-title">Our Users</div>';

                    if(users.length === 0){
                        userCardsContainer.innerHTML += '<p style="grid-column:1/-1; text-align:center; color:#555;">No users found.</p>';
                    } else {
                        users.forEach(user => {
                            const card = document.createElement('div');
                            card.className = 'user-card';
                            card.innerHTML = `
                                <h3>${user.name}</h3>
                                <p>Email: ${user.email}</p>
                                <p>Type: ${user.type ? user.type.name : 'N/A'}</p>
                            `;
                            userCardsContainer.appendChild(card);
                        });
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>

</body>
</html>
