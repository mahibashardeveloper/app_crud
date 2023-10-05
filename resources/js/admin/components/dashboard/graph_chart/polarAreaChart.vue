<template>

    <PolarArea :data="data" :options="options" />

</template>

<script>

import { Chart as ChartJS, ArcElement, RadialLinearScale, Tooltip, Legend } from 'chart.js'
import { PolarArea } from 'vue-chartjs'
ChartJS.register(ArcElement, RadialLinearScale, Tooltip, Legend)

export default {

    components: {

        PolarArea

    },

    data(){

        return{

            data: {
                labels: ['HTML', 'CSS', 'JS', 'PHP', 'MySQL','Laravel','VueJs'],
                datasets: [
                    {
                        backgroundColor: ['#ff005a', '#f5ff00', '#7925C7', '#ffae00', '#20C178', '#FF8080', '#04364A'],
                        data: [100, 90, 60, 80, 100 ,60 ,70]
                    }
                ]
            },

            options: {
                responsive: true,
                maintainAspectRatio: false
            }

        }

    },

    mounted() {



    },

    methods: {



    }

}

</script>
