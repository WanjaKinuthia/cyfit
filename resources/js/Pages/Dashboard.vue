<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">CYFIT</h2>
        </template>

        <div :style="backgroundImageStyle" class="background-container">
    <div class="content">
      <div class="paragraph-with-image">
        <div class="paragraph">
          <h1 style="font-weight: bold; size: 40px;">Yoga</h1>
          <p>Discover Serenity and Strength with Our Yoga Sessions<br>
          Welcome to a world of tranquility and fitness at cyfit.<br>
          Our yoga sessions are designed to offer a perfect blend of relaxation</p><br>
          <p style="font-weight: bold;">Why Choose Our Yoga Classes?</p><br>
          <p>Expert Instructors: Our certified yoga instructors bring years <br>
          of experience and a deep understanding of various yoga practices.<br> 
          They are dedicated to guiding you through each pose with precision <br>
          ensuring you get the most out of every session.</p>
        </div>
        <div class="image" style="height: 50px;width: 50px;">
          <img src="https://i0.wp.com/www.healthfitnessrevolution.com/wp-content/uploads/2015/08/iStock-944619732.jpg?fit=2121,1414&ssl=1" alt="Yoga Image">
        </div>
      </div>
      
    </div>
  </div>  
    </AuthenticatedLayout>
</template>
<script>
export default {
  data() {
    return {
      
    }
  },
  computed: {
    backgroundImageStyle() {
      return {
        backgroundImage: `url(${this.imageUrl})`,
        backgroundSize: 'cover', // or 'contain' depending on your needs
        backgroundPosition: 'center center',
        backgroundRepeat: 'no-repeat'
      }
    }
  }
}
</script>

<style scoped>
.background-container {
  width: 90%;
  height: auto; /* Adjust as necessary */
}

.content {
  text-align: center; /* Center align content */
}

.paragraph-with-image {
  display: flex; /* Use flexbox for layout */
  align-items: center; /* Center align items vertically */
}

.paragraph {
  flex: 1; /* Take up remaining space */
}

.image {
  flex: 1; /* Take up remaining space */
  margin-left: 20px; /* Adjust spacing between paragraph and image */
  height: 70px;
  width: 90px;
}

img {
  margin-top: -100px;
  width: 500px;
  height: 270px;
}

.buttons {
  margin-top: 35px; /* Adjust spacing between paragraph and buttons */
  gap:50px;
}

.button {
  margin: 0 10px; /* Adjust spacing between buttons */
  padding: 10px 20px;
  background-color: black;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
</style>
