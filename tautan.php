<?php
include 'conn.php';
include 'header.php';

?>
</br>
<!-- Include DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

<div class="container box_1170">
    <div class="section-top-border">
        <!-- Tabel untuk menampilkan tautan -->
        <table id="example1" class="table table-hover display nowrap" style="font-size: 18px;width:100%;font-weight: bold;">
            <thead>
                <tr style="text-align: center;" class="card-header text-center">
                    <th>#</th>
                    <th>
                        <h2>Tautan Bhamada</h2>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1; // Inisialisasi variabel nomor
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><a href="#">Universitas Bhamada Slawi</a></td>
                </tr>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><a href="#">Kemahasiswaan</a></td>
                </tr>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><a href="#">LPM (Lembaga Penjaminan Mutu)</a></td>
                </tr>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><a href="#">LPPM (Lembaga Penelitian dan Pengabdian pada Masyarakat)</a></td>
                </tr>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><a href="#">Unit Perpustakaan</a></td>
                </tr>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><a href="#">Unit Laboratorium Terpadu</a></td>
                </tr>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><a href="#">Unit Humas dan Kerjasama</a></td>
                </tr>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><a href="#">Unit PMB (Penerimaan Mahasiswa Baru)</a></td>
                </tr>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><a href="#">Unit Sarpras</a></td>
                </tr>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><a href="#">Prodi D3 Keperawatan</a></td>
                </tr>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><a href="https://sim-epk.bhamada.ac.id/" target="_blank">Komite Etik</a></td>
                </tr>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><a href="#">Tracer Study</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
include 'footer.php';
?>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>


<!-- DataTables Initialization -->
<script>
    $(document).ready(function() {
        $('#example1').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "processing": true,
            "language": {
                "emptyTable": "Tidak ada data yang ditemukan"
            }
        });
    });
</script>