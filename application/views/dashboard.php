<style>
  .highcharts-figure,
  .highcharts-data-table table {
    min-width: 320px;
    max-width: 660px;
    margin: 1em auto;
  }

  .highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #EBEBEB;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
  }

  .highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
  }

  .highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
  }

  .highcharts-data-table td,
  .highcharts-data-table th,
  .highcharts-data-table caption {
    padding: 0.5em;
  }

  .highcharts-data-table thead tr,
  .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
  }

  .highcharts-data-table tr:hover {
    background: #f1f7ff;
  }
</style>


<div class="row">
  <div class="col-12">
    <div class="page-title-box d-flex align-items-center justify-content-between">
      <h3>Dashboard</h3>
      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xl-4">
    <div class="card">
      <div class="row">
        <div class="col-xl-5">
          <div class="text-center p-4 bg-info">
            <span style="font-size: 50px; color: black;">
              <i class="fas fa-notes-medical"></i>
            </span>
          </div>
        </div>
        <div class="col-xl-7">
          <div class="p-4 text-center text-xl-left">
            <div class="row">
              <h1><?= $this->fungsi->count_registrasi() ?></h1>
            </div>
            <div class="row">
              <h5>REGISTRASI AKTIF</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-4">
    <div class="card">
      <div class="row">
        <div class="col-xl-5">
          <div class="text-center p-4 bg-warning">
            <span style="font-size: 50px; color: black;">
              <i class="fas fa-cash-register"></i>
            </span>
          </div>
        </div>
        <div class="col-xl-7">
          <div class="p-4 text-center text-xl-left">
            <div class="row">
              <h1><?= $this->fungsi->count_regout() ?></h1>
            </div>
            <div class="row">
              <h5>REGISTRASI KELUAR</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-4">
    <div class="card">
      <div class="row">
        <div class="col-xl-5">
          <div class="text-center p-4 bg-success">
            <span style="font-size: 50px; color: black;">
              <i class="fas fa-address-book"></i>
            </span>
          </div>
        </div>
        <div class="col-xl-7">
          <div class="p-4 text-center text-xl-left">
            <div class="row">
              <h1>100.000.000</h1>
            </div>
            <div class="row">
              <h5>PENERIMAAN KAS</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <figure class="highcharts-figure">
      <div id="data-layanan"></div>
    </figure>
  </div>
  <div class="col-md-6">
    <figure class="highcharts-figure">
      <div id="data-pendapatan"></div>
    </figure>
  </div>
</div>

<?php
foreach ($layanan as $ly => $l) {
  $data_layanan[] = ['name' => $l->nama_layanan, 'y' => $l->jumlah];
};

foreach ($pendapatan as $pd => $p) {
  $nilai_pendapatan[] = [$p->nilai];
};
?>

<script>
  // Build the chart
  Highcharts.chart('data-layanan', {
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
    },
    title: {
      text: 'Jumlah Pasien Terbanyak'
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
      point: {
        valueSuffix: '%'
      }
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
          enabled: true
        },
        showInLegend: true
      }
    },
    series: [{
      name: 'Layanan',
      colorByPoint: true,
      data: <?= json_encode($data_layanan, JSON_NUMERIC_CHECK) ?>,
    }]
  });
</script>

<script>
  Highcharts.chart('data-pendapatan', {
    chart: {
      type: 'column'
    },
    title: {
      text: 'Data Pendapatan'
    },
    subtitle: {
      text: 'Nilai Pendapatan Pasien Pulang per Bulan'
    },
    xAxis: {
      categories: [
        'Jan',
        'Feb',
        'Mar',
        'Apr',
        'May',
        'Jun',
        'Jul',
        'Aug',
        'Sep',
        'Oct',
        'Nov',
        'Dec'
      ],
      crosshair: true
    },
    yAxis: {
      min: 0,
      title: {
        text: 'Rupiah (Rp)'
      }
    },
    tooltip: {
      headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
      pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
        '<td style="padding:0"><b>{point.y}</b></td></tr>',
      footerFormat: '</table>',
      shared: true,
      useHTML: true
    },
    plotOptions: {
      column: {
        pointPadding: 0.2,
        borderWidth: 0
      }
    },
    series: [{
      name: 'Pendapatan Pasien',
      data: <?= json_encode($nilai_pendapatan, JSON_NUMERIC_CHECK) ?>

    }]
  });
</script>