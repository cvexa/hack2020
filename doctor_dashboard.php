<?php include './includes/admin/header.php'; ?>
<?php include './includes/admin/sidebar.php'; ?>
<section class="content-header">
    <h1>
       Статистика
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
    </ol>
</section>
<div class="col-md-4" style="margin-top:1%">
    <div class="box box-solid">
        <div class="box-header">
            <h3 class="box-title text-danger">Вчера</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body text-center">
            <div class="sparkline" data-type="pie" data-offset="90" data-width="100px" data-height="100px">
                6,4,8
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>

<div class="col-md-4" style="margin-top:1%">
    <div class="box box-solid">
        <div class="box-header">
            <h3 class="box-title text-danger">Днес</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body text-center">
            <div class="sparkline" data-type="pie" data-offset="90" data-width="100px" data-height="100px">
                6,4,8
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>

<div class="col-md-4" style="margin-top:1%">
    <div class="box box-solid">
        <div class="box-header">
            <h3 class="box-title text-danger">Утре</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body text-center">
            <div class="sparkline" data-type="pie" data-offset="90" data-width="100px" data-height="100px">
                2,4,8
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>

<?php include './includes/admin/footer.php'; ?>
