<?php include './includes/admin/header.php'; ?>
<?php include './includes/admin/sidebar.php'; ?>
<?php include 'php/functions-schedule.php'; ?>
<!-- DataTables -->
<link rel="stylesheet" href="./bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Tables
        <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Hover Data Table</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="schedule-table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Час</th>
                            <th>Заведение</th>
                            <th>Име</th>
                            <th>Години</th>
                            <th>Причина</th>
                            <th>...</th>
                            <th>...</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $arrayAppoitments = returnAppointments($conn);
                                printTable($arrayAppoitments);
                            ?>                      
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Час</th>
                            <th>Заведение</th>
                            <th>Име</th>
                            <th>Години</th>
                            <th>Причина</th>
                            <th>...</th>
                            <th>...</th>
                        </tr>
                        </tfoot>
                    </table>       
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>

<?php include './includes/admin/footer.php'; ?>
