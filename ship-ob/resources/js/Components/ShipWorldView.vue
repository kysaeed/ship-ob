<template>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 world-view">
                    main-view
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>操作はここ</h1>
                    <button class="btn btn-primary" @click="add()">▲</button>
                    <h2>{{ counter }}</h2>
                    <button class="btn btn-primary" @click="sub()">▼</button>
                </div>
                <div class="col-sm-6">
                    <h1>テスト</h1>
                </div>
            </div>
        </div>
        <todo-edit class="my-modal" ref="todoEdit"></todo-edit>
    </div>
</template>

<style scoped>


</style>


<script>
import TodoEdit from './TodoEdit.vue';
import HeroView from './HeroView.vue';

export default {
    props: {
        'worldInfo': {
            type: Object,
            default: {},
        },
    },
    methods: {
        add: function() {
            this.counter++;
        },
        sub: function() {
            this.counter--;
        },
    },
    data: function() {
        return {
            counter: 1,
        };
    },
    mounted: function() {
        console.log('ship-world-view: monted!!', this.worldInfo);

        // this.$refs['todoEdit'].show();


    },
    components: {
        'todo-edit': TodoEdit,
        'hero-view': HeroView,
    },
}
</script>
