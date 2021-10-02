<template>
  <div class="container">
    <div class="row mb-4">
      <div class="col-4">
        <div class="card bg-info text-dark">
          <div class="card-header text-center">
            <h5>Общее количество овечек</h5>
          </div>
          <div class="card-body">
            <h1 class="display-1 text-center">
              {{ stats.all_sheep_count }}
            </h1>
          </div>
        </div>
      </div>

      <div class="col-4">
        <div class="card text-white bg-danger">
          <div class="card-header text-center">
            <h5>Количество убитых овечек</h5>
          </div>
          <div class="card-body">
            <h1 class="display-1 text-center">
              {{ stats.killed_sheep_count }}
            </h1>
          </div>
        </div>
      </div>

      <div class="col-4">
        <div class="card text-white bg-success">
          <div class="card-header text-center">
            <h5>Количество живых овечек</h5>
          </div>
          <div class="card-body">
            <h1 class="display-1 text-center">
              {{ stats.live_sheep_count }}
            </h1>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-6">
        <div class="card border-success">
          <div class="card-header text-center border-success">
            <h5>Номер самого населённого загона</h5>
          </div>
          <div class="card-body">
            <h1 class="text-center">
              {{ stats.most_populated_paddock.name }}
            </h1>
          </div>
        </div>
      </div>

      <div class="col-6">
        <div class="card border-danger">
          <div class="card-header text-center border-danger">
            <h5>Номер самого менее населённого загона</h5>
          </div>
          <div class="card-body">
            <h1 class="text-center">
              {{ stats.least_populated_paddock.name || '' }}
            </h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Home',
  data() {
    return {
      stats: {
        all_sheep_count: 0,
        killed_sheep_count: 0,
        live_sheep_count: 0,
        most_populated_paddock: {},
        least_populated_paddock: {},
      },
    }
  },
  mounted() {
    this.getStats();
  },
  methods: {
    async getStats() {
      const {data} = await this.$axios.get('/api/stats');
      this.stats = data.stats;
    }
  }

};
</script>
