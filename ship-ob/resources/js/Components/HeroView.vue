<template>
    <div class="hero-view-container" :style="styleHero">
        <div class="balloon-container">
            <div class="balloon-shape">
                <todo-list></todo-list>
            </div>
        </div>
        <div class="avatar-container">
            <div class="avatar-top">    
                <img class="img-fluid" :src="avatar" />
            </div>
            <div class="avatar-floor"></div>
            <div class="avatar-shadow"></div>
        </div>
        <div>{{ heroInfo.name }}</div>
    </div>
</template>

<style lang="sass" scoped>

.hero-view-container {
    width: 50px;
    height: 70px;
    position: absolute;
    left: 0px;
    top: 0px;
    border: none;
    background-color: none;
    transform-style: preserve-3d;
};
.avatar-container {
    transform-style: preserve-3d;
    transform: translateY(18px) rotateY(30deg);
    position: relative;
    margin: 0px;
}

.avatar-top {
    transform-style: preserve-3d;
    transform-origin: bottom;
    position: relative;
    transform: rotateX(10deg); 
    padding: 2px 5px 1px 5px;
    border: 1px solid #4e4e4ee8;
    background-color: #ffffff8f;
}
.avatar-floor {
    transform-style: preserve-3d;
    transform: rotateX(90deg);
    transform-origin: top;
    position: relative;
    width: 100%;
    height: 49px;    
    border: 1px solid #4e4e4ee8;
    background-color: #ffffff8f;
}
.avatar-shadow {
    transform-style: preserve-3d;
    transform: translateY(6px) rotateX(90deg) ;
    transform-origin: 0px 0px;
    position: absolute;
    bottom: 0px;
    left: 0px;
    width: 100%;
    height: 49px;    
    border: none;
    background: linear-gradient(to top right, #24242480, #24242428);
}


.balloon-container {
    position: relative;
    transform-style: preserve-3d;
    // transform: transrateXY(20px) transrateX(20px);
    margin: 0px 0px 13px 0px;
}

.balloon-shape {
    position: relative;
    display: inline-block;
    min-width: 200px;
    max-with: 200px;
    // height:80px;
    background:#FFFFFF80;
    padding: 3px;
    // text-align: left;
    border: 1px solid #010101f0;
    color:black;
    // font-size:30px;
    border-radius:10px;
}
.balloon-shape:after,.balloon-shape:before {
    position:relative;
    border: solid transparent;
    content:'';
    height: 0;
    width: 0;
    pointer-events: none;
    position: absolute;
    top: 100%;
    left: 28%;
}
.balloon-shape:after{
    border-color: rgba(255, 255, 255, 0);
    border-top-width: 19px;
    border-bottom-width: 19px;
    border-left-width: 12px;
    border-right-width: 12px;
    margin-left: -12px;
    border-top-color: #FFFFFF;
}
.balloon-shape:before{
    border-color: rgba(138, 138, 138, 0);
    border-top-width: 21px;
    border-bottom-width: 21px;
    border-left-width: 14px;
    border-right-width: 14px;
    margin-left: -14px;
    margin-top: 1px;
    border-top-color: #8A8A8A;
}

</style>

<script>
import gsap from 'gsap';

import TodoList from './TodoList.vue';

export default {
    props: {
        heroInfo: {
            default: {
                name: 'xxxx',
                position: {
                    x: 0,
                    y: 0,
                },
            },
            type: Object,
        },
    },
    data: function() {
        return {
            position: {
                x: this.heroInfo.position.x,
                y: this.heroInfo.position.y,
            },
        };
    },
    
    mounted: function() {

    },
    watch: {
        heroInfo: function() {
            // console.log('wached!!', this.heroInfo);
        },

        'heroInfo.position': function() {
            // this.position.x = this.heroInfo.x;

            gsap.to(this.position, {
                duration: 1,
                ease: 'power1.out',
                x: this.heroInfo.position.x,
                y: this.heroInfo.position.y,
                // onUpdate: function() {
                //     // console.log('on-update');
                // }
                onComplete: function() {
                    ;
                }
            });            


        },
        
    },

    computed: {
        styleHero: function() {
            return {
                left: '0px',
                // top: (this.position.y * 0.0) + 'px',
                // width: w + 'px',
                // height: h + 'px',    
                // zIndex: 1000000000 - this.position.y,
                // transform: '',
                transform: 'translate3d(' + (this.position.x) + 'px, 0px, ' + this.position.y + 'px)',
    
            };
        },
        avatar: function() {
            return this.heroInfo.avatar;
            // return global.asset('img/' + this.heroInfo.avatar);
        },
        isUpdating() {
            return false;
        },
    },
    components: {
        'todo-list': TodoList,
    }

}
</script>