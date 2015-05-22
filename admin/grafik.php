<?php include "../header/header_admin.php"; ?>
<div class="row-isi">
    <table class="width">
        <tr>
            <td style="padding: 50px 0px 50px 0px;">
                <div id='container'></div>
            </td>
        </tr>
        <tr>
            <td>
                <?php include "../footer/footer.php" ?>
            </td>
        </tr>
    </table>
</div>
<script type="text/javascript">
$(document).ready(function() {
    var options = {
        chart: {
            renderTo: 'container',
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            backgroundColor:'transparent'
        },
        title: {
            text: 'Grafik Penjualan'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y:.0f} Unit</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    format: '<b>{point.name}</b>',
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Terjual',
            data: []
        }]
    }
    
    $.getJSON("data_grafik.php", function(json) {
        options.series[0].data = json;
        chart = new Highcharts.Chart(options);
    });
});
</script>