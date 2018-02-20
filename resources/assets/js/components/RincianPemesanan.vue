<template>
    <div class='row'>
        <h4>Tambah Barang</h4>
        <form action="#" @submit.prevent="createBarang()">
            <div class="row">
                <div class="col-xs-4">
                    <select v-model="barang.barang_id" name="barang_id"  class="form-control" autofocus>
                        <option v-for="(allBarang, index) in listBarang" v-bind:value="allBarang.id">
                            {{ allBarang.nama }}
                        </option>
                    </select>
                                
                </div>

                <div class="col-xs-4">
                <input placeholder="Quantity" v-model="barang.qty" type="text" name="qty" class="form-control" >
                </div>
                <div class="col-xs-4">
                <button type="submit" class="btn btn-primary">New Barang</button>
                </div>
            </div>
        </form>
        <h4>All Barang</h4>
        <ul class="list-group">
            <li v-if='list.length === 0'>There are no barang yet!</li>
            <li class="list-group-item" v-for="(barang, index) in list">
                <div class="row">
                    <div class="col-xs-3">
                        {{ barang.barang_id }}
                    </div>
                    <div class="col-xs-3">
                        {{barang.qty}}
                    </div>
                    <div class="col-xs-3">
                        {{barang.harga_total}}
                    </div>
                    <div class="col-xs-3">
                    <button @click="deleteBarang(barang.id)" class="btn btn-danger btn-xs pull-right">Delete</button>
                    </div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-xs-3">
                        Total
                    </div>
                    <div class="col-xs-3">
                        {{totalQty}}
                    </div>
                    <div class="col-xs-3">
                        {{totalPrice}}
                    </div>
                    <div class="col-xs-3">
                    
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                listBarang : [],
                allBarang: {
                    id: '',
                    nama : ''
                },

                list: [],
                barang: {
                    id: '',
                    created_at: '',
                    updated_at: '',
                    pemesanan_id: '',
                    barang_id: '',
                    harga_total:'',
                    qty: '', 
                }
            };
        },
        
        created() {
            this.fetchBarang();
        },
        computed: {
            totalQty() {
                return this.list.reduce((total, item) => {
                  return total + Number(item.qty);
                }, 0);
              },

              totalPrice() {
                return this.list.reduce((total, item) => {
                  return total + Number(item.harga_total);
                }, 0);
              }
        },
        methods: {
            fetchBarang() {
                var idpemesanan = document.querySelector('meta[name="id-pemesanan"]').getAttribute('content');
                axios.get('/rincianpemesanan/' + idpemesanan).then((res) => {
                    this.list = res.data;
                    console.log(this.list);
                });
                axios.get('/semuabarang/').then((res) => {
                    this.listBarang = res.data;
                    console.log(this.listBarang);
                });
            },
 
            createBarang() {
                axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                var idpemesanan = document.querySelector('meta[name="id-pemesanan"]').getAttribute('content');
                this.barang.pemesanan_id = idpemesanan;
                axios.post('/pemesanan/rincian/' + idpemesanan, this.barang)
                    .then((res) => {
                        this.barang.barang_id = '';
                        this.barang.qty = '';
                        this.edit = false;
                        this.fetchBarang();
                    })
                    .catch((err) => console.error(err));
            },
 
            deleteBarang(id) {
                axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                axios.delete('/pemesanan/rincian/' + id)
                    .then((res) => {
                        this.fetchBarang()
                    })
                    .catch((err) => console.error(err));
            },
        }
    }
</script>
