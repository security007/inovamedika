<?= $this->extend('templates/layout') ?>
<?= $this->section('title') ?>
    <title>Dashboard | Pegawai</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid">

<div class="row p-3">
<div class="col">
<h2>Grafik Total Pasien</h2>
        <canvas id="pasien"  style="height:20vh; width:30vw"></canvas>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: "/api/getPasien",
                method: "GET",
                success: function(data) {                  
                    var label = [];
                    var value = [];
                    for (var i in data) {
                        label.push(data[i].tanggal_daftar);
                        value.push(data[i].total);
                    }
                    var ctx = document.getElementById('pasien').getContext('2d');
                    
                    var chart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: label,
                            
                            datasets: [{

                                fill: false,
                                label: 'Total Pasien',
                                backgroundColor: 'rgb(255,255,255)',
                                borderColor: 'rgb(252, 116, 101)',
                                data: value
                            }]
                        },
                        options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
                    });
                }
            });
                    
                    
        });
    </script>
</div>

<div class="col">
<h2>Laporan Pembayaran</h2>
    <canvas id="pembayaran"  style="height:20vh; width:30vw"></canvas>

<script>
    $(document).ready(function() {
        $.ajax({
            url: "/api/getPembayaran",
            method: "GET",
            success: function(data) {                  
                var label = [];
                var value = [];
                for (var i in data) {
                    label.push(data[i].pembayaran);
                    value.push(data[i].total);
                }
                var ctx = document.getElementById('pembayaran').getContext('2d');
                
                var chart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: label,
                        
                        datasets: [{

                            fill: false,
                            label: 'Laporan Pembayaran',
                            backgroundColor: [
                                    "rgb(252, 116, 101)",
                                    "#00FF00",
                                                ]
                                ,
                            borderColor: 'rgb(255,255,255)',
                            data: value
                        }]
                    },
                    options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
                });
            }
        });
                
                
    });
</script>
</div>
<div class="col">
<h2>Grafik Diagnosa Pasien</h2>
    <canvas id="diagnosa"  style="height:30vh; width:50vw"></canvas>

<script>
    $(document).ready(function() {
        $.ajax({
            url: "/api/getDiagnosa",
            method: "GET",
            success: function(data) {                  
                var label = [];
                var value = [];
                for (var i in data) {
                    label.push(data[i].diagnosa);
                    value.push(data[i].total);
                }
                var ctx = document.getElementById('diagnosa').getContext('2d');
                
                var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: label,
                        
                        datasets: [{

                            fill: false,
                            label: 'Total Diagnosa/Penyakit',
                            backgroundColor: 'rgb(252, 116, 101)',
                            borderColor: 'rgb(252, 116, 101)',
                            data: value
                        }]
                    },
                    options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
                });
            }
        });
                
                
    });
</script>
</div>
</div>
</div>
<?= $this->endSection() ?>