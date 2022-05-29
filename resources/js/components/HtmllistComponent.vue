<template v-bind="html_list">
    <div>
        <table class="table">
                <thead>
                <tr>
                    <th>Title</th><th>Description</th><th>Time</th><th>Action</th>
                </tr>
                </thead>
            <tbody>
                <tr v-for="(list,index) in html_list.data" :key="index">
                    <td>{{list.title}}</td><td>{{list.description}}</td><td>{{list.create_at}}</td><td>Action</td>
                </tr>
            </tbody>
        </table>
   </div>
</template>

<script>
import { ref } from 'vue'

export default {
    setup(props,ctx) {
       const html_list = ref({});
        html_list.value= props.html_list;
        return {
            html_list
        }
    },
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

