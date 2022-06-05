<template>
	<div class="container-fluid pt-5">
    <main role="main">
      <Slider :items="sliderData" class="mb-5"/>
    </main>
	</div>
</template>

<script>
import Slider from "../components/Slider.vue";

export default {
	name: "Homepage",
	components: { Slider},
  data() {
		return {
      sliderData : [
        {
          title: "Headline 1",
          caption: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere laboriosam illum adipisci? Minima laudantium velit repellat quia, iure voluptatem nemo. Quod debitis eaque beatae repellendus veritatis placeat praesentium voluptate consequuntur!",
          img : "https://picsum.photos/seed/dolet/1519/512",
          button : {
            url: "#",
            caption: "Sign up today",
          }  
        },
        {
          title: "Headline 2",
          caption: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere laboriosam illum adipisci? Minima laudantium velit repellat quia, iure voluptatem nemo. Quod debitis eaque beatae repellendus veritatis placeat praesentium voluptate consequuntur!",
          img : "https://picsum.photos/seed/lorem/1519/512",
          button : {
            url: "#",
            caption: "Try now",
          } 
        },
        {
          title: "Headline 3",
          caption: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere laboriosam illum adipisci? Minima laudantium velit repellat quia, iure voluptatem nemo. Quod debitis eaque beatae repellendus veritatis placeat praesentium voluptate consequuntur!",
          img : "https://picsum.photos/seed/ipsum/1519/512",
          button : {
            url: "#",
            caption: "Only today",
          } 
        },
        {
          title: "Headline 3",
          caption: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere laboriosam illum adipisci? Minima laudantium velit repellat quia, iure voluptatem nemo. Quod debitis eaque beatae repellendus veritatis placeat praesentium voluptate consequuntur!",
          img : "https://picsum.photos/seed/ipsum/1519/512",
          button : {
            url: "#",
            caption: "Only today",
          } 
        },        
        {
          title: "Headline 3",
          caption: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere laboriosam illum adipisci? Minima laudantium velit repellat quia, iure voluptatem nemo. Quod debitis eaque beatae repellendus veritatis placeat praesentium voluptate consequuntur!",
          img : "https://picsum.photos/seed/ipsum/1519/512",
          button : {
            url: "#",
            caption: "Only today",
          } 
        },
        {
          title: "Headline 3",
          caption: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere laboriosam illum adipisci? Minima laudantium velit repellat quia, iure voluptatem nemo. Quod debitis eaque beatae repellendus veritatis placeat praesentium voluptate consequuntur!",
          img : "https://picsum.photos/seed/ipsum/1519/512",
          button : {
            url: "#",
            caption: "Only today",
          } 
        },                
      ],
    };
	},

};
</script>

<style lang="scss" scoped>
</style>
