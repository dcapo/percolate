<template>
    <div class="tasting-radar">
        <h4 class="title is-4">Tasting Spider Plot</h4>
        <hr />
        <div class="columns is-multiline">
            <div class="column is-one-fifth"
                v-for="(metric, key) in metrics">
                <label class="label">
                    {{ snakeCaseToCapitalizedWords(key) }}
                </label>
                <p class="control">
                    <input type="range" min="0" max="10" step="1"
                        class="is-medium"
                        :name="key"
                        v-model.number="metrics[key]">
                        <span class="title is-5">{{ metrics[key] }}</span>
                </p>
            </div>
        </div>
        <radar-graph :dataset="metrics"></radar-graph>
        <h5 class="overall-score title is-5">Overall Score: {{ overallScore }}</h5>
    </div>
</template>

<script>
    import RadarGraph from './RadarGraph.vue';
    import util from '../util';
    import _ from 'lodash';

    export default {
        data() {
            return {
                metrics: percolate.radarMetrics
            };
        },
        computed: {
            overallScore() {
                let metrics = _.values(this.metrics);
                let sum = metrics.reduce((sum, current) => sum + current, 0);
                return sum;
            }
        },
        components: { RadarGraph },
        methods: util
    };
</script>

<style>
    .tasting-radar {
        margin: 20px 0;
    }
    .overall-score {
        margin-top: 20px;
        text-align: center;
    }
</style>
