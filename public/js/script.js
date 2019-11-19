/**
 * Created by jose on 18/10/2019.
 */
jQuery.event.special.touchstart =
    {
        setup: function (_, ns, handle) {
            if (ns.includes("noPreventDefault")) {
                this.addEventListener("touchstart", handle, {passive: false});
            }
            else {
                this.addEventListener("touchstart", handle, {passive: true});
            }
        }
    };
$('#nacimiento').daterangepicker({
    timeZone: null,
    singleDatePicker: true,
    showDropdowns: true,
    startDate: moment().subtract(18, 'years'),
    maxDate: moment().subtract(18, 'years'),
    minDate: moment().subtract(70, 'years'),
    locale: {
        format: 'YYYY-MM-DD',
        daysOfWeek: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    },
});

var idBajar = [1, 2, 3, 4, 5];
var idMusculo = [7, 8, 9, 10, 11];
var etiqueta = ["muy lento", "lento", "normal", "rapido", "muy rapido"];

$('#musculo').ionRangeSlider({
    skin: "round",
    type: "single",
    grid: true,
    values: idMusculo,
    prettify: function (n) {
        var ind = idMusculo.indexOf(n);
        return etiqueta[ind];
    }
});

$('#bajar').ionRangeSlider({
    skin: "round",
    type: "single",
    grid: true,
    values: idBajar,
    prettify: function (n) {
        var ind = idBajar.indexOf(n);
        return etiqueta[ind];
    }
});

var proteina = new Waterfall({
    containerSelector: '.proteina-container',
    boxSelector: '.proteina-box',
    minBoxWidth: 110
});

var carbohidrato = new Waterfall({
    containerSelector: '.carbohidrato-container',
    boxSelector: '.carbohidrato-box',
    minBoxWidth: 110
});

var grasa = new Waterfall({
    containerSelector: '.grasa-container',
    boxSelector: '.grasa-box',
    minBoxWidth: 110
});

var lacteo = new Waterfall({
    containerSelector: '.lacteo-container',
    boxSelector: '.lacteo-box',
    minBoxWidth: 110
});

var fruta = new Waterfall({
    containerSelector: '.fruta-container',
    boxSelector: '.fruta-box',
    minBoxWidth: 110
});

$('.food').change(function (event) {
    var nuevo, borrar, clase, newclass;
    var check = event.target;
    if (check.checked) {
        clase = this.parentNode.className;
        borrar = "bg-transparent";
        nuevo = "cambio";
        newclass = clase.replace(borrar, nuevo);
        this.parentNode.className = newclass;
    } else {
        clase = this.parentNode.className;
        borrar = "cambio"
        nuevo = "bg-transparent"
        newclass = clase.replace(borrar, nuevo);
        this.parentNode.className = newclass;
    }
});
/**
function verificar() {
    return validarProteinas() || validarCarbohidratos() || validarGrasas() || validarLacteos() || validarFrutas();
}

function validarProteinas() {
    var s_proteina = 0;
    $('[name="proteinas[]"]:checked').each(function () {
        s_proteina++;
    });

    if (s_proteina < 4) {
        $('#vproteina').html("<b>Debe seleccionar al menos 4 fuentes de proteinas</b>");
        toastr.options = {
            progressBar: true
        };
        toastr.error('Debe seleccionar al menos 4 fuentes de proteinas', 'Proteina');
        return false;
    }
}

function validarCarbohidratos() {
    var s_carbohidrato = 0;
    $('[name="carbohidratos[]"]:checked').each(function () {
        s_carbohidrato++;
    });

    if (s_carbohidrato < 8) {
        $('#vcarbohidrato').html("<b>Debe seleccionar al menos 8 fuentes de carbohidratos</b>");
        toastr.options = {
            progressBar: true
        };
        toastr.error('Debe seleccionar al menos 8 fuentes de carbohidratos', 'Carbohidratos');
        return false;
    }
}

function validarGrasas() {
    var s_grasa = 0;
    $('[name="grasas[]"]:checked').each(function () {
        s_grasa++;
    });

    if (s_grasa < 6) {
        $('#vgrasa').html("<b>Debe seleccionar al menos 6 fuentes de grasas</b>");
        toastr.options = {
            progressBar: true
        };
        toastr.error('Debe seleccionar al menos 6 fuentes de grasas', 'Grasas');
        return false;
    }
}

function validarLacteos() {
    var s_lacteo = 0;
    $('[name="lacteos[]"]:checked').each(function () {
        s_lacteo++;
    });

    if (s_lacteo < 3) {
        $('#vlacteo').html("<b>Debe seleccionar al menos 3 fuentes de lacteos y otros</b>");
        toastr.options = {
            progressBar: true
        };
        toastr.error('Debe seleccionar al menos 3 fuentes de lacteos y otros', 'Lacteos y otros');
        return false;
    }
}

function validarFrutas() {
    var s_fruta = 0;
    $('[name="frutas[]"]:checked').each(function () {
        s_fruta++;
    });

    if (s_fruta < 10) {
        $('#vfruta').html("<b>Debe seleccionar al menos 10 fuentes de frutas</b>");
        toastr.options = {
            progressBar: true
        };
        toastr.error('Debe seleccionar al menos 10 fuentes de frutas', 'Frutas');
        return false;
    }
}
**/
function validar() {
    var validaciones = tipos.map(function (tipo) {
        return validate(tipo.nombre, tipo.requerido);
    });

    return !validaciones.includes(false);
}

var tipos = [
    {
        nombre: 'frutas',
        requerido: 10
    },
    {
        nombre: 'lacteos',
        requerido: 3
    },
    {
        nombre: 'grasas',
        requerido: 5
    },
    {
        nombre: 'carbohidratos',
        requerido: 8
    },
    {
        nombre: 'proteinas',
        requerido: 4
    }
];

function validate(nombre, requerido) {
    var contador = 0;
    $('[name = "' + nombre + '[]"]:checked').each(function () {
        contador++;
    });

    if (contador < requerido) {
        toastr.options = {
            progressBar: true,
            preventDuplicates: true,
            newestOnTop: true,
            showDuration: 500,
            hideDuration: 2000,
            extendedTimeOut: 2000,
        };

        toastr.error("Debe seleccionar al menos " + requerido + " fuentes de " + nombre, nombre);
        return false;
    }
}