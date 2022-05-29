<template>
    <div class="top_nav">
            <ul>
                <li> <router-link to="/home" class="btn btn-primary btn-active">Home</router-link></li>
                <li> <router-link to="/visitor"  class="btn btn-primary">Visitor</router-link></li>
                <li> <router-link  to="/admin" class="btn btn-primary">Admin</router-link></li>
            </ul>
    </div>
   <hr/>
    <div>
        <div>
            <router-view></router-view>
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
