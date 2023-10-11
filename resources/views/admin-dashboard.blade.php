@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Admin Dashboard</h2>
    <div class="mb-3">
        <button class="btn btn-primary" id="showUsersTable">Users Table</button>
        <button class="btn btn-primary" id="showPartaiTable">Partai Table</button>
        <button class="btn btn-primary" id="showFeedbacks">Feedbacks</button>
    </div>
    <div id="usersTable">
        <h3>Users Table</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr @if($user->is_admin) class="text-primary" @endif>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div id="partaiTable" style="display: none;">
        <h3>Partai Table</h3>
        <table class=" table" id="partai-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Partai</th>
                    <th>Ketua Umum</th>
                    <th>Kasus Suap/Gratifikasi</th>
                    <th>Nominal Suap/Gratifikasi</th>
                    <th>Kasus Korupsi</th>
                    <th>Jumlah Kasus Korupsi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($partaiData as $index => $partai)
                <tr>
                    <td>{{ $partai->id_partai }}</td>
                    <td class="editable" data-field="nama_partai">{{ $partai->nama_partai }}</td>
                    <td class="editable" data-field="ketua_umum">{{ $partai->ketua_umum }}</td>
                    <td class="editable" data-field="jumlah_kasus_suap_gratifikasi">{{ $partai->jumlah_kasus_suap_gratifikasi }}</td>
                    <td class="editable" data-field="nominal_suap_gratifikasi">{{ $partai->nominal_suap_gratifikasi }}</td>
                    <td class="editable" data-field="kasus_korupsi">{{ $partai->kasus_korupsi }}</td>
                    <td class="editable" data-field="jumlah_kasus_korupsi">{{ $partai->jumlah_kasus_korupsi }}</td>
                    <td>
                        <button class="btn btn-primary edit-button" data-index="{{ $index }}" data-id="{{ $partai->id_partai }}">Edit</button>
                        <button class="btn btn-success save-button" style="display: none;">Save</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div id="feedbacks" style="display: none;">
        <h3>Feedbacks</h3>
        <p>Ini Feedbacks</p>
    </div>
</div>

<script>
    // Function to switch between tables
    function showTable(tableId) {
        document.getElementById('usersTable').style.display = tableId === 'usersTable' ? 'block' : 'none';
        document.getElementById('partaiTable').style.display = tableId === 'partaiTable' ? 'block' : 'none';
        document.getElementById('feedbacks').style.display = tableId === 'feedbacks' ? 'block' : 'none';
    }

    // Event listeners for table buttons
    document.getElementById('showUsersTable').addEventListener('click', function () {
        showTable('usersTable');
    });

    document.getElementById('showPartaiTable').addEventListener('click', function () {
        showTable('partaiTable');
    });

    document.getElementById('showFeedbacks').addEventListener('click', function () {
        showTable('feedbacks');
    });

    // Add event listeners for edit and save buttons
    const editButtons = document.querySelectorAll('.edit-button');
    const saveButtons = document.querySelectorAll('.save-button');
    
    editButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
            enableEditing(index);
        });
    });
    
    saveButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
            saveChanges(index);
        });
    });

    function enableEditing(index) {
    const row = document.querySelectorAll('.editable');
    row.forEach(cell => {
        cell.contentEditable = true;
        cell.style.border = '1px solid #000';
    });

    // Disable the "Edit" button and enable the "Save" button
    editButtons[index].style.display = 'none';
    saveButtons[index].style.display = 'block';
}


    function saveChanges(index) {
        const rows = document.querySelectorAll('#partaiTable tbody tr');
        const partai = {
            id_partai: rows[index].querySelector('td').textContent,
            nama_partai: rows[index].querySelector('[data-field="nama_partai"]').textContent,
            ketua_umum: rows[index].querySelector('[data-field="ketua_umum"]').textContent,
            jumlah_kasus_suap_gratifikasi: rows[index].querySelector('[data-field="jumlah_kasus_suap_gratifikasi"]').textContent,
            nominal_suap_gratifikasi: rows[index].querySelector('[data-field="nominal_suap_gratifikasi"]').textContent,
            kasus_korupsi: rows[index].querySelector('[data-field="kasus_korupsi"]').textContent,
            jumlah_kasus_korupsi: rows[index].querySelector('[data-field="jumlah_kasus_korupsi"]').textContent,
        };

        // Send an AJAX request to update the data on the server
        fetch(`{{ url('admin/updatePartai') }}/${partai.id_partai}`, {
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(partai),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    saveButtons[index].style.display = 'none';
                    editButtons[index].style.display = 'block';
                    // You can provide feedback to the user, e.g., show a success message
                } else {
                    // Handle errors, e.g., show an error message
                    alert(data.message);
                }
            });
    }
</script>
@endsection
