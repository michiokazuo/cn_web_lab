<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Time Validation</title>
    </head>
    <body>
        <font>Enter your name and select date and time for the appointment</font>
        <br>
        <br>
        <form method="GET">
            <table>
                <tr>
                    <td>Your name:</td>
                    <td colspan="3"><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td>Date:</td>
                    <td><select name="day">
                        <?php
                        for($i = 1; $i <= 31; $i++) {
                            print("<option>$i</option>");
                        }
                        ?>
                        </select>
                    <td><select name="month">
                        <?php
                        for($i = 1; $i <= 12; $i++) {
                            print("<option>$i</option>");
                        }
                        ?>
                        </select>
                    <td><select name="year">
                        <?php
                        for($i = 1000; $i <= 3000; $i++) {
                            print("<option>$i</option>");
                        }
                        ?>
                        </select>
                </tr>
                <tr>
                    <td>Time:</td>
                    <td><select name="hour">
                        <?php
                        for($i = 0; $i <= 23; $i++) {
                            print("<option>$i</option>");
                        }
                        ?>
                        </select>
                    <td><select name="minute">
                        <?php
                        for($i = 0; $i <= 59; $i++) {
                            print("<option>$i</option>");
                        }
                        ?>
                        </select>
                    <td><select name="sec">
                        <?php
                        for($i = 0; $i <= 59; $i++) {
                            print("<option>$i</option>");
                        }
                        ?>
                        </select>
                </tr>
                <tr>
                    <td align="right"><input type="submit" value="Submit"></td>
                    <td align="left" colspan="3"><input type="reset" value="Reset"></td>
                </tr>
            </table>
        </form>
        <br>
        <?php
        if(array_key_exists("name", $_GET)) {
            $name = $_GET["name"];
            $day = $_GET["day"];
            $month = $_GET["month"];
            $year = $_GET["year"];
            $hour = $_GET["hour"];
            $minute = $_GET["minute"];
            $sec = $_GET["sec"];
            print("<br>Hi $name!<br>");
            print("You have choose to have an appointment on $hour:$minute:$sec, $day/$month/$year<br>");
            print("<br>More information<br>");
            if($hour > 12) {
                $period = "PM";
                $hour -= 12;
            } else {
                $period = "AM";
            }
            print("<br>In 12 hours, time and date is $hour:$minute:$sec $period, $day/$month/$year<br>");
            switch ($month) {
                case 4: $dom = 30; break;
                case 6: $dom = 30; break;
                case 9: $dom = 30; break;
                case 11: $dom = 30; break;
                case 2: 
                    if(($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0)) {
                        $dom = 29;
                    } else {
                        $dom = 28;
                    }
                    break;
                default : $dom = 31;
            }
            print("<br>This month has $dom days!");
        }
        ?>
    </body>
</html>
