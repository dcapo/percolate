<template>
    <div class="flavors-input">
        <h4 class="title is-4">Flavors</h4>
        <hr />
        <flavor-wheel @select-flavor="selectFlavor"
            :flavors="flavorWheel">
        </flavor-wheel>
        <div class="flavors-select-wrap">
            <select class="flavors-select"
                name="flavors"
                multiple="multiple"
                style="width: 100%"
                v-model="flavors">
                <option v-for="flavor in flattenedFlavors"
                    :value="flavor">{{ flavor }}</option>
            </select>
        </div>
    </div>
</template>

<script>
    import FlavorWheel from './FlavorWheel.vue';
    import $ from 'jquery';
    import select2 from 'select2';

    export default {
        components: { FlavorWheel },
        data() {
            return {
                flavors: ispresso.flavors,
                flavorWheel: ispresso.flavorWheel
            };
        },
        computed: {
            flattenedFlavors() {
                const recursivelyFlatten = (flavor, flavors) => {
                    if (flavor.name && !flavors.includes(flavor.name)) {
                        flavors.push(flavor.name);
                    }

                    if (flavor.children && flavor.children.length) {
                        flavor.children.forEach(flavor => {
                            recursivelyFlatten(flavor, flavors);
                        });
                    }
                };

                let flavors = [];
                recursivelyFlatten(this.flavorWheel, flavors);
                return flavors;
            }
        },
        methods: {
            selectFlavor(name) {
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
            let $select = $(this.$el).find('.flavors-select');
            this.$select = $select.select2({
                placeholder: 'Enter a flavor here...',
                tags: true
            });

            $select.on("select2:select", (e) => {
                this.flavors.push(e.params.data.text);
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
