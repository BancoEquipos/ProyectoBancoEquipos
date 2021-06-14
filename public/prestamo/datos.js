//Variable para comprobar que todo este correcto
var todoCorrecto = { 
    "nombre":"",
    "apellidos":"",
    "telefono":"",
    "ps-prov":"",
    "ps-mun":"",
    "domicilio":"",
    "email":"",
    "nif":"",
    "nre":"",
    "gradoSelect":"",
    "cursoSelect":"",
    "motivoSelect":"",
    "equipamientoSolicitado":"",
    "otroMotivo":"No"
}


//Variable con los grados ofertados
const gradosPresenciales = [
    {
        "id": "1",
        "nombre": "Técnico superior en Gestión Administrativa"
    },

    {
        "id": "2",
        "nombre": "Técnico superior en administracion y finanzas"
    },

    {
        "id": "3",
        "nombre": "Técnico superior en asistencia a la dirección bilingüe"
    },

    {
        "id": "4",
        "nombre": "Técnico en actividades comerciales"
    },

    {
        "id": "5",
        "nombre": "Técnico superior en comercio internacional bilingüe"
    },

    {
        "id": "6",
        "nombre": "Técnico superior en transporte y logistica"
    },

    {
        "id": "7",
        "nombre": "Técnico superior en marketing y publicidad"
    },

    {
        "id": "8",
        "nombre": "Técnico en sistemas microinformáticos y redes"
    },

    {
        "id": "9",
        "nombre": "Técnico superior en administración de sistemas informáticos en red"
    },

    {
        "id": "10",
        "nombre": "Técnico superior en desarrollo de aplicaciones web"
    },

    {
        "id": "11",
        "nombre": "Técnico superior en desarrollo de aplicaciones multiplataforma"
    }
];

//Variable con motivos de solicitud
const motivos = [
    {
        "id": "1",
        "nombre": "Se me ha roto el ordenador"
    },

    {
        "id": "2",
        "nombre": "Se me ha roto el monitor"
    },

    {
        "id": "3",
        "nombre": "No tengo ordenador"
    },

    {
        "id": "4",
        "nombre": "Se me ha roto el teclado/ratón de mi ordenador"
    },

    {
        "id": "5",
        "nombre": "No tengo uno de los cables esenciales para mi ordenador"
    },

    {
        "id": "6",
        "nombre": "Otro motivo"
    }
];

//Equipamiento solicitado
const equipamiento = [
    { label: 'Ordenador', value: '1'},
    { label: 'Monitor', value: '2'},
    { label: 'Cableado', value: '3'},
    { label: 'Teclado + Ratón', value: '4'}
  ]