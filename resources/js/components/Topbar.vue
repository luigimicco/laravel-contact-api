<template>
    <header>
      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ml-3" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <router-link class="nav-link" :to="{ name: 'home' }">Home<span class="sr-only">(current)</span></router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" :to="{ name: 'contacts' }">Contatti</router-link>
            </li>
          </ul>
          <ul class="navbar-nav ml-3">
            <li class="nav-item">
              <a class="nav-link" href="/login">Area riservata</a>
            </li>
          </ul>  
        </div>
      </nav>
    </header>
</template>

<script>
export default {
  name: "Navbar",
};
</script>

<style lang="scss" scoped>
img {
  width: 50px;
  height: auto;
}
a {
  text-decoration: none;
  color: #6cb2eb;
  border-bottom: 1px solid transparent;
}
a.active {
  color: #0e68b1;
  border-bottom: 1px solid currentColor;
}
</style>
