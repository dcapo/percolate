<template>
    <div class="flavors-input">
        <h4 class="title is-4">Flavors</h4>
        <hr />
        <flavor-wheel @toggle-flavor="toggleFlavor"
            :flavors="flavorWheel" :selections="flavors">
        </flavor-wheel>
        <div class="flavors-select-wrap">
            <select class="flavors-select"
                name="flavors[]"
                multiple="multiple"
                style="width: 100%">
            </select>
        </div>
    </div>
</template>

<script>
    import FlavorWheel from './FlavorWheel.vue';
    import $ from 'jquery';
    import select2 from 'select2';
    import _ from 'lodash';

    export default {
        components: { FlavorWheel },
        data() {
            return {
                flavors: ispresso.flavors,
                flavorWheel: ispresso.flavorWheel
            };
        },
        computed: {
            flavorOptions() {
                const recursivelyFlatten = (flavor, options) => {
                    if (flavor.name && !options.includes(flavor.name)) {
                        options.push(flavor.name);
                    }

                    if (flavor.children && flavor.children.length) {
                        flavor.children.forEach(flavor => {
                            recursivelyFlatten(flavor, options);
                        });
                    }
                };

                let options = [];
                recursivelyFlatten(this.flavorWheel, options);
                return _.union(options, this.flavors);
            }
        },
        methods: {
            toggleFlavor(name) {
                let index = this.flavors.indexOf(name);
                if (index >= 0) {
                    this.flavors.splice(index, 1);
                } else {
                    this.flavors.push(name);
                }
                this.$select.val(this.flavors).trigger('change');
            }
        },
        mounted() {
            let vm = this;
            this.$select = $(this.$el).find('.flavors-select').select2({
                placeholder: 'Enter a flavor here...',
                data: this.flavorOptions,
                tags: true,
                createTag(params) {
                    let flavor = _.startCase(params.term.trim());
                    if (!vm.flavorOptions.includes(flavor)) {
                        return {
                            id: flavor,
                            text: flavor,
                            isNew: true
                        };
                    }
                },
                insertTag(data, tag) {
                    data.push(tag);
                }
            });
            this.$select.val(this.flavors).trigger('change');

            this.$select.on("select2:select", (e) => {
                this.flavors.push(e.params.data.text);
            });

            this.$select.on("select2:unselect", (e) => {
                this.flavors.splice(this.flavors.indexOf(e.params.data.text), 1);
            });
        }
    };
</script>

<style>
    .flavors-input {
        margin: 20px 0;
    }

    .flavors-select-wrap {
        margin: 20px 0;
    }

    .select2-container--default .select2-selection--multiple {
        border: 1px solid #dbdbdb;
        color: #363636;
        box-shadow: inset 0 1px 2px rgba(10, 10, 10, 0.1);
        font-size: 18px;

        &:hover {
            border: 1px solid #b5b5b5;
        }
    }
</style>
