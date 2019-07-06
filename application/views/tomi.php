
<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {
//1chart
          var PieChartData='<?php echo $PieChartData;?>'; 

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Hewan');
        data.addColumn('number', 'Slices');
        data.addRows(JSON.parse(PieChartData));

        // Set chart options
        var options = {'title':'<?php echo $PieChartTitle;?>' ,
                       };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);

 //2chart
        var BarChartData='<?php echo $BarChartData ?>';
        var bar_data = new google.visualization.arrayToDataTable(JSON.parse(BarChartData));

        var bar_options = {
          'title':'<?php  echo $BarChartTitle;?>' ,
          legend: {position: 'bottom'},
          vAxis: {format: '  '},
          colors: ['orange']
         };

        var bar_chart = new google.visualization.BarChart(document.getElementById('curve_div'));
        bar_chart.draw(bar_data, bar_options);
        
  //3chart
        var LineChartData='<?php echo $LineChartData ?>';
        var line_data = new google.visualization.arrayToDataTable(JSON.parse(LineChartData));

        var line_options = {
          'title':'<?php  echo $lineChartTitle;?>' ,
          legend: {position: 'bottom'},
          colors:[ 'orange'],
        };

        var line_chart = new google.visualization.ColumnChart(document.getElementById('burr_div'));
        line_chart.draw(line_data, line_options);

  //4chart
        var LineChartData1='<?php echo $LineChartData1 ?>';
        var line_data1 = new google.visualization.arrayToDataTable(JSON.parse(LineChartData1));

        var line_options1 = {
          'title':'<?php  echo $lineChartTitle1;?>' ,
          legend: {position: 'bottom'},
          
        };

        var line_chart1 = new google.visualization.PieChart(document.getElementById('chat_div'));
        line_chart1.draw(line_data1, line_options1);
  //5chart
         var LineChartData2='<?php echo $LineChartData2 ?>';
        var line_data2 = new google.visualization.arrayToDataTable(JSON.parse(LineChartData2));

        var line_options2 = {
          'title':'<?php  echo $lineChartTitle2;?>' ,
          legend: {position: 'bottom'},
          
        };

        var line_chart2 = new google.visualization.LineChart(document.getElementById('chate_div'));
        line_chart2.draw(line_data2, line_options2); 
      }
        
    </script>
  </head>

<body bgcolor="#FF99FF" >
    <h1> <center><marquee width="550" height="40" direction="down">Visualisasi Informasi <=> Tomi Pandela</marquee></center></h1>
         
    <center> <div id="chart_div" style="width: 800px; height: 200px" ></div></center>
<table> 
  <tr>
    <td> <div id="curve_div" style="width: 750px; height: 250px"></div></td>
    <td> <div id="burr_div" style="width: 750px; height: 250px"></div></td>
  </tr>
  <tr>
    <td> <div id="chat_div" style="width: 750px; height: 200px"></div></td>
    <td> <div id="chate_div" style="width: 750px; height: 200px"></div></td>
  </tr>
</table>
</body>
</html>