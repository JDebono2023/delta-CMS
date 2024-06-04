<div>
    <style>
        .headerText {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 25px;
            font-weight: 500;
            margin-top: 40px;
        }

        .dateText {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18px;
            font-weight: 300;
            margin-bottom: 15px;
        }

        table {
            margin: 0;
        }

        .item1 {
            width: 40%;
        }


        .mainTable {
            width: 100%;
            height: 320px;
        }

        .tableSingles {
            width: 100%;
        }

        .single {
            height: 280px;
        }

        .squares {
            height: 280px;
            width: 350px;
        }


        .page-break {
            page-break-after: always;
        }

        .page2 {
            margin-top: 20px;
            margin-right: 50px;
        }

        .pageNum {
            font-size: 10px;
            font-family: Arial, Helvetica, sans-serif;
            float: right;
        }

        .pageNum2 {
            font-size: 10px;
            font-family: Arial, Helvetica, sans-serif;
            float: right;
        }

        * {
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            width: 800px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>

    <form action="{{ route('download') }}" method="post" target="__blank" enctype="multipart/form-data" id="print-form">
        @csrf
        <button type="submit" value=""
            class="bg-red-500 hover:bg-red-700 text-white px-4 py-1 rounded font-medium w-50 mb-10">PRINT REPORT
        </button>
        <input type="hidden" name="chartData" id="chartInputData">
    </form>

    <body>
        <div id="chart">
            <div class="dateText" style="margin-top: 40px; font-size: 21px; font-weight:bold; margin-bottom:0px;">
                Analytics Summary: Delta Hotels London Armouries
            </div>
            <div class="dateText">
                Report Date: {{ date('F j, Y') }}
            </div>

            <table class="mainTable">
                <tr>
                    <td class="item1" id="chart_div"></td>
                    <td id="page"></td>
                </tr>

            </table>

            <table class="tableSingles">

                <tr>
                    <td class="single" id="monthly"></td>
                </tr>

                <tr>
                    <td class="single" id="daily"></td>
                </tr>


            </table>
            <div class="pageNum">Page 1</div>
            <div class="page-break"></div>
            <table class="tableSingles">


                <tr>
                    <td class="single" id="hours" style="padding-top: 30px;"></td>
                </tr>

            </table>

            <table>

                <tr>
                    <td class="squares" id="home"></td>

                    <td class="squares" style="padding-left: 20px;" id="category"></td>


                </tr>
                <tr>
                    <td class="squares" id="menu"></td>
                    <td class="squares" style="padding-left: 20px;" id="elm"></td>
                </tr>

            </table>

            <div class="pageNum2">Page 2</div>

        </div>
    </body>




    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        var totalActivity = <?php echo $totalActivity; ?>;
        var month = <?php echo $month; ?>;
        var day = <?php echo $day; ?>;
        var hour = <?php echo $hour; ?>;
        var page = <?php echo $page; ?>;
        var home = <?php echo $home; ?>;
        var category = <?php echo $category; ?>;
        var menu = <?php echo $menu; ?>;
        var elm = <?php echo $elm; ?>;
        console.log(home);

        google.charts.load('current', {
            'packages': ['corechart', 'bar']
        });

        google.charts.setOnLoadCallback(totalUse);

        function totalUse() {

            // Create the data table.
            var data = google.visualization.arrayToDataTable([
                ['Kiosk', 'count', {
                    role: 'style'
                }, {
                    role: 'annotation'
                }, ],
                ['Total', totalActivity[0].totalActivity, '#11159C', totalActivity[0].totalActivity],
                // RGB value

            ]);

            // Set chart options
            var options = {
                title: 'Total Overall Usage',
                titleTextStyle: {
                    // color: 'blue',
                    fontSize: 15
                },
                chartArea: {
                    width: '60%',
                    height: '75%'
                },

                vAxis: {
                    title: 'Activity Count',
                    gridlines: {
                        count: 4
                    },
                    minValue: 0,
                    baseline: 0,
                    format: ''
                },
                legend: {
                    position: "none"
                },
                bar: {
                    groupWidth: '60%'
                },
            };

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            var chartImage = document.getElementById('chart_div');

            google.visualization.events.addListener(chart, 'ready', function() {
                chartImage.innerHTML = '<img src="' + chart.getImageURI() + '" >';
            });
            chart.draw(data, options);
        }

        google.charts.setOnLoadCallback(drawMonth);

        function drawMonth() {
            var data = new google.visualization.arrayToDataTable([
                ['Month', 'count', {
                    role: 'style'
                }, {
                    role: 'annotation'
                }],
                ['JAN', month[0][0].count, '#11159C', month[0][0].count],
                ['FEB', month[1][0].count, '#11159C', month[1][0].count],
                ['MAR', month[2][0].count, '#11159C', month[2][0].count],
                ['APR', month[3][0].count, '#11159C', month[3][0].count],
                ['MAY', month[4][0].count, '#11159C', month[4][0].count],
                ['JUN', month[5][0].count, '#11159C', month[5][0].count],
                ['JUL', month[6][0].count, '#11159C', month[6][0].count],
                ['AUG', month[7][0].count, '#11159C', month[7][0].count],
                ['SEP', month[8][0].count, '#11159C', month[8][0].count],
                ['OCT', month[9][0].count, '#11159C', month[9][0].count],
                ['NOV', month[10][0].count, '#11159C', month[10][0].count],
                ['DEC', month[11][0].count, '#11159C', month[11][0].count],
            ]);

            var options = {
                title: 'Monthly Usage',
                titleTextStyle: {
                    // color: 'blue',
                    fontSize: 15
                },

                chartArea: {
                    width: '85%',
                    height: '65%'
                },
                hAxis: {

                    textStyle: {
                        // color: 'blue',
                        fontSize: 12
                    },

                },
                vAxis: {
                    title: 'Activity Count',
                    textStyle: {
                        // color: 'blue',
                        fontSize: 10
                    },
                    gridlines: {
                        count: 4
                    },
                    minValue: 0,
                    format: ''
                },
                legend: {
                    position: "none"
                },
                bar: {
                    groupWidth: '75%'
                },

            };

            var chart = new google.visualization.ColumnChart(document.getElementById('monthly'));
            var chartImage = document.getElementById('monthly');
            google.visualization.events.addListener(chart, 'ready', function() {
                chartImage.innerHTML = '<img src="' + chart.getImageURI() + '" >';
            });
            chart.draw(data, options);
            // var chart_div = document.getElementById('monthly');
            // var chart = new google.visualization.ColumnChart(document.getElementById('monthly'));
        }

        google.charts.setOnLoadCallback(drawDay);

        function drawDay() {
            var data = new google.visualization.arrayToDataTable([
                ['Day', 'count', {
                    role: 'style'
                }, {
                    role: 'annotation'
                }],
                ['MON', day[0][0].count, '#11159C', day[0][0].count],
                ['TUES', day[1][0].count, '#11159C', day[1][0].count],
                ['WED', day[2][0].count, '#11159C', day[2][0].count],
                ['THURS', day[3][0].count, '#11159C', day[3][0].count],
                ['FRI', day[4][0].count, '#11159C', day[4][0].count],
                ['SAT', day[5][0].count, '#11159C', day[5][0].count],
                ['SUN', day[6][0].count, '#11159C', day[6][0].count],

            ]);

            var options = {
                title: 'Daily Usage',
                titleTextStyle: {
                    // color: 'blue',
                    fontSize: 15
                },
                chartArea: {
                    width: '85%',
                    height: '65%'
                },
                hAxis: {

                    textStyle: {
                        // color: 'blue',
                        fontSize: 12
                    },

                },
                vAxis: {
                    title: 'Activity Count',
                    gridlines: {
                        count: 4
                    },
                    minValue: 0,
                    format: '',
                    textStyle: {
                        fontSize: 10
                    }
                },
                legend: {
                    position: "none"
                },
                bar: {
                    groupWidth: '80%'
                },

            };

            var chart = new google.visualization.ColumnChart(document.getElementById('daily'));
            var chartImage = document.getElementById('daily');
            google.visualization.events.addListener(chart, 'ready', function() {
                chartImage.innerHTML = '<img src="' + chart.getImageURI() + '" >';
            });
            chart.draw(data, options);
            // var chart_div = document.getElementById('monthly');
            // var chart = new google.visualization.ColumnChart(document.getElementById('monthly'));
        }

        google.charts.setOnLoadCallback(drawHours);

        function drawHours() {
            var data = new google.visualization.arrayToDataTable([
                ['Hour', 'Total Usage AM', {
                    role: 'annotation'
                }, 'Total Usage PM', {
                    role: 'annotation'
                }, ],
                [
                    '1:00', hour[1][0].total, hour[1][0].total, hour[13][0].total, hour[13][0].total,
                ],

                [
                    '2:00', hour[2][0].total, hour[12][0].total, hour[14][0].total, hour[14][0].total,
                ],

                [
                    '3:00', hour[3][0].total, hour[3][0].total, hour[15][0].total, hour[15][0].total,
                ],

                [
                    '4:00', hour[4][0].total, hour[4][0].total, hour[16][0].total, hour[16][0].total,
                ],

                [
                    '5:00', hour[5][0].total, hour[5][0].total, hour[17][0].total, hour[17][0].total,
                ],

                [
                    '6:00', hour[6][0].total, hour[6][0].total, hour[18][0].total, hour[18][0].total,
                ],

                [
                    '7:00', hour[7][0].total, hour[7][0].total, hour[19][0].total, hour[19][0].total,
                ],
                // [ ],
                [
                    '8:00', hour[8][0].total, hour[8][0].total, hour[20][0].total, hour[20][0].total,
                ],
                // [ ],
                [
                    '9:00', hour[9][0].total, hour[9][0].total, hour[21][0].total, hour[21][0].total,
                ],
                // [ ],
                [
                    '10:00', hour[10][0].total, hour[10][0].total, hour[22].total, hour[22].total,
                ],
                // [ ],
                [
                    '11:00', hour[11][0].total, hour[11][0].total, hour[23][0].total, hour[23][0].total,
                ],
                // [],
                [
                    '12:00', hour[0][0].total, hour[0][0].total, hour[12][0].total, hour[12][0].total,
                ],


            ]);

            var options = {
                title: 'Hourly Usage',
                titleTextStyle: {
                    // color: 'blue',
                    fontSize: 15
                },

                chartArea: {
                    width: '85%',
                    height: '65%'
                },
                isStacked: true,
                legend: {
                    position: 'top',
                    maxLines: 3
                },
                colors: ['#b1d9e0', '#11159C'],
                hAxis: {

                    textStyle: {
                        // color: 'blue',
                        fontSize: 12
                    },

                },
                vAxis: {
                    title: 'Activity Count',
                    gridlines: {
                        count: 3
                    },

                    textStyle: {
                        // color: 'blue',
                        fontSize: 12
                    },

                    format: ''
                },

                bar: {
                    groupWidth: '70%'
                },


            };

            var chart = new google.visualization.ColumnChart(document.getElementById('hours'));
            var chartImage = document.getElementById('hours');
            google.visualization.events.addListener(chart, 'ready', function() {
                chartImage.innerHTML = '<img src="' + chart.getImageURI() + '" >';
            });
            chart.draw(data, options);

        }

        google.charts.setOnLoadCallback(drawPages);

        function drawPages() {
            var data = new google.visualization.arrayToDataTable([
                ['Page', 'count', {
                    role: 'annotation'
                }, {
                    role: 'style'
                }],
                ['Home', page[0][0].count, page[0][0].count, '#141c4c'],
                ['Events', page[1][0].count, page[1][0].count, '#11159C'],
                ['Attractions', page[2][0].count, page[2][0].count, '#b1d9e0'],
                ['Menus', page[3][0].count, page[3][0].count, '#75787b'],

            ]);

            var options = {
                title: 'Total Page Usage',
                titleTextStyle: {
                    // color: 'blue',
                    fontSize: 15
                },
                chartArea: {
                    width: '80%',
                    height: '75%'
                },

                vAxis: {
                    title: 'Activity Count',
                    gridlines: {
                        count: 4
                    },
                    minValue: 0,
                    format: ''
                },
                legend: {
                    position: "none"
                },
                bar: {
                    groupWidth: '70%'
                },

            };

            var chart = new google.visualization.ColumnChart(document.getElementById('page'));
            var chartImage = document.getElementById('page');
            google.visualization.events.addListener(chart, 'ready', function() {
                chartImage.innerHTML = '<img src="' + chart.getImageURI() + '" >';
            });
            chart.draw(data, options);

        }

        google.charts.setOnLoadCallback(drawHome);

        function drawHome() {
            var data = new google.visualization.arrayToDataTable([
                ['Page', 'count', {
                    role: 'annotation'
                }, ],
                ['More Events', home[0][0].count, home[0][0].count, ],
                ['Lower', home[1][0].count, home[1][0].count, ],
                ['Main', home[2][0].count, home[2][0].count, ],
                ['2nd', home[3][0].count, home[3][0].count, ],
                ['20th', home[4][0].count, home[4][0].count, ],

            ]);

            var options = {
                title: 'Home Page: More Events & Maps',
                colors: ['#141c4c', '#11159C', '#b1d9e0', '#75787b', '#d0c7b8'],
                titleTextStyle: {
                    // color: 'blue',
                    fontSize: 15
                },
                pieSliceText: 'value',
                pieSliceTextStyle: {
                    color: 'white',
                    fontSize: 12
                },
                chartArea: {
                    width: '100%',
                    height: '70%',
                    // top: 115,
                    // left: '8%',
                    // right: '8%'
                },

                // is3D: true,
                legend: {
                    position: "top",
                    legendText: 'value',
                    maxLines: 2,
                    textStyle: {
                        // color: 'blue',
                        fontSize: 12
                    }
                },


            };

            var chart = new google.visualization.PieChart(document.getElementById('home'));
            var chartImage = document.getElementById('home');
            google.visualization.events.addListener(chart, 'ready', function() {
                chartImage.innerHTML = '<img src="' + chart.getImageURI() + '" >';
            });
            chart.draw(data, options);

        }

        google.charts.setOnLoadCallback(drawCategory);

        function drawCategory() {
            var data = new google.visualization.arrayToDataTable([
                ['Page', 'count', {
                    role: 'annotation'
                }, ],
                ['Family Freindly', category[0][0].count, category[0][0].count, ],
                ['Entertainment', category[1][0].count, category[1][0].count, ],
                ['Outdoors', category[2][0].count, category[2][0].count, ],

            ]);

            var options = {
                title: 'Attractions: Categories Searched',
                colors: ['#141c4c', '#11159C', '#b1d9e0', '#75787b'],
                titleTextStyle: {
                    // color: 'blue',
                    fontSize: 15
                },
                pieSliceText: 'value',
                pieSliceTextStyle: {
                    color: 'white',
                    fontSize: 12
                },
                chartArea: {
                    width: '100%',
                    height: '70%',
                    // top: 90,
                    // left: '4%',
                    // right: '4%'
                },

                // is3D: true,
                legend: {
                    position: "top",
                    legendText: 'value',
                    maxLines: 2,
                    textStyle: {
                        // color: 'blue',
                        fontSize: 13
                    },
                    alignment: 'center'
                },


            };

            var chart = new google.visualization.PieChart(document.getElementById('category'));
            var chartImage = document.getElementById('category');
            google.visualization.events.addListener(chart, 'ready', function() {
                chartImage.innerHTML = '<img src="' + chart.getImageURI() + '" >';
            });
            chart.draw(data, options);

        }

        google.charts.setOnLoadCallback(drawMenu);

        function drawMenu() {
            var data = new google.visualization.arrayToDataTable([
                ['Page', 'count', {
                    role: 'annotation'
                }, ],
                ['Brunch', menu[0][0].count, menu[0][0].count, ],
                ['Breakfast', menu[1][0].count, menu[1][0].count, ],
                ['Dinner', menu[2][0].count, menu[2][0].count, ],
                ['Drinks', menu[3][0].count, menu[3][0].count, ],

            ]);

            var options = {
                title: 'Menu Activity',
                colors: ['#141c4c', '#11159C', '#b1d9e0', '#75787b'],
                titleTextStyle: {
                    // color: 'blue',
                    fontSize: 15
                },
                pieSliceText: 'value',
                pieSliceTextStyle: {
                    color: 'white',
                    fontSize: 12
                },
                chartArea: {
                    width: '100%',
                    height: '70%',
                    // top: 90,
                    // left: '4%',
                    // right: '4%'
                },

                // is3D: true,
                legend: {
                    position: "top",
                    legendText: 'value',
                    maxLines: 2,
                    textStyle: {
                        // color: 'blue',
                        fontSize: 13
                    },
                    alignment: 'center'
                },


            };

            var chart = new google.visualization.PieChart(document.getElementById('menu'));
            var chartImage = document.getElementById('menu');
            google.visualization.events.addListener(chart, 'ready', function() {
                chartImage.innerHTML = '<img src="' + chart.getImageURI() + '" >';
            });
            chart.draw(data, options);

        }

        google.charts.setOnLoadCallback(drawELM);

        function drawELM() {

            // Create the data table.
            var data = google.visualization.arrayToDataTable([
                ['Total', 'count', {
                    role: 'style'
                }, {
                    role: 'annotation'
                }, ],
                ['Total', elm[0].count, '#11159C', elm[0].count],
                // RGB value

            ]);

            // Set chart options
            var options = {
                title: 'ELM Modal Useage',
                titleTextStyle: {
                    // color: 'blue',
                    fontSize: 15
                },

                chartArea: {
                    width: '60%',
                    height: '80%'
                },

                vAxis: {
                    title: 'Activity Count',
                    gridlines: {
                        count: 4
                    },
                    minValue: 0,
                    format: ''
                },
                legend: {
                    position: "none"
                },
                bar: {
                    groupWidth: '60%'
                },
            };

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.ColumnChart(document.getElementById('elm'));
            var chartImage = document.getElementById('elm');
            google.visualization.events.addListener(chart, 'ready', function() {
                chartImage.innerHTML = '<img src="' + chart.getImageURI() + '" >';
            });
            chart.draw(data, options);
        }


        setTimeout(() => {
            let chartData = document.getElementById('chart').innerHTML;
            let submitItems = document.getElementById('chartInputData');
            submitItems.value = chartData;

        }, 1000);
    </script>
</div>
