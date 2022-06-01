<template v-bind="link_list">
    <div>
        <table class="table">
                <thead>
                <tr>
                    <th>Title</th><th>Description</th><th>Time</th><th>Action</th>
                </tr>
                </thead>
            <tbody>
                <tr v-for="(list,index) in link_list" :key="index">
                    <td>{{list.title}}</td><td>{{list.title}}</td><td>{{list.created_at}}</td><td><button><router-link :to="'/admin/link_edit/'+list.id" >Edit</router-link></button><button @click.prevent="handleDelete(list.id)">Delete</button></td>
                </tr>
            </tbody>
        </table>
   </div>
</template>

<script>

export default {
    name:'Html List',
      props: {
        link_list: {
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

