<template>
    <div>
        <div class="container-fluid">
            <div class="row ship-world">
                <div class="col-sm-12 world-view-container" ref="view" :style="wvcStyle">
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
                <div>
                    perspective: <input v-model="perspective" type="text" /> <br />
                    perspective-origin: <input v-model="perspectiveOrigin" type="text" /> <br />
                </div>
                </div>
                <div class="col-sm-6" style="background-color: gray; ">
                    <button class="btn btn-primary" @click="update()">Update</button>
                    <h2>world: {{ world.name }}</h2>
                    <p>{{ world.desc }}</p>
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
    // perspective: 2700px;
    // perspective-origin: 50% -800px;

}

.world-view {
    over-flow: hidden;
    position: relative;
    height: 720px;
    width: 1000px;
    // overflow: hidden;
    transform-style: preserve-3d;
    transform: translate3d(0px, 0px, -500px);

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
            type: Object,
            default: null,
        },
    },
    methods: {
        onPointed: function(e) {
            // this.h.x = (e.x);
            // this.h.y = (e.y);
            this.h.position = {
                x: e.x,
                y: e.y,
            };

            var data = {
                id: this.h.id,
                x: this.h.position.x,
                y: this.h.position.y,
            };

            this.axios.post('world/move/' + this.world.id, data).then(res => {
                console.log(res)
            }).catch(res => {
                console.log(res);
            });
        },

        right: function() {
            this.h.position.x += 50;
        },
        left: function() {
            this.h.position.x -= 50;
        },
        down: function() {
            this.h.position.y += 50;
        },
        up: function() {
            this.h.position.y -= 50;
        },
        update: function() {
            var data = {};
            this.axios.post('world/update/' + this.world.id, data).then(res => {
                // console.log(res);
                if (res.data.heroes) {
                    this.heroes = res.data.heroes;
                    this.h = this.heroes[res.data.index];
                }
            }).catch(res => {
                console.log(res);
            });
        },
    },
    data: function() {

        const axios = window.axios.create({
            responseType: 'json',
        });


        // var heroList = [
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

        var heroList = this.worldInfo.heroes;
        var h = heroList[this.worldInfo.index];

console.log(this.worldInfo.world)
        var vp = {
            x: h.position.x,
            y: h.position.y,
        };

        return {
            axios: axios,
            heroes: heroList,
            h: h,
            viewPoint: vp,
            world: this.worldInfo.world,
            perspective: 2700,
            perspectiveOrigin: -700,
        };
    },
    mounted: function() {
        console.log('ship-world-view: monted!!', this.worldInfo);


        var self = this;
        var intervalUpdate = function() {
            self.update();
            self.$nextTick(() => {
                setTimeout(intervalUpdate, 1000);
            });
        };

        intervalUpdate();

    },
    watch: {
        'h.position.x': function() {
            // console.log('x!');
            gsap.to(this.viewPoint, {
                duration: 1.2,
                ease: 'power1.out',
                x: (this.h.position.x),
            });                        
        },
        'h.position.y': function() {
            // console.log('y!');
            gsap.to(this.viewPoint, {
                duration: 1.2,
                ease: 'power1.out',
                y: this.h.position.y,
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
        },
        wvcStyle: function() {
            return {
                perspective: this.perspective + 'px',
                perspectiveOrigin: '50% ' + this.perspectiveOrigin + 'px',
            };
        },
    },
}
</script>
