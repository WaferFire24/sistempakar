<?php
session_start();
require_once "koneksi.php";
if (isset($_SESSION['LOG_USER'])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sistem Pakar FC V2</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/datatables/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/bootstrap-select/bootstrap-select.css" rel="stylesheet">
        <link href="assets/css/AdminLTE.min.css" rel="stylesheet">
        <link href="assets/css/skins/_all-skins.min.css" rel="stylesheet">
        <link href="assets/css/custom.css" rel="stylesheet">
        <link href="assets/images/logo.png" type="image/x-icon" rel="shortcut icon">
        <link rel="stylesheet" href="assets/iCheck/flat/_all.css">

        <script src="assets/js/jQuery-2.1.4.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/datatables/js/jquery.dataTables.min.js"></script>
        <script src="assets/datatables/js/dataTables.bootstrap.min.js"></script>
        <script src="assets/bootstrap-select/bootstrap-select.js"></script>
        <script src="assets/iCheck/icheck.min.js"></script>
        <script src="assets/js/app.min.js"></script>
        <script>
            $(document).ready(function() {
                var t = $('#dataTables1').DataTable({
                    "columnDefs": [{
                        "searchable": false,
                        "orderable": false,
                        "targets": 0
                    }],
                    "responsive": true,
                    "bLengthChange": true,
                    "bInfo": true,
                    "oLanguage": {
                        "sSearch": "<i class='fa fa-search fa-fw'></i> Cari : ",
                        "sLengthMenu": "_MENU_ &nbsp;&nbsp;data per halaman",
                        "sInfo": "Menampilkan _START_ s/d _END_ dari <b>_TOTAL_ data</b>",
                        "sInfoEmpty": "",
                        "sInfoFiltered": "(difilter dari _MAX_ total data)",
                        "sZeroRecords": "Pencarian tidak ditemukan",
                        "sEmptyTable": "Tidak ada data"
                    }
                });

                t.on('order.dt search.dt', function() {
                    t.column(0, {
                        search: 'applied',
                        order: 'applied'
                    }).nodes().each(function(cell, i) {
                        cell.innerHTML = i + 1;
                    });
                }).draw();

                $('#confirm-delete').on('show.bs.modal', function(e) {
                    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
                });

            });
        </script>
    </head>

    <body class="hold-transition skin-green-light sidebar-mini">
        <div class="wrapper">
            <!-- Main Header -->
            <header class="main-header">
                <a href="./" class="logo">
                    <span class="logo-mini"><b>FCV2</b></span>
                    <span class="logo-lg"><b>Forward</b> Chaining</span>
                </a>
                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                </nav>
            </header>
            <aside class="main-sidebar">
                <section class="sidebar">
                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu">
                        <li class="header">Menu</li>
                        <?php include "menu.php"; ?>
                    </ul><!-- /.sidebar-menu -->
                </section>
                <!-- /.sidebar -->
            </aside>
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">
                    <?php include "content.php"; ?>
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            <!-- Main Footer -->
            <footer class="main-footer">
                <strong>
                    Copyright ©2020 <i class="fa fa-heart pulse"></i> <b><a style="color: #008cba" href="http://www.mycoding.net" target="_blank">My Coding</a></b>
                </strong>
            </footer>
            <div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->
        <!-- delete modal -->
        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Konfirmasi</h4>
                    </div>
                    <div class="modal-body">
                        <p>Anda yakin akan menghapus data ini ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                        <a class="btn btn-danger btn-ok"><i class="fa fa-trash"></i> Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
} else {
    include "formlogin.php";
}
?>