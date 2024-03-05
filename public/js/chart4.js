const ctx4 = document.getElementById('barchart4');

new Chart(ctx4, {
  type: 'bar',
  data: {
    labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday' ],
    datasets: [{
      label: 'Sleep score',
      data: [12, 19, 3, 5, 2, 3],
      borderWidth: 3
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});