<template>
        <b-modal ref="a">
            <div class="row">
                <div class="col-sm-12">
                    MODAL!!!
                </div>
            </div>
            <template v-slot:modal-title>
                <i class="fas fa-sticky-note"></i> todo タイトル
            </template>

            <template v-slot:modal-ok>
                <i class="fas fa-backward"></i> OK
            </template>
        </b-modal>
</template>


<script>
export default {
    data: function() {
        return {};
    },
    mounted: function() {
        console.log('todo-list!!', this.show);
        // this.$refs['a'].show();
    },

}
</script>