<template>
    <div class="ground-panel">

    </div>
</template>

<style lang="sass" scoped>

.panel {
    top: 0px;
    left: 0px;
    width: 80px;
    height: 80px;
    position: absolute;
    border: none;
    background-color: none;
    transform-style: preserve-3d;
    background: none;
    transform-origin: 600px 600px;
}
</style>

<script>
export default {
    mounted: function() {
        console.log('ground !');
    },
    data: function() {
        return {
            
        };
    },
}
</script>