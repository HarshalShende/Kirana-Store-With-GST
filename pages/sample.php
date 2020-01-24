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

  <link rel="shortcut icon" href="logo.jpg">
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
                <div class="col-md-2">
                  <select class="form-control" name="graph_mnth">
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <?php 
                include('connect.php');

                $months = array("January",
                  "February",
                  "March",
                  "April",
                  "May",
                  "June",
                  "July",
                  "August",
                  "September",
                  "October",
                  "November",
                  "December");

                $sql = "SELECT *, category as cat, SUM(qty) as qcount FROM sales_order
                LEFT JOIN sales ON sales.invoice_number = sales_order.invoice
                WHERE sales.month = ? AND year = ?
                GROUP BY category";
                $query = $db->prepare($sql); 
                $query->execute(array('January',date('Y')));
                $fetch = $query->fetchAll();
                foreach ($fetch as $key => $value) {
                  $data[] = array('title'=>$value['cat'], 'value'=>$value['qcount']);
                }
                $January = json_encode($data);

                $sql = "SELECT *, category as cat, SUM(qty) as qcount FROM sales_order
                LEFT JOIN sales ON sales.invoice_number = sales_order.invoice
                WHERE sales.month = ? AND year = ?
                GROUP BY category";
                $query = $db->prepare($sql); 
                $query->execute(array('February',date('Y')));
                $fetch = $query->fetchAll();
                foreach ($fetch as $key => $value) {
                  $data[] = array('title'=>$value['cat'], 'value'=>$value['qcount']);
                }
                $February = json_encode($data);

                $sql = "SELECT *, category as cat, SUM(qty) as qcount FROM sales_order
                LEFT JOIN sales ON sales.invoice_number = sales_order.invoice
                WHERE sales.month = ? AND year = ?
                GROUP BY category";
                $query = $db->prepare($sql); 
                $query->execute(array('March',date('Y')));
                $fetch = $query->fetchAll();
                foreach ($fetch as $key => $value) {
                  $data[] = array('title'=>$value['cat'], 'value'=>$value['qcount']);
                }
                $March = json_encode($data);

                $sql = "SELECT *, category as cat, SUM(qty) as qcount FROM sales_order
                LEFT JOIN sales ON sales.invoice_number = sales_order.invoice
                WHERE sales.month = ? AND year = ?
                GROUP BY category";
                $query = $db->prepare($sql); 
                $query->execute(array('April',date('Y')));
                $fetch = $query->fetchAll();
                foreach ($fetch as $key => $value) {
                  $data[] = array('title'=>$value['cat'], 'value'=>$value['qcount']);
                }
                $April = json_encode($data);

                $sql = "SELECT *, category as cat, SUM(qty) as qcount FROM sales_order
                LEFT JOIN sales ON sales.invoice_number = sales_order.invoice
                WHERE sales.month = ? AND year = ?
                GROUP BY category";
                $query = $db->prepare($sql); 
                $query->execute(array('May',date('Y')));
                $fetch = $query->fetchAll();
                foreach ($fetch as $key => $value) {
                  $data[] = array('title'=>$value['cat'], 'value'=>$value['qcount']);
                }
                $May = json_encode($data);

                $sql = "SELECT *, category as cat, SUM(qty) as qcount FROM sales_order
                LEFT JOIN sales ON sales.invoice_number = sales_order.invoice
                WHERE sales.month = ? AND year = ?
                GROUP BY category";
                $query = $db->prepare($sql); 
                $query->execute(array('June',date('Y')));
                $fetch = $query->fetchAll();
                foreach ($fetch as $key => $value) {
                  $data[] = array('title'=>$value['cat'], 'value'=>$value['qcount']);
                }
                $June = json_encode($data);

                $sql = "SELECT *, category as cat, SUM(qty) as qcount FROM sales_order
                LEFT JOIN sales ON sales.invoice_number = sales_order.invoice
                WHERE sales.month = ? AND year = ?
                GROUP BY category";
                $query = $db->prepare($sql); 
                $query->execute(array('July',date('Y')));
                $fetch = $query->fetchAll();
                foreach ($fetch as $key => $value) {
                  $data[] = array('title'=>$value['cat'], 'value'=>$value['qcount']);
                }
                $July = json_encode($data);

                $sql = "SELECT *, category as cat, SUM(qty) as qcount FROM sales_order
                LEFT JOIN sales ON sales.invoice_number = sales_order.invoice
                WHERE sales.month = ? AND year = ?
                GROUP BY category";
                $query = $db->prepare($sql); 
                $query->execute(array('August',date('Y')));
                $fetch = $query->fetchAll();
                foreach ($fetch as $key => $value) {
                  $data[] = array('title'=>$value['cat'], 'value'=>$value['qcount']);
                }
                $August = json_encode($data);

                $sql = "SELECT *, category as cat, SUM(qty) as qcount FROM sales_order
                LEFT JOIN sales ON sales.invoice_number = sales_order.invoice
                WHERE sales.month = ? AND year = ?
                GROUP BY category";
                $query = $db->prepare($sql); 
                $query->execute(array('September',date('Y')));
                $fetch = $query->fetchAll();
                foreach ($fetch as $key => $value) {
                  $data[] = array('title'=>$value['cat'], 'value'=>$value['qcount']);
                }
                $September = json_encode($data);

                $sql = "SELECT *, category as cat, SUM(qty) as qcount FROM sales_order
                LEFT JOIN sales ON sales.invoice_number = sales_order.invoice
                WHERE sales.month = ? AND year = ?
                GROUP BY category";
                $query = $db->prepare($sql); 
                $query->execute(array('October',date('Y')));
                $fetch = $query->fetchAll();
                foreach ($fetch as $key => $value) {
                  $data[] = array('title'=>$value['cat'], 'value'=>$value['qcount']);
                }
                $October = json_encode($data);

                $sql = "SELECT *, category as cat, SUM(qty) as qcount FROM sales_order
                LEFT JOIN sales ON sales.invoice_number = sales_order.invoice
                WHERE sales.month = ? AND year = ?
                GROUP BY category";
                $query = $db->prepare($sql); 
                $query->execute(array('November',date('Y')));
                $fetch = $query->fetchAll();
                foreach ($fetch as $key => $value) {
                  $data[] = array('title'=>$value['cat'], 'value'=>$value['qcount']);
                }
                $November = json_encode($data);

                $sql = "SELECT *, category as cat, SUM(qty) as qcount FROM sales_order
                LEFT JOIN sales ON sales.invoice_number = sales_order.invoice
                WHERE sales.month = ? AND year = ?
                GROUP BY category";
                $query = $db->prepare($sql); 
                $query->execute(array('December',date('Y')));
                $fetch = $query->fetchAll();
                foreach ($fetch as $key => $value) {
                  $data[] = array('title'=>$value['cat'], 'value'=>$value['qcount']);
                }
                $December = json_encode($data);

                ?>
                <div id="divjanchart" class="col-lg-12">
                  <div id="janchart" style="height: 500px;"></div>
                </div>
                <div id="divfebchart" style="display: none" class="col-lg-12">
                  <div id="febchart" style="height: 500px;"></div>
                </div>
                <div id="divmarchart" style="display: none" class="col-lg-12">
                  <div id="marchart" style="height: 500px;"></div>
                </div>
                <div id="divaprchart" style="display: none" class="col-lg-12">
                  <div id="aprchart" style="height: 500px;"></div>
                </div>
                <div id="divmaychart" style="display: none" class="col-lg-12">
                  <div id="maychart" style="height: 500px;"></div>
                </div>
                <div id="divjunchart" style="display: none" class="col-lg-12">
                  <div id="junchart" style="height: 500px;"></div>
                </div>
                <div id="divjulchart" style="display: none" class="col-lg-12">
                  <div id="julchart" style="height: 500px;"></div>
                </div>
                <div id="divaugchart" style="display: none" class="col-lg-12">
                  <div id="augchart" style="height: 500px;"></div>
                </div>
                <div id="divsepchart" style="display: none" class="col-lg-12">
                  <div id="sepchart" style="height: 500px;"></div>
                </div>
                <div id="divoctchart" style="display: none" class="col-lg-12">
                  <div id="octchart" style="height: 500px;"></div>
                </div>
                <div id="divnovchart" style="display: none" class="col-lg-12">
                  <div id="novchart" style="height: 500px;"></div>
                </div>
                <div id="divdecchart" style="display: none" class="col-lg-12">
                  <div id="decchart" style="height: 500px;"></div>
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
          var janraw = '<?php echo $January; ?>';
          var jandata = JSON.parse(janraw);
          var chart = AmCharts.makeChart( "janchart", {
            "type": "pie",
            "theme": "light",
            "dataProvider": jandata ,
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
            "colors": ['#FF6600', '#FCD202', '#B0DE09', '#0D8ECF', '#2A0CD0', '#CD0D74', '#CC0000', '#00CC00', '#0000CC', '#DDDDDD', '#999999', '#222333', '#990000']
          } );

          var febraw = '<?php echo $February; ?>';
          var febdata = JSON.parse(febraw);
          var chart = AmCharts.makeChart( "febchart", {
            "type": "pie",
            "theme": "light",
            "dataProvider": febdata ,
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
            "colors": ['#FF6600', '#FCD202', '#B0DE09', '#0D8ECF', '#2A0CD0', '#CD0D74', '#CC0000', '#00CC00', '#0000CC', '#DDDDDD', '#999999', '#222333', '#990000']
          } );

          var marraw = '<?php echo $March; ?>';
          var mardata = JSON.parse(marraw);
          var chart = AmCharts.makeChart( "marchart", {
            "type": "pie",
            "theme": "light",
            "dataProvider": mardata ,
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
            "colors": ['#FF6600', '#FCD202', '#B0DE09', '#0D8ECF', '#2A0CD0', '#CD0D74', '#CC0000', '#00CC00', '#0000CC', '#DDDDDD', '#999999', '#222333', '#990000']
          } );

          var aprraw = '<?php echo $April; ?>';
          var aprdata = JSON.parse(aprraw);
          var chart = AmCharts.makeChart( "aprchart", {
            "type": "pie",
            "theme": "light",
            "dataProvider": aprdata ,
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
           "colors": ['#FF6600', '#FCD202', '#B0DE09', '#0D8ECF', '#2A0CD0', '#CD0D74', '#CC0000', '#00CC00', '#0000CC', '#DDDDDD', '#999999', '#222333', '#990000']
         } );

          var mayraw = '<?php  echo $May; ?>';
          var maydata = JSON.parse(mayraw);
          var chart = AmCharts.makeChart( "maychart", {
           "type": "pie",
           "theme": "light",
           "dataProvider": maydata ,
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
           "colors": ['#FF6600', '#FCD202', '#B0DE09', '#0D8ECF', '#2A0CD0', '#CD0D74', '#CC0000', '#00CC00', '#0000CC', '#DDDDDD', '#999999', '#222333', '#990000']
         } );

          var junraw = '<?php  echo $June; ?>';
          var jundata = JSON.parse(junraw);
          var chart = AmCharts.makeChart( "junchart", {
           "type": "pie",
           "theme": "light",
           "dataProvider": jundata ,
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
           "colors": ['#FF6600', '#FCD202', '#B0DE09', '#0D8ECF', '#2A0CD0', '#CD0D74', '#CC0000', '#00CC00', '#0000CC', '#DDDDDD', '#999999', '#222333', '#990000']
         } );

          var julraw = '<?php  echo $July; ?>';
          var juldata = JSON.parse(julraw);
          var chart = AmCharts.makeChart( "julchart", {
           "type": "pie",
           "theme": "light",
           "dataProvider": juldata ,
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
           "colors": ['#FF6600', '#FCD202', '#B0DE09', '#0D8ECF', '#2A0CD0', '#CD0D74', '#CC0000', '#00CC00', '#0000CC', '#DDDDDD', '#999999', '#222333', '#990000']
         } );

          var augraw = '<?php  echo $August; ?>';
          var augdata = JSON.parse(augraw);
          var chart = AmCharts.makeChart( "augchart", {
           "type": "pie",
           "theme": "light",
           "dataProvider": augdata ,
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
           "colors": ['#FF6600', '#FCD202', '#B0DE09', '#0D8ECF', '#2A0CD0', '#CD0D74', '#CC0000', '#00CC00', '#0000CC', '#DDDDDD', '#999999', '#222333', '#990000']
         } );

          var sepraw = '<?php  echo $September; ?>';
          var sepdata = JSON.parse(sepraw);
          var chart = AmCharts.makeChart( "sepchart", {
            "type": "pie",
            "theme": "light",
            "dataProvider": sepdata ,
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
           "colors": ['#FF6600', '#FCD202', '#B0DE09', '#0D8ECF', '#2A0CD0', '#CD0D74', '#CC0000', '#00CC00', '#0000CC', '#DDDDDD', '#999999', '#222333', '#990000']
         } );

          var octraw = '<?php  echo $October; ?>';
          var octdata = JSON.parse(octraw);
          var chart = AmCharts.makeChart( "octchart", {
           "type": "pie",
           "theme": "light",
           "dataProvider": octdata ,
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
           "colors": ['#FF6600', '#FCD202', '#B0DE09', '#0D8ECF', '#2A0CD0', '#CD0D74', '#CC0000', '#00CC00', '#0000CC', '#DDDDDD', '#999999', '#222333', '#990000']
         } );

          var novraw = '<?php  echo $November; ?>';
          var novdata = JSON.parse(novraw);
          var chart = AmCharts.makeChart( "novchart", {
           "type": "pie",
           "theme": "light",
           "dataProvider": novdata ,
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
           "colors": ['#FF6600', '#FCD202', '#B0DE09', '#0D8ECF', '#2A0CD0', '#CD0D74', '#CC0000', '#00CC00', '#0000CC', '#DDDDDD', '#999999', '#222333', '#990000']
         } );

          var decraw = '<?php  echo $December; ?>';
          var decdata = JSON.parse(decraw);
          var chart = AmCharts.makeChart( "decchart", {
           "type": "pie",
           "theme": "light",
           "dataProvider": decdata ,
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
           "colors": ['#FF6600', '#FCD202', '#B0DE09', '#0D8ECF', '#2A0CD0', '#CD0D74', '#CC0000', '#00CC00', '#0000CC', '#DDDDDD', '#999999', '#222333', '#990000']
         } );

       </script>
       <script type="text/javascript">
        jQuery(function(){
          $('[name="graph_mnth"]').on('change', function(){
            var month = $(this).val();

            switch(month){
              case 'January':
              $('#divjanchart').show();
              $('#divfebchart').hide();
              $('#divmarchart').hide();
              $('#divaprchart').hide();
              $('#divmaychart').hide();
              $('#divjunchart').hide();
              $('#divjulchart').hide();
              $('#divaugchart').hide();
              $('#divsepchart').hide();
              $('#divoctchart').hide();
              $('#divnovchart').hide();
              $('#divdecchart').hide();
              break;
              case 'February':
              $('#divjanchart').hide();
              $('#divfebchart').show();
              $('#divmarchart').hide();
              $('#divaprchart').hide();
              $('#divmaychart').hide();
              $('#divjunchart').hide();
              $('#divjulchart').hide();
              $('#divaugchart').hide();
              $('#divsepchart').hide();
              $('#divoctchart').hide();
              $('#divnovchart').hide();
              $('#divdecchart').hide();
              break;
              case 'March':
              $('#divjanchart').hide();
              $('#divfebchart').hide();
              $('#divmarchart').show();
              $('#divaprchart').hide();
              $('#divmaychart').hide();
              $('#divjunchart').hide();
              $('#divjulchart').hide();
              $('#divaugchart').hide();
              $('#divsepchart').hide();
              $('#divoctchart').hide();
              $('#divnovchart').hide();
              $('#divdecchart').hide();
              break;
              case 'April':
              $('#divjanchart').hide();
              $('#divfebchart').hide();
              $('#divmarchart').hide();
              $('#divaprchart').show();
              $('#divmaychart').hide();
              $('#divjunchart').hide();
              $('#divjulchart').hide();
              $('#divaugchart').hide();
              $('#divsepchart').hide();
              $('#divoctchart').hide();
              $('#divnovchart').hide();
              $('#divdecchart').hide();
              break;
              case 'May':
              $('#divjanchart').hide();
              $('#divfebchart').hide();
              $('#divmarchart').hide();
              $('#divaprchart').hide();
              $('#divmaychart').show();
              $('#divjunchart').hide();
              $('#divjulchart').hide();
              $('#divaugchart').hide();
              $('#divsepchart').hide();
              $('#divoctchart').hide();
              $('#divnovchart').hide();
              $('#divdecchart').hide();
              break;
              case 'June':
              $('#divjanchart').hide();
              $('#divfebchart').hide();
              $('#divmarchart').hide();
              $('#divaprchart').hide();
              $('#divmaychart').hide();
              $('#divjunchart').show();
              $('#divjulchart').hide();
              $('#divaugchart').hide();
              $('#divsepchart').hide();
              $('#divoctchart').hide();
              $('#divnovchart').hide();
              $('#divdecchart').hide();
              break;

              case 'July':
              $('#divjanchart').hide();
              $('#divfebchart').hide();
              $('#divmarchart').hide();
              $('#divaprchart').hide();
              $('#divmaychart').hide();
              $('#divjunchart').hide();
              $('#divjulchart').show();
              $('#divaugchart').hide();
              $('#divsepchart').hide();
              $('#divoctchart').hide();
              $('#divnovchart').hide();
              $('#divdecchart').hide();
              break;
              case 'August':
              $('#divjanchart').hide();
              $('#divfebchart').hide();
              $('#divmarchart').hide();
              $('#divaprchart').hide();
              $('#divmaychart').hide();
              $('#divjunchart').hide();
              $('#divjulchart').hide();
              $('#divaugchart').show();
              $('#divsepchart').hide();
              $('#divoctchart').hide();
              $('#divnovchart').hide();
              $('#divdecchart').hide();
              break;
              case 'September':
              $('#divjanchart').hide();
              $('#divfebchart').hide();
              $('#divmarchart').hide();
              $('#divaprchart').hide();
              $('#divmaychart').hide();
              $('#divjunchart').hide();
              $('#divjulchart').hide();
              $('#divaugchart').hide();
              $('#divsepchart').show();
              $('#divoctchart').hide();
              $('#divnovchart').hide();
              $('#divdecchart').hide();
              break;
              case 'October':
              $('#divjanchart').hide();
              $('#divfebchart').hide();
              $('#divmarchart').hide();
              $('#divaprchart').hide();
              $('#divmaychart').hide();
              $('#divjunchart').hide();
              $('#divjulchart').hide();
              $('#divaugchart').hide();
              $('#divsepchart').hide();
              $('#divoctchart').show();
              $('#divnovchart').hide();
              $('#divdecchart').hide();
              break;
              case 'November':
              $('#divjanchart').hide();
              $('#divfebchart').hide();
              $('#divmarchart').hide();
              $('#divaprchart').hide();
              $('#divmaychart').hide();
              $('#divjunchart').hide();
              $('#divjulchart').hide();
              $('#divaugchart').hide();
              $('#divsepchart').hide();
              $('#divoctchart').hide();
              $('#divnovchart').show();
              $('#divdecchart').hide();
              break;
              case 'December':
              $('#divjanchart').hide();
              $('#divfebchart').hide();
              $('#divmarchart').hide();
              $('#divaprchart').hide();
              $('#divmaychart').hide();
              $('#divjunchart').hide();
              $('#divjulchart').hide();
              $('#divaugchart').hide();
              $('#divsepchart').hide();
              $('#divoctchart').hide();
              $('#divnovchart').hide();
              $('#divdecchart').show();
              break;

            }
          });
});
</script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
