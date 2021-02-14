<template>
    <div class="my-3">
        <b-container>
            <b-row class="my-3">
                <b-col sm="3">
                    <label>タイトル</label>
                </b-col>
                <b-col sm="9">
                    <b-form-input v-model="name" placeholder="タイトルを入力"></b-form-input>
                </b-col>
            </b-row>
            <b-row lass="my-3">
                <b-col sm="3">
                    <label>説明</label>
                </b-col>
                <b-col sm="9">
                    <b-form-textarea v-model="desc" placeholder="説明を入力" rows="8"></b-form-textarea>
                </b-col>
            </b-row>
            <b-row class="my-3 justify-content-md-center">
                <b-col sm="4">
                    <b-button block variant="primary" @click="onCreate">GO!</b-button>
                </b-col>
            </b-row>
        </b-container>
    </div>
</template>


<script>
export default {
    mounted: function() {
        // console.log('World Editor!!!!');


    },

    methods: {
        onCreate: function() {
            var data = {
                id: this.id,
                name: this.name,
                desc: this.desc,
            };
            this.axios.post('home/world/create', data).then((res) => {
                if (res.data.isSuccess) {
                    // todo: 
                    alert('作成しました！');
                } else {
                    ;
                }

            }).catch((res) => {

            });
        },
    },

    data: function() {
        const axios = window.axios.create({
            responseType: 'json',
        });

        return {
            axios: axios,
            id: null,
            name: '',
            desc: '',
        };
    },
}
</script>