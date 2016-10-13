<template>
    <div class="tasting-radar">
        <h1 class="title is-4">Tasting Spider Plot</h1>
        <hr>
        <div class="columns is-multiline">
            <div class="column is-one-fifth"
                v-for="(metric, key) in metrics">
                <label class="label">{{ key }}</label>
                <p class="control">
                    <input type="range" min="0" max="10" step="1"
                        class="is-medium"
                        v-model.number="metrics[key]">
                    <span class="title is-5">{{ metrics[key] }}</span>
                </p>
            </div>
        </div>
        <radar-graph :dataset="metrics"></radar-graph>
    </div>
</template>

<script>
    import RadarGraph from './RadarGraph.vue';

    export default {
        data() {
            return {
                metrics: radarMetrics
            };
        },
        components: { RadarGraph },
        methods: {
            clampNumber(e) {
                debugger;
                if (e.target.value && (e.target.value < 0 || e.target.value > 10)) {
                    e.preventDefault();
                }
            }
        }
    };
</script>

<style>
    .tasting-radar {
        margin: 20px 0;
    }
</style>
