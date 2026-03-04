<?php         



    date_default_timezone_set($this->session->userdata['time_zone']);



    $unread_messages = $this->db->where('message_read', 0)->from('messages')->count_all_results();

    $total_exams = $this->db->select('*')->from('exam_title')->count_all_results();

    $total_courses = $this->db->select('*')->from('courses')->count_all_results();

    $total_students = $this->db->where('user_role_id',5)->from('users')->count_all_results();



    $all_categories = $this->db->get('categories')->result();

    $active_category = count($this->db->get_where('categories', array('active' => 1))->result());

    $inactive_category = (count($all_categories) - $active_category);



    // Create the data table for EARNINGS.

    $data_earnings = "['Month', 'Earned'],";

    for ($i=0; $i < 6; $i++) { 

        $month_name = date('M', strtotime(-$i." month"));

        $month = date('m', strtotime(-$i." month"));



        $earned = $this->db->where("MONTH(pay_date)", $month)

                        ->select_sum('pay_amount')

                        ->get('payment_history')

                        ->row()->pay_amount;



         $earned = ($earned)?$earned:'0';



         $data_earnings .= "['".$month_name."',". $earned."],";

    }

    $data_earnings = substr($data_earnings, 0, -1);



    // Create the data table for EXAM.

    $data_exam = "['Category', 'Active', 'Inactive'],";

    

    foreach ($all_categories as $value) {

        $active_exams = $this->db->where('category_id', $value->category_id)

                        ->where("active", 1)

                        ->from('exam_title')

                        ->count_all_results();



        $inactive_exams = $this->db->where('category_id', $value->category_id)

                        ->where("active", 0)

                        ->from('exam_title')

                        ->count_all_results();



        $data_exam .= "['".$value->category_name."',". $active_exams.",". $inactive_exams."],";

    }

    $data_exam = substr($data_exam, 0, -1);





?>

<script type="text/javascript">



      // Load the Visualization API and the piechart package.

      google.load('visualization', '1.0', {'packages':['corechart']});



      // Set a callback to run when the Google Visualization API is loaded.

      google.setOnLoadCallback(drawChart);



      // Callback that creates and populates a data table,

      // instantiates the pie chart, passes in the data and

      // draws it.

      function drawChart() {



        // Create the data table for USER.

        var data1 = new google.visualization.DataTable();

        data1.addColumn('string', 'Topping');

        data1.addColumn('number', 'Slices');

        data1.addRows([

          ['Admin', <?=$total_admin;?>],

          ['Moderator', <?=$total_moderator;?>],

          ['Teacher', <?=$total_teacher;?>],

          ['Student', <?=$total_student;?>]

        ]);



        // Create the data table for CATEGORY.

        var data2 = new google.visualization.DataTable();

        data2.addColumn('string', 'Topping');

        data2.addColumn('number', 'Slices');

        data2.addRows([

          ['Active', <?=$active_category;?>],

          ['Inactive', <?=$inactive_category;?>]

        ]);



        // Create the data table for EARNING.

        var data3 = google.visualization.arrayToDataTable([

            <?php echo $data_earnings; ?>

          ]);



        // Create the data table for EXAM.

        var data4 = google.visualization.arrayToDataTable([

            <?php echo $data_exam; ?>

          ]);



        // Set chart options USER
        var options1 = {
            'width':'100%',
            'height':200,
            'chartArea': {width: '80%', height: '80%'},
            'legend': {position: 'right'},
            'colors': ['#FFC107', '#3498db', '#2ecc71', '#FFA000'],
            'backgroundColor': 'transparent'
        };

        // Set chart options EARNINGS
        var options3 = {
            'width':'100%',
            'height':200,
            'chartArea': {width: '75%', height: '75%'},
            vAxis: {title: 'Month', titleTextStyle: {color: '#666'}},
            hAxis: {title: 'Earned', titleTextStyle: {color: '#666'}},
            colors: ['#FFC107'],
            'backgroundColor': 'transparent',
            'legend': {position: 'none'}
        };

        // Set chart options EXAM
        var options4 = {
            'width':'100%',
            'height':400,
            'chartArea': {width: '80%', height: '80%'},
            hAxis: {title: 'Category', titleTextStyle: {color: '#666'}},
            vAxis: {title: 'Count', titleTextStyle: {color: '#666'}},
            colors: ['#2ecc71', '#e74c3c'],
            'backgroundColor': 'transparent',
            'legend': {position: 'top'}
        };



        // Instantiate and draw our chart, passing in some options.

        var chart1 = new google.visualization.PieChart(document.getElementById('chart_user'));

        chart1.draw(data1, options1);

        var chart2 = new google.visualization.PieChart(document.getElementById('chart_category'));

        chart2.draw(data2, options1);

         // Earnings chart hidden
         // var chart3 = new google.visualization.BarChart(document.getElementById('chart_earn'));
         // chart3.draw(data3, options3);

        var chart4 = new google.visualization.ColumnChart(document.getElementById('chart_exam'));

        chart4.draw(data4, options4);









      }





</script>

<style>
.dashboard-wrapper {
    padding: 12px 0;
}

.dashboard-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 10px;
    margin-bottom: 12px;
}

.stat-card {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    overflow: hidden;
    transition: all 0.3s ease;
    text-decoration: none;
    display: block;
    color: inherit;
    border-left: 4px solid;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 16px rgba(0,0,0,0.15);
    text-decoration: none;
    color: inherit;
}

.stat-card.stat-messages {
    border-left-color: #FFC107;
}

.stat-card.stat-students {
    border-left-color: #3498db;
}

.stat-card.stat-exams {
    border-left-color: #2ecc71;
}

.stat-card.stat-courses {
    border-left-color: #f39c12;
}

.stat-card-header {
    padding: 12px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.stat-card-body-mobile {
    display: none;
}

.stat-card-icon {
    width: 55px;
    height: 55px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    color: white;
    flex-shrink: 0;
}

.stat-card.stat-messages .stat-card-icon {
    background: linear-gradient(135deg, #FFD700 0%, #FFC107 100%);
}

.stat-card.stat-students .stat-card-icon {
    background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
}

.stat-card.stat-exams .stat-card-icon {
    background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
}

.stat-card.stat-courses .stat-card-icon {
    background: linear-gradient(135deg, #FFC107 0%, #FFA000 100%);
}

.stat-card-content {
    padding: 0 12px 12px 12px;
}

.stat-card-value {
    font-size: 28px;
    font-weight: 700;
    color: #2c3e50;
    margin: 6px 0 4px 0;
    line-height: 1;
}

.stat-card-label {
    font-size: 12px;
    color: #7f8c8d;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.charts-section {
    margin-top: 12px;
}

.charts-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 10px;
    margin-bottom: 12px;
}

.chart-card {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    overflow: hidden;
}

.chart-card-header {
    background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
    border-bottom: 3px solid #FFD700;
    color: white;
    padding: 10px 12px;
    font-size: 14px;
    font-weight: 600;
}

.chart-card-body {
    padding: 12px;
    min-height: 250px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.chart-card-full {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    overflow: hidden;
    margin-top: 20px;
}

.chart-card-full .chart-card-header {
    background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
    border-bottom: 3px solid #FFD700;
}

.chart-card-full .chart-card-body {
    padding: 12px;
    min-height: 350px;
}

#chart_user, #chart_category, #chart_exam {
    width: 100%;
    height: 100%;
}

@media (max-width: 767px) {
    .dashboard-wrapper {
        padding: 10px 0;
    }
    
    .dashboard-stats {
        grid-template-columns: 1fr;
        gap: 8px;
        margin-bottom: 10px;
    }
    
    .stat-card {
        display: flex;
        flex-direction: row;
        align-items: center;
        padding: 0;
    }
    
    .stat-card-header {
        padding: 10px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .stat-card-icon {
        width: 50px;
        height: 50px;
        font-size: 22px;
        margin: 0;
    }
    
    .stat-card-content {
        padding: 10px;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    
    .stat-card-value {
        font-size: 22px;
        margin: 0 0 3px 0;
        line-height: 1.2;
    }
    
    .stat-card-label {
        font-size: 10px;
        letter-spacing: 0.3px;
        margin: 0;
    }
    
    .charts-section {
        margin-top: 10px;
    }
    
    .charts-grid {
        grid-template-columns: 1fr;
        gap: 8px;
    }
    
    .chart-card-body {
        padding: 10px;
        min-height: 220px;
    }
    
    .chart-card-full .chart-card-body {
        padding: 10px;
        min-height: 280px;
    }
    
    .chart-card-header {
        padding: 8px 10px;
        font-size: 12px;
    }
}

/* Desktop Optimizations */
@media (min-width: 768px) {
    .dashboard-wrapper {
        padding: 12px 0;
    }
    
    .dashboard-stats {
        gap: 10px;
        margin-bottom: 12px;
    }
    
    .stat-card-header {
        padding: 12px;
    }
    
    .stat-card-icon {
        width: 55px;
        height: 55px;
        font-size: 24px;
    }
    
    .stat-card-content {
        padding: 0 12px 12px 12px;
    }
    
    .stat-card-value {
        font-size: 28px;
        margin: 6px 0 4px 0;
    }
    
    .stat-card-label {
        font-size: 12px;
    }
    
    .charts-section {
        margin-top: 12px;
    }
    
    .charts-grid {
        gap: 10px;
        margin-bottom: 12px;
    }
    
    .chart-card-header {
        padding: 10px 12px;
        font-size: 14px;
    }
    
    .chart-card-body {
        padding: 12px;
        min-height: 250px;
    }
    
    .chart-card-full .chart-card-body {
        padding: 12px;
        min-height: 350px;
    }
}
</style>

<div id="note">
    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
    <?=(isset($message)) ? $message : ''; ?>
</div>

<div class="dashboard-wrapper">
    <div class="dashboard-stats">
        <a href="<?= base_url('message_control'); ?>" class="stat-card stat-messages">
            <div class="stat-card-header">
                <div class="stat-card-icon">
                    <i class="fa fa-envelope-o"></i>
                </div>
            </div>
            <div class="stat-card-content">
                <div class="stat-card-value"><?= $unread_messages; ?></div>
                <div class="stat-card-label">Unread Messages</div>
            </div>
        </a>

        <a href="<?= base_url('user_control'); ?>" class="stat-card stat-students">
            <div class="stat-card-header">
                <div class="stat-card-icon">
                    <i class="fa fa-group"></i>
                </div>
            </div>
            <div class="stat-card-content">
                <div class="stat-card-value"><?= $total_students; ?></div>
                <div class="stat-card-label">Total Students</div>
            </div>
        </a>

        <a href="<?= base_url('mocks/mock_test'); ?>" class="stat-card stat-exams">
            <div class="stat-card-header">
                <div class="stat-card-icon">
                    <i class="fa fa-puzzle-piece"></i>
                </div>
            </div>
            <div class="stat-card-content">
                <div class="stat-card-value"><?= $total_exams; ?></div>
                <div class="stat-card-label">Total Exams</div>
            </div>
        </a>

        <a href="<?= base_url('exam_control/view_results'); ?>" class="stat-card stat-courses">
            <div class="stat-card-header">
                <div class="stat-card-icon">
                    <i class="fa fa-bookmark-o"></i>
                </div>
            </div>
            <div class="stat-card-content">
                <div class="stat-card-value"><?= $total_courses; ?></div>
                <div class="stat-card-label">Total Courses</div>
            </div>
        </a>
    </div>

    <div class="charts-section">
        <div class="charts-grid">
            <div class="chart-card">
                <div class="chart-card-header">Active Users</div>
                <div class="chart-card-body">
                    <div id="chart_user"></div>
                </div>
            </div>

            <div class="chart-card">
                <div class="chart-card-header">Total Categories</div>
                <div class="chart-card-body">
                    <div id="chart_category"></div>
                </div>
            </div>

        </div>

        <div class="chart-card-full">
            <div class="chart-card-header">Total Exams Based on Category</div>
            <div class="chart-card-body">
                <div id="chart_exam"></div>
            </div>
        </div>
    </div>
</div>