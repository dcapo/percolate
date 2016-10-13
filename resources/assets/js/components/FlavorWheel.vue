<template>
    <div id="vis" class="flavor-wheel">
    </div>
</template>

<script>
    import d3 from 'd3';

    export default {
        props: ['flavors'],
        methods: {
            brightness(rgb) {
                return rgb.r * .299 + rgb.g * .587 + rgb.b * .114;
            },
            onSelectFlavor(d) {
                this.$emit('select-flavor', d.name);
            }
        },
        mounted() {
            var width = 800,
                height = width,
                radius = width / 2,
                x = d3.scale.linear().range([0, 2 * Math.PI]),
                y = d3.scale.pow().exponent(1.3).domain([0, 1]).range([0, radius]),
                padding = 5,
                duration = 1000;

            var div = d3.select("#vis");

            div.select("img").remove();

            var vis = div.append("svg")
                .attr("width", width + padding * 2)
                .attr("height", height + padding * 2)
                .append("g")
                .attr("transform",
                    "translate(" + [radius + padding, radius + padding] + ")");

            var partition = d3.layout.partition()
                .sort(null)
                .value(d => 5.8 - d.depth);

            var arc = d3.svg.arc()
                .startAngle(d => Math.max(0, Math.min(2 * Math.PI, x(d.x))))
                .endAngle(d => Math.max(0, Math.min(2 * Math.PI, x(d.x + d.dx))))
                .innerRadius(d => Math.max(0, d.y ? y(d.y) : d.y))
                .outerRadius(d => {
                    return Math.max(0, y(d.y + d.dy));
                });

            var nodes = partition.nodes(this.flavors);

            var path = vis.selectAll("path").data(nodes);
            path.enter().append("path")
                .attr("display", d => d.depth ? null : "none") // hide inner ring
                .attr("id", (d, i) => "path-" + i)
                .attr("d", arc)
                .attr("fill-rule", "evenodd")
                .style("fill", d => d.color)
                .on("click", this.onSelectFlavor);

            var text = vis.selectAll("text").data(nodes);
            var textEnter = text.enter().append("text")
                .style("fill-opacity", 1)
                .style("fill", d => {
                    return this.brightness(d3.rgb(d.color)) < 200 ? "#eee" : "#000";
                })
                .attr("text-anchor", d => x(d.x + d.dx / 2) > Math.PI ? "end" : "start")
                .attr("dy", ".4em")
                .attr("transform", (d) => {
                    var multiline = (d.name || "").split(" ").length > 1,
                        angle = x(d.x + d.dx / 2) * 180 / Math.PI - 90,
                        rotate = angle + (multiline ? -.5 : 0);
                    return "rotate(" + rotate +
                        ")translate(" + (y(d.y) + padding) +
                        ")rotate(" + (angle > 90 ? -180 : 0) + ")";
                })
                .on("click", this.onSelectFlavor);

            textEnter.append("tspan")
                .attr("x", 0)
                .text(d => {
                    if (!d.depth) return "";
                    return d.name;
                    if (d.depth === 3) {
                        return d.name;
                    }
                });
        }
    };
</script>

<style>
    path {
        stroke: #d1d2CC;
        stroke-width: 1;
        cursor: pointer;
    }

    text {
        font: 10px sans-serif;
        text-transform: uppercase;
        cursor: pointer;
    }

    .flavor-wheel {
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
