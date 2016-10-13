<template>
    <div class="graph-wrap">
        <canvas class="graph"></canvas>
    </div>
</template>

<script>
    import Chart from 'chart.js';
    import GraphMixin from './mixins/GraphMixin';
    import util from '../util';

    export default {
        mixins: [GraphMixin],
        props: ['dataset'],
        data() {
            return {
                config: {
                    type: 'radar',
                    data: {
                        labels: Object.keys(this.dataset)
                                    .map(util.snakeCaseToCapitalizedWords),
                        datasets: [
                            {
                                label: "Tasting Scores",
                                borderColor: "#01D1B2",
                                pointBackgroundColor: "#01D1B2",
                                pointHoverBackgroundColor: "#fff",
                                pointHoverBorderColor: "#01D1B2",
                                data: Object.keys(this.dataset)
                                          .map(key => this.dataset[key])
                            }
                        ]
                    },
                    options: {
                        scale: {
                            ticks: {
                                min: 0,
                                max: 10,
                                stepSize: 1
                            }
                        }
                    }
                }
            };
        },
        watch: {
            dataset: {
                handler: function(value, oldValue) {
                    let data = Object.keys(this.dataset)
                                   .map(key => this.dataset[key]);
                    this.chart.data.datasets[0].data = data;
                    this.chart.update();
                },
                deep: true
            }
        }
    };
</script>

<style>

</style>
