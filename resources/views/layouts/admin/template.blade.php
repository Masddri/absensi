<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>PT Tritama</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('admin/assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('admin/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('admin/assets/js/config.js') }}"></script>
    @yield('css')
    @yield('styles')
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            @include('include.admin.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                @include('include.admin.navbar')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    @yield('content')
                    <!-- / Content -->
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('admin/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('admin/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('admin/assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    {{-- Buat Auto Select Jabatan --}}
    <script>
        document.getElementById('karyawan').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var jabatan = selectedOption.getAttribute('data-jabatan');

            // Set value di dropdown jabatan
            var jabatanDropdown = document.getElementById('jabatan');
            jabatanDropdown.innerHTML = ''; // Kosongkan dulu

            // Tambahkan opsi jabatan yang sesuai
            if (jabatan) {
                var option = document.createElement('option');
                option.value = jabatan;
                option.text = jabatan;
                jabatanDropdown.appendChild(option);
            }
        });
    </script>

    {{-- <script>
        $(document).ready(function() {
            $('#karyawan').change(function() {
                // Ambil nilai dari atribut data-jabatan yang disimpan di option
                var selectedJabatan = $(this).find('option:selected').data('jabatan');
                var jabatanSelect = $('#jabatan');

                // Kosongkan select jabatan sebelumnya
                jabatanSelect.empty();

                // Jika data jabatan ada, tambahkan opsi jabatan yang sesuai
                if (selectedJabatan) {
                    jabatanSelect.append('<option selected>' + selectedJabatan + '</option>');
                } else {
                    jabatanSelect.append('<option selected disabled>-- Jabatan tidak tersedia --</option>');
                }
            });
        });
    </script> --}}


    {{-- Untuk Jam realtime --}}
    <script>
        setInterval(() => {
            const date = new Date();
            document.getElementById('currentTime').textContent = date.toLocaleString();
        }, 1000);
    </script>

    <!-- Script to Automatically Fill Jabatan Based on Selected Karyawan -->
    {{-- <script>
        document.getElementById('karyawan').addEventListener('change', function() {
            var selectedKaryawan = this.options[this.selectedIndex];
            var jabatan = selectedKaryawan.getAttribute('data-jabatan');
            var jabatanField = document.getElementById('jabatan');

            jabatanField.innerHTML = '<option>' + jabatan + '</option>';
        });
    </script> --}}

    @yield('js')
    @yield('script')
    @yield('scripts')

    @include('sweetalert::alert')
</body>

</html>
