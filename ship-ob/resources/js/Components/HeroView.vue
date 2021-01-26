<template>
    <div class="hero-view-container" :style="poss">
        <div class="">
            todos....
        </div>
        <div class="">
            todos....
        </div>
        <div class="">
            todos....
        </div>
        <img width="50px" height="50px" src="img/avatar.png"></img>
        <h4>{{ heroInfo.name }}</h4>
    </div>
</template>

<style lang="sass" scoped>
.hero-view-container {
    width: 200px;
    position: absolute;
    border: 1px solid #808080;
    background-color: #f0f0f070;
};  

</style>

<script>
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
            poss: {
                left: this.heroInfo.x + 'px',
                top: this.heroInfo.y + 'px',
            },
        };
    },
    mounted: function() {

    },

}
</script>