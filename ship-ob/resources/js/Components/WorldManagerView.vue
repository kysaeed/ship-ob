<template>
    <div>
        <world-list :world-list='worldList'></world-list>
        <world-editor></world-editor>
    </div>
</template>


<script>
import WorldEditor from './WorldEditor.vue';
import WorldList from './WorldList';


export default {
    props: {
        worldList: {
            type: Array,
            default: function() {
                return [];
            },
        },
    },
    mounted: function() {
        
    },
    components: {
        'world-editor': WorldEditor,
        'world-list': WorldList,
    },

}
</script>