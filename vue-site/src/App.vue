<script setup>
</script>

<template>
  
   <div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <router-link class="navbar-brand" to="/">Students</router-link>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <router-link class="nav-link active" aria-current="page" to="#">Home</router-link>
        </li>
        <li class="nav-item">
          <router-link class="nav-link" to="/add-student">Add</router-link>
        </li>
        <li class="nav-item">
          <router-link class="nav-link" to="#">Pricing</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/" class="nav-link disabled">Disabled</router-link>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <RouterView/>
   </div>
</template>
