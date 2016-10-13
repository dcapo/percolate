<template>
    <input type="text" :name="name"
        :id="name"
        :value="value"
        class="pikaday input is-medium">
</template>

<script>
    import Pikaday from 'pikaday';

    export default {
        props: ['name', 'value'],
        mounted() {
            let picker = new Pikaday({
                field: this.$el
            });
        }
    };
</script>
