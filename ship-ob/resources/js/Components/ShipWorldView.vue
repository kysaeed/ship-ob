<template>
    <div>
        <div class="container-fluid">
            <div class="row ship-world">
                <div class="col-sm-12 world-view-container">
                    <div class="world-view" :style="viewStyle" >
                        <hero-view v-for="h in heroes" :key="h.id" :heroInfo="h"></hero-view>
                        <div class="world-ground" @click="onClick">
                            <img src="/img/green.jpg" class="img-fluid" />
                        </div>
                    </div>
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
    perspective-origin: 50% -500px;

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
    background-color: #f0e0e0dd;
    width: 1200px;
    height: 1200px;  
    transform-style: preserve-3d;
    transform-origin: 50% 50%;
    transform: translateX(-600px) translateZ(-600px) translateY(-101px) rotateY(0deg) rotateX(90deg) ;
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
        onClick: function(e) {
            // console.log(e, e.offsetX, e.offsetY);
            this.heroes[0].x = (e.offsetX - 600);
            this.heroes[0].y = (-e.offsetY);
        },
        right: function() {
            this.heroes[0].x+=50;
        },
        left: function() {
            this.heroes[0].x-=50;
        },
        down: function() {
            this.heroes[0].y-=50;
        },
        up: function() {
            this.heroes[0].y+=50;
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
                    x: 390,
                    y: 1920,
                    avatar: 'avatar2.png',
                },
            ],
        };
    },
    mounted: function() {
        console.log('ship-world-view: monted!!', this.worldInfo);

        // this.$refs['todoEdit'].show();


    },
    watch: {
        'this.heroes[0].x': function() {

        },
        'this.heroes[0].y': function() {

        },
    },
    components: {
        'todo-edit': TodoEdit,
        'hero-view': HeroView,
    },
    computed: {
        viewStyle: function() {
            return {
                transform: 'translate3d(' +(-this.heroes[0].x + 400)+ 'px, 20px, ' +(this.heroes[0].y + 500)+ 'px)',
            };
        }
    },
}
</script>
