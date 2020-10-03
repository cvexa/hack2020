<?php include './includes/admin/header.php'; ?>
<?php include './includes/admin/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->

<?php include './php/read_doctor_data.php';?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Вашите данни
    <?php var_dump($_SESSION);?>
        </h1>
        
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="_SESSION">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
    
                        <div class="box-header with-border">
                            <img src="<?=substr($_SESSION['photo'],1)?>" width="50%">
                        </div>
                        <h3 class="box-title"><?php echo "Д-р ". $_SESSION['first_name']. " " .$_SESSION['last_name']?></h3>

                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" enctype="multipart/form-data" action="./php/update_doc_details.php">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputFile">Редактирай снимка</label>
                                <input type="file" id="exampleInputFile">

                                <label for="name">Име</label>
                                <input type="text" name="fist_name" class="form-control" id="name" value="<?=$_SESSION['first_name']?>">
                                
                                <label for="family">Фамилия</label>
                                <input type="text" name="last_name" class="form-control" id="family" value="<?=$_SESSION['last_name']?>">
                                
                                <label for="spec">Специалност</label>
                                <input type="text" name="speciality" class="form-control" id="spec" value="<?=$_SESSION['speciality']?>">
                                
                                <label for="mail">Електронен адрес</label>
                                <input type="email" name="email" class="form-control" id="mail" value="<?=$_SESSION['email']?>">
                                
                                <label for="phone">Телефон</label>
                                <input type="text" name="phone" class="form-control" id="phone" value="<?=$_SESSION['phone']?>">
                                                        
                                <label for="biography">Автобиография</label>
                                <textarea name="biography" rows="10" cols="30" class="form-control" id="biography" value="<?=$_SESSION['biography']?>"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Парола</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" value="<?=$_SESSION['password']?>">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Отпиши ме
                                </label>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Потвърди промените</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (left) -->
        </div>
     </section>

        <!-- /.row -->
</div>
    <?php include './includes/admin/footer.php'; ?>
