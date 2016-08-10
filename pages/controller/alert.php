<html>
  <head>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="css/custom.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </head>
  <body>
    <div id="try"></div>
  </body>
  <script>
    function loadUnSolved(){
      $("#try").load("alert.php");
    }
    $(document).ready(loadUnSolved());
  </script>
</html>