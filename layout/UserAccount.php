<?php
include 'temp/ini.php';
include $userActionPath;
include $categoryActionPath;
session_start();
include 'temp/userHeader.php';

?>
 <!-- cards -->
    <section class="mt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row pt-md-5 mt-md-3 mb-5">
			<!--Store -->
              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fa fa-line-chart fa-3x text-danger"></i>
                      <div class="text-right text-secondary">
                        <h5>Chart</h5>
                        <h6>0</h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-secondary">
                    <i class="fa fa-refresh mr-3"></i>
                    <span>Updated Now</span>
                  </div>
                </div>
              </div>
				<!--end store card -->
				<!--likes -->
              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fa fa-thumbs-up fa-3x" style="color: #7fc99f!important"></i>
                      <div class="text-right text-secondary">
                        <h5>Likes</h5>
                        <h6>0</h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-secondary">
                    <i class="fa fa-refresh mr-3"></i>
                    <span>Updated Now</span>
                  </div>
                </div>
              </div>
				<!--end likes-->
				<!--sales-->
              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fa fa-shopping-cart fa-3x text-warning"></i>
                      <div class="text-right text-secondary">
                        <h5>Sales</h5>
                        <h6>0</h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-secondary">
                    <i class="fa fa-refresh mr-3"></i>
                    <span>Updated Now</span>
                  </div>
                </div>
              </div>
				<!--end sales-->
                <!--Visitors-->
              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fa fa-users fa-3x basal-color"></i>
                      <div class="text-right text-secondary">
                        <h5>Visitors</h5>
                        <h6>0</h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-secondary">
                    <i class="fa fa-refresh mr-3"></i>
                    <span>Updated Now</span>
                  </div>
                </div>
              </div>
			<!--Visitors-->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end of cards -->