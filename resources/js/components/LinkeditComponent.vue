<template>
    <div style="margin-bottom: 100px;">
        <div class="row-col">
            <div class="" style="width: 90%; margin: auto">
                    <h2>{{ title_page }}</h2>
                    <p>Link Edit </p>
                    <div class="red">{{error}}</div>
                    <div v-if="inserted" class="success_alert">Link Update Sucessfully for link {{link_url}}</div>

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
                                    <input type="submit" value="Submit" @click.prevent="updateData">
                                </div>
                            </div>
                        </form>
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
            resource_id: this.$route.params.id,
            title: null,
            description: null,
            link_url: null,
            new_tab: false,
            error: null,
            inserted: false,
        }
    },
    computed:{
   
    },
    methods:{
        updateData(){

            console.log("update");

            const fd = {
                        title: this.title,
                        description: this.description,
                        html_snipped:this.html_snipped
                        };

            axios.put(vue_config.BASE_URL+'/api/link_resource/'+this.resource_id,fd)
            .then(response=>{
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
          axios.get(vue_config.BASE_URL+`/api/link_resource/${this.resource_id}`)
            .then(response=>{
                   const myresponse = response.data;

                   console.log(myresponse);

                  this.title =  myresponse.title;
                  this.description =  myresponse.description;
                  this.link_url =  myresponse.link_url;
                  this.new_tab =  myresponse.new_tab;

            })
            .catch(err => {
                  console.log(err);
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
