<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel and Vue Resource Management</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

            .wrapper{
                width: 90%;
                margin: 10px auto;
            }

            .row-col {
                display: flex;
            }

            .col-2{
                width: 50%;
                padding: 20px;
            }

            .sub_content_wrapper{
                border: 3px solid rgb(238, 230, 230);
                width: 95%;
                margin: auto;
            }

            ul li{
                list-style-type: none;
            }

            .btn{
                background-color: rgba(51, 51, 51, 0.05);
                border-radius: 8px;
                border-width: 0;
                color: #333333;
                cursor: pointer;
                display: inline-block;
                font-family: "Haas Grot Text R Web", "Helvetica Neue", Helvetica, Arial, sans-serif;
                font-size: 14px;
                font-weight: 500;
                line-height: 20px;
                list-style: none;
                margin: 0;
                padding: 10px 12px;
                text-align: center;
                transition: all 200ms;
                vertical-align: baseline;
                white-space: nowrap;
                user-select: none;
                -webkit-user-select: none;
                touch-action: manipulation;

            }

            .btn:hover{
                background: rgb(221, 216, 216);
            }

            .btn-active{
                background:  rgb(218, 245, 221);
            }

            a{
                text-decoration: none;
            }

            .top_nav ul li{
                display: inline-flex;
                margin: 5px;
            }

            .page-title{
                margin-left: 47px;
            }


            .table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

.table td, .table th {
  border: 1px solid #ddd;
  padding: 8px;
}

.table tr:nth-child(even){background-color: #f2f2f2;}

.table tr:hover {background-color: #ddd;}

.table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}


/*FOrm design */

* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}

.right{
    float: right;
}

.success_alert{
  padding: 10px;
  background: green;
  border-radius: 8px;
  color: #fff;
  font-weight: bold;
  margin: 8px;
}

button{
  margin: 3px;
}

        </style>
    </head>
    <body class="antialiased">
        <div class="wrapper">
            <div id="app">
                <div class="">
                    <app-component/>
                </div>
            </div>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
