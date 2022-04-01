<!-- Main Content -->

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Pembayaran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Table Tagihan Mahasiswa </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>NIM</th>
                                        <th>Jurusan</th>
                                        <th>Semester</th>

                                        <th>Jumlah Tagihan</th>
                                        <th>Keterangan</th>
                                        <th>Status Tagihan</th>
                                        <th>Aksi</th>

                                    </tr>
                                    <?php $no = 1;
                                    foreach ($getTagihan as $mhs) {
                                        if ($userData['role'] == '4') {
                                            if ($userData['no_id'] == $mhs['nim']) {
                                    ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $mhs['nama'] ?></td>
                                                    <td><?= $mhs['nim'] ?></td>
                                                    <td><?= $mhs['jurusan'] ?></td>
                                                    <td><?= $mhs['semester'] ?></td>
                                                    <td><?= "Rp " . number_format($mhs['jumlah_tagihan'], 2, ',', '.'); ?></td>
                                                    <td><?= $mhs['keterangan']; ?></td>
                                                    <td><?php if ($mhs['status_tagihan'] == '1') {
                                                            echo "Belum Lunas";
                                                        } else {
                                                            echo "Lunas";
                                                        } ?></td>
                                                    <td> <?php if ($mhs['status_tagihan'] == '1') { ?><button class='btn btn-primary' onClick='bayar(<?= $mhs['id'] ?>)'><i class='fas fa-add-alt'></i>&nbsp; Bayar Tagihan</button><?php } else {
                                                                                                                                                                                                                                echo "<i class='fas fa-check'><i></i>";
                                                                                                                                                                                                                            } ?></td>
                                                </tr>
                                            <?php $no++;
                                            }
                                        } else { ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $mhs['nama'] ?></td>
                                                <td><?= $mhs['nim'] ?></td>
                                                <td><?= $mhs['jurusan'] ?></td>
                                                <td><?= $mhs['semester'] ?></td>
                                                <td><?= "Rp " . number_format($mhs['jumlah_tagihan'], 2, ',', '.'); ?></td>
                                                <td><?= $mhs['keterangan']; ?></td>
                                                <td><?php if ($mhs['status_tagihan'] == '1') {
                                                        echo "Belum Lunas";
                                                    } else {
                                                        echo "Lunas";
                                                    } ?></td>
                                                <td> <?php if ($mhs['status_tagihan'] == '1') { ?><button class='btn btn-primary' onClick='hapus_tagihan(<?= $mhs['id'] ?>)'><i class='fas fa-add-alt'></i>&nbsp; Hapus Tagihan</button><?php } else {
                                                                                                                                                                                                                                    echo "<i class='fas fa-check'><i></i>";
                                                                                                                                                                                                                                } ?></td>
                                            </tr>
                                    <?php $no++;
                                        }
                                    } ?>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                <ul class="pagination mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </section>
</div>



<script>
    function hapus_tagihan(id) {

        let text = "Yakin Ingin Hapus?";
        if (confirm(text) == true) {
            text = "Ok";

        } else {
            text = "Batal";

        }
        if (text == "Ok") {
            $.ajax({
                url: "<?= base_url('/Tagihan/hapus') ?>/" + id,
                method: "post",

                data: {
                    id: id,

                },
                success: function(data) {

                    alert("Berhasil Dihapus");
                    location.reload();

                }
            })

        } else {
            alert("Batal Dihapus");
        }

    }
</script>
<script>
    function bayar(id) {

        let text = "Prosess Bayar?";
        if (confirm(text) == true) {
            text = "Bayar";

        }
        if (text == "Bayar") {
            $.ajax({
                url: "<?= base_url('/Tagihan/bayar') ?>/" + id,
                method: "post",

                data: {
                    id: id,

                },
                success: function(data) {

                    alert("Berhasil Dibayar");
                    location.reload();

                }
            })

        } else {
            alert("Gagal bayar");
        }

    }
</script>