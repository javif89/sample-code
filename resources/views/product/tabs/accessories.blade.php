<div class="card">
    <div class="card-header">
        Accessories
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4 d-flex flex-column justify-content-between" v-for="(a, index) in accessories" :key="index">
                <div>
                    <img :src="a.thumbnail_path" alt="" class="img-fluid">
                    <h3>@{{a.name}}</h3>
                </div>
                <button class="btn btn-success" v-if="!hasAccessory(a)" @click="toggleAccessory(a, 'add')">Add</button>
                <template v-if="hasAccessory(a)">
                    <label>
                    <input type="radio" name="is_main_acc" :checked="getAccessory(a).pivot.is_main"  @click="toggleAccessory(a, 'toggle-main')"/>
                        Is Main
                    </label>
                    <button class="btn btn-danger"  @click="toggleAccessory(a, 'remove')">Remove</button>
                </template>

            </div>
        </div>
    </div>
</div>