<template>
    <div>
        <table class="table">
                <thead>
                <tr>
                    <th>Title</th><th>Description</th><th>Upload time</th><th>Action</th>
                </tr>
                </thead>
            <tbody>
                <tr v-for="(list,index) in file_list" :key="index">
                    <td>{{list.title}}</td><td>{{list.title}}</td><td>{{list.created_at}}</td><td><button><router-link :to="'/admin/file/'+list.id" >Edit</router-link></button><button @click.prevent="handleDelete(list.id)">Delete</button></td>
                </tr>
            </tbody>
        </table>
   </div>
</template>

<script>

import axios from 'axios';
import vue_config from '../vue_config';

export default {
    name:'File List',
      props: {
        file_list: {
            type: [Array,Object]
        }
      },
    data(){
        return{
            title: 'File List Component',
            file_error: null,
            inserted: false
        }
    },
    methods:{
        handleDelete(file_id){

           axios.delete(vue_config.BASE_URL+'/api/file_resource/'+file_id)
            .then(response=>{
                    this.file_list.pop(response.data);
                    this.file_error = null;
                    this.inserted = true;
            })
            .catch(err => {
                  if(err.response.status == 422) {
                      this.file_error = 'Only PDF format is Accepted';
                  }
            })

        }
    }
}
</script>

