<template>
    <div>
        <div v-for="car in carsD">
            <div class="w-100 d-flex justify-between items-center my-2">
                <a data-bs-toggle="collapse" :href="'#car' + car.id" role="button" aria-expanded="false" aria-controls="collapseExample">
                    {{car.brand + car.model + ' (' + car.year+ ')'}}
                </a>
                <div v-if="!car.customer_id" class="d-flex flex-column items-center" style="min-width: 80px">
                    <span>{{car.price}}$</span>
                    <button class="btn btn-success w-100" @click="operation(car.id)">Buy</button>
                </div>
                <div v-else-if="car.customer_id == user">
                    <button class="btn btn-primary" @click="service(car.id)" v-if="car.service == null">Sent to service</button>
                    <button class="btn btn-primary" @click="service(car.id)" v-else>Return from service</button>
                    <button class="btn btn-danger" @click="operation(car.id)">Sell</button>
                </div>
            </div>
            <div class="collapse" :id="'car' + car.id">
                <div class="card card-body">
                    Vehicle Type: {{car.type}} <br>
                    Fuel Type: {{car.fuel_type}} <br>
                    Gear Box Type: {{car.gear_box_type}} <br>
                    Door Count: {{car.door_count}} <br>
                    Seat Count: {{car.seat_count}} <br>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CarsComponent",
    props: {
        cars: Array,
        user: {
            type: Number,
            default: 0
        }
    },
    data() {
        return {
            carsD: this.cars
        }
    },
    methods: {
        operation(id) {
            let self = this;
            axios.post('/operation', {
                car_id: id
            }).then(function (response) {
                self.carsD = response.data.cars;
            });
        },
        service(id) {
            let self = this;
            axios.post('/service', {
                car_id: id
            }).then(function (response) {
                self.carsD = response.data.cars;
            });
        }
    }
}
</script>

<style scoped>

</style>
