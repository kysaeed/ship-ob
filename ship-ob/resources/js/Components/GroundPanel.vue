<template>
    <div class="ground-panel" @click="onClick">
        <img src="/img/green.jpg" class="img-fluid" />
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
    transform: translateX(-600px) translateZ(-600px) translateY(154px) rotateX(90deg);
}
</style>

<script>
export default {
    mounted: function() {
        console.log('ground !');
    },
    methods: {
        onClick: function(e) {
            var p = {};
            if (!global.isFirefox) {
                console.log(e, e.offsetX, e.offsetY);
                p.x = (e.offsetX - 600);
                p.y = (e.offsetY - 600);
            } else {
                console.log(e, e.layerX, e.layerY);
                p.x = (e.layerX - 600);
                p.y = (e.layerY - 600);
            }
            this.$emit('pointed', p);
        },
    },
    data: function() {
        return {
            
        };
    },
}
</script>