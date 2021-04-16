<template lang="en">
    <div id="">
        <div class="w-full ml-8">
            <h3 class="mx-2 text-lg text-indigo-700 ">Attribute Values </h3>
            <div class="mt-6">
                <div>
                    <label class="inline-block mr-4 text-xl" for="value">Value</label>
                    <input
                        class="inline-block rounded"
                        type="text"
                        placeholder="Enter attribute value"
                        id="value"
                        name="value"
                        v-model="value"
                    />
                </div>
                <div class="mt-6">
                    <label class="inline-block mr-4 text-xl" for="price">Price</label>
                    <input
                        class="inline-block rounded"
                        type="number"
                        placeholder="Enter attribute value price"
                        id="price"
                        name="price"
                        v-model="price"
                    />
                </div>
            </div>
            <div class="tile-footer">
                <div class="mt-2">
                    <div>
                        <button  class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-green-400 to-green-600 transform hover:scale-110" type="submit" @click.stop ="saveValue()" v-if="addValue">Save</button>
                        <button class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-purple-400 to-purple-600 transform hover:scale-110" type="submit" @click.stop="updateValue()" v-if="!addValue">Update</button>
                        <button  class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-gray-600 to-gray-900 transform hover:scale-110" type="submit" @click.stop="reset()" v-if="!addValue">Reset</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full mt-20 ml-6">
            <h3 class="mx-2 text-lg text-indigo-700 ">Option Values</h3>
            <div class="mt-6">
                <div class="overflow-hidden border-b border-gray-200 rounded shadow">
                    <table class="min-w-full bg-white">
                        <thead class="text-white bg-green-800">
                        <tr>
                            <th class="w-1/4 px-4 py-3 text-sm font-semibold text-left uppercase ">#</th>
                            <th class="w-1/4 px-4 py-3 text-sm font-semibold text-center uppercase">Value</th>
                            <th class="w-1/4 px-4 py-3 text-sm font-semibold text-center uppercase">Price</th>
                            <th class="w-1/4 px-4 py-3 text-sm font-semibold text-center uppercase">Action</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-700">
                        <tr v-for="value in values">
                            <td class="w-1/4 px-4 py-3 text-left">{{ value.id}}</td>
                            <td class="w-1/4 px-4 py-3 text-center">{{ value.value}}</td>
                            <td class="w-1/4 px-4 py-3 text-center">{{ value.price}}</td>
                            <td class="w-1/4 px-4 py-3 text-center">
                                <button class="mx-2 focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-yellow-400 to-yellow-600 transform hover:scale-110" @click.stop="editAttributeValue(value)">EDIT</button>
                                <button class="mx-2 focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-gradient-to-r from-red-400 to-red-600 transform hover:scale-110" @click.stop="deleteAttributeValue(value)">DELETE</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import axios from 'axios'
export default {
    name:"attribute-values",
    props:['attributeid'],
    data() {
        return {
            values: [],
            value: '',
            price: '',
            currentId: '',
            addValue: true,
            key: 0,
            errorMsg: '',
        }
    },

    created: function(){
        this.loadValues();
    },

    methods: {
        loadValues(){
            let attributeId = this.attributeid;
            let _this = this;
            axios.post( '/get-values', { id: attributeId})
            .then((response)=>{
                console.log(response.data)
                _this.values=response.data;
            })
            .catch((error)=>{
                console.log(error)
                this.errorMsg='Error retrieving data'
            });
        },


        saveValue() {
        if (this.value === '') {console.log(this.value)}
        else {
            let attributeId = this.attributeid;
            let _this = this;
            axios.post ('/add-values', {
                id: attributeId,
                value: _this.value,
                price: _this.price,})
            .then ((response)=>{
                console.log(response.data)
                _this.values.push(response.data);
                _this.resetValue();
                })
            .catch((error)=>{
                console.log(error)
                this.errorMsg='Error saving data'
                });
            }
        },

        resetValue() {
            this.value = '';
            this.price = '';
        },
        reset() {
            this.addValue = true;
            this.resetValue();
        },

        editAttributeValue(value) {
            this.addValue = false;
            this.value = value.value;
            this.price = value.price;
            this.currentId = value.id;
            this.key = this.values.indexOf(value);
        },

        updateValue() {
            if (this.value === '') {{console.log(this.value)}}
            else {
                let attributeId = this.attributeid;
                let _this = this;
                axios.post('/update-values', {
                    id: attributeId,
                    value: _this.value,
                    price: _this.price,
                    valueId: _this.currentId})
                    .then (function(response){
                    _this.values.splice(_this.key, 1);
                    _this.resetValue();
                    _this.values.push(response.data);})
                    .catch(function (error) {console.log(error);}
                );
            }
        },

        deleteAttributeValue(value)
        {
            this.currentId = value.id;
            this.key = this.values.indexOf(value);
            let _this = this;
            axios.post('/admin/attributes/delete-values', {id: _this.currentId})
                .then ((response)=>
                    {if (response.data.status === 'success')
                            {
                            _this.values.splice(_this.key, 1);
                            _this.resetValue();
                            }
                        else {console.log(error);}
                    })
                .catch((error) => {console.log(error);});
        },
    },
};

</script>

<style scoped>

</style>


