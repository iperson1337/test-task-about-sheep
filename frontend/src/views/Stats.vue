<template>
  <div class="container">
    <div class="row mb-5">
      <div class="col-4">
        <select class="form-select" aria-label="day" v-model="filter.day">
          <option selected value="">Выберите день</option>
          <option v-for="history in histories" :value="history.day" :key="history.day">{{history.day}} день</option>
        </select>
      </div>
    </div>
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
              {{ stats.most_populated_paddock }}
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
              {{ stats.least_populated_paddock }}
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
        most_populated_paddock: 0,
        least_populated_paddock: 0,
      },
      histories: [],
      filter: {
        day: ''
      }
    }
  },
  computed: {
    params() {
      return {
        ...this.filter
      }
    }
  },
  mounted() {
    this.getStats();
    this.getHistories();
  },
  methods: {
    async getStats() {
      const {data} = await this.$axios.get('/api/histories/stats', {params: this.params});
      this.stats = data.stats;
    },
    async getHistories() {
      const {data} = await this.$axios.get('/api/histories');
      this.histories = data.histories;
    }
  },
  watch: {
    'filter.day'() {
      this.getStats();
    }
  }

};
</script>
