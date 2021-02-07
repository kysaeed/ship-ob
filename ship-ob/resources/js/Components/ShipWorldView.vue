<template>
    <div>
        <div class="container-fluid">
            <div class="row ship-world">
                <div class="col-sm-12 world-view-container" ref="view">
                    <div class="world-view" :style="viewStyle">
                        <hero-view v-for="h in heroes" :key="h.id" :heroInfo="h"></hero-view>
                        <anchor-view :position="{x: 600, y: 1200}"></anchor-view>
                        <ground-panel @pointed="onPointed" :offsetX="-600"></ground-panel>
                        <ground-panel @pointed="onPointed" :offsetX="600"></ground-panel>
                        <ground-panel @pointed="onPointed" :offsetX="-600" :offsetY="1200"></ground-panel>
                        <ground-panel @pointed="onPointed" :offsetX="600" :offsetY="1200"></ground-panel>
                    </div>
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
                    <p>data 1 ...........</p>
                    <p>data 2 ...........</p>
                    <p>data 3 ...........</p>
                    <p>data 4 ...........</p>
                </div>
            </div>
        </div>
        <todo-edit class="my-modal" ref="todoEdit"></todo-edit>
    </div>
</template>

<style lang="sass" scoped>
.ship-world {
    height: 720px;
    position: relative;
};

.world-view-container {
    position: relative;
    height: 720px;
    width: 100%;
    overflow: hidden;
    transform-style: preserve-3d;
    perspective: 2700px;
    perspective-origin: 50% -800px;

}

.world-view {
    over-flow: hidden;
    position: relative;
    height: 720px;
    width: 1000px;
    // overflow: hidden;
    transform-style: preserve-3d;
    // transform: translate3d(100px, 0, -200px);

}


</style>


<script>
import gsap from 'gsap';

import TodoEdit from './TodoEdit.vue';
import HeroView from './HeroView.vue';
import AnchorView from './AnchorView.vue';
import GroundPanel from './GroundPanel.vue';


export default {
    props: {
        'worldInfo': {
            type: Array,
            default: [],
        },
    },
    methods: {
        onPointed: function(e) {
            this.heroes[0].x = (e.x);
            this.heroes[0].y = (e.y);
        },
        right: function() {
            this.heroes[0].x += 50;
        },
        left: function() {
            this.heroes[0].x -= 50;
        },
        down: function() {
            this.heroes[0].y += 50;
        },
        up: function() {
            this.heroes[0].y -= 50;
        },
        enter: function() {
            console.log('enter!')
        },
    },
    data: function() {
console.log(this.worldInfo)

        // var dummyHeros = [
        //     {
        //         id: 1,
        //         name: 'A様',
        //         x: 200,
        //         y: 900,
        //         avatar: 'avatar1.png',
        //     },
        //     {
        //         id: 2,
        //         name: 'xxさん',
        //         x: 260,
        //         y: 410,
        //         avatar: 'avatar2.png',
        //     },
        //     {
        //         id: 3,
        //         name: 'Cさん',
        //         x: 190,
        //         y: 920,
        //         avatar: 'avatar2.png',
        //     },
        // ];

        var dummyHeros = this.worldInfo;

        var vp = {
            x: dummyHeros[0].x,
            y: dummyHeros[0].y,
        };

        return {
            heroes: dummyHeros,
            h: dummyHeros[0],
            viewPoint: vp,
        };
    },
    mounted: function() {
        console.log('ship-world-view: monted!!', this.worldInfo);


    },
    watch: {
        'h.x': function() {
            // console.log('x!');
            gsap.to(this.viewPoint, {
                duration: 1.2,
                ease: 'power1.out',
                x: (this.h.x + 0),
            });                        
        },
        'h.y': function() {
            // console.log('y!');
            gsap.to(this.viewPoint, {
                duration: 1.2,
                ease: 'power1.out',
                y: this.h.y,
            });                        
        },
    },
    components: {
        'todo-edit': TodoEdit,
        'hero-view': HeroView,
        'anchor-view': AnchorView,
        'ground-panel': GroundPanel,
    },
    computed: {
        viewStyle: function() {
            // var w = this.$refs.view.clientWidth;
            // var h = this.$refs.view.clientHeight;
            var w = 400;
            var h = 500;
            return {
                transform: 'translate3d(' + (-this.viewPoint.x + w)+ 'px, 20px, ' + (-this.viewPoint.y + h) + 'px)',
            };
        }
    },
}
</script>
