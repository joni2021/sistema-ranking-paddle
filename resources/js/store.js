const store = {
    evento: {
        fecha: null,
        desde: null,
        hasta: null,
        court_id: 1,
        getFecha: () => {
            let fecha = new Date(store.evento.fecha);
            return fecha.getFullYear() + '/' + fecha.getMonth() + '/' + fecha.getDate();
        },
        getDesde: () => {
            const fecha = new Date(store.evento.fecha);
            let dia = fecha.getDate();
            let mes = fecha.getMonth();
            let ano = fecha.getFullYear();
            let hora = new Date(store.evento.desde).getHours();
            return new Date(ano,mes,dia,hora,0,0);
        },
        getHasta: () => {
            const fecha = new Date(store.evento.fecha);
            let dia = fecha.getDate();
            let mes = fecha.getMonth();
            let ano = fecha.getFullYear();
            let hora = new Date(store.evento.hasta).getHours();
            return new Date(ano,mes,dia,hora,0,0);
        },
        getCourt: () => {
            return store.evento.court_id;
        }

    },
    modal: {
        visible     : false
    }
}

export default store;
