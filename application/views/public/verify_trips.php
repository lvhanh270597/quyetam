
<style>
    #fuck_image{        
        height: 300px;
        width: 100%;
    }
</style>

<!-- Card -->
<div class="container">        
        <?php
        $i = 2;
        foreach ($trips as $trip){
            if ($i == 2){
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
                    <h4 class="card-title">Xác thực chuyến đi</h4>
                    <!-- Text -->
                    <p class="card-text">Xin xác thực chuyến đi <a href="'.site_url('trip/detail/'.$trip['id']).'"> này </a> có thành công không?</p>
                    <!-- Button -->
                    <a href="'.site_url('verify/yes/'.$trip['id']).'" class="btn btn-primary">Có</a>
                    <a href="'.site_url('verify/no/'.$trip['id']).'" class="btn btn-primary">Không</a>
                </div>                
            </div>
        </div>
    <!-- Card -->';
            
            $i--;
            if ($i == 0){
                echo '</div>';
                $i = 2;
            }                         
        }
        if ($i == 1){
            echo '</div>';
        }

        if (count($trips) > 0){
            echo '<div class="fuckfuck">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Hiện không có chuyến đi nào cần xác thực</h1>                        
                    </div>                 
                </div>
            </div>
            <div class="fuckfuck">
            </div>
            ';
        }
        ?>
</div>