<script>
import { Doughnut, mixins } from "vue-chartjs";

export default {
  extends: Doughnut,
  props: ['data', 'options'],
  mounted () {
    this.renderChart(this.data, {
      responsive: true,
        legend: {
          display: false
      }
    });
  }
}
</script>

<style>
</style>
