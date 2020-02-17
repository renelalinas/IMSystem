<html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
        
    </head>
    <body>

        <div id="bar_chart"></div>
        
        
        
        
        
        
        
        
        
        
        
        
        <script type="text/javascript">
            // Load the Visualization API and the line package.
            google.charts.load('current', {'packages': ['bar']});
            // Set a callback to run when the Google Visualization API is loaded.
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>charts/getdata',

                    success: function (data1) {
                        // Create our data table out of JSON data loaded from server.
                        var data = new google.visualization.DataTable();

                        data.addColumn('string', 'Date');
                        data.addColumn('number', 'Income');
                      

                        var jsonData = $.parseJSON(data1);

                        for (var i = 0; i < jsonData.length; i++) {
                            data.addRow([jsonData[i].Date, parseInt(jsonData[i].Income)]);
                        }
                        var options = {
                            chart: {
                                title: 'Company Performance',
                                subtitle: 'Show Sales and Expense of Company'
                            },
                            width: 900,
                            height: 500,
                            axes: {
                                x: {
                                    0: {side: 'top'}
                                }
                            }

                        };
                        var chart = new google.charts.Bar(document.getElementById('bar_chart'));
                        chart.draw(data, options);
                    }
                });
            }
        </script>
    </body>
</html>