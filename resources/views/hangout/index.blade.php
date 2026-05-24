<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HangoutList</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f7f4ee;
            padding: 40px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            background-color: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .hero-section {
            background-color: white;
            padding: 10px 20px;
            border-radius: 20px;
            margin-bottom: 20px; /* Ditambah sedikit agar berjarak longgar ke tabel */
            text-align: center;
        }

        h1 {
            text-align: center;
            color: #889063;
            margin-bottom: 10px;
            font-size: 38px;
        }

        .subtitle {
            text-align: center;
            color: #cfbb99;
            margin-bottom: 10px;
        }

        /* PERBAIKAN MARGIN: Menyesuaikan jarak form card karena sekarang berada di bawah */
        .form-card {
            background-color: #f8f6f1;
            padding: 25px;
            border-radius: 20px;
            margin-top: 40px; /* Memberikan jarak atas yang cukup dari tabel di atasnya */
            margin-bottom: 10px; 
        }

        .form-card h2 {
            color: #889063;
            margin-bottom: 20px;
        }

        .form-group {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
        }

        input {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: 1px solid #ddd;
            outline: none;
        }

        button {
            background-color: #889063;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 15px;
        }

        button:hover {
            background-color: #74804f;
            transition: 0.3s;
        }

        /* PERBAIKAN MARGIN: Dinolkan margin atasnya karena sekarang nempel dengan hero-section */
        .table-card {
            background-color: white;
            padding: 10px 0px;
            border-radius: 20px;
            margin-top: 0px; 
        }

        .table-card h1 {
            margin-bottom: 5px;
        }

        .table-card .subtitle {
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 15px;
        }

        th {
            background-color: #889063;
            color: white;
            padding: 10px 12px;
            font-size: 14px;
        }

        td {
            padding: 10px 12px;
            text-align: center;
            border-bottom: 1px solid #eee;
            font-size: 14px;
            white-space: normal;
        }

        tr:nth-child(even) {
            background-color: #f8f6f1;
        }

        tr:hover {
            background-color: #cfbb99;
            transition: 0.3s;
        }

        .rating {
            color: #889063;
            font-weight: bold;
        }

        .badge {
            background-color: #cfbb99;
            padding: 6px 12px;
            border-radius: 20px;
            color: #4d4334;
            font-size: 14px;

            display: inline-block;
            max-width: 250px;
            white-space: normal;
            word-wrap: break-word;
        }
        
        td button {
            padding: 6px 12px !important; 
            font-size: 12px !important;   
            border-radius: 6px !important; 
            font-weight: bold !important;
            border: none !important;
            cursor: pointer;
            display: inline-block;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
            transition: all 0.2s ease-in-out !important;
        }

        .btn-edit-action {
            background-color: #889063 !important;
            color: white !important;
        }

        .btn-edit-action:hover {
            background-color: #74804f !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15) !important;
        }

        .btn-edit-action:active {
            transform: translateY(1px) !important;
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1) !important;
        }

        .btn-delete-action {
            background-color: #d97b7b !important;
            color: white !important;
        }

        .btn-delete-action:hover {
            background-color: #c46666 !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15) !important;
        }

        .btn-delete-action:active {
            transform: translateY(1px) !important;
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1) !important;
        }

        td {
            white-space: nowrap; 
        }
    </style>
</head>
<body>

<div class="container">

    <div class="hero-section">
        <h1>Hangout List</h1>
        <p class="subtitle">Explore cozy places around you ✨</p>
    </div>

    <div class="table-card">
        <h2 style="color:#889063; margin-bottom:20px;">Community Hangout Recommendations</h2>

    <div style="margin-bottom:20px; display:flex; gap:10px;">

        <a href="/">
            <button type="button">
                All
            </button>
        </a>

        <a href="/?rating=5">
            <button type="button">
                5⭐
            </button>
        </a>

        <a href="/?rating=4">
            <button type="button">
                4⭐
            </button>
        </a>

        <a href="/?rating=3">
            <button type="button">
                3⭐
            </button>
        </a>

    </div>

        <table>
            <tr>
                <th>Place Name</th>
                <th>Location</th>
                <th>Rating</th>
                <th>Vibe</th>
                <th>Category</th>
                <th>Action</th>
            </tr>

            @foreach($hangouts as $hangout)
            <tr>
                <td>{{ $hangout->nama_tempat }}</td>
                <td>{{ $hangout->lokasi }}</td>
                <td class="rating">⭐ {{ $hangout->rating }}/5</td>
                <td>
                    <span class="badge">
                        {{ $hangout->suasana }}
                    </span>
                </td>

                <td>
                    {{ $hangout->category->nama_kategori ?? '-' }}
                </td>

                <td>
                    <button 
                        type="button"
                        class="btn-edit-action"
                        style="margin-right:5px;"
                        onclick="openEditModal(
                            '{{ $hangout->id }}',
                            '{{ addslashes($hangout->nama_tempat) }}',
                            '{{ addslashes($hangout->lokasi) }}',
                            '{{ $hangout->rating }}',
                            '{{ addslashes($hangout->suasana) }}'
                        )">
                        Edit
                    </button>

                    <form action="/hangout/{{ $hangout->id }}" method="POST" style="display:inline;" class="delete-form">
                        @csrf
                        @method('DELETE')

                        <button 
                            type="button"
                            class="btn-delete-action"
                            onclick="confirmDelete(event, this)">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="form-card">
        <h2>Add Your Favorite Hangout Spots</h2>

        <form action="/hangout" method="POST">
    @csrf

    <div class="form-group">
        <input type="text" name="nama_tempat" placeholder="Place Name">
        <input type="text" name="lokasi" placeholder="Location">
    </div>

    <div class="form-group">
        <input type="number" name="rating" placeholder="Rating">

        <select 
            name="category_id"
            style="
                width:100%;
                padding:12px;
                border-radius:10px;
                border:1px solid #ddd;
            ">

            <option value="">Choose Category</option>

            @foreach($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->nama_kategori }}
                </option>
            @endforeach

        </select>
    </div>

    <div class="form-group">
        <input type="text" name="suasana" placeholder="Vibes / Atmosphere">
    </div>

    <button type="submit">Add Place</button>
</form>
    </div>

</div>

<div id="editModal" 
    style="
    display:none;
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.5);
    justify-content:center;
    align-items:center;
    z-index:999;
">
    <div style="
        background:#f8f6f1;
        padding:30px;
        border-radius:20px;
        width:600px; 
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    ">
        <h2 style="color:#889063; margin-bottom:20px;">
            Edit Hangout Spot
        </h2>

        <form id="editForm" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <div style="flex: 1; text-align: left;">
                    <label style="display: block; font-size: 13px; color: #889063; font-weight: bold; margin-bottom: 5px;">Place Name</label>
                    <input type="text" name="nama_tempat" id="editNama" placeholder="Place Name">
                </div>
                <div style="flex: 1; text-align: left;">
                    <label style="display: block; font-size: 13px; color: #889063; font-weight: bold; margin-bottom: 5px;">Location</label>
                    <input type="text" name="lokasi" id="editLokasi" placeholder="Location">
                </div>
            </div>

            <div class="form-group" style="margin-top: 15px;">
                <div style="flex: 1; text-align: left;">
                    <label style="display: block; font-size: 13px; color: #889063; font-weight: bold; margin-bottom: 5px;">Rating (1-5)</label>
                    <input type="number" name="rating" id="editRating" placeholder="Rating" min="1" max="5">
                </div>
                <div style="flex: 1; text-align: left;">
                    <label style="display: block; font-size: 13px; color: #889063; font-weight: bold; margin-bottom: 5px;">Vibes / Atmosphere</label>
                    <input type="text" name="suasana" id="editSuasana" placeholder="Atmosphere">
                </div>
            </div>

            <div style="display:flex; gap:10px; margin-top:25px;">
                <button type="submit" class="btn-edit-action">
                    Save Changes
                </button>

                <button 
                    type="button"
                    onclick="closeEditModal()"
                    class="btn-delete-action">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function confirmDelete(event, button) {
    event.preventDefault(); 
    const form = button.closest('.delete-form'); 

    Swal.fire({
        title: 'Are you sure?',
        text: "You want to delete this place?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#889063', 
        cancelButtonColor: '#d33',
        confirmButtonText: 'OK',
        cancelButtonText: 'Cancel',
        background: '#f8f6f1', 
        border: 'none'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit(); 
        }
    });
}

function openEditModal(id, nama, lokasi, rating, suasana) {
    document.getElementById('editModal').style.display = 'flex';
    document.getElementById('editNama').value = nama;
    document.getElementById('editLokasi').value = lokasi;
    document.getElementById('editRating').value = rating;
    document.getElementById('editSuasana').value = suasana;
    document.getElementById('editForm').action = '/hangout/' + id;
}

function closeEditModal() {
    document.getElementById('editModal').style.display = 'none';
}
</script>

</body>
</html>