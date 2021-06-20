<?php
$cores=[];

?>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'
       ], 
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3, 8,9,0,4,3,7],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1
        },{
        label: '# of notes',
            data: [12, 19, 3, 5, 5, 2, 12,9,0,4,3,7],
            backgroundColor: [
                'rgba(100, 99, 132, 0.2)'
            ],
            borderColor: [
                'rgba(100, 99, 132, 1)'
            ],
            borderWidth: 1} ,
        ]

    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

</script>