<!--  안에서 -->
<!-- 
  <template>
	<div>
      <div  v-for ="(item, i) in data" :key="i">
        <h4 @click="$emit('modalOpen',item)">{{ item.name }}</h4>
        <p>{{ item.price }}원</p>
        <button @click="$emit('plusOne',i)">허위매물신고</button>
        <span>신고수 : {{ item.reportCnt }}</span>
      </div>
    </div>
</template>
<script>
export default {
	name:'Divlist',

	props:{
		data: Array,
	}
}
</script>
<style>

</style> -->

<!-- 밖에서 -->
<template>
  <div>
    <h4 @click="$emit('fncOpenModal',data)">{{ data.name }}</h4>
    <p>{{ data.price }}원</p>
    <button @click="$emit('fncOne',productkey)">허위매물신고</button>
    <span>신고수 : {{ data.reportCnt }}</span>
  </div>
</template>
<script>
export default {
	name:'Divlist',
  
	props:{
		data: Object,
    productkey: Number,
	}
}
</script>
<style>
  
</style>