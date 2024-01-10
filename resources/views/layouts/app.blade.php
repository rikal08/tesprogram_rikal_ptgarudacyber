<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky">
                        <!-- Sidebar content here -->
                        <div class="sidebar">
                            <div class="sidebar-heading">
                                Admin Dashboard
                            </div>
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ url('/') }}">
                                        Dashboard
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ url('tenants') }}">
                                        Tenant
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('customers') }}">
                                        Pelanggan
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('transactions') }}">
                                        Transaksi
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('vouchers') }}">
                                        Voucher
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('form-redeem-voucher') }}">
                                        Redeem Voucher
                                    </a>
                                </li>
                                <!-- Tambahkan item sidebar lainnya sesuai kebutuhan -->
                            </ul>
                        </div>
                </div>
            </nav>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="mt-2">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var searchInput = document.getElementById('customer_search');
            var customersDropdown = document.getElementById('customers_dropdown');
    
            searchInput.addEventListener('input', function () {
                var query = searchInput.value;
    
                console.log('Searching for customers with query:', query);
    
                // Kirim AJAX request untuk mencari pelanggan
                fetch('/get-customers?query=' + query)
                    .then(response => response.json())
                    .then(data => {
                        // Tampilkan hasil pencarian di elemen dropdown
                        customersDropdown.innerHTML = '';
                        data.forEach(customer => {
                            var option = document.createElement('option');
                            option.value = customer.id;
                            option.textContent = customer.customer_name;
                            customersDropdown.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching customers:', error);
                    });
            });
        });
    </script>
    
    
</body>


</html>
