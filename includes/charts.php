<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';

    // Area Chart Example
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {

    type: 'line',
    data: {
        labels: [
            <?php

                $query = "SELECT DATE_FORMAT(date, '%M') AS m FROM transactions WHERE status = 0 AND type = 1 AND product_return = 0 GROUP BY date ";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $result = $stmt->get_result();
                while($row = $result->fetch_assoc()){
                    echo '"'.$row['m'].'",';
                }
            ?>
        ],
        datasets: [{
        label: "Sales",
        lineTension: 0.3,
        backgroundColor: "rgba(2,117,216,0.2)",
        borderColor: "rgba(2,117,216,1)",
        pointRadius: 5,
        pointBackgroundColor: "rgba(2,117,216,1)",
        pointBorderColor: "rgba(255,255,255,0.8)",
        pointHoverRadius: 5,
        pointHoverBackgroundColor: "rgba(2,117,216,1)",
        pointHitRadius: 50,
        pointBorderWidth: 2,
        data: [
            <?php

                $total_price=0;
                $total_qty=0;
                $sales_qry = "SELECT o.*, t.*, SUM(product_qty) AS qty FROM transactions t, order_items o WHERE o.product_qty = t.quantity AND o.product_id = t.product_id AND t.status = 0 AND t.type = 1 GROUP BY t.product_id, t.date";
                $stmt = $conn->prepare($sales_qry);
                $stmt->execute();
                $result = $stmt->get_result();

                while($row=$result->fetch_assoc()){
                    
                    $total_qty += $row['qty'];
                    $total_price += $row['product_price'];
                }          
                echo floatval($total_qty* $total_price); 
            ?>
        ],
        }],
    },
    options: {
        scales: {
        xAxes: [{
            time: {
            unit: 'date'
            },
            gridLines: {
            display: false
            },
            ticks: {
            maxTicksLimit: 7
            }
        }],
        yAxes: [{
            ticks: {
            min: 0,
            max: 10000,
            maxTicksLimit: 10
            },
            gridLines: {
            color: "rgba(0, 0, 0, .125)",
            }
        }],
        },
        legend: {
        display: false
        }
    }
    });
</script>
<script>
    // // Set new default font family and font color to mimic Bootstrap's default styling
    // Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    // Chart.defaults.global.defaultFontColor = '#292b2c';

    // // Bar Chart Example
    var ctx = document.getElementById("myBarChart");
    var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
            <?php

                $query = "SELECT b.*, p.* FROM product_batches b, products p WHERE p.id = b.product_id";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $result = $stmt->get_result();
                while($row = $result->fetch_assoc()){
                    echo '"'.$row['product_name'].'",';
                }
            ?>
        ],
        datasets: [{
        label: "Stock",
        backgroundColor: "rgba(2,117,216,1)",
        borderColor: "rgba(2,117,216,1)",
        data: [
            <?php

                $query = "SELECT b.*, p.* FROM product_batches b, products p WHERE p.id = b.product_id";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $result = $stmt->get_result();
                while($row = $result->fetch_assoc()){
                    echo '"'.$row['quantity_in_stock'].'",';
                }
            ?>
        ],
        }],
    },
    options: {
        scales: {
        xAxes: [{
            time: {
            unit: 'month'
            },
            gridLines: {
            display: false
            },
            ticks: {
            maxTicksLimit: 10
            }
        }],
        yAxes: [{
            ticks: {
            min: 0,
            max: 10000,
            maxTicksLimit: 10
            },
            gridLines: {
            display: true
            }
        }],
        },
        legend: {
        display: false
        }
    }
    });
</script>
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    // Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    // Chart.defaults.global.defaultFontColor = '#292b2c';

    // Pie Chart Example
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [
            <?php
                $query = "SELECT * FROM suppliers";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $result = $stmt->get_result();
                while($row = $result->fetch_assoc()){
                    echo '"'.$row['supplier_name'].'",';
                }
            ?>
        ],
        datasets: [{
        data: [
            <?php
                $query = "SELECT * FROM suppliers";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $result = $stmt->get_result();
                while($row = $result->fetch_assoc()){
                    echo '"1",';
                }
            ?>
        ],
        backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745','#007bff', '#dc3545', '#ffc107', '#28a745','#007bff', '#dc3545', '#ffc107', '#28a745','#007bff', '#dc3545', '#ffc107', '#28a745','#007bff', '#dc3545', '#ffc107', '#28a745','#007bff', '#dc3545', '#ffc107', '#28a745'],
        }],
    },
    });

</script>