<template>
    <div class="anchor-container" :style="viewStyle">
        <div class="anchor anchor-base"></div>
        <div class="anchor anchor-m"></div>
        <div class="anchor anchor-m1"></div>
        <div class="anchor anchor-m2 text-center">
            <br /><br />XX事業部
        </div>
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

.anchor {
    position: absolute;
    top: 0px;
    left: 0px;
    width: 180px;
    height: 180px;
    background-color: #f0f0f0a0;
    transform-style: preserve-3d;
    border-radius: 80px;
    background-color: #f0f0f0a0;
    border: 1px solid #010101f0;
    padding: 30px 0px;
}

.anchor-base {
    transform: translateY(-15px);
}

.anchor-m {
    transform: translateY(-40px);
    // width: 160px;
    // height: 160px;
}

.anchor-m1 {
    transform: translateY(-64px);
    // width: 140px;
    // height: 140px;
}

.anchor-m2 {
    transform: translateY(-90px);
    // width: 120px;
    // height: 120px;
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