<template>
    <div>
        <div class="container-fluid">
            <div class="row ship-world">
                <div class="col-sm-12 world-view">
                <transition-group name="thero" v-on:enter="enter">
                    <hero-view v-for="h in heroes" :key="h.id" :heroInfo="h"></hero-view>
                </transition-group>
                    main-view
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div style="width:300px;">
                        <div class="text-center">
                            <button class="btn btn-primary" @click="up()">▲</button>
                        </div>
                    </div>
                    <div style="width:300px;">
                        <div class="text-center">
                            <button class="btn btn-primary" @click="left()">◀</button>
                            <button class="btn btn-primary" @click="down()">▼</button>
                            <button class="btn btn-primary" @click="right()">▶</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6" style="background-color: gray;">
                    <h1>テスト</h1>
                </div>
            </div>
        </div>
        <todo-edit class="my-modal" ref="todoEdit"></todo-edit>
    </div>
</template>

<style lang="sass" scoped>
.ship-world {
    height: 520px;
    overflow: hidden;
};
.thero-move {
    transition: transform 1s;
}

</style>

<script>
import TodoEdit from './TodoEdit.vue';
import HeroView from './HeroView.vue';

export default {
    props: {
        'worldInfo': {
            type: Array,
            default: {},
        },
    },
    methods: {
        right: function() {
            this.heroes[0].x+=50;
        },
        left: function() {
            this.heroes[0].x-=50;
        },
        down: function() {
            this.heroes[0].y+=-50;
        },
        up: function() {
            this.heroes[0].y-=-50;
        },
        enter: function() {
            console.log('enter!')
        },
    },
    data: function() {
        return {
            heroes: [
                {
                    id: 1,
                    name: 'あああ',
                    x: 100,
                    y: 100,
                },
                {
                    id: 2,
                    name: 'いいいいい',
                    x: 160,
                    y: 210,
                },
                {
                    id: 3,
                    name: 'ABCD',
                    x: 370,
                    y: 120,
                },
            ],
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
