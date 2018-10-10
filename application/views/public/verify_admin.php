<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php  echo base_url().'/themes/SA.png'; ?>" />
    <title>Verify control</title>

    <link href="assets/beauty/profile/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->    
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    <style>
        img{
            max-height: 300px;
        }
    </style>
  </head>
  <body>

<div class="container">
	<h3 class="mt-4 mb-3">Verify table</h3>
	<table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>User</th>
        <th>Type</th>
        <th>Content</th>
        <th>Status</th>
        <th>Accept</th>
        <th>Deny </th>
      </tr>
    </thead>
    <tbody>    
	    <?php
            if (count($all) > 0){
                $dir = '../assets/images/uploads/users/';
                $map = [
                    'student card' => 'scard', 
                    'driver card' => 'dcard',
                    'cmnd card' => 'cmnd',
                    'student email' => ''                    
                ];                
                foreach ($all as $one) {				
                    $path = $dir.'/'.$map[$one['type']].'/'.$one['content'];
                    echo '<tr>';								
                    echo '<td> '.$one['id'].' </td>';
                    echo '<td> <a href="'.site_url('user/'.$one['from_user']).'">'.$one['from_user'].' </td>';			
                    echo '<td> '.$one['type'].' </td>';			
                    if ($one['type'] == 'student email'){
                        echo '<td> '.$one['content'].'</td>';
                    }
                    else{
                        echo '<td> <img src="'.$path.'" > </td>';			
                    }
                    echo '<td> '.$one['status'].' </td>';
                    if ($one['status'] != 'OK'){		
                        echo '<td> <a href="'.site_url('verify/accept/'.$one['id']).'">Accept</td>';	
                        echo '<td> <a href="'.site_url('verify/deny/'.$one['id']).'">Deny</td>';	
                    }
                    echo '</tr>';
                }
            }
		?>       
    </tbody>
  </table>
</div>
</body>
</html>