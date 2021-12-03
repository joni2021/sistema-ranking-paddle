<template>
    <div>
        <FullCalendar
            :plugins="calendarPlugins"
            defaultView="dayGridWeek"
            :header="{
            left: 'prev,next',
            center: 'title',
            right: null
          }"

            :weekends="calendarWeekends"
            :events="calendarEvents"
            eventTextColor="#000"
            eventBackgroundColor="#fff"
            @dateClick="handleDateClick"
            @eventClick="eventClick"
        />
        <modalComponent @save="reservar" @close="closeModal" :courts="courts" v-if="modal"></modalComponent>
    </div>
</template>

<script>
    import FullCalendar from '@fullcalendar/vue'
    import dayGridPlugin from '@fullcalendar/daygrid'
    import timeGridPlugin from '@fullcalendar/timegrid'
    import bootstrapPlugin from '@fullcalendar/bootstrap'
    import interactionPlugin from '@fullcalendar/interaction'
    import Timeselector from 'vue-timeselector';
    import ModalComponent from "./ModalComponent";
    import store from './../store';


    // Timeselector.eventTimeFormat.hour : '2-digit',
    // Timeselector.eventTimeFormat.minute : '2-digit',
    // Timeselector.eventTimeFormat.second : '2-digit',
    // Timeselector.props.eventTimeFormat.meridiem : false,

    export default {
        components: {
            FullCalendar, // make the <FullCalendar> tag available
            Timeselector,
            ModalComponent
        },
        data() {
            return {
                calendarPlugins: [dayGridPlugin, bootstrapPlugin, timeGridPlugin, interactionPlugin],
                themeSystem: 'bootstrap',
                calendarWeekends: true,
                calendarEvents: [],
                rendering: 'background',
                eventTimeFormat: {
                    hour: '2-digit',
                    minute: null,
                    second: null,
                    meridiem: false
                },
                store,
                modal: false,
                courts: {},
                user: null
            }
        },
        methods: {
            reservar: function () {

                let reserva = {
                    day: store.evento.getFecha(),
                    from: store.evento.getDesde(),
                    to: store.evento.getHasta(),
                    court_id: store.evento.getCourt(),
                }

                axios.post('reservations/store', reserva)
                    .then((() => {
                        this.calendarEvents.push({
                            title: `${this.user.fullname}: ${store.evento.getFecha()}`,
                            start: store.evento.getDesde(),
                            end: store.evento.getHasta(),
                            eventTimeFormat: {
                                hour: '2-digit',
                                minute: null,
                                second: null,
                                meridiem: false
                            },
                            displayEventTime: false,
                            allDay: false,
                            displayEventEnd: true,
                        })

                        this.closeModal();
                    }))
            },
            closeModal: function () {
                this.modal = false;
            },
            parseDate: function(date) {
                let arrfecha = date.split(',');
                let fecha = new Date(parseInt(arrfecha[0]),parseInt(arrfecha[1]),parseInt(arrfecha[2]),parseInt(arrfecha[3]),parseInt(arrfecha[4]),parseInt(arrfecha[5]));

                return fecha;
            },
            getDate: function(date) {
                let fecha = new Date(date);

                return `${fecha.getFullYear()}/${fecha.getMonth()}/${fecha.getDay()}`;
            },
            handleDateClick(arg) {
                // muestro el modal
                this.modal = true;
                // this.store.modal.visible = true;
                store.evento.fecha = arg.date;


                /*
                if (confirm('Querés agregar un evento a ' + arg.dateStr + ' ?')) {
                    this.calendarEvents.push({ // add new event data
                        title: 'Nuevo evento',
                        start: arg.date,
                        end: arg.date,
                        editable: true,
                        allDay: false,
                        textColor: "#fff"
                    })
                }
                */
            },
            eventClick(ev) {
                /*
                const option = {
                    title: 'Multiple inputs',
                    html:
                        `<div class="input-group">
                            <timePicker></timePicker>
                            <timeselector></timeselector>
<!--                            <input type="text" class="form-control" placeholder="mm/dd/yyyy">-->
                            <div class="input-group-append bg-custom b-0"><span class="input-group-text"><i class="mdi mdi-calendar"></i></span></div>
                        </div>` +
                        '<input id="swal-input1" class="swal2-input">' +
                        '<input id="swal-input2" class="swal2-input">',
                    focusConfirm: false,
                    preConfirm: () => {
                        console.log([
                            document.getElementById('swal-input1').value,
                            document.getElementById('swal-input2').value
                        ])
                    }


                console.log(ev)
                console.log(ev.event.start)
                 */

            }


        },
        mounted() {
            axios.get('courts')
                .then((rta => {
                    this.courts = rta.data.response.courts;
                    this.user = rta.data.response.user;
                }))

            axios.get('reservations/reserve')
                .then((rta => {

                    if(rta.data.response.length > 0){
                        let data = rta.data.response;

                        for(let i in data){
                            this.calendarEvents.push({
                                title: `${data[i].user.fullname}: ${this.getDate(data[i].day)}`,
                                start: this.parseDate(data[i].from_format),
                                end: this.parseDate(data[i].to_format),
                                eventTimeFormat: {
                                    hour: '2-digit',
                                    minute: null,
                                    second: null,
                                    meridiem: false
                                },
                                displayEventTime: false,
                                allDay: false,
                                displayEventEnd: true,
                            });
                        }
                    }

                    this.courts = rta.data.response.courts;
                    this.user = rta.data.response.user;
                }))

        }
    }


</script>


<style lang='scss'>

    @import '~@fullcalendar/core/main.css';
    @import '~@fullcalendar/daygrid/main.css';
    @import '~@fullcalendar/bootstrap/main.css';

</style>
