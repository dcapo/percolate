export default {
    data() {
        return {
            chart: {}
        };
    },
    mounted() {
        this.render();
    },
    methods: {
        reload() {
            this.chart.destroy();
            this.render();
        },
        render() {
            let canvas = this.$el.querySelector('.graph');
            this.chart = new Chart(canvas, this.config);
        },
    }
};
