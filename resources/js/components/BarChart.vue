<script>
import { Bar, mixins } from "vue-chartjs";

export default {
  extends: Bar,
  props: ['data', 'options'],
  mounted () {
    this.renderChart(this.data, {
    	responsive: true,
    	maintainAspectRatio: false,
      	legend: {
	        display: false
	    },
	    scales: {
	        xAxes: [{
	            gridLines: {
	                display:false
	            }
	        }],
	        yAxes: [{
	        	display: false,
	            gridLines: {
	                display:false
	            }   
	        }]
	    }
    });
  }
}
</script>

<style>
</style>
