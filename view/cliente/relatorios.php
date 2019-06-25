<?php

    require_once 'header.php';
    
    $s          = new ControllerServico();
    $servico    = new Servico();    
    
    $json       = ServicoDAO::relatorioServicos('31','cliente');
    
    echo $json;
?>


<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>-->
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<header id="header"> <?php require_once 'menu.php'; ?> </header>

<div class="pt15"></div>

<!--<canvas id="myChart" width="400" height="400"></canvas>-->

<div id="myChart" style="height: 300px; width: 100%;"></div>

<script>
/*
new Chart(document.getElementById("myChart"), {
    type: 'pie',
    data: {
      labels: ["Abertos", "Aceitos", "Andamento", "Cancelados", "Finalizados"],
      datasets: [{
        label: "Serviços",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
        data: [2,1,3,10,18]
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Relatório de serviços - Status'
      }
      
    }
});*/


window.onload = function() {

var chart = new CanvasJS.Chart("myChart", {
	animationEnabled: true,
	title: {
		text: "Relatório de Serviços - Status"
	},
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "##-00\"\"",
		indexLabel: "{label} {y}",
		dataPoints: [
			{y: 3, label: "Abertos"},
			{y: 2, label: "Aceitos"},
			{y: 2, label: "Andamento"},
			{y: 3, label: "Cancelados"},
			{y: 12, label: "Finalizados"}
		]
	}]
});
chart.render();

}
</script>

<?php require_once 'footer.php'; ?>