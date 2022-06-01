<template>
      <div style="margin-bottom: 100px;">
        <div class="row-col">
            <div class="" style="width: 90%; margin: auto">
                    <h2>{{ title }}</h2>
                    <div class="container">

                    <div class="red">{{file_error}}</div> {{inserted}}
                    <div v-if="inserted" class="success_alert">File Updated Successfully</div>


                        <form @submit.prevent="uploadFile" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-25">
                                <label for="title">File title</label>
                                </div>
                                <div class="col-75">
                                <input type="text" v-model="file_title" id="title"  placeholder="Title of the file..">
                                </div>
                            </div>
                            <div class="row">
                                <div class="red">{{file_error}}</div>
                                 Existing File Name : <div style="border: 1px solid #ccc">{{file_name}}</div>
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
                                    <input type="submit" value="Submit" >
                                </div>
                            </div>
                        </form>
                    </div>

            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import vue_config from '../vue_config'

    export default{
        data(){
            return {
                title: "File edit",
                file_id: this.$route.params.id,
                selected_file: null,
                file_name: null,
                file_title: null,
                description: null,
                file_error: null,
                inserted: false
            }

        },
        methods:{
            onFileSelected(event){
                this.selected_file = event.target.files[0];
                console.log(event);
            },
            uploadFile(){
                const fd = new FormData();
                if(this.selected_file!=null){
                    fd.append('pdf',this.selected_file,this.selected_file.name);
                }

                fd.append('id',this.file_id);
                fd.append('title',this.file_title);
                fd.append('description',this.description);
                axios.post(vue_config.BASE_URL+'/api/file_update/',fd)
                .then(response=>{
                    this.file_error = null;
                    this.inserted = true;
                })
                .catch(err => {
                    if(err.response.status == 422) {
                        this.file_error = 'Only PDF format is Accepted';
                    }
                })
            }
        },
        mounted(){
             axios.get(vue_config.BASE_URL+`/api/file_resource/${this.file_id}`)
            .then(response=>{
                   const myresponse = response.data;

                  this.file_title =  myresponse.title;
                  this.file_name =  myresponse.file_name;
                  this.description =  myresponse.description;

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

