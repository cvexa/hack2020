<?php include './includes/admin/header.php'; ?>
<?php include './includes/admin/sidebar.php'; ?>

<?php
include './php/db_connect.php';

$read_query = "SELECT * FROM `doctors` WHERE `doctor_id` = ". $_SESSION['doctor_id'];
$result = mysqli_query($conn, $read_query);

if( $result ){
    $row = mysqli_fetch_assoc($result);
}
?>


        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <div class="box-header with-border text-center">
                </div>

                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h2 class="box-title" style="font-weight: bold"><?php echo "д-р ". $_SESSION['first_name'] ." ". $_SESSION['last_name'] ?></h2><br/>
                        <img src="<?=substr($row['photo'],1)?>" width="50%">
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <? $_SESSION['success']; ?>
                    <form role="form" method="post" enctype="multipart/form-data" id = "id_form" action="./php/write_doc_details.php">
                        <div class="box-body">

                            <div class="form-group">
                                <label for="exampleInputFile">Прикачете снимка</label>
                                <input name="photo" type="file" id="photo">
                            </div>


                            <div class="form-group">
                                <label for="first_name">Име</label>
                                <input type="text" name="first_name" class="form-control" id="first_name" value="<?=$row['first_name']?>" placeholder="Име">
                            </div>


                            <div class="form-group">
                                <label for="last_name">Фамилия</label>
                                <input type="text" name="last_name" class="form-control" id="last_name" value="<?=$row['last_name']?>" placeholder="Фамилия">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputSpeciality1">Специалност</label>
                                <input type="text" name="speciality" class="form-control" id="exampleInputSpeciality1" value="<?=$row['speciality']?>" placeholder="Въведете специалност">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPhone1">Телефонен номер</label>
                                <input type="text" name="phone" class="form-control" id="exampleInputPhone1" value="<?=$row['phone']?>"placeholder="08** *** ***">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputBiography1">Автобиография</label>
                                <textarea name="biography" rows="10" cols="30" class="form-control" id="exampleInputBiography1"  placeholder="Въведете професионална биография" form = "id_form" style = "text-align: left">
                                <?=$row['biography']?>
                                </textarea>
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
        </div>
            <!--/.col (left) -->
    <?php unset($_SESSION['success']); ?>
    <!-- /.content -->
<?php include './includes/admin/footer.php'; ?>
