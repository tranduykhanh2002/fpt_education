<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= $totalProduct ?></h3>

                <p>Số lượng sản phẩm</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= number_format($totalProfit, 0, ',', ',') ?>đ</h3>
                <p>Tổng doanh thu</p>
            </div>
            <div class="icon">
                <i class="fas fa-money-bill-wave"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $totalCustomer ?></h3>
                <p>Khách hàng</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-injured"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Thống kê</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <select class="custom-select col-2" id="select-day">
                        <option value="" selected>Lọc theo</option>
                        <option value="7days">7 ngày qua</option>
                        <option value="28days">28 ngày qua</option>
                        <option value="90days">90 ngày qua</option>
                        <option value="365days">365 ngày qua</option>
                    </select>
                    <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 444px;" width="666" height="375" class="chartjs-render-monitor"></canvas>
                    <i class="d-flex justify-content-center"><br>Thống kê doanh thu và số lượt đặt hàng</i>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

<!-- Script thống kê -->
<script>
    // biểu đồ
    $(document).ready(function() {
        showGraph();
        //xử lý thời gian
        $('#select-day').change(function() {
            var selectDay = $(this).val();
            console.log(selectDay);
            $.ajax({
                url: "statistics",
                method: "POST",
                dataType: "JSON",
                data: {
                    day: selectDay,
                },
                success: function(data) {
                    var labels = [];
                    var revenues = [];
                    var quantitys = [];
                    var orders = [];
                    for (var i in data) {
                        // console.log(data);
                        labels.push(data[i].order_date);
                        revenues.push(data[i].revenue);
                        quantitys.push(data[i].quantity);
                        orders.push(data[i].order);
                    }
                    var ctx = document.getElementById("areaChart").getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [{
                                    label: 'Doanh thu (đ)', // Name the series
                                    data: revenues,
                                    fill: true,
                                    borderColor: '#2196f3', // Add custom color border (Line)
                                    backgroundColor: '#2196f3', // Add custom color background (Points and Fill)
                                    borderWidth: 1 // Specify bar border width
                                },
                                {
                                    label: 'Số lượt đặt hàng', // Name the series
                                    data: orders,
                                    fill: true,
                                    borderColor: '#ffa400', // Add custom color border (Line)
                                    backgroundColor: '#ffa400', // Add custom color background (Points and Fill)
                                    borderWidth: 1 // Specify bar border width
                                }
                            ]
                        },
                        options: {
                            responsive: true, // Instruct chart js to respond nicely.
                            maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
                        }
                    });
                }
            });

        });
    });


    function showGraph() {
        $.post("statistics",
            function(data) {
                var labels = [];
                var revenues = [];
                var quantitys = [];
                var orders = [];
                for (var i in data) {
                    // console.log(data);
                    labels.push(data[i].order_date);
                    revenues.push(data[i].revenue);
                    quantitys.push(data[i].quantity);
                    orders.push(data[i].order);
                }
                var ctx = document.getElementById("areaChart").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                                label: 'Doanh thu (đ)', // Name the series
                                data: revenues,
                                fill: true,
                                borderColor: '#2196f3', // Add custom color border (Line)
                                backgroundColor: '#2196f3', // Add custom color background (Points and Fill)
                                borderWidth: 1 // Specify bar border width
                            },
                            {
                                label: 'Số lượt đặt hàng', // Name the series
                                data: orders,
                                fill: true,
                                borderColor: '#ffa400', // Add custom color border (Line)
                                backgroundColor: '#ffa400', // Add custom color background (Points and Fill)
                                borderWidth: 1 // Specify bar border width
                            }
                        ]
                    },
                    options: {
                        responsive: true, // Instruct chart js to respond nicely.
                        maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
                    }
                });
            });
    }
</script>