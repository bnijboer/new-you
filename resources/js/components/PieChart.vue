<template>
    <canvas id="pieChart"></canvas>
</template>

<script>
    export default {
        name: 'pie-chart',
        props: ['totalIntake'],
        mounted() {
            var ctx = document.getElementById('pieChart').getContext('2d');

            var myPieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Protein', 'Fat', 'Carbohydrates'],
                    datasets: [{
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(10, 230, 40)',
                            'rgb(155, 99, 232)'
                        ],
                        data: [
                            this.totalIntake.protein,
                            this.totalIntake.fat,
                            this.totalIntake.carbs
                        ]
                    }]
                },
                options: {}
            });
        }
    }
</script>