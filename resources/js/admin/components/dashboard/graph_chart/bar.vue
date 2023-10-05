<template>

    <Bar :data="data" :options="options" style="height:300px;"/>

</template>

<script>

import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale
} from 'chart.js'
import {Bar} from 'vue-chartjs'

ChartJS.register(CategoryScale, LinearScale, BarElement, Title, Tooltip, Legend)
export default {

    components: {

        Bar

    },

    data(){

        return{

            data: {
                labels: [
                    'January',
                    'February',
                    'March',
                    'April',
                    'May',
                    'June',
                    'July',
                    'August',
                    'September',
                    'October',
                    'November',
                    'December',
                ],
                datasets: [
                    {
                        label: 'Food App',
                        backgroundColor: '#0368d5',
                        data: [40, 20, 12, 39, 10, 40, 39, 20, 12, 39, 20, 40]
                    },
                    {
                        label: 'Dress App',
                        backgroundColor: '#f5ff00',
                        data: [11, 12, 20, 40, 65, 39, 40, 12, 20, 40, 11, 12]
                    },
                    {
                        label: 'Shelter App',
                        backgroundColor: '#ff005a',
                        data: [40, 39, 60, 40, 20, 12, 11, 39, 60, 20, 39, 39]
                    },
                    {
                        label: 'Education App',
                        backgroundColor: '#07be17',
                        data: [50, 29, 40, 30, 35, 22, 31, 30, 35, 22, 30, 35]
                    },
                    {
                        label: 'Treatment App',
                        backgroundColor: '#04364A',
                        data: [25, 20, 20, 21, 28, 16, 25, 20, 20, 21, 20, 20]
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
