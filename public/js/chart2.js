const ctx2 = document.getElementById('barchart2');

new Chart(ctx2, {
  type: 'bar',
  data: {
    labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday' ],
    datasets: [{
      label: 'Step score',
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