<template>
    <div class="">
        <div class="row-col">
            <div class="col-2">
                    <h2>{{ title_page }}</h2>
                    <p>HTML Content can Insert and manage here </p>
                        <div v-if="inserted" class="success_alert">Data Inserted Sucessfully for link {{link_url}}</div>

                    <div class="container">
                        <form>
                            <div class="row">
                                <div class="col-25">
                                <label for="title">HTML title</label>
                                </div>
                                <div class="col-75">
                                <input type="text" v-model="title" id="title" name="title" placeholder="Title of the HTML Resources..">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-25">
                                <label for="content">Description</label>
                                </div>
                                <div class="col-75">
                                <textarea id="content" v-model="description" name="content" placeholder="Write something.." ></textarea>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-25">
                                <label for="content">HTML Snipped </label>
                                </div>
                                <div class="col-75">
                                <textarea id="content" v-model="html_snipped" name="content" placeholder="HTML Snipped" ></textarea>
                                </div>
                            </div>
                        <br>
                            <div class="row">
                                <div class="right">
                                    <input type="submit" value="Submit" @click.prevent="insertData">
                                </div>
                            </div>
                        </form>
                    </div>

            </div>
            <div class="col-2">
         

                    <div v-if="html_list.length==0"><h3>No HTML Inserted yet </h3></div>
                    <div v-else>
                       <htmllist-component v-bind:html_list="html_list"/>
                    </div>    
                    
            </div>
        </div>
    </div>
</template>
<script>
import HtmllistComponent from './HtmllistComponent.vue'
import axios from 'axios'
import vue_config from '../vue_config'

export default {
    components:{
        HtmllistComponent
    },
    data(){
        return{
            title_page: "HTML Manage ",
            html_list: [],
            title: null,
            description: null,
            html_snipped: null,
            inserted: false,
            error: null
        }
    },
    computed(){
       
    },
    methods:{
  
        insertData(){

            const fd = {
                        title: this.title,
                        description: this.description,
                        html_snipped:this.html_snipped
                        };

            axios.post(vue_config.BASE_URL+'/api/html_resource',fd)
            .then(response=>{
               // console.log(response);
                 this.html_list.push = response.data;
                 this.error = null;
                this.inserted = true;
            })
            .catch(err => {
               // console.log(err);
                  if(err.response.status == 422) {
                      this.file_error = 'Insert Error from Server';
                  }    
            })
        }
    },
    mounted(){
        axios.get(vue_config.BASE_URL+'/api/html_resource')
            .then(response=>{
               // console.log(response);
                this.html_list = response.data;
            })
            .catch(err => {
               // console.log(err);
                  if(err.response.status == 422) {
                      console.log("some thin erro");
                  }    
            })
    }
}
</script>

<style scoped>
.upload_box{
    width: 100%;
    border: 2px solid rgb(198, 250, 211);
    background-color: rgb(218, 245, 221);
    padding: 10px;
        margin-top: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
    .red{
        color: red;
    }

</style>
