
<style> 
    #fuck{
        padding-top: 90px;
    }
</style>

<div class="container" id="fuck">
<!-- Card -->
<div class="card card-cascade wider">

  <!-- Card image -->
  <div class="view view-cascade gradient-card-header peach-gradient">

    <!-- Title -->
    <h2 class="card-header-title mb-3">Notifications</h2>
    <!-- Text -->
    <p class="mb-0"><i class="fa fa-calendar mr-2"></i>05.10.2018</p>

  </div>

  <!-- Card content -->
  <div class="card-body card-body-cascade text-center">

    <table class="table table-hover">    
    <tbody>    
	    <?php
            foreach ($notifies as $notify){                
                $new = ($notify['seen'] == false) ? '<span class="badge badge-danger mb-2">new</span>' : '';
                echo '<tr>';
                echo '<td>';
                echo $new.' <a href="'.site_url('notify/check/'.$notify['id']).'">'.$notify['content'].' </a>';
                echo '</td>';
                echo '<td>';
                echo ago($notify['time']);
                echo '</td>';
                echo '</tr>';
            }
		?>       
    </tbody>
  </table>

  </div>
  <!-- Card content -->

</div>

</div>