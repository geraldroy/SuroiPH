<nav>
	
     <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                <i class="fas fa-tachometer-alt"></i>
                <span class="d-none d-md-inline-block"> Dashboard</span>
            </a>

            @if ($userType == "admin") 
                <a class="nav-item nav-link" id="nav-location-tab" data-toggle="tab" href="#nav-locations" role="tab" aria-controls="nav-locations" aria-selected="false">
                    <i class="fas fa-map-marked-alt"></i>
                    <span class="d-none d-md-inline-block"> Locations</span>
                </a>

                <a class="nav-item nav-link" id="nav-tags-tab" data-toggle="tab" href="#nav-tags" role="tab" aria-controls="nav-tags" aria-selected="false">
                    <i class="fas fa-tags"></i>
                    <span class="d-none d-md-inline-block"> Tags</span>
                </a>

                <a class="nav-item nav-link" id="nav-agencies-tab" data-toggle="tab" href="#nav-agencies" role="tab" aria-controls="nav-agencies" aria-selected="false">
                    <i class="fas fa-luggage-cart"></i>
                    <span class="d-none d-md-inline-block"> Agencies</span>
                </a>
            @endif


            @if ($userType == "agency")
                 <a class="nav-item nav-link" id="nav-packages-tab" data-toggle="tab" href="#nav-packages" role="tab" aria-controls="nav-packages" aria-selected="true">
                    <i class="fas fa-box"></i>
                    <span class="d-none d-md-inline-block"> Packages</span>
                </a>
                <a class="nav-item nav-link" id="nav-orders-tab" data-toggle="tab" href="#nav-orders" role="tab" aria-controls="nav-orders" aria-selected="false">
                    <i class="fas fa-tags"></i>
                    <span class="d-none d-md-inline-block"> Orders</span>
                </a>

                <a class="nav-item nav-link" id="nav-reports-tab" data-toggle="tab" href="#nav-reports" role="tab" aria-controls="nav-reports" aria-selected="false">
                    <i class="fas fa-list-alt"></i>
                    <span class="d-none d-md-inline-block"> Reports</span>
                </a>
                
              
               <a class="nav-item nav-link" id="nav-promotions-tab" data-toggle="tab" href="#nav-promotions" role="tab" aria-controls="nav-promotions" aria-selected="false">
                     <i class="fas fa-newspaper"></i>

                    <span class="d-none d-md-inline-block"> Promotions</span>
                </a>
            @endif   
          

            @if ($userType != "customer")
                <a class="nav-item nav-link" id="nav-customer-tab" data-toggle="tab" href="#nav-customers" role="tab" aria-controls="nav-customers" aria-selected="false">
                    <i class="fas fa-user-tag"></i>
                    <span class="d-none d-md-inline-block"> Customers</span>
                </a>
            @else
                <a class="nav-item nav-link" id="nav-history-tab" data-toggle="tab" href="#nav-history" role="tab" aria-controls="nav-history" aria-selected="false">
                    <i class="fas fa-history"></i>
                    <span class="d-none d-md-inline-block"> History</span>
                </a>

               <a class="nav-item nav-link" id="nav-reviews-tab" data-toggle="tab" href="#nav-reviews" role="tab" aria-controls="nav-reviews" aria-selected="false">
                    <i class="fas fa-star"></i>
                    <span class="d-none d-md-inline-block"> Reviews</span>
                </a>

                 <a class="nav-item nav-link" id="nav-settings-tab" data-toggle="tab" href="#nav-settings" role="tab" aria-controls="nav-settings" aria-selected="false">
                    <i class="fas fa-cog"></i>
                    <span class="d-none d-md-inline-block"> Settings</span>
                </a>
            @endif
      </div>
</nav>