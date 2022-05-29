
<template>
    <div class="">
        <div class="page-title"><h1>Admin Panel</h1></div>

        <div class="top_nav" style="">
                <ul>
                    <li> <router-link to="/admin/file_upload" class="btn btn-primary">File Manage</router-link></li>
                    <li> <router-link to="/admin/html_snipped" class="btn btn-primary">HTML Snipped</router-link></li>
                    <li> <router-link to="/admin/links" class="btn btn-primary">Link Manage</router-link></li>
                </ul>
        </div>

        <div class="sub_content_wrapper">
            <div class="sub_content">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>


<script>

export default {
    setup: () => ({
        title: 'Resource Management Project Home'
    })
}
</script>

<style scoped>


</style>
