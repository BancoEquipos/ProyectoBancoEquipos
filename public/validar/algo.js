$(document).ready(async function(){
  const URL_API = 'http://localhost/';
let configuracionPeticion = {};

var datosSolicitudesAnterior = [
  {
    "id": 1,
    "curso": 1,
    "profesor_valida": null,
    "fecha_validacion": null,
    "fecha_devolucion": null,
    "fecha_entrega": null,
    "fecha_alta_solicitud": null,
    "alumno": {
      "id": 1,
      "nre": null,
      "nombre": "Alex",
      "apellidos": "asdd",
      "nif": "12345678-l",
      "email": "hola@hotmail.com",
      "telefono": 612365478,
      "created_at": "2021-06-14T20:47:04.000000Z",
      "updated_at": "2021-06-14T20:47:04.000000Z"
    },
    "tipo_componente": [
      {
        "id": 1,
        "tipo_componente": "Ordenador",
        "created_at": "2021-06-14T20:45:04.000000Z",
        "updated_at": "2021-06-14T20:45:04.000000Z",
        "pivot": {
          "prestamo_id": 1,
          "tipo_componente_id": 1
        }
      },
      {
        "id": 2,
        "tipo_componente": "Monitor",
        "created_at": "2021-06-14T20:45:04.000000Z",
        "updated_at": "2021-06-14T20:45:04.000000Z",
        "pivot": {
          "prestamo_id": 1,
          "tipo_componente_id": 1
        }
      },
      {
        "id": 3,
        "tipo_componente": "Teclado",
        "created_at": "2021-06-14T20:45:04.000000Z",
        "updated_at": "2021-06-14T20:45:04.000000Z",
        "pivot": {
          "prestamo_id": 1,
          "tipo_componente_id": 1
        }
      }
    ],
    "motivo": {
      "id": 1,
      "motivo": "Uno",
      "descripcion": null,
      "created_at": "2021-06-14T20:46:03.000000Z",
      "updated_at": "2021-06-14T20:46:03.000000Z"
    },
    "domicilio": {
      "id": 1,
      "provincia": "39",
      "poblacion": "39004",
      "domicilio": "asdf",
      "created_at": "2021-06-14T20:47:04.000000Z",
      "updated_at": "2021-06-14T20:47:04.000000Z"
    },
    "ciclo_formativo": {
      "id": 1,
      "nombre": "Uno",
      "created_at": "2021-06-14T20:46:12.000000Z",
      "updated_at": "2021-06-14T20:46:12.000000Z"
    },
    "componentes": [
      {
        "componente_id": 1,
        "nSerie": 1,
        "tipoComponente": "Ordenador",
        "disponible": 1,
        "created_at": "2021-06-14T20:45:37.000000Z",
        "updated_at": "2021-06-14T20:45:37.000000Z",
        "pivot": {
          "prestamo_id": 1,
          "componente_id": 1
        }
      }
    ]
  },
  {
    "id": 2,
    "curso": 1,
    "profesor_valida": null,
    "fecha_validacion": null,
    "fecha_devolucion": null,
    "fecha_entrega": null,
    "fecha_alta_solicitud": null,
    "alumno": {
      "id": 1,
      "nre": null,
      "nombre": "asd",
      "apellidos": "asdd",
      "nif": "12345678-l",
      "email": "hola@hotmail.com",
      "telefono": 612365478,
      "created_at": "2021-06-14T20:47:04.000000Z",
      "updated_at": "2021-06-14T20:47:04.000000Z"
    },
    "tipo_componente": [
      {
        "id": 1,
        "tipo_componente": "Ordenador",
        "created_at": "2021-06-14T20:45:04.000000Z",
        "updated_at": "2021-06-14T20:45:04.000000Z",
        "pivot": {
          "prestamo_id": 1,
          "tipo_componente_id": 1
        }
      },
      {
        "id": 2,
        "tipo_componente": "Monitor",
        "created_at": "2021-06-14T20:45:04.000000Z",
        "updated_at": "2021-06-14T20:45:04.000000Z",
        "pivot": {
          "prestamo_id": 1,
          "tipo_componente_id": 1
        }
      },
      {
        "id": 3,
        "tipo_componente": "Teclado",
        "created_at": "2021-06-14T20:45:04.000000Z",
        "updated_at": "2021-06-14T20:45:04.000000Z",
        "pivot": {
          "prestamo_id": 1,
          "tipo_componente_id": 1
        }
      }
    ],
    "motivo": {
      "id": 1,
      "motivo": "Uno",
      "descripcion": null,
      "created_at": "2021-06-14T20:46:03.000000Z",
      "updated_at": "2021-06-14T20:46:03.000000Z"
    },
    "domicilio": {
      "id": 1,
      "provincia": "39",
      "poblacion": "39004",
      "domicilio": "asdf",
      "created_at": "2021-06-14T20:47:04.000000Z",
      "updated_at": "2021-06-14T20:47:04.000000Z"
    },
    "ciclo_formativo": {
      "id": 1,
      "nombre": "Uno",
      "created_at": "2021-06-14T20:46:12.000000Z",
      "updated_at": "2021-06-14T20:46:12.000000Z"
    },
    "componentes": [
      {
        "componente_id": 1,
        "nSerie": 1,
        "tipoComponente": "Ordenador",
        "disponible": 1,
        "created_at": "2021-06-14T20:45:37.000000Z",
        "updated_at": "2021-06-14T20:45:37.000000Z",
        "pivot": {
          "prestamo_id": 1,
          "componente_id": 1
        }
      }
    ]
  },
  {
    "id": 2,
    "curso": 1,
    "profesor_valida": null,
    "fecha_validacion": 89 / 87 / 412,
    "fecha_devolucion": null,
    "fecha_entrega": null,
    "fecha_alta_solicitud": null,
    "alumno": {
      "id": 2,
      "nre": null,
      "nombre": "asd",
      "apellidos": "asdd",
      "nif": "12345678-lsdffdff",
      "email": "hola@hotmail.com",
      "telefono": 612365478,
      "created_at": "2021-06-14T20:51:41.000000Z",
      "updated_at": "2021-06-14T20:51:41.000000Z"
    },
    "tipo_componente": [
      {
        "id": 1,
        "tipo_componente": "Ordenador",
        "created_at": "2021-06-14T20:45:04.000000Z",
        "updated_at": "2021-06-14T20:45:04.000000Z",
        "pivot": {
          "prestamo_id": 2,
          "tipo_componente_id": 1
        }
      },
      {
        "id": 2,
        "tipo_componente": "Monitor",
        "created_at": "2021-06-14T20:51:28.000000Z",
        "updated_at": "2021-06-14T20:51:28.000000Z",
        "pivot": {
          "prestamo_id": 2,
          "tipo_componente_id": 2
        }
      }
    ],
    "motivo": {
      "id": 1,
      "motivo": "Uno",
      "descripcion": null,
      "created_at": "2021-06-14T20:46:03.000000Z",
      "updated_at": "2021-06-14T20:46:03.000000Z"
    },
    "domicilio": {
      "id": 2,
      "provincia": "39",
      "poblacion": "39004",
      "domicilio": "asdf",
      "created_at": "2021-06-14T20:51:40.000000Z",
      "updated_at": "2021-06-14T20:51:40.000000Z"
    },
    "ciclo_formativo": {
      "id": 1,
      "nombre": "Uno",
      "created_at": "2021-06-14T20:46:12.000000Z",
      "updated_at": "2021-06-14T20:46:12.000000Z"
    },
    "componentes": [{
      "componente_id": 1,
      "nSerie": 1,
      "tipoComponente": "Ordenador",
      "disponible": 1,
      "created_at": "2021-06-14T20:45:37.000000Z",
      "updated_at": "2021-06-14T20:45:37.000000Z",
      "pivot": {
        "prestamo_id": 1,
        "componente_id": 1
      }
    }]
  }]

  function peticion(url, configuracionPeticion){
    return fetch(url, configuracionPeticion).then(data => data.json());
  }

  async function devolverPrestamo(){
    let prestamoJson;
    configuracionPeticion = {
        method: 'GET',
        header: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        }
    }

    prestamoJson = await peticion(URL_API + 'api/prestamos', configuracionPeticion);

    return prestamoJson;
}

let datosSolicitudes = await devolverPrestamo();
const componentes = await peticion(URL_API, configuracionPeticion);


const componentesAnterior = [
  {
    "id": 1,
    "nSerie": 1,
    "tipoComponente": "Ordenador"
  },
  {
    "id": 2,
    "nSerie": 2,
    "tipoComponente": "Monitor"
  },
  {
    "id": 3,
    "nSerie": 3,
    "tipoComponente": "Ordenador"
  },
  {
    "id": 4,
    "nSerie": 4,
    "tipoComponente": "Monitor"
  },
  {
    "id": 5,
    "nSerie": 5,
    "tipoComponente": "Monitor"
  },
  {
    "id": 6,
    "nSerie": 6,
    "tipoComponente": "Monitor"
  },
  {
    "id": 7,
    "nSerie": 7,
    "tipoComponente": "Monitor"
  },
  {
    "id": 8,
    "nSerie": 8,
    "tipoComponente": "Monitor"
  },
  {
    "id": 9,
    "nSerie": 9,
    "tipoComponente": "Ordenador"
  },
  {
    "id": 10,
    "nSerie": 10,
    "tipoComponente": "Ordenador"
  },
  {
    "id": 11,
    "nSerie": 11,
    "tipoComponente": "Ordenador"
  },
  {
    "id": 12,
    "nSerie": 12,
    "tipoComponente": "Ordenador"
  },
  {
    "id": 13,
    "nSerie": 13,
    "tipoComponente": "Monitor"
  },
  {
    "id": 14,
    "nSerie": 14,
    "tipoComponente": "Ordenador"
  },
  {
    "id": 15,
    "nSerie": 15,
    "tipoComponente": "Monitor"
  }
]

});
