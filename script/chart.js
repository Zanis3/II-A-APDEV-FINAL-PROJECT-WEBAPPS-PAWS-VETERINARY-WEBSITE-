// Data for the donut chart
var data = {
    labels: ['checkup',''],
    datasets: [{
        data: [1,0],
        backgroundColor: ['#65A30D','white']
    }]
};

// Configuration for the donut chart
var config = {
    type: 'doughnut',
    data: data,
    options: {
        cutout: '70%', // Adjust the cutout percentage as needed
        plugins: {
            legend: {
                display: false
            }
        }
    }
};

// Create the donut chart
var ctx = document.getElementById('donut-chart').getContext('2d');
new Chart(ctx, config);