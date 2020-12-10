const ctx = document.getElementById('chart').getContext('2d'); //returns an object which has methods and properties to write the chart
const pollChart = new Chart(ctx, { //ctx as 1st arg
    type: 'line', //configuration
    data: { //here we need to add the data not statically. We need to add it from the database and that it will modify everytime we can
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'], //X axis values
        datasets: [{
            label: '# of Votes', //title of chart 
            data: [12, 19, 3, 5, 2, 3], //Y axis values.
            backgroundColor: [ //color of the bars 
                'rgba(0, 0, 0, 0)',
            ],
            borderColor: [ 
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 3
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});