<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - GoJatim Travel</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <style>
        :root {
            --bg-color: #f8fafc;
            --card-bg: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
            --primary: #0f172a;
            --primary-light: #334155;
            --accent: #d97706; /* Terra color */
        }
        body { 
            background: var(--bg-color); 
            padding-top: 100px; 
            font-family: 'DM Sans', sans-serif;
            color: var(--text-main);
        }
        .container {
            max-width: 1000px;
            margin: 0 auto 60px;
            padding: 0 20px;
        }
        .profile-grid {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 30px;
        }
        @media (max-width: 768px) {
            .profile-grid {
                grid-template-columns: 1fr;
            }
        }
        .card {
            background: var(--card-bg);
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            border: 1px solid rgba(0,0,0,0.02);
            overflow: hidden;
        }
        
        /* Sidebar Profile */
        .profile-sidebar {
            padding: 40px 24px;
            text-align: center;
        }
        .profile-avatar-wrapper {
            position: relative;
            width: 100px;
            height: 100px;
            margin: 0 auto 20px;
        }
        .profile-avatar {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            box-shadow: 0 10px 20px rgba(15, 23, 42, 0.15);
        }
        .verified-badge {
            position: absolute;
            bottom: 0;
            right: 0;
            background: #10b981;
            color: white;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            border: 3px solid var(--card-bg);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .profile-name { 
            font-family: 'Cormorant Garamond', serif; 
            font-size: 32px; 
            font-weight: 600;
            color: var(--primary); 
            margin-bottom: 8px; 
        }
        .profile-badge {
            display: inline-block;
            padding: 6px 12px;
            background: rgba(16, 185, 129, 0.1);
            color: #059669;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            margin-bottom: 24px;
        }
        .profile-info-list {
            text-align: left;
            margin-top: 30px;
            border-top: 1px solid var(--border-color);
            padding-top: 24px;
        }
        .info-item {
            margin-bottom: 16px;
        }
        .info-label { 
            font-size: 12px; 
            color: var(--text-muted); 
            text-transform: uppercase; 
            letter-spacing: 0.05em;
            margin-bottom: 4px;
            font-weight: 500;
        }
        .info-value { 
            font-size: 15px; 
            color: var(--text-main); 
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .info-value i {
            color: var(--text-muted);
            width: 16px;
            text-align: center;
        }
        
        /* Main Content */
        .main-content {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }
        .section-header {
            padding: 24px 30px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .section-header h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 26px;
            font-weight: 600;
            color: var(--primary);
            margin: 0;
        }
        .booking-list {
            padding: 30px;
        }
        
        .booking-card {
            background: #fff;
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 16px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .booking-card:hover {
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            border-color: rgba(15, 23, 42, 0.1);
            transform: translateY(-2px);
        }
        .booking-card::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: var(--accent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .booking-card:hover::before {
            opacity: 1;
        }
        
        .booking-header { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            margin-bottom: 16px; 
        }
        .booking-code { 
            font-weight: 600; 
            color: var(--primary);
            font-size: 15px; 
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .booking-code i { color: var(--accent); }
        .booking-status { 
            font-size: 12px; 
            padding: 6px 14px; 
            border-radius: 20px; 
            font-weight: 600; 
            letter-spacing: 0.05em; 
            text-transform: uppercase;
        }
        .status-pending { background: rgba(245, 158, 11, 0.1); color: #d97706; }
        .status-success { background: rgba(16, 185, 129, 0.1); color: #059669; }
        .status-cancelled { background: rgba(239, 68, 68, 0.1); color: #dc2626; }
        
        .booking-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            background: #f8fafc;
            padding: 16px;
            border-radius: 8px;
        }
        .detail-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }
        .detail-label {
            font-size: 11px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .detail-value {
            font-size: 14px;
            color: var(--primary);
            font-weight: 500;
        }
        .detail-value.tour-name {
            font-weight: 600;
            grid-column: span 2;
            font-size: 16px;
            margin-bottom: 8px;
        }
        
        .booking-empty { 
            text-align: center; 
            padding: 60px 20px; 
        }
        .booking-empty i {
            font-size: 48px;
            color: #cbd5e1;
            margin-bottom: 16px;
        }
        .booking-empty h4 {
            font-size: 18px;
            color: var(--primary);
            margin-bottom: 8px;
        }
        .booking-empty p {
            color: var(--text-muted);
            font-size: 14px;
        }

        #loading { 
            text-align: center; 
            padding: 80px; 
            color: var(--text-muted); 
            grid-column: 1 / -1;
        }
        #profileContent { display: none; }
        
        /* Actions Buttons */
        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 30px;
        }
        .btn-action {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-size: 14px;
        }
        .btn-edit {
            background: rgba(15, 23, 42, 0.05);
            color: var(--primary);
        }
        .btn-edit:hover {
            background: rgba(15, 23, 42, 0.1);
        }
        .btn-logout {
            background: white;
            border: 1px solid #fee2e2;
            color: #ef4444;
        }
        .btn-logout:hover {
            background: #fee2e2;
        }
        .btn-delete {
            background: transparent;
            color: #dc2626;
            font-size: 13px;
        }
        .btn-delete:hover {
            text-decoration: underline;
        }

        /* Modal Styles */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1000; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgba(0,0,0,0.5); 
        }
        .modal-content {
            background-color: #fefefe;
            margin: 10% auto; 
            padding: 30px;
            border: 1px solid #888;
            width: 90%;
            max-width: 500px;
            border-radius: 12px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        .close:hover, .close:focus { color: black; text-decoration: none; }
        .form-group { margin-bottom: 16px; }
        .form-group label { display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px; }
        .form-group input { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; font-family: 'DM Sans'; }
        .btn-submit {
            background: var(--primary);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            width: 100%;
            margin-top: 10px;
        }
        .btn-submit:hover { background: var(--primary-light); }
    </style>
</head>
<body>
    <nav>
        <a href="{{ url('/') }}" class="nav-logo">Go Jatim <span>Travel</span></a>
        <div class="nav-right">
            <a href="{{ url('/') }}" style="color: var(--deep-navy); text-decoration: none; font-size: 14px; font-weight: 500;">
                <i class="fas fa-arrow-left" style="margin-right: 6px;"></i> Kembali ke Beranda
            </a>
        </div>
    </nav>

    <div class="container">
        <div id="loading">
            <i class="fas fa-circle-notch fa-spin fa-3x" style="color: var(--accent);"></i>
            <p style="margin-top: 16px; font-weight: 500;">Memuat profil Anda...</p>
        </div>

        <div id="profileContent" class="profile-grid">
            
            <!-- Sidebar Profile -->
            <div class="card profile-sidebar">
                <div class="profile-avatar-wrapper">
                    <div class="profile-avatar">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="verified-badge" title="Akun Terverifikasi">
                        <i class="fas fa-check"></i>
                    </div>
                </div>
                
                <div class="profile-name" id="display-name">-</div>
                <div class="profile-badge">Member Aktif</div>
                
                <div class="profile-info-list">
                    <div class="info-item">
                        <div class="info-label">ID Pengguna</div>
                        <div class="info-value"><i class="fas fa-id-card"></i> <span id="display-id">-</span></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Email</div>
                        <div class="info-value"><i class="fas fa-envelope"></i> <span id="display-email">-</span></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">No. Telepon</div>
                        <div class="info-value"><i class="fas fa-phone"></i> <span id="display-phone">-</span></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Bergabung Sejak</div>
                        <div class="info-value"><i class="fas fa-calendar-alt"></i> <span id="display-joined">-</span></div>
                    </div>
                </div>

                <div class="action-buttons">
                    <button class="btn-action btn-edit" onclick="openEditModal()"><i class="fas fa-edit"></i> Edit Profil</button>
                    <button class="btn-action btn-logout" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Keluar</button>
                    <button class="btn-action btn-delete" onclick="deleteAccount()"><i class="fas fa-trash-alt"></i> Hapus Akun Permanen</button>
                </div>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <div class="card">
                    <div class="section-header">
                        <h3>Riwayat Pemesanan</h3>
                        <i class="fas fa-history" style="color: var(--text-muted); font-size: 20px;"></i>
                    </div>
                    <div class="booking-list" id="booking-list">
                        <!-- Akan diisi via JS -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Profile Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeEditModal()">&times;</span>
            <h3 style="margin-bottom: 20px; color: var(--primary);">Edit Profil</h3>
            <form id="editForm" onsubmit="submitEditProfile(event)">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" id="edit-name" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" id="edit-email" required>
                </div>
                <div class="form-group">
                    <label>No. Telepon</label>
                    <input type="text" id="edit-phone">
                </div>
                <button type="submit" class="btn-submit" id="btn-save-profile">Simpan Perubahan</button>
            </form>
        </div>
    </div>

    <script>
        function logout() {
            if(confirm('Apakah Anda yakin ingin keluar?')) {
                localStorage.removeItem('jwt_token');
                localStorage.removeItem('user_name');
                window.location.href = '/login';
            }
        }

        async function deleteAccount() {
            if(confirm('PERINGATAN: Apakah Anda yakin ingin menghapus akun secara permanen? Semua data riwayat pemesanan akan hilang dan tidak dapat dikembalikan.')) {
                const token = localStorage.getItem('jwt_token');
                try {
                    const response = await fetch('/api/v1/auth/me', {
                        method: 'DELETE',
                        headers: {
                            'Authorization': 'Bearer ' + token,
                            'Accept': 'application/json'
                        }
                    });
                    if (response.ok) {
                        alert('Akun berhasil dihapus.');
                        localStorage.removeItem('jwt_token');
                        localStorage.removeItem('user_name');
                        window.location.href = '/';
                    } else {
                        alert('Gagal menghapus akun.');
                    }
                } catch (e) {
                    alert('Terjadi kesalahan koneksi.');
                }
            }
        }

        function openEditModal() {
            document.getElementById('edit-name').value = document.getElementById('display-name').textContent;
            document.getElementById('edit-email').value = document.getElementById('display-email').textContent;
            let phone = document.getElementById('display-phone').textContent;
            document.getElementById('edit-phone').value = phone === '-' ? '' : phone;
            document.getElementById('editModal').style.display = 'block';
        }

        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
        }

        async function submitEditProfile(e) {
            e.preventDefault();
            const btn = document.getElementById('btn-save-profile');
            btn.textContent = 'Menyimpan...';
            btn.disabled = true;

            const token = localStorage.getItem('jwt_token');
            const data = {
                name: document.getElementById('edit-name').value,
                email: document.getElementById('edit-email').value,
                phone: document.getElementById('edit-phone').value
            };

            try {
                const response = await fetch('/api/v1/auth/me', {
                    method: 'PUT',
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(data)
                });
                
                const result = await response.json();
                
                if (response.ok && result.success) {
                    alert('Profil berhasil diperbarui!');
                    // Update UI
                    document.getElementById('display-name').textContent = result.data.name;
                    document.getElementById('display-email').textContent = result.data.email;
                    document.getElementById('display-phone').textContent = result.data.phone || '-';
                    closeEditModal();
                } else {
                    alert('Gagal memperbarui profil: ' + (result.message || 'Data tidak valid.'));
                }
            } catch (error) {
                alert('Terjadi kesalahan koneksi.');
            } finally {
                btn.textContent = 'Simpan Perubahan';
                btn.disabled = false;
            }
        }

        document.addEventListener('DOMContentLoaded', async function() {
            const token = localStorage.getItem('jwt_token');
            if (!token) {
                window.location.href = '/login';
                return;
            }

            try {
                const response = await fetch('/api/v1/auth/me', {
                    method: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    }
                });

                const result = await response.json();

                if (response.ok && result.success) {
                    const user = result.data;
                    document.getElementById('display-name').textContent = user.name;
                    document.getElementById('display-email').textContent = user.email;
                    document.getElementById('display-id').textContent = 'USR-' + String(user.id).padStart(4, '0');
                    document.getElementById('display-phone').textContent = user.phone ? user.phone : '-';
                    
                    const dateObj = new Date(user.created_at);
                    document.getElementById('display-joined').textContent = dateObj.toLocaleDateString('id-ID', { month: 'long', year: 'numeric' });

                    const bookingList = document.getElementById('booking-list');
                    if (user.bookings && user.bookings.length > 0) {
                        bookingList.innerHTML = '';
                        const sortedBookings = user.bookings.sort((a,b) => b.id - a.id);
                        
                        sortedBookings.forEach(book => {
                            const checkInDate = new Date(book.check_in).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });
                            const rpTotal = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(book.total_harga);
                            
                            const tourName = book.tour && book.tour.title ? book.tour.title : 'Paket Tour Custom';
                            
                            const html = `
                                <div class="booking-card">
                                    <div class="booking-header">
                                        <div class="booking-code"><i class="fas fa-ticket-alt"></i> ${book.booking_code}</div>
                                        <div class="booking-status status-${book.status.toLowerCase()}">${book.status}</div>
                                    </div>
                                    <div class="booking-details">
                                        <div class="detail-value tour-name">${tourName}</div>
                                        
                                        <div class="detail-item">
                                            <span class="detail-label">Keberangkatan</span>
                                            <span class="detail-value"><i class="far fa-calendar-alt" style="margin-right:4px;"></i> ${checkInDate}</span>
                                        </div>
                                        <div class="detail-item">
                                            <span class="detail-label">Jumlah Orang</span>
                                            <span class="detail-value"><i class="fas fa-users" style="margin-right:4px;"></i> ${book.jumlah_orang} Orang</span>
                                        </div>
                                        <div class="detail-item">
                                            <span class="detail-label">Total Pembayaran</span>
                                            <span class="detail-value" style="color: var(--accent); font-weight: 600;">${rpTotal}</span>
                                        </div>
                                    </div>
                                </div>
                            `;
                            bookingList.insertAdjacentHTML('beforeend', html);
                        });
                    } else {
                        bookingList.innerHTML = `
                            <div class="booking-empty">
                                <i class="fas fa-box-open"></i>
                                <h4>Belum ada pemesanan</h4>
                                <p>Anda belum memiliki riwayat perjalanan bersama kami.</p>
                            </div>
                        `;
                    }

                    document.getElementById('loading').style.display = 'none';
                    document.getElementById('profileContent').style.display = 'grid'; // Grid display for new layout
                } else {
                    alert('Sesi Anda telah berakhir. Silakan login kembali.');
                    localStorage.removeItem('jwt_token');
                    localStorage.removeItem('user_name');
                    window.location.href = '/login';
                }
            } catch (error) {
                alert('Gagal terhubung ke server.');
                window.location.href = '/';
            }
        });
    </script>
</body>
</html>
