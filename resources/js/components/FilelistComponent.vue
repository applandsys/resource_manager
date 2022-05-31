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
                    <td>{{list.title}}</td><td>{{list.title}}</td><td>{{list.created_at}}</td><td><button><router-link :to="'/admin/file/'+list.id" >Edit</router-link></button><button>Delete</button></td>
                </tr>
            </tbody>
        </table>
   </div>
</template>

<script>
import { ref } from 'vue'

export default {
    name:'File List',
      props: {
        file_list: {
            type: [Array,Object]
        }
      },
    data(){
        return{
            title: 'File List Component'
        }
    }
}
</script>

