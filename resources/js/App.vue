<template>
    <div class="chart-container">
        <div v-for="(data, index) in chartData" :key="index" class="chart-wrapper">
            <LineChart :chartData="data" :chartOptions="chartOptions" class="chart-item"/>
        </div>
    </div>
    <div class="controls">
        <select v-model="selectedPeriod" class="period-select">
            <option value="1h">Last 1 Hour</option>
            <option value="1d">Last 1 Day</option>
            <option value="7d">Last 7 Days</option>
            <option value="30d">Last 30 Days</option>
        </select>
        <button class="submit-button" @click="getSensorData">Refresh</button>
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
            selectedPeriod: '1h',
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
            const response = await axios.get(`/api/sensors`, {
                params: {
                    period: this.selectedPeriod
                }
            });
            this.chartData = response.data;
        }
    },
    mounted() {
        this.getSensorData();
    }
}
</script>
