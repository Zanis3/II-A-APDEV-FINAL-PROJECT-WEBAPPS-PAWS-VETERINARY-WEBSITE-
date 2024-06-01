<?php
?>
<head>
    <title>Total</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../css/style_general.css">
    <link rel="stylesheet" href="../css/style_appointment.css">
    <link rel="stylesheet" href="dash-css/css.css">
    <link rel="shortcut icon" href="../img/gen/web-logo.png" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="chart">
        <canvas id="appointmentChart" width="250" height="250"></canvas>
        <script>
            // Get the canvas element
            var ctx = document.getElementById('appointmentChart').getContext('2d');

            // Define the data for your donut chart
            var data = {
                labels: ['Pending', 'Done', 'Canceled'],
                datasets: [{
                    label: 'My Donut Chart',
                    data: [30, 60, 10], // Example data
                    backgroundColor: [
                        'rgb(6, 78, 59, 1)',
                        'rgb(6, 78, 59, 0.8)',
                        'rgb(6, 78, 59, 0.6)'
                    ],
                    hoverOffset: 4
                }]
            };

            // Create the donut chart
            var myDonutChart = new Chart(ctx, {
                type: 'doughnut',
                data: data,
                options: {
                    plugins: {
                        doughnutlabel: {
                            labels: [{
                                text: 'Done',
                                font: {
                                    size: 18,
                                    weight: 'bold'
                                }
                            }]
                        }
                    },
                    shadow: {
                        enabled: true,
                        color: 'rgba(0, 0, 0, 0.5)',
                        blur: 10,
                        offsetX: 5,
                        offsetY: 5
                    }
                }
            });
        </script>
    </div>
    <div class="wide">
        <br>
        <p>You have a total of</p>
        <br>
        <p><b></b></p>
        <br>
        <p>Appointments.</p>
        <br>
    </div>
</body>