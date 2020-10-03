<?php include './includes/admin/header.php'; ?>
<?php include './includes/admin/sidebar.php'; ?>
<?php include './php/doctorData.php' ?>
<?php $places = getDoctorPlaces($conn); ?>
<?php $sheduledPlaces = getDoctorScheduledPlaces($conn) ?>
<link rel="stylesheet" href="./bower_components/select2/dist/css/select2.min.css">
<div class="col-md-6" style="margin-top:2%">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Мeнажиране на дни</h3>
            <?php if (isset($_GET['message'])) {
                echo "<span class='success'>" . $_GET['message'] . "</span>";
            }
            ?>
        </div>
        <div class="box-body">
                <!-- Date and time range -->
                <div class="form-group">
                    <label>Дата и час от, до</label>
                    <ul>
                        <?php
                        if(count($sheduledPlaces) > 0) {
                            foreach ($sheduledPlaces as $place) {

                                echo '<form action="./php/deleteDoctorPlaces.php" method="post">';
                                echo "<input type='hidden' name='schedule_place' id='schedule_place' value='" . $place['schedule_id'] . "'>";
                                echo "<li>" . $place['start_date'] . " - " . $place['end_date'] . " - " . $place['place_name'] . "&nbsp;&nbsp;<button class='btn btn-xs btn-danger'>x</button></li>";
                                echo '</form>';

                            }
                        }
                        ?>
                    </ul>

                </div>
                <!-- /.form group -->

                <div class="form-group">
                    <form method="POST" action="./php/processDoctorPlaces.php">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="reservationtime" name="dateTime">
                        </div>
                        <!-- /.input group -->
                    <label>Място</label>
                    <select class="form-control select2" style="width: 100%;" name="places">
                        <?php foreach ($places as $placeId => $place) {
                            echo "<option value='" . $placeId . "'>" . $place['place_name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group text-center">
                    <button class="btn btn-success" style="margin-top:2%;">Запази</button>
                </div>
            </form>
        </div>
        <!-- /.box-body -->
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
        $('.select2').select2({
            tags: true
        });

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
