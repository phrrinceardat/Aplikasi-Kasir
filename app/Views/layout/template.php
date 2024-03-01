<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Kasir UKK Phrrinc</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('/Dashmin/lib/owlcarousel/assets/owl.carousel.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('/Dashmin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('/Dashmin/lib/select2/css/select2.min.css'); ?>" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('/Dashmin/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url('/Dashmin/css/style.css'); ?>" rel="stylesheet">
</head>

<body>

    <!-- Spinner End -->

    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-light navbar-light">
            <a href="index.html" class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary">Aplikasi Kasir</h3>
            </a>
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">

                    <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0"><?= session()->get('nama_user'); ?></h6>
                    <span class="mb-0"><?= session()->get('level'); ?></span>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <a href="<?= site_url('halaman-admin'); ?>" class="nav-item nav-link"><i class="bi bi-speedometer2"></i>Dashboard</a>
                <div class="nav-item dropdown">
                    <?php if ($akses == 'Admin') : ?>
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-box-seam"></i>Data Produk</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="<?= site_url('satuan-produk'); ?>" class="dropdown-item">Satuan</a>
                            <a href="<?= site_url('kategori-produk'); ?>" class="dropdown-item">Kategori</a>
                            <a href="<?= site_url('data-produk'); ?>" class="dropdown-item">Produk</a>
                        </div>
                </div>
            <?php endif; ?>

            <?php if ($akses == 'Kasir') : ?>
                <div class="navbar-nav w-100">
                    <a href="<?= site_url('transaksi-jual'); ?>" class="nav-item nav-link"><i class="bi bi-cash"></i>Transaksi</a>
                <?php endif; ?>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-box-seam"></i>Laporan</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="<?= site_url('laporan-penjualan'); ?>" class="dropdown-item">Laporan Penjualan</a>
                        <a href="<?= site_url('laporan-stok'); ?>" class="dropdown-item">Laporan Stok</a>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="<?= site_url('data-pengguna'); ?>" class="nav-item nav-link"><i class="bi bi-people"></i>Pengguna</a>
                </div>
        </nav>
    </div>
    <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
            <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
            </a>

            <a href="#" id="sidebar-toggler" class="sidebar-toggler flex-shrink-0">
                <i class="fa fa-bars"></i>
            </a>


            <div class="navbar-nav align-items-center ms-auto">
                <div class="nav-item dropdown">


                    </a>

                </div>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">

                        <span class="d-none d-lg-inline-flex"><?= session()->get('nama_user'); ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="<?= site_url('logout'); ?>" class="dropdown-item">Log Out</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->


        <!-- Blank Start -->
        <div class="container-fluid pt-4 px-4">
            <?php echo $this->renderSection('konten'); ?>
        </div>
        <!-- Blank End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('/Dashmin/lib/chart/chart.min.js'); ?>"></script>
    <script src="<?= base_url('/Dashmin/lib/easing/easing.min.js'); ?>"></script>
    <script src="<?= base_url('/Dashmin/lib/waypoints/waypoints.min.js'); ?>"></script>
    <script src="<?= base_url('/Dashmin/lib/owlcarousel/owl.carousel.min.js'); ?>"></script>
    <script src="<?= base_url('/Dashmin/lib/tempusdominus/js/moment.min.js'); ?>"></script>
    <script src="<?= base_url('/Dashmin/lib/tempusdominus/js/moment-timezone.min.js'); ?>"></script>
    <script src="<?= base_url('/Dashmin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js'); ?>"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- Template Javascript -->
    <link href="/Dashmin/lib/DataTables/datatables.min.css" rel="stylesheet">

    <script src="/Dashmin/lib/DataTables/datatables.min.js"></script>
    <script src="<?= base_url('/Dashmin/ js/main.js'); ?>"></script>
    <script src="<?= base_url('/Dashmin/lib/jquery-mask/jquery.mask.min.js'); ?>"></script>
    <script src="<?= base_url('/Dashmin/lib/js/select2.min.js'); ?>"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggler = document.getElementById('sidebar-toggler');

            sidebarToggler.addEventListener('click', function(event) {
                event.preventDefault(); // Mencegah aksi default dari link

                // Toggle kelas 'active' pada sidebar
                sidebar.classList.toggle('active');
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

    <script>
        $(document).ready(function() {

            //merubah angka menjadi format uang
            $('.uang').mask('000.000.000.000.000', {
                reverse: true
            });

            //merubah angka menjadi format barang stok
            $('.barang').mask('000.000', {
                reverse: true
            });
            $('#myTable').DataTable();
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            periksaKeterkaitanDataSatuan();
            periksaKeterkaitanDataKategori();

            // Periksa keterkaitan satuan
            function periksaKeterkaitanDataKategori() {
                let daftarIdData = [];
                let buttons = document.querySelectorAll('#hapusKategoriProduk');
                buttons.forEach(function(button) {
                    daftarIdData.push(button.dataset.id);
                });

                daftarIdData.forEach(function(idData) {
                    let xhr = new XMLHttpRequest();
                    xhr.open('GET', '<?= site_url('cek-kategori/'); ?>' + idData, true);
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4) {
                            if (xhr.status === 200) {

                                // Respons berhasil diterima
                                let response = JSON.parse(xhr.responseText);

                                if (response.has_relasi) {
                                    let tombol = document.querySelector('#hapusKategoriProduk[data-id="' + idData + '"]');
                                    tombol.disabled = true;

                                    let pesan = document.createElement('span');
                                    pesan.classList.add('pesan-error');
                                    pesan.textContent = 'Data sudah digunakan';

                                    pesan.style.display = 'inline-block';
                                    pesan.style.color = 'red';
                                    pesan.style.marginLeft = '10px';
                                    pesan.style.backgroundColor = 'rgba(255, 0, 0, 0.1)';

                                    tombol.parentNode.insertBefore(pesan, tombol.nextSibling);
                                }
                            } else {
                                // Respons gagal
                                console.error('Terjadi kesalahan saat melakukan permintaan AJAX');
                            }
                        }
                    };
                    xhr.send();
                });
            }

            // Periksa keterkaitan kategori
            function periksaKeterkaitanDataSatuan() {
                let daftarIdData = [];
                let buttons = document.querySelectorAll('#hapusSatuanProduk');
                buttons.forEach(function(button) {
                    daftarIdData.push(button.dataset.id);
                });

                daftarIdData.forEach(function(idData) {
                    let xhr = new XMLHttpRequest();
                    xhr.open('GET', '<?= site_url('cek-satuan/'); ?>' + idData, true);
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4) {
                            if (xhr.status === 200) {

                                // Respons berhasil diterima
                                let response = JSON.parse(xhr.responseText);

                                if (response.has_relasi_satuan) {
                                    let tombol = document.querySelector('#hapusSatuanProduk[data-id="' + idData + '"]');
                                    tombol.disabled = true;

                                    let pesan = document.createElement('span');
                                    pesan.classList.add('pesan-error');
                                    pesan.textContent = 'Data sudah digunakan';

                                    pesan.style.display = 'inline-block';
                                    pesan.style.color = 'red';
                                    pesan.style.marginLeft = '10px';
                                    pesan.style.backgroundColor = 'rgba(255, 0, 0, 0.1)';

                                    tombol.parentNode.insertBefore(pesan, tombol.nextSibling);
                                }
                            } else {
                                // Respons gagal
                                console.error('Terjadi kesalahan saat melakukan permintaan AJAX');
                            }
                        }
                    };
                    xhr.send();
                });
            }
        });
    </script>

    <script>
        // Ambil data dari controller
        // Ambil data dari controller
        var chartData = <?= json_encode($chartData) ?>;

        // Daftar bulan untuk label chart
        var months = chartData.months;

        // Data pendapatan bulanan
        var incomeData = chartData.monthlyIncome;

        // Buat grafik menggunakan Chart.js
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: months,
                datasets: [{
                    label: 'Pendapatan',
                    data: incomeData,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)', // Light blue
                        'rgba(75, 192, 192, 0.2)', // Lighter blue
                        'rgba(102, 227, 236, 0.2)', // Even lighter blue
                        'rgba(129, 252, 255, 0.2)', // Very light blue
                        'rgba(153, 102, 255, 0.2)' // Lighter purple (existing color)
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)', // Blue
                        'rgba(75, 192, 192, 1)', // Medium blue
                        'rgba(102, 227, 236, 1)', // Darker blue
                        'rgba(129, 252, 255, 1)', // Lightest blue
                        'rgba(153, 102, 255, 1)' // Purple (existing color)
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.dropdown-item[href="<?= site_url('logout'); ?>"]').click(function(e) {
                e.preventDefault(); // Prevent default action
                if (confirm("Apakah Anda yakin ingin logout?")) {
                    // User confirmed, proceed with the actual logout link
                    window.location.href = $(this).attr('href');
                }
            });
        });
    </script>

    <!-- <script>
    // menu active
    $(document).ready(function() {
            let currentUrl = window.location.href;
 
            $('.nav-link').each(function() {

                let linkUrl = $(this).attr('href');

                if (currentUrl.indexOf(linkUrl) !== -1) {
                    $(this).addClass('active');
                }
            });
        });
  </script> -->


    <!-- <script>
    function aturStatusPembayaran() {
      let totalBayar = parseFloat($('#jumlahPembayaran').val());
      let totalHargaSemuaBarang = parseFloat($('#totalHargaSemuaBarang').text());

      if (totalBayar >= totalHargaSemuaBarang) {
        $('#btnPembayaran').prop('disabled', false);
      } else {
        $('#btnPembayaran').prop('disabled', true);
      }
    }
  </script> -->

    <!-- <script>
    function aturStatusPembayaran() {
      let totalBayar = parseFloat($('#jumlahPembayaran').val());
      let totalHargaSemuaBarang = parseFloat($('#totalHargaSemuaBarang').text());

      if (totalBayar >= totalHargaSemuaBarang) {
        $('#btnPembayaran').prop('disabled', false);
      } else {
        $('#btnPembayaran').prop('disabled', true);
      }
    }

    // Ketika nilai pembayaran berubah, hitung jumlah kembali dan perbarui tampilan
    $('#jumlahPembayaran').on('input', function() {
      let totalBayar = parseFloat($(this).val());
      let totalHargaSemuaBarang = parseFloat($('#totalHargaSemuaBarang').text());
      let kembali = totalBayar - totalHargaSemuaBarang;

      $('#kembali').val(kembali.toLocaleString('id-ID', {
        style: 'currency',
        currency: 'IDR'
      }));

      // Memanggil fungsi untuk mengatur status pembayaran setiap kali nilai berubah
      aturStatusPembayaran();
    });

    // Saat formulir pembayaran diserahkan, lakukan pembayaran
    $('#formPembayaran').submit(function(e) {
      e.preventDefault();

      let totalBayar = parseFloat($('#jumlahPembayaran').val());
      let totalHargaSemuaBarang = parseFloat($('#totalHargaSemuaBarang').text());

      if (totalBayar >= totalHargaSemuaBarang) {
        let kembali = totalBayar - totalHargaSemuaBarang;
        alert('Pembayaran berhasil! Kembali: ' + kembali.toLocaleString('id-ID', {
          style: 'currency',
          currency: 'IDR'
        }));

        $.ajax({
          type: "POST",
          url: "<?= site_url('pembayaran'); ?>",
          data: $('#formPembayaran').serialize(),
          success: function(response) {
            console.log(response)
          }
        });

        location.reload();
      } else {
        alert('Pembayaran kurang! Jumlah yang dibayarkan harus lebih besar atau sama dengan total harga semua barang.');
      }
    });
  </script> -->


    <!-- <script>
    function perbaruiTotalHarga() {
      var totalHargaSemuaBarang = 0;
      $('.total-harga').each(function() {
        totalHargaSemuaBarang += parseFloat($(this).text().replace(',', '.')); // Ambil nilai total harga setiap item dan tambahkan ke total harga semua barang
      });
      $('#totalHargaSemuaBarang').text(totalHargaSemuaBarang.toFixed(2).toString().replace('.', ','));
    }

    function aturStatusPembayaran() {
      let totalBayar = parseFloat($('#jumlahPembayaran').val());
      let totalHargaSemuaBarang = parseFloat($('#totalHargaSemuaBarang').text());

      if (totalBayar >= totalHargaSemuaBarang) {
        $('#btnPembayaran').prop('disabled', false);
      } else {
        $('#btnPembayaran').prop('disabled', true);
      }
    }

    // Ketika nilai pembayaran berubah, hitung jumlah kembali dan perbarui tampilan
    $('#jumlahPembayaran').on('input', function() {
      let totalBayar = parseFloat($(this).val());
      let totalHargaSemuaBarang = parseFloat($('#totalHargaSemuaBarang').text());
      let kembali = totalBayar - totalHargaSemuaBarang;

      $('#kembali').val(kembali.toLocaleString('id-ID', {
        style: 'currency',
        currency: 'IDR'
      }));

      // Memanggil fungsi untuk mengatur status pembayaran setiap kali nilai berubah
      aturStatusPembayaran();
    });
  </script> -->

</body>

</html>