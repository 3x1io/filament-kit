import axios from 'axios';
import Vue from 'vue';

Vue.component('browser', {
    data() {
        return {
            history: {}
        }
    },
    mounted(){

    },
    methods:{
        getFolder(data){
            axios.post(this.$props.url+'/json', {
                folder_path: data.path,
                folder_name: data.name
            }).then(data => {
                this.collection = {
                    folders: data.data.folders,
                    files: data.data.files,
                }
                this.history = data.data;
            })
        },
        getFile(){

        },
        goHome(){
            axios.post(this.$props.url+'/json').then(data => {
                this.collection = {
                    folders: data.data.folders,
                    files: data.data.files,
                }
                this.history = data.data;
            })
        },
        goBack(){
            axios.post(this.$props.url+'/json', {
                folder_path: history.back_path,
                folder_name: history.back_name
            }).then(data => {
                this.collection = {
                    folders: data.data.folders,
                    files: data.data.files,
                }
                this.history = data.data;
            })
        },
    },
    props:{
        url: String,
        collection: Object
    }
});
