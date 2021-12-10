<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8' />
    <title>To do list</title>
    <link href='./assets/lib/main.css' rel='stylesheet' />
    <script src='./assets/lib/main.js'></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            margin: 40px 10px;
            padding: 0;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
        }

        #loading {
            display: none;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        #calendar {
            max-width: 1100px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div id="main">
    <div class="container-fluid">
         <div class="row">
             <div class="col-md-4">
                 <div class="top-table">
                     <button id="btn-add" class="btn btn-primary" type="button">Add To Do</button>
                 </div>
                 <?php require_once('table_data.php') ?>
             </div>
             <div class="col-md-8">
                 <div id='loading'>loading...</div>
                 <div id='calendar'></div>
             </div>
         </div>
    </div>
</div>
<!-- Modal Add item-->
<?php require_once('modal/modal_add_item.php') ?>
<!-- Modal Edit item-->
<?php if(!empty($_SESSION['todo'])): ?>
<?php require_once('modal/modal_edit_item.php') ?>
<?php endif;?>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let todos = <?=  !empty($data['todos']) ? json_encode($data['todos']) : '" "' ?>;
        let todoData = [];
        for (let [index, todo] of Object.entries(todos)) {
            let color = "";
            switch(todo['status']) {
                case "1":
                    color = "#17a2b8";
                    break;
                case "2":
                    color = "#28a745";
                    break;
                case "3":
                    color = "#ffc107";
                    break;
            }
            todoData.push({
                id : todo['id'],
                title : todo['task_name'],
                start : todo['start_date'],
                end: todo['end_date'],
                color : color
            });
        }

        // fake data
        // todoData = [
        //     {
        //       // this object will be "parsed" into an Event Object
        //         title: 'The Title', // a property!
        //         start: '2018-09-01', // a property!
        //         end: '2018-09-02',
        //         color: 'ffc107'
        //     }
        // ];

        let calendarEl = document.getElementById('calendar');
        let calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,dayGridWeek,dayGridDay'
            },
            events: todoData
        });
        calendar.render();

        $('#btn-add').on('click', function (){
            $('#addModal').modal('show');
        });

        $('.fa-edit').on('click', function (e){
          let data_id = $(this).closest('td').data('id')
          window.location.href = 'index.php?controller=ToDo&action=update&id='+data_id;
        })
        let todo = <?= !empty($_SESSION['todo']) ? 'true' : 'false'?>;
        if (todo){
            $('#editModal').modal('show');
        }
    });

    window.onload = function (){
        <?php unset($_SESSION['todo']) ?>
    }

</script>
</html>