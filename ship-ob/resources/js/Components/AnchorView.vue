<template>
    <div class="anchor-container" :style="viewStyle">
        <div class="anchor-base"></div>
        <div class="anchor-m"></div>
        <div class="anchor-m1">エンジニアリング事業部</div>
        aaaaaaa
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
    transform: translateY(-30px);
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
    transform: translateY(-50px);
    border-radius: 80px;
    border: 1px solid #010101f0;
    color: black;
    padding: 40px;
}

</style>

<script>
export default {
    mounted: function() {

    },

    data: function() {
        return {
            x: 0,
            y: 0,
        };
    },

    computed: {
        viewStyle: function() {
            return {
                transform: 'translate3d(' +(this.x)+ 'px, 90px, ' +(this.y)+ 'px) rotateX(90deg) ',
            };
        }
    },

}
</script>