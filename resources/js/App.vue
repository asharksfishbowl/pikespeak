<template>
    <div class="container">
        <div class="text-center" style="margin: 20px 0px 20px 0px;">
            <a href="https://www.asharksfishbowl.com/" target="_blank">
              <img src="../img/ASF.jpg" class="">
            </a><br>
            <span class="text-secondary">Thank You for your time and inspiring me</span>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link">View Uploads</router-link>
                    <router-link to="/import" class="nav-item nav-link">Upload CSV</router-link>
                </div>
            </div>
        </nav>
        <br/>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {}
</script>
