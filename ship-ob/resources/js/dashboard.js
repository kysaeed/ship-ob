
import WorldEditor from './Components/WorldEditor.vue';
import WorldList from './Components/WorldList';

const app = new Vue({
    el: '#app',
    components: {
        'world-editor': WorldEditor,
        'world-list': WorldList,
     }
});
