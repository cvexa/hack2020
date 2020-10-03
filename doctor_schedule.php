<?php session_start(); ?>
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
        <div class="box">
        <div class="col-sm-12">
             <div class="box-header">
             <div class="col-sm-2">
                Чакащи пациенти: <span id="numberOfPatients"> </span>
                <?php 
                    $patientsWaiting = getPatientsWaiting($conn);
                ?>                
             </div>
              <div class="col-sm-2">
                    <form method="POST" action="php/patients-update.php">
                        <input type="hidden" name="id" value=<?php echo '"' . array_key_first($patientsWaiting) . '"' ?>>
                        <input type="button" name="nextPatient" id="nextPatient" value="Да влезе следващият">
                    </form>                  
             </div>
             <div class="col-sm-8">
                    <form method="POST" action="php/add-patients.php">
                        <div class="col-sm-4">
                            <input type="text" id="addPatientName">
                        </div>
                         <div class="col-sm-4">
                            <input type="number" id="addPatientAge">
                        </div>                         
                        <div class="col-sm-4">
                             <input type="button" id="addPatient" value="Добави чакащ пациент">
                        </div> 
                    </form>                  
             </div>
         </div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-2">
                <span id="spanOne"></span>
                <img id="imageOne" src="images/default.png" class="responsive">
            </div>
            <div class="col-sm-10">
                <div class="col-sm-2">
                    <span id="spanTwo"></span>
                    <img id="imageTwo" src="images/default.png" class="responsive">
                </div>
                <div class="col-sm-2">
                    <span id="spanThree"></span>
                    <img id="imageThree" src="images/default.png" class="responsive">
                </div>
                <div class="col-sm-1">
                    <span id="spanFour"></span>
                    <img id="imageFour" src="images/default.png" class="responsive">
                </div>              
                <div class="col-sm-1">
                    <span id="spanFive"></span>
                    <img id="imageFive" src="images/default.png" class="responsive">
                </div>
                 <div class="col-sm-1">
                    <span id="spanSix"></span>
                    <img id="imageSix" src="images/default.png" class="responsive">
                </div>
                 <div class="col-sm-1">
                    <span id="spanSeven"></span>
                    <img id="imageSeven" src="images/default.png" class="responsive">
                </div>
                 <div class="col-sm-1">
                    <span id="spanEight"></span>
                    <img id="imageEight" src="images/default.png" class="responsive">
                </div>
                 <div class="col-sm-1">
                    <span id="spanNine"></span>
                    <img id="imageNine" src="images/default.png" class="responsive">
                </div>
                 <div class="col-sm-1">
                    <span id="spanTen"></span>
                    <img id="imageTen" src="images/default.png" class="responsive">
                </div>
                 <div class="col-sm-1">
                    <span id="spanEleven"></span>
                    <img id="imageEleven" src="images/default.png" class="responsive">
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
