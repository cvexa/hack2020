<?php include './includes/header.php'; ?>
<link rel="stylesheet" href="./bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<?php include 'php/functions-single-doctor.php'; ?>
<!--====== TEAM START ======-->

<section id="team" class="team-area pt-120 pb-130">
    <div class="container">
        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <div class="col-md-12 text-center">
                    <?php 
                        if (isset($_GET['doctor_id'])){
                           $doctorData = getDoctorData($conn, $_GET['doctor_id']);
                        }                   
                    ?>
                    <img class="profile-user-img img-responsive img-circle" src=
                    <?php 
                       if (isset($_GET['doctor_id'])){
                           echo '"' . $doctorData[$_GET['doctor_id']]['photo'] . '" ';
                        }  
                    ?>   
                     alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">
                    <?php 
                       if (isset($_GET['doctor_id'])){
                           echo $doctorData[$_GET['doctor_id']]['first_name'] . ' ' . $doctorData[$_GET['doctor_id']]['last_name'];
                        }  
                    ?>                    
                </h3>

                <p class="text-muted text-center">
                     <?php 
                       if (isset($_GET['doctor_id'])){
                           echo $doctorData[$_GET['doctor_id']]['speciality'];
                        }  
                    ?>    
                </p>

                 <p class="text-muted text-center">
                     <?php 
                       if (isset($_GET['doctor_id'])){
                           echo $doctorData[$_GET['doctor_id']]['phone'];
                        }  
                    ?>    
                </p>

                <ul class="list-group list-group-unbordered">
                    <?php 
                        if (isset($_GET['doctor_id'])){
                           $patientsWaiting = getPatientsWaiting($conn, $_GET['doctor_id']);
                        }                   
                    ?>
                    <li class="list-group-item">
                        <strong>Брой чакащи пациенти:</strong> <span id="countPatients" class="pull-right"><?php echo sizeof($patientsWaiting); ?></span>
                    </li>
                    <li class="list-group-item">
                        <strong>Очаквано време за прием:</strong> <span class="pull-right">След <?php echo (sizeof($patientsWaiting) * 7); ?> минути</span>
                    </li>
                </ul>                           
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->


        <div class="box box-primary">
            <div class="box-body box-profile row">
                <?php if(!isset($_GET['code'])){ ?>
                <form method = "POST" action="add-patient.php">
                <div class="col-md-12 text-center d-flex flex-row col-md-12 flex-wrap">
                        <div class="col-md-6" style="margin-top:2%">
                            <input type="text" name="patientName" placeholder="Въведете име">
                        </div>
                         <div class="col-md-6" style="margin-top:2%">
                            <input type="text" name="patientAge" placeholder="Въведете години">
                        </div>
                        <input type="hidden" value='reason' name="patientReason" placeholder="Оплаквания">
                        <input type="hidden" value=<?php echo '"' . $_GET['doctor_id'] . '"'; ?> name="doctorId" placeholder="Оплаквания">
                       <div class="col-md-12" style="margin-top:2%;margin-bottom: 2%">
                            <input type="submit" class="btn btn-primary btn-block" name="" value="Влез в чакалнята">
                        </div>
                   
                </div>
                 </form>
             <?php }else{?>
                <div class="col-md-12">
                    <p style="font-weight: bold">Твоят код е : <?php echo $_GET['code']; ?></p>
                </div>
             <?php } ?>
                              
            </div>
            <!-- /.box-body -->
        </div>


        <div class="col-xs-12">
            <div class="box">
                 <div class="box-header">
                     <h3 class="box-title">Списък на чакащите пациенти без запазен час</h3>
                 </div>
                 <div class="box-body">
                    <div class="col-sm-12 d-flex flex-row">
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
        
    </div> <!-- container -->
</section>
<script type="text/javascript">
    window.onload = function() {
        displayCircles();
    };
</script>
<script src="js/script-doctor-single.js"></script>
<!--====== TEAM  ENDS ======-->
<?php include './includes/footer.php'; ?>
