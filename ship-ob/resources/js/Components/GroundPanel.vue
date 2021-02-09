<template>
    <div class="ground-panel" @click="onClick" :style="groundStyle">
        <img :src="image" class="img-fluid" />
    </div>
</template>

<style lang="sass" >

.ground-panel {
    position: absolute;
    top: 0px;
    left: 0px;
    background-color: #f0e0e0dd;
    width: 1200px;
    height: 1200px;
    transform-style: preserve-3d;
    transform-origin: top;
    // transform: translateY(154px) rotateX(90deg);
}
</style>

<script>
export default {
    props: {
        offsetX: {
            type: Number,
            default: 0,
        },
        offsetY: {
            type: Number,
            default: 0,
        },
    },
    mounted: function() {
        console.log('ground !', this.groundStyle);
    },
    methods: {
        onClick: function(e) {
            var p = {};
            if (!global.isFirefox) {
                // console.log(e, e.offsetX, e.offsetY);
                p.x = (e.offsetX);
                p.y = (e.offsetY);
            } else {
                // console.log(e, e.layerX, e.layerY);
                p.x = (e.layerX);
                p.y = (e.layerY);
            }
            p.x += this.offsetX;
            p.y += this.offsetY;
            this.$emit('pointed', p);
        },
    },
    data: function() {
// console.log(this.offsetX);
        return {
            groundStyle: {
                transform: 'translateX(' + this.offsetX + 'px) translateZ(' + this.offsetY + 'px) translateY(154px) rotateX(90deg)',
            },
            image: global.asset('/img/green.jpg'),
        };
    },
}
</script>