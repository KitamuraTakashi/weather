<template>
    <div class="contents">
        <v-container>
            <h1 class="contents-title text-center">都内の天気情報</h1>

            <v-layout class="text-right">
                <v-flex>
                    <v-date-picker
                        class="mb-5"
                        v-model="picker"
                        landscape
                        info
                        locale="ja-jp"
                    ></v-date-picker>
                </v-flex>
            </v-layout>
            <v-layout row>

                <v-flex
                    xs4
                    sm2
                    v-for="item in weathers"
                    :key="item.id"
                >
                    <v-card
                        class="mx-auto"
                        color="#F9F9F9"
                        max-width="400"
                    >
                        <v-list-item two-line>
                            <v-list-item-content>
                                <v-list-item-title class="headline">{{item.areas.pinpoint_name}}</v-list-item-title>
                                <v-list-item-subtitle>{{item.weather_name}}</v-list-item-subtitle>
                            </v-list-item-content>
                        </v-list-item>

                        <v-list-item>
                            <v-list-item-icon>
                                <v-icon>mdi-temperature-celsius</v-icon>
                            </v-list-item-icon>
                            <v-list-item-subtitle>気温 {{item.temperature_min}}/{{item.temperature_max}}</v-list-item-subtitle>
                        </v-list-item>

                        <v-list-item>
                            <v-list-item-icon>
                                <v-icon>mdi-weather-cloudy</v-icon>
                            </v-list-item-icon>
                            <v-list-item-subtitle>降水確率 {{item.rain_percentage}}%</v-list-item-subtitle>
                        </v-list-item>

                    </v-card>
                </v-flex>
                <p v-if="weathers === []">データが見つかりませんでした</p>

            </v-layout>

        </v-container>
    </div>
</template>

<script>
    const now = moment();
    import moment from 'moment';

    export default {
        data() {
            return {
                weathers: [],
                picker: now.format('YYYY-MM-DD'),
            };
        },
        methods: {
            fetchWeathers: function() {
                const year = this.picker.substr(0, 4);
                const month = this.picker.substr(5, 2);
                const day = this.picker.substr(8, 2);

                console.log(month);
                axios.get('/api/weathers/' + year + '/' + month + '/' + day).then((res) => {
                    this.weathers = res.data.data;
                });
            },
        },

        mounted() {
            this.fetchWeathers();
        },
        watch: {
            picker: function() {
                const year = this.picker.substr(0, 4);
                const month = this.picker.substr(5, 2);
                const day = this.picker.substr(8, 2);
                axios.get('/api/weathers/' + year + '/' + month + '/' + day).then((res) => {
                    this.weathers = res.data.data;
                });
            },
        },
    };
</script>

<style scoped>
    .contents-title {
        margin-bottom: 1rem;
    }
    .contents {
        margin: 60px;
    }
</style>
