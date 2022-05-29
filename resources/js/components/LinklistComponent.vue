<template v-bind="link_list">
    <div>
        <table class="table">
                <thead>
                <tr>
                    <th>Title</th><th>Description</th><th>Time</th><th>Action</th>
                </tr>
                </thead>
            <tbody>
                <tr v-for="(list,index) in link_list.data" :key="index">
                    <td>{{list.title}}</td><td>{{list.title}}</td><td>{{list.created_at}}</td><td>Action</td>
                </tr>
            </tbody>
        </table>
   </div>
</template>

<script>
import { ref,reactive } from 'vue'

export default {
    setup(props,ctx) {
       const link_list = reactive({});
        link_list.value= props.link_list;
        return {
            link_list
        }
    },
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

