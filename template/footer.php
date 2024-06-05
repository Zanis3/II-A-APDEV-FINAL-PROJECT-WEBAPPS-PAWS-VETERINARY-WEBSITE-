<?php
    #IF TINATRY I ACCESS ANG SPECIFIC ADDRESS NA ITO, BABALIK SA MENU NILA
    if (basename("template/footer.php") == basename($_SERVER["SCRIPT_FILENAME"])){
        if($role == 'admin'){
            header("Location: ../dashboard/Dashboard.php");
        }
        elseif($role == 'doctor'){
            header("Location: ../dashboard/dashboard-doc.php");
        }
        else{
            header("Location: ../index.php");
        }
    }
?>

<div class="footer">
    <p>© <?php echo date('Y');?> Paws Veterinary Clinic. All rights reserved.</p>
    <p>Contact: pawsvetclinic@gmail.com</p>
</div>