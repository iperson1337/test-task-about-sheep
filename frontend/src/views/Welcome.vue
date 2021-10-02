<template>
  <div class="card">
    <div class="card-header">
      <h3>День {{ today }}</h3>
    </div>
    <div class="card-body">
      <div class="row">
        <div v-for="paddock in paddocks" class="col-6 mb-3">
          <div class="card">
            <div class="card-header">
              {{ paddock.name }}
            </div>
            <ul class="list-group list-group-flush">
              <li v-for="sheep in paddock.sheep" class="list-group-item">{{ sheep.name }}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Welcome",
  data() {
    return {
      paddocks: [],
      today: 1,
    }
  },
  mounted() {
    this.getPaddocks()
    this.getToday()
  },
  methods: {
    async getPaddocks() {
      const {data} = await this.$axios.get('/api/paddocks');
      this.paddocks = data.data;
    },
    async getToday() {
      const {data} = await this.$axios.get('/api/today');
      console.log(data)
      this.today = data.today.day;
    },
  }
}
</script>
