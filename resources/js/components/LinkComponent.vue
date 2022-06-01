<template>
    <div class="">
        <div class="row-col">
            <div class="col-2">
                    <h2>{{ title_page }}</h2>
                    <p>Link Content can Insert and manage here </p>
                    <div class="red">{{error}}</div>
                    <div v-if="inserted" class="success_alert">Data Inserted Sucessfully for link {{link_url}}</div>

                    <div class="container">
                        <form>
                            <div class="row">
                                <div class="col-25">
                                <label for="title">Link Title</label>
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
                                <label for="url">Link Url </label>
                                </div>
                                <div class="col-75">
                                <input type="text" id="url" v-model="link_url" name="url" placeholder="Link Url" >
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-25">
                                <label for="content">Is it to open in a new tab? </label>
                                </div>
                                <div class="col-75">
                                <input
                                        id="checkbox"
                                        type="checkbox"
                                        v-model="new_tab"
                                        :value="new_tab"
                                        :checked="new_tab"
                                        v-on:input="new_tab = $event.target.value"
                                    />
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


                    <div v-if="link_list.length==0"><h3>No Link Inserted yet </h3></div>
                    <div v-else>
                       <linklist-component v-bind:link_list="linkList"/>
                    </div>

            </div>
        </div>
    </div>
</template>
<script>
import LinklistComponent from './LinklistComponent.vue'
import axios from 'axios'
import vue_config from '../vue_config'

export default {
    components:{
        LinklistComponent
    },
    data(){
        return{
            title_page: "Link Manage ",
            link_list: [],
            title: null,
            description: null,
            link_url: null,
            new_tab: false,
            error: null,
            inserted: false,
        }
    },
    computed:{
       linkList(){
           return this.link_list;
       }
    },
    methods:{
        insertData(){
            const fd = {
                        title: this.title,
                        description: this.description,
                        link_url:this.link_url,
                        new_tab:this.new_tab,
                        };

            axios.post(vue_config.BASE_URL+'/api/link_resource',fd)
            .then(response=>{
                 this.link_list.push(response.data);
                 this.error = null;
                 this.inserted = true;
            })
            .catch(err => {
               // console.log(err);
               /*
                  if(err.response.status == 422) {
                      this.file_error = 'Insert Error from Server';
                  }
                 */
            })
        }
    },
    mounted(){
        axios.get(vue_config.BASE_URL+'/api/link_resource')
            .then(response=>{
                   const myresponse = response.data;

                   const new_response = [];
                    myresponse.data.forEach(element => {
                        new_response.push(element);
                   });

                    this.link_list = new_response;

            })
            .catch(err => {
               // console.log(err);
               /*
                  if(err.response.status == 422) {
                      console.log("some thin erro");
                  }
                  */
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
