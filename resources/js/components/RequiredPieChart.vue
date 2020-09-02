<template>
    <canvas id="requiredPieChart"></canvas>
</template>

<script>
    export default {
        name: 'required-pie-chart',
        props: ['requiredIntake'],
        mounted() {
            var ctx = document.getElementById('requiredPieChart').getContext('2d');

            var myPieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Protein', 'Fat', 'Carbohydrates'],
                    datasets: [{
                        backgroundColor: [
                            '#F78079',
                            '#E9F748',
                            '#60AEF7'
                        ],
                        data: [
                            this.requiredIntake.protein,
                            this.requiredIntake.fat,
                            this.requiredIntake.carbs
                        ]
                    }]
                },
                options: {}
            });
        }
    }
</script>