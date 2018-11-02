
<style>
    #fuck_image{        
        height: 300px;
        width: 100%;
    }
</style>

<!-- Card -->
<div class="container">    
        <?php
        $i = 0;
        foreach ($trips as $trip){
            if ($i % 2 == 0){
                echo '<div class="row">';
            }                        
            $place = $this->place_ml->get_by_primary($trip['finish_to']);                                    
            echo '<div class="col-md-6">';
            echo '<div class="card">

                <!-- Card image -->
                <div class="view overlay">
                    <img src="'.base_url('assets/images/uploads/places/'.$place['id'].'/'.$place['image']).'" class="img-fluid" alt="" id="fuck_image">
                    <a href="#!">
                    <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                <!-- Card content -->
                <div class="card-body">

                    <!-- Title -->
                    <h4 class="card-title">Card title</h4>
                    <!-- Text -->
                    <p class="card-text">Xin xác thực chuyến đi <a href=""> này </a> có thành công không?</p>
                    <!-- Button -->
                    <a href="'.site_url('verify/yes/'.$trip['id']).'" class="btn btn-primary">Có</a>
                    <a href="'.site_url('verify/no/'.$trip['id']).'" class="btn btn-primary">Không</a>
                </div>                
            </div>
        </div>
    <!-- Card -->';
                    
            if ($i % 2 == 1){
                echo '</div>';
            }             
            
            $i++;
        }
        ?>
</div>