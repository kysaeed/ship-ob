<template>
    <div class="hero-view-container" :style="posscss">
        <div class="">
            todos....
        </div>
        <div class="">
            todos....
        </div>
        <div class="">
            todos....
        </div>
        <div class="avatar-container">
            <img class="img-fluid" src="img/avatar.png" />
        </div>
        <h4>{{ heroInfo.name }}</h4>
    </div>
</template>

<style lang="sass" scoped>
.hero-view-container {
    width: 110px;
    position: absolute;
    border: 1px solid #808080;
    background-color: #f0f0f070;
};  
.avatar-container {
    position: relative;
    margin: 30px;
}
</style>

<script>
import gsap from 'gsap';

console.log(gsap);  

export default {
    props: {
        heroInfo: {
            default: {
                name: 'xxxx',
                x: 0,
                y: 0,
            },
            type: Object,
        },
    },
    data: function() {

        return {
            position: {
                x: this.heroInfo.x,
                y: this.heroInfo.y,
            },
        };
    },
    
    mounted: function() {

    },
    watch: {
        heroInfo: function() {
            console.log('wached!!', this.heroInfo);
        },
        'heroInfo.x': function() {
            gsap.to(this.position, {
                duration: 1,
                ease: 'power1.out',
                x: this.heroInfo.x,
            });            
        },

    },

    computed: {
        posscss: function() {
            return {
                left: this.position.x + 'px',
                top: this.position.y + 'px',
            };
        },
    },

}
</script>