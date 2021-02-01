<template>
    <div>
        <div class="container-fluid">
            <div class="row ship-world">
                <div class="col-sm-12 world-view-container">
                    <div class="world-view" :style="viewStyle" >
                        <hero-view v-for="h in heroes" :key="h.id" :heroInfo="h"></hero-view>
                        <anchor-view></anchor-view>
                        <div class="world-ground" @click="onClick">
                            <img src="/img/green.jpg" class="img-fluid" />
                        </div>
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
    overflow: hidden;
    transform-style: preserve-3d;
    perspective: 3200px;
    perspective-origin: 50% -900px;

}

.world-view {
    position: relative;
    height: 720px;
    width: 1000px;
    // overflow: hidden;
    transform-style: preserve-3d;
    // transform: translate3d(100px, 0, -200px);

}

.world-ground {
    position: absolute;
    top: 0px;
    left: 0px;
    background-color: #f0e0e0dd;
    width: 1200px;
    height: 1200px;  
    transform-style: preserve-3d;
    transform-origin: top;
    // transform: rotateX(90deg) translateX(0px) translateZ(0px) translateY(0px) rotateY(0deg);
    transform: translateX(0px) translateZ(0px) translateY(154px) rotateX(90deg);
}

</style>


<script>
import gsap from 'gsap';

import TodoEdit from './TodoEdit.vue';
import HeroView from './HeroView.vue';
import AnchorView from './AnchorView.vue';


export default {
    props: {
        'worldInfo': {
            type: Object,
            default: {},
        },
    },
    methods: {
        onClick: function(e) {
            console.log(e, e.offsetX, e.offsetY);
            this.heroes[0].x = (e.offsetX);
            this.heroes[0].y = (e.offsetY);
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
        var dummyHeros = [
            {
                id: 1,
                name: 'A様',
                x: 0,
                y: 0,
                avatar: 'avatar1.png',
            },
            {
                id: 2,
                name: 'xxさん',
                x: 260,
                y: 410,
                avatar: 'avatar2.png',
            },
            {
                id: 3,
                name: 'Cさん',
                x: 190,
                y: 920,
                avatar: 'avatar2.png',
            },
        ];

        return {
            heroes: dummyHeros,
            h: dummyHeros[0],
            viewPoint: {
                x: 0,
                y: 0,
            },
        };
    },
    mounted: function() {
        console.log('ship-world-view: monted!!', this.worldInfo);
        // this.$refs['todoEdit'].show();


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
                y: -this.h.y + 100,
            });                        
        },
    },
    components: {
        'todo-edit': TodoEdit,
        'hero-view': HeroView,
        'anchor-view': AnchorView,
    },
    computed: {
        viewStyle: function() {
            return {
                transform: 'translate3d(' +(-this.viewPoint.x + 400)+ 'px, 20px, ' +(this.viewPoint.y + 500)+ 'px)',
            };
        }
    },
}
</script>
