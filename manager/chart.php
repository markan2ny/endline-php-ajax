<?php include_once 'views/header.php'; ?>
<?php

include_once '../db/database.php';
$init = new database;

$chart = $init->connect()->query("SELECT DAYNAME(submit_at) as dayname, SUM(bad_qty) as bad, SUM(good_qty) as good FROM logs GROUP BY dayname");

while ($c = $chart->fetch_object()) {
    $day[] = $c->dayname;
    $bad_qty[] = $c->bad;
    $good_qty[] = $c->good;
}
?>

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="card card-outline card-primary">
            <div class="card-body">
                <form id="filtered_date">
                    <div class="form-group">
                        <label>FROM</label>
                        <input type="date" name="date_from" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>FROM</label>
                        <input type="date" name="date_to" class="form-control">
                    </div>
                    <button class="btn btn-flat btn-primary">Generate</button>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header bg-secondary">
                <span>CHART</span>
            </div>
            <div class="card-body">
                <input type="date" class="form-control" onchange="startFilterDate(this)">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</div>

<?php include_once 'views/footer.php'; ?>
<script>


    $(function() {

        $('#filtered_date').submit(function(e) {
            e.preventDefault();

            alert('Wait....')

            $.ajax({
                url: 'core/filter.php',
                method: 'POST',
                data: $(this).serialize(),
                success: function(res) {
                    // console.log(res);
                }
            })



        })
    })



    const labels = <?php echo json_encode($day); ?>;
    const data = {
        labels: labels,
        datasets: [{
                label: 'Goods',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: <?php echo json_encode($bad_qty) ?>
            },
            {
                label: 'Bads',
                backgroundColor: 'rgba(210, 214, 222, 1)',
                borderColor: 'rgba(210, 214, 222, 1)',
                pointRadius: false,
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: <?php echo json_encode($good_qty) ?>
            },
        ]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        },
    };

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );


    function startFilterDate(date) {
        const startDate = new Date(date.value);
        console.log(startDate.setDate(0, 0, 0, 0));
    }
</script>
