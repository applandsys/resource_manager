<template>
     <div class="content_wrapper">
        <div class="page-title"><h1>{{ title }}</h1></div>

        <div class="resource_box">
            <h3>PDF file download for Visitors</h3>
                <table class="table">
                        <thead>
                        <tr>
                            <th>Title</th><th>Description</th><th>Download</th>
                        </tr>
                        </thead>
                    <tbody>
                        <tr v-for="(list,index) in file_list.data" :key="index">
                            <td>{{list.title}}</td><td>{{list.description}}</td><td><button @click="downloadFile(list.file_name)">{{list.file_name}}</button></td>
                        </tr>
                    </tbody>
                </table>
        </div>  

         <div class="resource_box">
            <h3>Html Snipped for Visitors</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Title</th><th>Description</th><th>Snipped</th><th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(list,index) in html_list.data" :key="index">
                        <td>{{list.title}}</td><td>{{list.description}}</td><td>{{list.html_snipped}}</td><td><button @click=" copyText(list.html_snipped)">Copy</button></td>
                    </tr>
                    </tbody>
            </table>
        </div> 

           <div class="resource_box">
            <h3>Link for Visitors</h3>
                <table class="table">
                <thead>
                <tr>
                    <th>Title</th><th>Description</th><th>Time</th><th>Action</th>
                </tr>
                </thead>
            <tbody>
                <tr v-for="(list,index) in link_list.data" :key="index">
                    <td>{{list.title}}</td><td>{{list.title}}</td><td>{{list.created_at}}</td><td><button @click="OpenUrl(list.link_url,list.new_tab)">Open</button></td>
                </tr>
            </tbody>
        </table>
        </div> 
    </div>
</template>
<script>
import FilelistComponent from './FilelistComponent.vue';

import axios from 'axios'
import vue_config from '../vue_config'

export default {
     components:{
        FilelistComponent
    },
    data(){
        return{
            title: "Visiotor area",
            file_list: [],
            html_list: [],
            link_list: [],
        }
    },
    methods:{
        downloadFile(filename){
            window.open(`${vue_config.BASE_URL}/pdf_resources/${filename}`, '_blank');
        },

        copyText(content) {
            navigator.clipboard.writeText(content);
            alert("Copied the text: " + content);
        }
        ,

        OpenUrl(url,isnew_tab){
            if(isnew_tab){
                window.open(url, '_blank');
            }else{
                 window.open(url);
            }
              
        }
    },
    mounted(){
        axios.get(vue_config.BASE_URL+'/api/file_resource')
            .then(response=>{
                console.log(response);
                this.file_list = response.data;
            })
            .catch(err => {
               // console.log(err);
                  if(err.response.status == 422) {
                      console.log("some thing error");
                  }    
            })


        axios.get(vue_config.BASE_URL+'/api/html_resource')
            .then(response=>{
               // console.log(response);
                this.html_list = response.data;
            })
            .catch(err => {
               // console.log(err);
                  if(err.response.status == 422) {
                      console.log("some thing erro");
                  }    
            })


        axios.get(vue_config.BASE_URL+'/api/link_resource')
            .then(response=>{
               // console.log(response);
                this.link_list = response.data;
            })
            .catch(err => {
               // console.log(err);
                  if(err.response.status == 422) {
                      console.log("some thing erro");
                  }    
            })
    }
}
</script>
