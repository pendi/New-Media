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
var graf;
$(document).ready(function() {
    graf = new Highcharts.Chart({
    chart: {
        renderTo: 'container',
        type: 'column',
        backgroundColor:'transparent'
    },   
    title: {
        text: 'Grafik Penjualan'
    },
    xAxis: {
        categories: ['vendor']
    },
    yAxis: {
        title: {
            text: 'Jumlah Terjual (Unit)'
        }
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.0f}'
            }
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:11px">Jumlah Terjual</span><br>',
        pointFormat: '<span style="color:{point.color}">{series.name}</span>: <b>{point.y:.0f}</b> Unit<br/>'
    },
    series:             
        [
            <?php 
            // include('../aplikasi/koneksi.php');
            $sql = "SELECT vendor FROM category";
            $query = mysql_query($sql);
            while($dataVendor = mysql_fetch_array($query))
            {
                $vendor=$dataVendor['vendor'];                     
                $sqlSale = "SELECT sale FROM category WHERE vendor='$vendor'";        
                $querySale = mysql_query($sqlSale);
                while($dataSale = mysql_fetch_array($querySale))
                {
                    $sale = $dataSale['sale'];                 
                }
            ?>
            {
                name: '<?php echo $vendor; ?>',
                data: [<?php echo $sale; ?>]
            },
            <?php } ?>
        ]
    });
}); 
</script>