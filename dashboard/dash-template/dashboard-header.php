<?php
    #IF TINATRY I ACCESS ANG SPECIFIC ADDRESS NA ITO, BABALIK SA MENU NILA
    if (basename("dashboard/dash-template/dashboard-header.php") == basename($_SERVER["SCRIPT_FILENAME"])){
        if($role == 'admin'){
            header("Location: ../Dashboard.php");
        }
        elseif($role == 'doctor'){
            header("Location: ../dashboard-doc.php");
        }
        else{
            header("Location: ../../index.php");
        }
    }
?>

<div class="right-nav">
    <div class="header">
        <table>
            <tr>
                <td><h2 style="margin-top: 0; margin-bottom: 0; padding-right: 60%;">Dashboard</h2></td>
                <td>
                    <div>
                        <img src="../img/gen/web-logo.png" class="web-logo">
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="navigation">
        <table>
            <tr>
                <td><a href="#doctor" onclick="showContent('doctor')"><b>Doctor</b></a></td>
                <td>&nbsp;</td>
                <td><a href="#reports" onclick="showContent('reports')"><b>Reports</b></a></td>
                <td>&nbsp;</td>
                <td><a href="#calendar" onclick="showContent('calendar')"><b>Calendar</b></a></td>
            </tr>
        </table>
    </div>
    <div class="content" id="content">
        <!-- Content for the selected page will be loaded here -->
    </div>
</div>