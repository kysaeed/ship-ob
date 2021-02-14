<template>
    <div>
        <h1>list</h1>
        <b-container class="my-3" v-for="w in worldList" :key="w.id">
            <ul class="list-group">
                <li class="list-group-item">
                    <h4>{{ w.name }}</h4>
                </li>
                <li class="list-group-item">{{ w.desc }}</li>
                <li class="list-group-item">
                    <p>
                        <i class="fa fa-user"></i> {{ w.heroCount }}
                    </p>
                </li>
                <li class="list-group-item">
                    <a :href="w.url">
                        <button class="btn btn-primary">GO!</button>
                    </a>
                </li>
            </ul>
        </b-container>
    </div>
</template>

<script>
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
        console.log(this.worldList);
    },

    methods: {

    },

    data: function() {
        return {};
    },
}
</script>