<template>
    <div class="form-group">
        <label>{{ title }}</label>
        <timeselector v-model="store.evento[modelo]"
                      :interval="interval"
                      :disable="disable"
                      :displaySeconds="false"
                      :displayMinutes="false">
        </timeselector>
    </div>
</template>

<script>
    import Timeselector from 'vue-timeselector';
    import store from "./../store";
    Vue.use(Timeselector);

    export default {
        name: 'timePicker',
        components: { Timeselector },
        data() {
            return {
                time: new Date(), // or new Date() to set preselect the picker
                store
            }
        },
        props: {
            title: {
              type: String,
              required: true
            },
            modelo:{
              required: true
            },
            interval: {
                type: Object,
                default: {h:1, m:1}
            },
            disable: {
                type: Object,
                default: {h: null, m: null, s:null}
            }

        }

    }

</script>

<style lang="scss">
    .vtimeselector__input{
        font-size: 13px;
        color: #a3a4ab;
        background: #292c3c;
        border-color: #303344;
        height: 38px;
        display: block;
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-weight: 400;
        line-height: 1.5;
        background-clip: padding-box;
        border-radius: 0.25rem;
        -webkit-transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .timeselector__box__item--is-disabled{
        display: none;
    }
</style>
