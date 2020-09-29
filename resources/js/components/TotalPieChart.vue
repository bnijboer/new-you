<template>
    <canvas id="totalPieChart"></canvas>
</template>

<script>
    export default {
        name: 'total-pie-chart',
        props: ['totalIntake'],
        mounted() {
            var ctx = document.getElementById('totalPieChart').getContext('2d');

            var pieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Protein', 'Fat', 'Carbs'],
                    datasets: [{
                        backgroundColor: [
                            '#F78079',
                            '#E9F748',
                            '#60AEF7'
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