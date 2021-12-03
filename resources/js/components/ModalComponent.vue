<template>
    <div class="modal fade bs-example-modal-center show" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
         style="display: block; padding-right: 17px;" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title align-self-center mt-0" id="exampleModalLabel">Reserva</h5>
                    <button type="button" class="close"  aria-label="Close" @click="$emit('close')">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-6">
                                <Time-picker-component title="Desde"
                                                       modelo="desde"
                                                       :interval="{h:1}"
                                                       :disable="{h:[0,1,2,3,4,5,6,7,8,21,22,23], m:null, s:null}"></Time-picker-component>
                            </div>

                            <div class="col-6">

                                <Time-picker-component title="Hasta"
                                                       modelo="hasta"
                                                       :interval="{h:1}"
                                                       :disable="{h:[0,1,2,3,4,5,6,7,8,21,22,23], m:null, s:null}"></Time-picker-component>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="courts">Cancha</label>
                                <select name="court_id" id="courts" class="form-control" v-model="store.evento.court_id" >
                                    <option v-for="(court, id) in courts"
                                            :value="id">{{ court }}</option>
                                </select>
                            </div>
                        </div>

                        <button type="button" @click="$emit('save')" class="btn btn-soft-primary mt-5 d-block mx-auto">Reservar</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</template>

<script>
    import store from "../store";
    import TimePickerComponent from "./TimePickerComponent";

    export default {
        data() {
            return {
                store,
                time: {
                    desde: {},
                    hasta: {}
                }
            }
        },
        components: {
            TimePickerComponent
        },
        // methods: {
        //   close: function() {
        //       this.store.modal.visible = false;
        //   }
        // },
        props: {
          courts: {
              type: Object,
              required: true
          }
        }
    }
</script>
