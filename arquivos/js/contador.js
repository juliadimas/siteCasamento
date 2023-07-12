var dataCasamento = new Date("October 12, 2024 17:30").getTime();
var dias, horas, minutos, segundos;

setInterval(function(){
    var dataAtual = new Date();
    var segundos_f = (dataCasamento - dataAtual) / 1000;    
 
    dias = parseInt (segundos_f / 86400);
    if (dias < 10) {dias = '0' + dias;};
    segundos_f = segundos_f % 86400;
    horas = parseInt (segundos_f / 3600);
    if (horas < 10) {horas = '0' + horas;};
    segundos_f = segundos_f % 3600;
    minutos = parseInt (segundos_f / 60);
    if (minutos < 10) {minutos = '0' + minutos;};
    segundos = parseInt (segundos_f % 60);
    if (segundos < 10) {segundos = '0' + segundos;};

    document.getElementById('dias').innerHTML = dias;
    document.getElementById('horas').innerHTML = horas;
    document.getElementById('minutos').innerHTML = minutos;
    document.getElementById('segundos').innerHTML = segundos;

}, 1000);