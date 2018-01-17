<body class="login-bg">
<div class="header">
    <div class="container">
        <div class="row">
           <div class="col-md-12">
              <!-- Logo -->
              <div class="logo">
                 <h1><a href="index.html">Be Celebrity !</a></h1>
              </div>
           </div>
        </div>
    </div>
</div>

<div class="page-content">
	<div class="row">
	  	<div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li><a href="index.html"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                    <!-- <li class="current"><a href="forms.html"><i class="glyphicon glyphicon-tasks"></i> Subscriptions</a></li> -->
                    <li class="submenu">
                         <a href="/register">
                            <i class="glyphicon glyphicon-list"></i> Subscriptions
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            <li><a href="login.html">Plans</a></li>
                            <li><a href="signup.html">Reports</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                         <a href="/register">
                            <i class="glyphicon glyphicon-list"></i> Profiles
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            <li><a href="login.html">Add New</a></li>
                            <li><a href="signup.html">Signup</a></li>
                        </ul>
                    </li>
                </ul>
             </div>
	  	</div>
	  	<div class="col-md-10">
			<div class="row">
				<div class="col-md-12 panel-info">
					<div class="content-box-header panel-heading">
						<div class="panel-title ">Registration &raquo;</div>
					
						<div class="panel-options">
							<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
							<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
						</div>
					</div>

					<div class="content-box-large box-with-header">
						<div>
							<form action="">
								<fieldset>

									<div class="row">
										<div class="form-group">
											<div class="col-sm-6">
												<label>First Name</label>
												<input type="text" name="first_name" class="form-control" placeholder="">
											</div>
											<div class="col-sm-3">
												<label>Middle Name</label>
												<input type="text" name="middle_name" class="form-control" placeholder="">
											</div>
											<div class="col-sm-3">
												<label>Last Name</label>
												<input type="text" name="last_name" class="form-control" placeholder="">
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="form-group">
											<div class="col-sm-3">
												<label for="h-input">Date masking</label>
												<div class="input-group">
													<input type="text" class="form-control mask-date" data-mask="99/99/9999" data-mask-placeholder="-">
													<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
												</div>
												<p class="note">
													Data format **/**/****
												</p>
											</div>
											<div class="col-sm-3">
												<label>Gender</label>
												<select class="form-control" name="gender">
													<option>Male</option>
													<option>Female</option>
												</select>
											</div>
											<div class="col-sm-3">
												<label>State</label>
												<select class="form-control" name="state">
													<option>Kerala</option>
													<option>Tamilnadu</option>
												</select>
											</div>
											<div class="col-sm-3">
												<label>City</label>
												<input type="text" name="city" class="form-control" placeholder="">
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="form-group">
											<div class="col-sm-12">
												<label>Address</label>
												<textarea class="form-control" placeholder="Textarea" rows="3"></textarea>
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="form-group">
											<div class="col-sm-4">
												<label>Mobile</label>
												<input type="text" name="dob" class="form-control" placeholder="">
											</div>
											<div class="col-sm-4">
												<label>Phone</label>
												<input type="text" name="gender" class="form-control" placeholder="">
											</div>
											<div class="col-sm-4">
												<label>Email</label>
												<input type="text" name="state" class="form-control" placeholder="">
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="form-group">
											<div class="col-sm-4">
												<label>Talet Category</label>
												<select multiple="multiple" name="talent_category" id="talent-category" class="form-control custom-scroll" title="Click to Select a Category">
												<?php
												if(!empty($a_settings)){
													foreach ($a_settings as $key => $talent_cat) {
														foreach ($talent_cat as $setting_key => $setting_value) {
															// echo "<option value=''>".."</option>";
														}
													}
												}
												?>
												</select>
											</div>
											<div class="col-sm-4">
												<label>Description</label>
												<textarea class="form-control" placeholder="Description" rows="3"></textarea>
											</div>
											<div class="col-sm-4">
												<label>Tags</label>
												<div>
							  						<div id="tags"></div>
							  					</div>
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="form-group">
											<div class="col-sm-4">
												<label class="control-label">File input</label>
													<input type="file" class="btn btn-default" id="exampleInputFile1" name="photos">
													<p class="help-block">
														You can upload 3 phots.
													</p>
											</div>
											<div class="col-sm-8">
												<label>Embedded Videos</label>
												<input type="text" name="videos" class="form-control" placeholder="https://youtu.be/YicuKTFPxX0">
											</div>
										</div>
									</div>
									<hr>
								</fieldset>
								<div>
									<div class="btn btn-primary">
										<i class="fa fa-save"></i>
										Submit
									</div>
								</div>
							</form>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>