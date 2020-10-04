<?php include './includes/admin/header.php'; ?>
<?php include './includes/admin/sidebar.php'; ?>
<?php include 'php/functions-schedule.php'; ?>
<!-- DataTables -->
<link rel="stylesheet" href="./bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        e-Чакалня
        <small>Вътрешен панел</small>
    </h1>   
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Запази и отмени предварително запазени часове</h3>
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

        <div class="col-xs-12">
            <div class="box">
                 <div class="box-header">
                        <h3 class="box-title">Добави и изведи пациент от чакалнята</h3>
                 </div>
                 <div class="box-body">
                    <div class="col-sm-2">
                        <span class="badge badge-pill badge-light">Чакащи пациенти: <span id="numberOfPatients"> </span></span>
                        <?php 
                            $patientsWaiting = getPatientsWaiting($conn);
                        ?>                
                     </div>
                      <div class="col-sm-2">
                            <form method="POST" action="php/patients-update.php">
                                <input type="hidden" name="id" value=<?php echo '"' . array_key_first($patientsWaiting) . '"' ?>>
                                <input type="button" class="btn btn-default" name="nextPatient" id="nextPatient" value="Изведи пациент">
                            </form>                  
                     </div>
                     <div class="col-sm-8">
                            <form method="POST" action="php/add-patients.php">
                                 <input type="hidden" id="doctor_id" value=
                                 <?php 
                                    if(isset($_SESSION['doctor_id'])){
                                        echo '"' . $_SESSION['doctor_id'] . '"';
                                    } else {
                                        echo $_SESSION['doctor_id'] = 0;
                                    }
                                  ?>>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="addPatientName">                                  
                                </div>
                                 <div class="col-sm-4">
                                    <input type="number" class="form-control" id="addPatientAge">
                                </div>                         
                                <div class="col-sm-4">
                                     <input type="button" class="btn btn-default" id="addPatient" value="Добави чакащ пациент">
                                </div> 
                            </form>                  
                     </div>
                 </div>
            </div>
        </div>

        
        <div class="col-xs-12">
            <div class="box">
                 <div class="box-header">
                     <h3 class="box-title">Списък на чакащите пациенти без запазен час</h3>
                 </div>
                 <div class="box-body">
                    <div class="col-sm-12">
                        <div class="col-sm-1 pagination-centered text-center">
                            <span id="spanOne"></span>
                            <img id="imageOne" src="images/1.png" class="responsive">
                        </div>
                         <div class="col-sm-1 pagination-centered text-center">
                                <span id="spanTwo"></span>
                                <img id="imageTwo" src="images/2.png" class="responsive">
                        </div>
                        <div class="col-sm-1 pagination-centered text-center">
                            <span id="spanThree"></span>
                            <img id="imageThree" src="images/3.png" class="responsive">
                        </div>
                        <div class="col-sm-1 pagination-centered text-center">
                            <span id="spanFour"></span>
                            <img id="imageFour" src="images/4.png" class="responsive">
                        </div>              
                        <div class="col-sm-1 pagination-centered text-center">
                            <span id="spanFive"></span>
                            <img id="imageFive" src="images/5.png" class="responsive">
                        </div>
                         <div class="col-sm-1 pagination-centered text-center">
                            <span id="spanSix"></span>
                            <img id="imageSix" src="images/6.png" class="responsive">
                        </div>
                         <div class="col-sm-1 pagination-centered text-center">
                            <span id="spanSeven"></span>
                            <img id="imageSeven" src="images/7.png" class="responsive">
                        </div>
                         <div class="col-sm-1 pagination-centered text-center">
                            <span id="spanEight"></span>
                            <img id="imageEight" src="images/8.png" class="responsive">
                        </div>
                         <div class="col-sm-1 pagination-centered text-center">
                            <span id="spanNine"></span>
                            <img id="imageNine" src="images/9.png" class="responsive">
                        </div>
                         <div class="col-sm-1 pagination-centered text-center">
                            <span id="spanTen"></span>
                            <img id="imageTen" src="images/10.png" class="responsive">
                        </div>
                         <div class="col-sm-1 pagination-centered text-center">
                            <span id="spanEleven"></span>
                            <img id="imageEleven" src="images/11.png" class="responsive">
                        </div>  
                        <div class="col-sm-1 pagination-centered text-center">
                            <span id="spanTwelve"></span>
                            <img id="imageTwelve" src="images/12.png" class="responsive">
                        </div>  
                    </div>
                 </div>
            </div>
        </div>
    </div>

</div>
    </section>
<script type="text/javascript">
    window.onload = function() {
        displayCircles();
    };
</script>
<script src="js/scipt-doctor-schedule.js"></script>
<?php include './includes/admin/footer.php'; ?>
