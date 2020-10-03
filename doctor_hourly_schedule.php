<?php include './includes/admin/header.php'; ?>
<?php include './includes/admin/sidebar.php'; ?>
<?php include './php/doctorData.php' ?>
<?php $places = getTodayPlaces($conn); ?>
<link rel="stylesheet" href="./bower_components/select2/dist/css/select2.min.css">
<div class="col-md-6" style="margin-top:2%">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Манажиране на часове</h3>
            <?php if (isset($_GET['message'])) {
                echo "<span class='success'>" . $_GET['message'] . "</span>";
            }
            ?>
        </div>
        <div class="box-body">
            <!-- /.form group -->

                <div class="form-group">
                    <ul>
                        <?php
                            if(count($places) > 1) {
                                foreach ($places as $place) {
                                    echo "<li>" . $place['start_date'] . " - " . $place['end_date'] . " - " . $place['place_name'] . "</li>";
                                }
                            }
                        ?>
                    </ul>
                </div>
            <form action="./php/processDoctorHours.php" method="POST">
                <div class="bootstrap-timepicker">
                    <!-- /.form group -->
                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                            <label>Time picker:</label>

                            <div class="input-group">
                                <input type="text" class="form-control timepicker" name="start_time">

                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                    </div>
                    <!-- /.form group -->
                </div>

                <div class="form-group">
                    <div class="col-md-12 text-center">
                        <div class="col-md-6">
                            <label>Имена</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="col-md-6">
                            <label>Години</label>
                            <input type="number" class="form-control" id="age" name="age">
                        </div>
                    </div>
                </div>

                <div class="form-group text-center">
                    <button class="btn btn-success" style="margin-top:2%;">Запази</button>
                </div>
            </form>
        </div>
        <!-- /.box-body -->
<!--        <div class="col-md-12 text-center">-->
<!--            <button class="btn btn-info" id="clear">+</button>-->
<!--        </div>-->
    </div>
    <!-- /.box -->
</div>

<!-- jQuery 3 -->
<script src="./bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script>
    $(function () {

        //Initialize Select2 Elements
        $('.select2').select2()

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, locale: {format: 'MM/DD/YYYY hh:mm A'}})
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function (start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        })

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        })

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false
        })
    })
</script>
<?php include './includes/admin/footer.php'; ?>
