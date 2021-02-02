<template>
    <div class="anchor-container" :style="viewStyle">
        <div class="anchor-base"></div>
        <div class="anchor-m"></div>
        <div class="anchor-m1 text-center">XX事業部</div>
    </div>
</template>

<style lang="sass" scoped>

.anchor-container {
    top: 0px;
    left: 0px;
    width: 80px;
    height: 80px;
    position: absolute;
    border: none;
    background-color: none;
    transform-style: preserve-3d;
    background: none;
    transform-origin: 50% 50%;
}

.anchor-base {
    position: absolute;
    top: 0px;
    left: 0px;
    width: 180px;
    height: 180px;
    background-color: #f0f0f0a0;
    transform-style: preserve-3d;
    transform: translateY(-15px);
    border-radius: 80px;
    border: 1px solid #010101f0;
    
}

.anchor-m {
    position: absolute;
    top: 0px;
    left: 0px;
    width: 180px;
    height: 180px;
    background-color: #f0f0f0a0;
    transform-style: preserve-3d;
    transform: translateY(-40px);
    border-radius: 80px;
    border: 1px solid #010101f0;
    
}

.anchor-m1 {
    position: absolute;
    top: 0px;
    left: 0px;
    width: 180px;
    height: 180px;
    background-color: #f0f0f0a0;
    transform-style: preserve-3d;
    transform: translateY(-90px);
    border-radius: 80px;
    border: 1px solid #010101f0;
    color: black;
    padding: 40px;
}

</style>

<script>
export default {
    props: {
        position: {
            type: Object,
            default: function() {
                return {
                    x: 0,
                    y: 0,
                };
            },
        },
    },
    mounted: function() {

    },

    data: function() {
        return {

        };
    },

    computed: {
        viewStyle: function() {
            return {
                transform: 'translate3d(' + (this.position.x) + 'px, 90px, ' + (this.position.y) + 'px) rotateX(90deg) ',
            };
        }
    },

}
</script>