<template>
    <div class="chart-container">
        <LineChart
            v-for="(data, index) in chartData"
            :key="index"
            :chartData="data"
            :chartOptions="chartOptions"
            class="chart-item"
        />
    </div>
</template>

<script>
import LineChart from './components/LineChart.vue'
import axios from 'axios'

export default {
    components: { LineChart },
    data() {
        return {
            chartData: [],
            chartOptions: {
                responsive: true,
                scales: {
                    x: {
                        type: 'category',
                        title: { display: true, text: 'Date' }
                    },
                    y: {
                        title: { display: true, text: 'Value' }
                    }
                }
            }
        }
    },
    methods: {
        async getSensorData() {
            const response = await axios.get(`/api/sensors`);
            this.chartData = response.data;
        }
    },
    mounted() {
        this.getSensorData();
    }
}
</script>
