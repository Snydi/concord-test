<template>
    <div class="chart-container">
        <div v-for="(data, index) in chartData" :key="index" class="chart-wrapper">
            <LineChart :chartData="data" :chartOptions="chartOptions" class="chart-item"/>
        </div>
    </div>
    <button class="submit-button" @click="getSensorData">Refresh</button>
</template>

<script>
import LineChart from './components/LineChart.vue'
import axios from 'axios'

export default {
    components: { LineChart },
    data() {
        return {
            chartData: [],
            inputValues: [],
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
        this.inputValues = new Array(this.chartData.length).fill('');
    }
}
</script>
