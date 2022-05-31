<template>
    <div class="">
        <div class="row-col">
            <div class="col-2">
                    <h2>{{ title }}</h2>
                    <p>Upload File that can accessible by Visitors. </p>

                    <div class="container">
                        <form>
                            <div class="row">
                                <div class="col-25">
                                <label for="title">File title</label>
                                </div>
                                <div class="col-75">
                                <input type="text" v-model="file_title" id="title" name="title" placeholder="Title of the file..">
                                </div>
                            </div>
                            <div class="row">
                                <div class="red">{{file_error}}</div>  
                                <div class="col-25">
                                <label for="file">Upload File (PDF Only)</label>
                                </div>
                                <div class="col-75">
                                     <input style="display: none;" ref="fileInput" type="file"  placeholder="Your last name.."  required="required"  @change="onFileSelected"/>
                                     <div class="upload_box" @click="$refs.fileInput.click()">Click here to pick a PDF File</div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-25">
                                <label for="subject">Description (optional)</label>
                                </div>
                                <div class="col-75">
                                <textarea id="subject" v-model="description" name="subject" placeholder="Write something.." ></textarea>
                                </div>
                            </div>
                        <br>
                            <div class="row">
                                <div class="right">
                                    <input type="submit" value="Submit" @click.prevent="uploadFile">
                                </div>
                            </div>
                        </form>
                    </div>

            </div>
            <div class="col-2">
         
                    <div v-if="file_list.length==0"><h3>No file uploaded yet </h3></div>
                    <div v-else>
                       <filelist-component v-bind:file_list="file_list"/>
                    </div>    
                    
            </div>
        </div>
    </div>
</template>
<script>
import FilelistComponent from './FilelistComponent.vue'
import axios from 'axios'
import vue_config from '../vue_config'

export default {
    components:{
        FilelistComponent
    },
    data(){
        return{
            title: "File Upload ",
            file_list: [],
            selected_file: null,
            file_title: null,
            description: null,
            file_error: null,
        }
    },
    computed(){
       
    },
    methods:{
        onFileSelected(event){
            this.selected_file = event.target.files[0];
        },
        uploadFile(){
            const fd = new FormData();
            fd.append('pdf',this.selected_file,this.selected_file.name);
            fd.append('title',this.file_title);
            fd.append('description',this.description);
            axios.post(vue_config.BASE_URL+'/api/file_resource',fd)
            .then(response=>{
                    this.file_list.push(response.data);
                    this.file_error = null;
            })
            .catch(err => {
                  if(err.response.status == 422) {
                      this.file_error = 'Only PDF format is Accepted';
                  }    
            })
        }
    },
    mounted(){
        axios.get(vue_config.BASE_URL+'/api/file_resource')
            .then(response=>{
                   const myresponse = response.data;
                   const new_response = [];
                    myresponse.data.forEach(element => {
                        new_response.push(element);
                   });

                   this.file_list = new_response;
            })
            .catch(err => {
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
