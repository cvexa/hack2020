<?php include './includes/admin/header.php'; ?>
<?php include './includes/admin/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Добре дошъл, <?php echo "д-р ". $_SESSION['first_name'] ." ". $_SESSION['last_name'] ?>!
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Допълнителна информация</h3>  
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <? $_SESSION['success']; ?>
                    <form role="form" method="post" enctype="multipart/form-data" action="./php/write_doc_details.php">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputPhone1">Телефонен номер</label>
                                <input type="text" name="phone" class="form-control" id="exampleInputPhone1" placeholder="08** *** ***">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputSpeciality1">Специалност</label>
                                <input type="text" name="speciality" class="form-control" id="exampleInputSpeciality1" placeholder="Въведете специалност">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputBiography1">Автобиография</label>
                                <textarea name="biography" rows="10" cols="30" class="form-control" id="exampleInputBiography1" placeholder="Въведете професионална биография">Работил:

Учил:</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Прикачете снимка</label>
                                <input name="photo" type="file" id="photo">
                            </div>
                        </div>

                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" name="submit" class="btn btn-primary">Потвърди</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </section>
    <?php unset($_SESSION['success']); ?>
    <!-- /.content -->
    <?php include './includes/admin/footer.php'; ?>
