<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard - Indonesia Dream Talent</title>
    
    <!-- External CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        /* Reset & Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fc;
            line-height: 1.6;
        }

        /* Navbar Styles */
        .main-navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            color: white;
            text-decoration: none;
            font-size: 1rem;
            font-weight: bold;
        }

        .navbar-brand:hover {
            color: white;
            text-decoration: none;
        }

        .navbar-brand img {
            height: 45px;
            width: auto;
            margin-right: 10px;
            border-radius: 8px;
        }

        .navbar-search {
            flex: 1;
            max-width: 400px;
            margin: 0 30px;
        }

        .search-wrapper {
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 12px 20px 12px 45px;
            border: none;
            border-radius: 25px;
            background: rgba(255,255,255,0.15);
            color: white;
            font-size: 14px;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .search-input::placeholder {
            color: rgba(255,255,255,0.7);
        }

        .search-input:focus {
            outline: none;
            background: rgba(255,255,255,0.25);
            box-shadow: 0 0 0 3px rgba(255,255,255,0.2);
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255,255,255,0.7);
            font-size: 16px;
        }

        .navbar-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .navbar-toggle {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 20px;
            cursor: pointer;
            padding: 10px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .navbar-toggle:hover {
            background: rgba(255,255,255,0.1);
        }

        .profile-dropdown {
            position: relative;
        }

        .profile-trigger {
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(255,255,255,0.1);
            padding: 8px 15px;
            border-radius: 25px;
            color: white;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .profile-trigger:hover {
            background: rgba(255,255,255,0.2);
            color: white;
            text-decoration: none;
        }

        .profile-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid rgba(255,255,255,0.3);
        }

        .profile-name {
            font-size: 14px;
            font-weight: 500;
        }

        .dropdown-arrow {
            font-size: 12px;
            transition: transform 0.3s ease;
        }

        .profile-dropdown.active .dropdown-arrow {
            transform: rotate(180deg);
        }

        .dropdown-menu-custom {
            position: absolute;
            top: calc(100% + 10px);
            right: 0;
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            min-width: 200px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 1001;
        }

        .profile-dropdown.active .dropdown-menu-custom {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-item-custom {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            color: #333;
            text-decoration: none;
            transition: background-color 0.3s ease;
            border-radius: 8px;
            margin: 5px;
        }

        .dropdown-item-custom:hover {
            background: #f8f9fc;
            color: #333;
            text-decoration: none;
        }

        .dropdown-item-custom i {
            width: 16px;
            font-size: 16px;
            color: #667eea;
        }

        /* Sidebar Styles */
        .sidebar-wrapper {
            position: fixed;
            top: 70px;
            left: 0;
            width: 260px;
            height: calc(100vh - 70px);
            background: white;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
            z-index: 999;
            transition: transform 0.3s ease;
        }

        .sidebar-wrapper.collapsed {
            transform: translateX(-100%);
        }

        .sidebar-nav {
            list-style: none;
            padding: 20px 0;
            margin: 0;
        }

        .nav-item {
            margin: 0;
        }

        .nav-link-custom {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 25px;
            color: #333;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .nav-link-custom:hover {
            background: linear-gradient(90deg, rgba(102,126,234,0.1) 0%, transparent 100%);
            color: #667eea;
            text-decoration: none;
            border-left-color: #667eea;
        }

        .nav-link-custom.active {
            background: linear-gradient(90deg, rgba(102,126,234,0.15) 0%, transparent 100%);
            color: #667eea;
            border-left-color: #667eea;
            font-weight: 600;
        }

        .nav-icon {
            width: 20px;
            font-size: 18px;
            color: "black";
        }

        .nav-title {
            font-size: 15px;
            font-weight: 500;
        }

        /* Main Content */
        .main-content {
            margin-left: 260px;
            margin-top: 70px;
            padding: 30px;
            min-height: calc(100vh - 70px);
            transition: margin-left 0.3s ease;
        }

        .main-content.expanded {
            margin-left: 0;
        }

        .page-header {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 2rem;
            font-weight: 700;
            color: #333;
            margin: 0;
        }

        .page-subtitle {
            color: #666;
            font-size: 16px;
            margin: 5px 0 0 0;
        }

        /* Table Styles */
        .data-table {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            overflow: hidden;
        }

        .table-header {
            padding: 20px 25px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: between;
            align-items: center;
        }

        .table-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #333;
        }

        .search-field {
            flex: 1;
            max-width: 300px;
            margin-left: 20px;
        }

        .search-field input {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px 15px;
            width: 100%;
            font-size: 14px;
        }

        .search-field input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102,126,234,0.1);
        }

        /* Badge Styles */
        .badge-custom {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .badge-info { background: #17a2b8; color: white; }
        .badge-primary { background: #667eea; color: white; }
        .badge-success { background: #28a745; color: white; }
        .badge-danger { background: #dc3545; color: white; }
        .badge-warning { background: #ffc107; color: #333; }
        .badge-light { background: #f8f9fa; color: #333; border: 1px solid #ddd; }

        /* Button Styles */  
        .btn-custom {
            padding: 8px 16px;
            border-radius: 8px;
            border: none;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-outline-primary {
            border: 1px solid #667eea;
            color: #667eea;
            background: transparent;
        }

        .btn-outline-primary:hover {
            background: #667eea;
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar-search {
                display: none;
            }

            .navbar-toggle {
                display: block;
            }

            .sidebar-wrapper {
                transform: translateX(-100%);
            }

            .sidebar-wrapper.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                padding: 20px 15px;
            }

            .page-header {
                padding: 20px;
            }

            .page-title {
                font-size: 1.5rem;
            }

            .table-header {
                flex-direction: column;
                gap: 15px;
                align-items: stretch;
            }

            .search-field {
                margin-left: 0;
                max-width: none;
            }
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }

        /* Overlay for mobile sidebar */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 998;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .sidebar-overlay.show {
            opacity: 1;
            visibility: visible;
        }
    </style>
</head>
<body>

<div class="modal fade" id="winnerModal2" tabindex="-1" aria-labelledby="winnerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="winnerModalLabel">Detail Peserta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="pesertaId">
        <div class="mb-3">
          <label for="pesertaNama" class="form-label">Nama</label>
          <input type="text" id="pesertaNama" class="form-control" readonly>
        </div>

        <div class="mb-3">
          <label for="pesertaAlamat" class="form-label">Alamat</label>
          <input type="text" id="pesertaAlamat" class="form-control" readonly>
        </div>

        <div class="mb-3">
          <label for="pesertaNote" class="form-label">Note Peserta</label>
          <input type="text" id="pesertaNote" class="form-control" readonly>
        </div>

        <div class="mb-3">
          <label for="pesertaPekerjaan" class="form-label">Pekerjaan Peserta</label>
          <input type="text" id="pesertaPekerjaan" class="form-control" readonly>
        </div>

     

        <div class="mb-3">
        <label for="PesertaHobby" class="form-label">Hobi</label>
        <input type="text" id="PesertaHobby" class="form-control" readonly>
        </div>



        <div class="mb-3">
          <label for="PesertaPengalaman" class="form-label">Pengalaman</label>
          <input type="text" id="PesertaPengalaman" class="form-control" readonly>
        </div>


  

        
        <div class="mb-3">
          <label for="pesertaNo" class="form-label">No HP / WA</label>
          <input type="text" id="pesertaNo" class="form-control" readonly>
        </div>
      
      </div>
      <div class="modal-footer">
        <!-- <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button> -->
        <!-- <button class="btn btn-primary">Simpan</button> -->
      </div>
    </div>
  </div>
</div>

    <!-- Main Navbar -->
    <nav class="main-navbar">
        <div class="navbar-brand">
            <img src="https://assetscinetrons.b-cdn.net/LOGO%20IDT.png" alt="IDT Logo">
            <span>Indonesia Dream Talent</span>
        </div>

        <div class="navbar-search">
            <div class="search-wrapper">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-input" placeholder="Cari peserta, pengumuman...">
            </div>
        </div>

        <div class="navbar-actions">
            <button class="navbar-toggle" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>

            <div class="profile-dropdown" id="profileDropdown">
                <a href="#" class="profile-trigger">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face" alt="Profile" class="profile-avatar">
                    <span class="profile-name">Admin User</span>
                    <i class="fas fa-chevron-down dropdown-arrow"></i>
                </a>
                
                <div class="dropdown-menu-custom">
                
               
                    <div style="height: 1px; background: #eee; margin: 5px 0;"></div>
                    <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display:none;">
                        @csrf
                    </form>

                    <a href="#" class="dropdown-item-custom" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Keluar</span>
                    </a>

                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar-wrapper" id="sidebar">
        <ul class="sidebar-nav">
            <li class="nav-item">
                <a href="#" class="nav-link-custom active" data-page="dashboard">
                    <i class="fas fa-tachometer-alt nav-icon"></i>
                    <span class="nav-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link-custom" data-page="peserta">
                    <i class="fas fa-users nav-icon"></i>
                    <span class="nav-title">Data Peserta Audisi</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link-custom" data-page="finalis">
                    <i class="fas fa-star nav-icon"></i>
                    <span class="nav-title">Data Finalis</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link-custom" data-page="datapemenang">
                    <i class="fas fa-trophy nav-icon"></i>
                    <span class="nav-title">Data Pemenang</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link-custom" data-page="pemenang">
                    <i class="fas fa-trophy nav-icon"></i>
                    <span class="nav-title">Tambah Pemenang</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link-custom" data-page="pengumuman">
                    <i class="fas fa-bullhorn nav-icon"></i>
                    <span class="nav-title">Pengumuman</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Sidebar Overlay (Mobile) -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <div class="page-header fade-in">
            <h1 class="page-title">Selamat Datang</h1>
            <p class="page-subtitle">Dashboard Admin - Indonesia Dream Talent 2025</p>
        </div>

        <div class="data-table fade-in">
            <div class="table-header">
                <h4 class="table-title">Daftar Peserta Audisi</h4>
                <div class="search-field">
                    <input type="text" placeholder="Cari peserta..." id="tableSearch">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>NO#</th>
                            <th>NAMA PESERTA</th>
                            <th>KATEGORI AUDISI</th>
                            <th>KATEGORI PESERTA</th>
                            <th>STATUS PESERTA</th>
                            <th>JENIS KELAMIN</th>
                            <th class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody id="pesertaTable">
                        @foreach ($data_audisi as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0 font-weight-bold">{{ $item->nama_lengkap }}</p>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge badge-info">{{ $item->kategori_audisi }}</span>
                                </td>
                                <td>
                                    <span class="badge badge-primary">{{ $item->kategori_peserta }}</span>
                                </td>
                                <td>
                                    <span class="badge 
                                        {{ $item->status == 'finalis' ? 'badge-success' : 
                                            ($item->status == 'eliminasi' ? 'badge-danger' : 
                                            
                                            ($item->status == 'pending' ? 'badge-warning' : 'badge-primary')) }}">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                                <td>
                                    @if($item->jenis_kelamin == 'pria')
                                        <span class="badge badge-light">Laki-laki</span>
                                    @else
                                        <span class="badge badge-light">Perempuan</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <!-- <button class="btn-custom btn-outline-primary" onclick="viewDetail({{ $item->id }})">
                                        <i class="fas fa-eye"></i>
                                        Detail
                                    </button> -->

                                    <button class="btn-custom btn-outline-primary expand-btn" data-id="{{ $item->id }}">
                                    <i class="fas fa-eye"></i>
                                    Detail
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
           <!-- Modal -->
<div class="modal fade" id="expandModal" tabindex="-1" aria-labelledby="expandModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl"> <!-- Ganti jadi modal-xl untuk modal lebar -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="expandModalLabel">Detail Peserta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Grid isi dimuat lewat JS -->
        <div class="row">
          <!-- Kiri: Video -->
          <div class="col-md-6">
          <div style="aspect-ratio: 4 / 3; width: 100%;">
            <iframe id="videoFrame" allowfullscreen style="width: 100%; height: 100%; border: none;"></iframe>
            </div>
          </div>

          <!-- Kanan: Detail -->
          <div class="col-md-6">
            <div id="details"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- Modal Foto Peserta -->
<div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="photoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="photoModalLabel">Foto Peserta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <img id="photoModalImg" src="" alt="Foto Peserta" style="max-width: 100%; max-height: 400px; border-radius: 8px;">
      </div>
    </div>
  </div>
</div>


            <div class="d-flex justify-content-between align-items-center p-3">
                <div class="text-muted">
                    Menampilkan 1-3 dari 3 peserta
                </div>
                <nav>
                    <ul class="pagination mb-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Sebelumnya</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">Selanjutnya</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>

    <script>
        // DOM Ready
        $(document).ready(function() {
            initializeNavbar();
            initializeSidebar();
            initializeSearch();
        });

        // Initialize Navbar
        function initializeNavbar() {
            // Profile dropdown toggle
            $('#profileDropdown').on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                $(this).toggleClass('active');
            });

            // Close dropdown when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('#profileDropdown').length) {
                    $('#profileDropdown').removeClass('active');
                }
            });

            // Mobile sidebar toggle
            $('#sidebarToggle').on('click', function() {
                $('#sidebar').toggleClass('show');
                $('#sidebarOverlay').toggleClass('show');
                $('body').toggleClass('sidebar-open');
            });

            // Close sidebar when clicking overlay
            $('#sidebarOverlay').on('click', function() {
                $('#sidebar').removeClass('show');
                $(this).removeClass('show');
                $('body').removeClass('sidebar-open');
            });
        }

        // Initialize Sidebar
        function initializeSidebar() {
            $('.nav-link-custom').on('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all links
                $('.nav-link-custom').removeClass('active');
                
                // Add active class to clicked link
                $(this).addClass('active');
                
                // Get page data
                const page = $(this).data('page');
                
                // Close mobile sidebar
                if (window.innerWidth <= 768) {
                    $('#sidebar').removeClass('show');
                    $('#sidebarOverlay').removeClass('show');
                    $('body').removeClass('sidebar-open');
                }
                
                // Load page content (placeholder)
                loadPageContent(page);
            });
        }

        // Initialize Search
        function initializeSearch() {
            // Main search
            $('.search-input').on('input', function() {
                const searchTerm = $(this).val().toLowerCase();
                console.log('Searching for:', searchTerm);
                // Implement search logic here
            });

            // Table search
            $('#tableSearch').on('input', function() {
                const searchTerm = $(this).val().toLowerCase();
                
                $('#pesertaTable tr').each(function() {
                    const rowText = $(this).text().toLowerCase();
                    if (rowText.includes(searchTerm)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        }

        // Load Page Content
// PERBAIKAN JAVASCRIPT

function loadPageContent(page) {
    console.log('Loading page:', page); // Debug log
    
    const pageTitle = {
        'dashboard': 'Dashboard',
        'peserta': 'Data Peserta',
        'finalis': 'Data Finalis',
        'eliminasi': 'Data Eliminasi', // Tambahkan ini jika belum ada
        'pemenang': 'Tambah Pemenang',
        'pengumuman': 'Pengumuman',
        'datapemenang': 'Data Pemenang'

    };

    // Update title
    $('.page-title').text(pageTitle[page] || 'Dashboard');
    $('.page-subtitle').text(`Halaman ${pageTitle[page] || 'Dashboard'} - Indonesia Dream Talent 2025`);

    // Tampilkan loading indicator
    $('#mainContent').html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i> Memuat...</div>');

    fetch(`/table/${page}`)
        .then(response => {
            console.log('Response status:', response.status); // Debug log
            console.log('Response ok:', response.ok); // Debug log
            
            if (!response.ok) {
                throw new Error(`HTTP ${response.status}: Halaman tidak ditemukan`);
            }
            return response.text();
        })
        .then(html => {
            console.log('HTML received:', html.substring(0, 100) + '...'); // Debug log
            
            // Cek apakah HTML mengandung class .data-table
            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = html;
            const dataTable = tempDiv.querySelector('.data-table');

            if (!dataTable) {
                console.error('HTML received:', html); // Debug log
                throw new Error("Konten tidak valid. Pastikan view berisi elemen dengan class 'data-table'");
            }

            // Ganti konten lama
            $('#mainContent').html(dataTable.outerHTML);

            // Inisialisasi ulang tombol detail
            initializeDetailButtons();
            initializeDetailButtons2();

            
            console.log('Page loaded successfully'); // Debug log
        })
        .catch(err => {
            console.error('Load error:', err); // Debug log
            $('#mainContent').html(`
                <div class="alert alert-danger">
                    <h4>Gagal Memuat Halaman</h4>
                    <p>${err.message}</p>
                    <button class="btn btn-primary" onclick="loadPageContent('${page}')">
                        Coba Lagi
                    </button>
                </div>
            `);
        });
}

function initializeDetailButtons() {
    $('.expand-btn').off('click').on('click', function() {
        var pesertaId = $(this).data('id');
        console.log('Detail button clicked for ID:', pesertaId); // Debug log
        
        // Implementasi load detail peserta
        loadDetailPeserta(pesertaId);
    });
}


function initializeDetailButtons2() {
  $('.expand-btns').off('click').on('click', function () {
    var pesertaId = $(this).data('id');
    var pesertaNama = $(this).data('nama');
    var pesertaNo = $(this).data('no');
    var pesertaAlamat = $(this).data('alamat');
    var pesertaPengalaman = $(this).data('pengalaman');
    var pesertaPekerjaan = $(this).data('pekerjaan');
    var pesertaHobby = $(this).data('hobby');
    var pesertaNote = $(this).data('note');


    $('#pesertaId').val(pesertaId);
    $('#pesertaNama').val(pesertaNama);
    $('#pesertaNo').val(pesertaNo);
    $('#pesertaAlamat').val(pesertaAlamat);
    $('#PesertaPengalaman').val(pesertaPengalaman);
    $('#pesertaPekerjaan').val(pesertaPekerjaan); // <--- diperbaiki
    $('#PesertaHobby').val(pesertaHobby);
    $('#pesertaNote').val(pesertaNote);


    var modal = new bootstrap.Modal(document.getElementById('winnerModal2'));
    modal.show();
  });
}



// Jalankan saat dokumen siap
$(document).ready(function () {
    initializeDetailButtons2();
});





function loadDetailPeserta(id) {
 
 var pesertaData = {
     id: id,
     nama: $('button[data-id="'+id+'"]').data('nama') || 'Nama tidak ditemukan',
     no: $('button[data-id="'+id+'"]').data('no') || 'No tidak ditemukan'
 };

 $('#pesertaId').val(pesertaData.id);
 $('#pesertaNama').val(pesertaData.nama);
 $('#pesertaNo').val(pesertaData.no);
 $('#usersId').val(pesertaData.id);
 $('#juara').val('');
 $('#note').val('');
 $('#waMessage').val('');

 var modal = new bootstrap.Modal(document.getElementById('winnerModal'));
 modal.show();
}

// Test function untuk debugging
function testRoute(page) {
    fetch(`/table/${page}`)
        .then(response => response.text())
        .then(html => {
            console.log('Test result for', page, ':', html);
        })
        .catch(err => {
            console.error('Test error for', page, ':', err);
        });
}

// Fungsi untuk test semua route
function testAllRoutes() {
    const pages = ['peserta', 'finalis', 'eliminasi'];
    pages.forEach(page => {
        console.log(`Testing ${page}...`);
        testRoute(page);
    });
}


        // View Detail Function
        function viewDetail(id) {
            alert(`Melihat detail peserta dengan ID: ${id}`);
            // Implement modal or page navigation here
        }

        // Logout Handler
        function handleLogout() {
            if (confirm('Apakah Anda yakin ingin keluar?')) {
                // Implement logout logic here
                alert('Logout berhasil!');
            }
        }

        // Responsive Handler
        $(window).on('resize', function() {
            if (window.innerWidth > 768) {
                $('#sidebar').removeClass('show');
                $('#sidebarOverlay').removeClass('show');
                $('body').removeClass('sidebar-open');
            }
        });


        $('.expand-btn').on('click', function() {
    var pesertaId = $(this).data('id');
    var url = '/admin/peserta/' + pesertaId;

    $.get(url, function(data) {
        $('#expandModal').modal('show');

        // Menangani Video YouTube
        if (data.link_vidio) {
        var youtubeVideoUrl = data.link_vidio;
        var videoId = extractYouTubeVideoId(youtubeVideoUrl);
        if (videoId) {
            var embedUrl = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
            $('#videoFrame').attr('src', embedUrl).show();
        } else {
            $('#videoFrame').hide();
        }
        } else {
        $('#videoFrame').hide();
        }

        // Menampilkan Detail Peserta
        $('#details').html(`
        

    
    <table class="table table-bordered" style="font-size: 0.85em;">

             <tr>
            <td style="padding:4px 8px;"><strong>Foto Peserta:</strong></td>

           <td style="padding:4px 8px;">
              ${data.photo 
                ? `<button id="btnShowPhoto" class="btn btn-primary btn-sm" type="button" data-photo="/storage/${data.photo}">Lihat Foto Peserta</button>` 
                : 'N/A'}
            </td>
        </tr>
        <tr>
            <td style="padding:4px 8px;"><strong>Nama Lengkap:</strong></td>
            <td style="padding:4px 8px;">${data.nama_lengkap || 'N/A'}</td>
        </tr>
        <tr>
            <td style="padding:4px 8px;"><strong>Kategori Audisi:</strong></td>
            <td style="padding:4px 8px;">${data.kategori_audisi || 'N/A'}</td>
        </tr>
        <tr>
            <td style="padding:4px 8px;"><strong>Kategori Peserta:</strong></td>
            <td style="padding:4px 8px;">${data.kategori_peserta || 'N/A'}</td>
        </tr>
        <tr>
            <td style="padding:4px 8px;"><strong>Jenis Kelamin:</strong></td>
            <td style="padding:4px 8px;">${data.jenis_kelamin || 'N/A'}</td>
        </tr>
        <tr>
            <td style="padding:4px 8px;"><strong>Alamat Peserta:</strong></td>
            <td style="padding:4px 8px;">${data.alamat || 'N/A'}</td>
        </tr>
        <tr>
            <td style="padding:4px 8px;"><strong>Status Peserta:</strong></td>
            <td style="padding:4px 8px;"><span class="badge ${getStatusBadgeClass(data.status)}">${data.status || 'N/A'}</span></td>
        </tr>
        <tr>
            <td style="padding:4px 8px;"><strong>Provinsi Peserta:</strong></td>
            <td style="padding:4px 8px;">${data.provinsi || 'N/A'}</td>
        </tr>
        <tr>
            <td style="padding:4px 8px;"><strong>Kota Peserta:</strong></td>
            <td style="padding:4px 8px;">${data.kota || 'N/A'}</td>
        </tr>
        <tr>
            <td style="padding:4px 8px;"><strong>Pekerjaan Peserta:</strong></td>
            <td style="padding:4px 8px;">${data.pekerjaan || 'N/A'}</td>
        </tr>
        <tr>
            <td style="padding:4px 8px;"><strong>Hobby Peserta:</strong></td>
            <td style="padding:4px 8px;">${data.hobby || 'N/A'}</td>
        </tr>
        <tr>
            <td style="padding:4px 8px;"><strong>Pengalaman Peserta:</strong></td>
            <td style="padding:4px 8px;">${data.pengalaman || 'N/A'}</td>
        </tr>
        <tr>
            <td style="padding:4px 8px;"><strong>Nama Orangtua:</strong></td>
            <td style="padding:4px 8px;">${data.nama_ortu || 'N/A'}</td>
        </tr>
        <tr>
            <td style="padding:4px 8px;"><strong>Pekerjaan Orangtua:</strong></td>
            <td style="padding:4px 8px;">${data.pekerjaan_ortu || 'N/A'}</td>
        </tr>
        <tr>
            <td style="padding:4px 8px;"><strong>Updated By :</strong></td>
           <td style="padding:4px 8px;">{{ Auth::user()->name }}</td>

        </tr>
        <tr>
            <td style="padding:4px 8px;"><strong>Catatan:</strong></td>
            <td style="padding:4px 8px;">
                <textarea id="note" name="note" rows="3" class="form-control">${data.note || ''}</textarea>
             
            </td>
        </tr>
    </table>
        <div class="button-container">
            <button id="eliminasiBtn" class="btn btn-danger" data-id="${pesertaId}">Eliminasi</button>
            <button id="loloskanBtn" class="btn btn-success" data-id="${pesertaId}">Loloskan</button>
        </div>
        `);

        // Menangani Status Peserta
        $('#eliminasiBtn').on('click', function() {
        updateStatus($(this).data('id'), 'eliminasi');
        });

        $('#loloskanBtn').on('click', function() {
        updateStatus($(this).data('id'), 'finalis');
        });

    }).fail(function() {
        alert('Gagal memuat data peserta');
    });
    });

function extractYouTubeVideoId(url) {
  var videoId = null;
  var regex = /(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|\S*\?v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
  var match = url.match(regex);
  if (match) {
    videoId = match[1];
  }
  return videoId;
}

function getStatusBadgeClass(status) {
  switch (status) {
    case 'finalis':
      return 'badge-success';
    case 'eliminasi':
      return 'badge-danger';
    default:
      return 'badge-primary';
  }
}

function updateStatus(pesertaId, status) {
  const actionText = status === 'finalis' ? 'meloloskan' : 'mengeliminasi';

  if (!confirm(`Apakah Anda yakin ingin ${actionText} peserta ini?`)) {
    return;
  }

  const note = $('#note').val(); // ✅ Ambil nilai catatan di sini
  const statusElement = $('#statusPeserta-' + pesertaId);
  const originalStatus = statusElement.text();
  statusElement.html('<i class="ti-reload fa-spin"></i> Memproses...');

  $.ajax({
    url: '/admin/update-status/' + pesertaId,
    type: 'POST',
    data: {
      status: status,
      note: note, // ✅ Sertakan catatan di payload
      _token: '{{ csrf_token() }}'
    },
    success: function(response) {
      statusElement.text(status);
      statusElement.removeClass().addClass('badge ' + getStatusBadgeClass(status));
      alert(`Status peserta berhasil diubah menjadi ${status}`);
      setTimeout(function() {
        location.reload();
      }, 1500);
    },
    error: function(xhr) {
      statusElement.text(originalStatus);
      alert('Gagal mengubah status peserta: ' + (xhr.responseJSON?.message || 'Terjadi kesalahan'));
    }
  });
}

$(document).on('click', '#btnShowPhoto', function () {
  const photo = $(this).data('photo');
  $('#photoModalImg').attr('src', photo);
  const photoModal = new bootstrap.Modal(document.getElementById('photoModal'));
  photoModal.show();
});

$('#expandModal').on('hidden.bs.modal', function () {
  $('#videoFrame').attr('src', '').hide();
  $('#details').empty();
});

    </script>
    
</body>

</html>
