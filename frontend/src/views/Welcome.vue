<template>
  <div class="card">
    <div class="card-header">
      <h3>День {{ last_day }}</h3>
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
      last_day: 1,
    }
  },
  mounted() {
    this.getPaddocks();
    this.getLastDay();
  },
  methods: {
    async getPaddocks() {
      const {data} = await this.$axios.get('/api/paddocks');
      this.paddocks = data.data;
    },
    async getLastDay() {
      const {data} = await this.$axios.get('/api/histories/last-day');
      this.last_day = data.last_day.day;
    },
  }
}
</script>
