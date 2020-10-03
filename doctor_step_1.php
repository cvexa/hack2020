<?php include './includes/admin/header.php'; ?>
<?php include './includes/admin/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Допълнителна информация
            <small>Preview</small>
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
                        <h3 class="box-title">Промяна на данни</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" enctype="multipart/form-data" action="./php/write_doc_details.php">
                        <div class="box-body">0
                            <div class="form-group">
                                <label for="exampleInputPhone1">Phone number</label>
                                <input type="text" name="phone" class="form-control" id="exampleInputPhone1" placeholder="08** *** ***">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputSpeciality1">Speciality</label>
                                <input type="text" name="speciality" class="form-control" id="exampleInputSpeciality1" placeholder="Enter speciality">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputBiography1">Biography</label>
                                <textarea name="biography" rows="10" cols="30" class="form-control" id="exampleInputBiography1" placeholder="Enter your profecianal biogrphy">Worked

Studied</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <input name="photo" type="file" id="photo">
                            </div>
                        </div>

                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    <?php include './includes/admin/footer.php'; ?>
