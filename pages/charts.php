<?php
require_once('auth.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CURE GROCERY</title>

  <link rel="shortcut icon" href="logoc.jpg">
  <style>
    #chart {
      width       : 100%;
      height      : 500px;
      font-size   : 11px;
    } 
    .amcharts-pie-slice {
      transform: scale(1);
      transform-origin: 50% 50%;
      transition-duration: 0.3s;
      transition: all .3s ease-out;
      -webkit-transition: all .3s ease-out;
      -moz-transition: all .3s ease-out;
      -o-transition: all .3s ease-out;
      cursor: pointer;
      box-shadow: 0 0 30px 0 #000;
    }

    .amcharts-pie-slice:hover {
      transform: scale(1.1);
      filter: url(#shadow);
    }                                         
  </style>

  <!-- Bootstrap Core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <script language="javascript">
    function Clickheretoprint()
    { 
      var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=800, height=400, left=100, top=25"; 
      var content_vlue = document.getElementById("content").innerHTML; 

      var docprint=window.open("","",disp_setting); 
      docprint.document.open(); 
      docprint.document.write('</head><body onLoad="self.print()" style="width: 1000px; height:400; font-size: 20px; font-family: arial;">');          
      docprint.document.write(content_vlue); 
      docprint.document.close(); 
      docprint.focus(); 
    }
  </script>


  <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

      </head>

      <body>


        <?php include('navfixed.php');?>    

        <!-- Page Content -->
        <div id="page-wrapper">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <h1 class="page-header">Sales Charts</h1>
              </div>
            </div>

            <!-- /.row -->

            <div class="content" id="content">
              <p> Sales Charts According to Product Category</p>
              <div class="row">
                <?php 
                include('connect.php');
                $sql = "SELECT *, type as typ, count(name) as qcount FROM sales GROUP BY type";
                $query = $db->prepare($sql); 
                $query->execute();
                $fetch = $query->fetchAll();
                foreach ($fetch as $key => $value) {
                  $data[] = array('title'=>$value['typ'], 'value'=>$value['qcount']);
                }
                $d = json_encode($data);
                ?>
                <div class="col-lg-12">
                  <div id="chart" style="height: 500px;"></div>
                  <div>
                   <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

                    <thead>
                      <tr>

                        <th> Invoice Number </th>
                        <th> Customer Name </th>
                        <th> Type of Payment</th>
                        <th> Transaction Date </th>

                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      include('connect.php');
                      $result = $db->prepare("SELECT * FROM sales");
                      $result->execute();
                      for($i=0; $row = $result->fetch(); $i++){
                        ?>
                        <tr class="record">
                          <td><?php echo $row['invoice_number']; ?></td>
                          <td><?php echo $row['name']; ?></td>
                          <td><?php echo $row['type']; ?></td>
                          <td><?php echo $row['date']; ?></td>
                        </tr>
                        <?php
                      }
                      ?>

                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div>
          <a href="javascript:Clickheretoprint()" style="font-size:15px"; class="btn btn-primary"><i class="fa fa-print"></i>Print</a>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /#page-wrapper -->

      <!-- jQuery -->
      <script src="../vendor/jquery/jquery.min.js"></script>

      <script src="plugins/amcharts/amcharts.js"></script>
      <script src="plugins/amcharts/animate.min.js"></script>
      <script src="plugins/amcharts/themes/light.js"></script>
      <script src="plugins/amcharts/export/export.min.js"></script>
      <script src="plugins/amcharts/themes/patterns.js"></script>
      <script type="plugins/export/export.css" type="text/css" media="all""></script>
      <script src="plugins/amcharts/plugins/responsive/responsive.min.js"></script>
      <script src="plugins/amcharts/serial.js"></script>
      <script src="plugins/amcharts/pie.js"></script>


      <script type="text/javascript">
        var raw = '<?php echo $d; ?>';
        var data = JSON.parse(raw);
        var chart = AmCharts.makeChart( "chart", {
          "type": "pie",
          "theme": "light",
          "dataProvider": data ,
          "titleField": "title",
          "valueField": "value",
          "labelRadius": 25,

          "radius": "37%",
          "innerRadius": "40%",
          "labelText": " [[title]] ([[percents]]%)",
          "export": {
            "enabled": true
          },
          "depth3D": 10,
          "angle": 17,
          "fontFamily": "Helvetica",
          "fontSize": 13,
          "balloonText": "[[value]]",
          "color": "#222",
        // "colors": ['#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222']
        "colors": ['#FF6600', '#FCD202', '#B0DE09', '#0D8ECF', '#2A0CD0', '#CD0D74', '#CC0000', '#00CC00', '#0000CC', '#DDDDDD', '#999999', '#222333', '#990000']
      } );
    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

  </body>

  </html>
