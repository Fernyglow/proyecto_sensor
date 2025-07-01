        <?php include 'index.php' ?>
        
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12">
						<div class="filter cm-content-box box-primary">
							<div class="content-title">
								<div class="cpa">
									<i class="fas fa-filter me-2"></i>Filter
								</div>
								<div class="tools">
									<a href="javascript:void(0);" class="expand SlideToolHeader"><i class="fas fa-angle-up"></i></a>
								</div>
							</div>
							<div class="cm-content-body form excerpt">
									<div class="card-body">
										<form>
											<div class="table-responsive filter-content">
												<table class="table table-bordered">
													<thead>
														<tr>
															<th>
																<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title">
															</th>
															<th class="Cms-selecter">
															<select id="single-select" >
																<option selected>Select Status</option>
																<option value="1">Published</option>
																<option value="2">Draft</option>
																<option value="3">Trash</option>
																<option value="4">Private</option>
																<option value="5">Pending</option>
															</select>
															</th>
															<th>
																<input type="date"  name="datepicker" class=" form-control" >
																	
															</th>
															<th>
																<button class="btn btn-info" title="Click here to Search" type="submit"><i class="fa fa-search me-1"></i>Filter</button>
																<button class="btn btn-danger " title="Click here to remove filter" type="submit">Remove Filter</button>
															</th>
														</tr>
													</thead>
												</table>
											</div>
										</form>
									</div>
								
							</div>
						</div>
						<div class="mb-3">
							<a href="content-add.html" class="btn btn-primary">Add Content</a>
						</div>
						<div class="filter cm-content-box box-primary mt-5">
							<div class="content-title">
								<div class="cpa">
									<i class="fas fa-file-word me-2"></i>Contact List
								</div>
								<div class="tools">
									<a href="javascript:void(0);" class="expand SlideToolHeader"><i class="fas fa-angle-up"></i></a>
								</div>
							</div>
							<div class="cm-content-body form excerpt">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered table-responsive-lg table-striped table-condensed flip-content">
											<thead>
												<tr>
													<th>S.No</th>
													<th>Title</th>
													<th>Status</th>
													<th>Modified</th>
													<th>Actions</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>Privacy Policy</td>
													<td>Published</td>
													<td>18 Feb, 2015</td>
													<td>
														<a href="javascript:void(0);" class="btn btn-secondary btn-sm content-icon">
															<i class="fa fa-edit"></i>
														</a>
														<a href="javascript:void(0);" class="btn btn-danger btn-sm content-icon">
															 <i class="fa fa-times"></i>
														</a>
													</td>
												</tr>
												<tr>
													<td>2</td>
													<td>Contact Us</td>
													<td>Published</td>
													<td>13 Jan, 2015</td>
													<td>
														<a href="javascript:void(0);" class="btn btn-secondary btn-sm content-icon">
															<i class="fa fa-edit"></i>
														</a>
														<a href="javascript:void(0);" class="btn btn-danger btn-sm content-icon">
															 <i class="fa fa-times"></i>
														</a>
													</td>
												</tr>
											</tbody>
										</table>
										<div class="d-flex align-items-center justify-content-lg-between flex-wrap justify-content-center">
											<span class="mb-2 mb-xl-0 me-3">Page 1 of 4, showing 2 records out of 8 total, starting on record 1, ending on 2</span>
											<nav aria-label="Page navigation example">
											  <ul class="pagination mb-2 mb-xl-0">
												<li class="page-item"><a class="page-link" href="#">Previous</a></li>
												<li class="page-item"><a class="page-link" href="#">1</a></li>
												<li class="page-item"><a class="page-link" href="#">2</a></li>
												<li class="page-item"><a class="page-link" href="#">3</a></li>
												<li class="page-item"><a class="page-link " href="#">Next</a></li>
											  </ul>
											</nav>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>