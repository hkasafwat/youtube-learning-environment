<template>
  <div class="max-w-sm rounded overflow-hidden shadow-lg">
    <img class="w-full" :src="thumbnail" alt="Sunset in the mountains" />
    <div class="px-6 py-4">
      <div class="font-bold text-xl mb-2">{{ title }}</div>
      <p
        class="text-gray-700 text-base"
      >{{ description }}
      </p>
    </div>
    <div class="px-6 py-4">
      <span
        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2"
      >{{ date }} </span>
      <span
        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2"
      >#travel</span>
      <span
        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700"
      >#winter</span>
    </div>
  </div>
</template>

<script>
export default {
    props: {
        thumbnail: String,
        title: String,
        description: String,
        date: String,
    },
    name: "Card",
    computed: {
        formattedDate() {
        }
    }
};
</script>

<style>
</style>