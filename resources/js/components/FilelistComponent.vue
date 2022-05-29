<template>
    <div>
        {{file_list}}
        <table class="table">
                <thead>
                <tr>
                    <th>Title</th><th>Description</th><th>Upload time</th><th>Action</th>
                </tr>
                </thead>
            <tbody>
                <tr v-for="(list,index) in filelist.data" :key="index">
                    <td>{{list.title}}</td><td>{{list.title}}</td><td>{{list.created_at}}</td><td>Action</td>
                </tr>
            </tbody>
        </table>
   </div>
</template>

<script>
import { ref } from 'vue'

export default {
    setup(props,ctx) {
       const filelist = ref({});
        filelist.value= props.file_list;
        return {
            filelist
        }
    },
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

