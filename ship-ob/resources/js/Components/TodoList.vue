<template>
    <div class="todo-list">

        <div v-for="t in todos" :key="t.id">
            <div class="todo-caption">
                <span class="badge badge-danger">！</span> {{ t.name }}
            </div>  
        </div>

    </div>
</template>

<style lang="sass" scoped>
.todo-caption {
    margin: 2px 1px;
    background-color: #38adffaa;
    border: 1px solid #38adffea;
    border-radius: 3px;
}
</style>

<script>
export default {
    data: function() {
        return {
            todos: [
                {
                    id: 1,
                    name: 'もうアレなのよー',
                },
                {
                    id: 2,
                    name: 'なんかああいうのが大変なのよー',
                },
                {
                    id: 3,
                    name: 'もう、お終いよ！！',
                },
            ],
        };
    },
    mounted: function() {

    },


}
</script>