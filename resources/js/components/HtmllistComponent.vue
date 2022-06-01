<template v-bind="html_list">
    <div>
        <table class="table">
                <thead>
                <tr>
                    <th>Title</th><th>Description</th><th>Time</th><th>Action</th>
                </tr>
                </thead>
            <tbody>
                <tr v-for="(list,index) in html_list" :key="index">
                    <td>{{list.title}}</td><td>{{list.description}}</td><td>{{list.created_at}}</td><td><button><router-link :to="'/admin/html_edit/'+list.id" >Edit</router-link></button><button @click.prevent="handleDelete(list.id)">Delete</button></td>
                </tr>
            </tbody>
        </table>
   </div>
</template>

<script>
import { ref } from 'vue'

export default {
    name:'Html List',
      props: {
        html_list: {
            type: [Array,Object]
        }
      },
    data(){
        return{
            title: 'Html List Component'
        }
    }
}
</script>

