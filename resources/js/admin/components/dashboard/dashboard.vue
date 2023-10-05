<template>

    <div class="card_less-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-12 col-xl-12 col-xxl-6 p-3">
                <div class="bg-white h-100 p-3">
                    <polarAreaChart/>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-12 col-xl-12 col-xxl-6 p-3">
                <div class="bg-white h-100 p-3">
                    <doughnut/>
                </div>
            </div>
            <div class="col-12 p-3">
                <div class="bg-white h-100 p-3">
                    <bar/>
                </div>
            </div>
        </div>
    </div>

</template>

<script>

import doughnut from "./graph_chart/doughnut.vue";
import bar from "./graph_chart/bar.vue";
import polarAreaChart from "./graph_chart/polarAreaChart.vue";

    export default {

        components: {

            doughnut, bar, polarAreaChart

        },

        data(){

            return{



            }

        },

        mounted() {



        },

        methods: {



        }

    }

</script>
