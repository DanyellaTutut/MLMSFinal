<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Ion.RangeSlider -->
    <link href="../vendors/normalize-css/normalize.css" rel="stylesheet">
    <link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <!-- Bootstrap Colorpicker -->
    <link href="../vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link href="../vendors/cropper/dist/cropper.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

    <title>Dependencies</title>
	</head>

    <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php require("sidemenu.php");
                  require("topnav.php");  ?>


                   <!-- page content -->
        <div class="right_col" role="main">

              <div class="col-md-12">
                        <div class="panel panel-success ">
                          <div class="panel-heading" style="text-align: center;" ><label><h1>Business Dependencies</h1></label></div>
                            <div class="panel-body">


                 <div class="col-md-6">
                        <div class="panel panel-success ">
                            <div class="panel-body">


                        <div class="form-group col-md-12">
                        <label class="control-label col-md-5 col-sm-3 col-xs-3">Downpayment:</label>
                        <div class="col-md-5 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" data-inputmask="'mask': '99.99%'">
                          
                        </div>
                      </div>

                      <div class="form-group col-md-12">
                        <label class="control-label col-md-5 col-sm-3 col-xs-3">Reservation Fee:</label>
                        <div class="col-md-5 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" data-inputmask="'mask': '99,999.99'">
                          
                        </div>
                      </div>

                      <div class="form-group col-md-12">
                        <label class="control-label col-md-5 col-sm-3 col-xs-3">Discounted Price for SpotCash:</label>
                        <div class="col-md-5 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" data-inputmask="'mask': '99.99%'">
                          
                        </div>
                      </div>


                       <div class="form-group col-md-12">
                        <label class="control-label col-md-5 col-sm-3 col-xs-3">Refund for cancelation of Reservation:</label>
                        <div class="col-md-5 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" data-inputmask="'mask': '99.99%'">
                          
                        </div>
                      </div>

                       <div class="form-group col-md-12">
                        <label class="control-label col-md-5 col-sm-3 col-xs-3">Penalty for unpayable Balanced:</label>
                        <div class="col-md-5 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" data-inputmask="'mask': '99.99%'">
                          
                        </div>
                      </div>

                      </div>
                      </div>
                      </div>

                         <div class="col-md-6">
                        <div class="panel panel-success ">
                            <div class="panel-body">


                       <div class="form-group col-md-12">
                        <label class="control-label col-md-5 col-sm-3 col-xs-3">Charge for Transfering ownership:</label>
                        <div class="col-md-5 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" data-inputmask="'mask': '99,999.99'">
                          
                        </div>
                      </div>

                       <div class="form-group col-md-12">
                        <label class="control-label col-md-5 col-sm-3 col-xs-3">Grace Period days:</label>
                        <div class="col-md-5 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" data-inputmask="'mask': ''">
                          
                        </div>
                      </div>
                       <div class="form-group col-md-12">
                        <label class="control-label col-md-5 col-sm-3 col-xs-3">Day/s Before Forfeting Reservation w/ No Downpayment:</label>
                        <div class="col-md-5 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" data-inputmask="'mask': ''">
                          
                        </div>
                      </div>


                       <div class="form-group col-md-12">
                        <label class="control-label col-md-5 col-sm-3 col-xs-3">Day/s Before Forfeting Reservation w/out No Downpayment:</label>
                        <div class="col-md-5 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" data-inputmask="'mask': ''">
                          
                        </div>
                      </div>


                       <div class="form-group col-md-12">
                        <label class="control-label col-md-5 col-sm-3 col-xs-3">Overdue months for forfeiting ownership:</label>
                        <div class="col-md-5 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" data-inputmask="'mask': ''">
                          
                        </div>
                      </div>
                      </div>
                      </div>
                      </div>



                            </div>
                          </div>
              </div>

                 <button type="submit" class="btn btn-success">Save</button>

 
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            MLMS-Design 
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>


    
		</div>
		</div>

		 <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="js/moment/moment.min.js"></script>
    <script src="js/datepicker/daterangepicker.js"></script>
    <!-- Ion.RangeSlider -->
    <script src="../vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
    <!-- Bootstrap Colorpicker -->
    <script src="../vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- jquery.inputmask -->
    <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <!-- jQuery Knob -->
    <script src="../vendors/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- Cropper -->
    <script src="../vendors/cropper/dist/cropper.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>



     <!-- jquery.inputmask -->
    <script>
      $(document).ready(function() {
        $(":input").inputmask();
      });
    </script>
    <!-- /jquery.inputmask -->

</body>
</html>

