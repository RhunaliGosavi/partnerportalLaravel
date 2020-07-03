<!-- BEGIN: Left Aside -->
<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
	<i class="la la-close"></i>
</button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">

	<!-- BEGIN: Aside Menu -->
	<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
		<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
			<li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
				<a href="#" class="m-menu__link ">
					<i class="m-menu__link-icon flaticon-line-graph"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">Dashboard</span>
						</span>
					</span>
				</a>
			</li>
			<li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
				<a href="{{url('users')}}" class="m-menu__link ">
					<i class="m-menu__link-icon flaticon-user-settings"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">Users</span>
						</span>
					</span>
				</a>
			</li>
			<li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
				<a href="{{url('employee-dashboard')}}" class="m-menu__link ">
					<i class="m-menu__link-icon flaticon-user-settings"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">Employee Dashboard</span>
						</span>
					</span>
				</a>
			</li>
			<li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
				<a href="{{url('employee-helpdesk')}}" class="m-menu__link ">
					<i class="m-menu__link-icon flaticon-user-settings"></i>
					<span class="m-menu__link-title">
						<span git class="m-menu__link-wrap">
							<span class="m-menu__link-text">Employee Helpdesk</span>
							</span>
					</span>
				</a>
			</li>
			<li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
				<a href="{{url('links')}}" class="m-menu__link ">
					<i class="m-menu__link-icon flaticon-user-settings"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">Important Links</span>
						</span>
					</span>
				</a>
			</li>
			<li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
				<a href="{{url('referFriendRequests')}}" class="m-menu__link ">
					<i class="m-menu__link-icon flaticon-user-settings"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">Refer Friend Requests</span>
						</span>
					</span>
				</a>
			</li>
			<li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
				<a href="{{url('applyNowRequests')}}" class="m-menu__link ">
					<i class="m-menu__link-icon flaticon-user-settings"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">Apply Now Requests</span>
							</span>
					</span>
				</a>
			</li>
			<!-- <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
				<a href="{{url('salesProduct')}}" class="m-menu__link ">
					<i class="m-menu__link-icon flaticon-user-settings"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">Sales Kit Product</span>
						</span>
					</span>
				</a>
			</li> -->
			<li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
				<a href="{{url('loanProduct')}}" class="m-menu__link ">
					<i class="m-menu__link-icon flaticon-user-settings"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">Loan Product</span>
						</span>
					</span>
				</a>
			</li>
			<li class="m-menu__item  m-menu__item--active" aria-haspopup="true" m-menu-submenu-toggle="hover">
				<a href="javascript:;" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon flaticon-user-settings"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">Sales Kit</span>
						</span>
					</span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
				<div class="m-menu__submenu ">
					<span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
							<span class="m-menu__link">
								<span class="m-menu__link-text">Sales Kit</span>
							</span>
						</li>
						<li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
							<a href="{{url('salesProduct')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-title">
									<span class="m-menu__link-wrap">
										<span class="m-menu__link-text">Kit Products</span>
									</span>
								</span>
							</a>
						</li>
						<li class="m-menu__item  m-menu__item--active" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<a href="javascript:;" class="m-menu__link m-menu__toggle">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">Document Checklist</span>
								<i class="m-menu__ver-arrow la la-angle-right"></i>
							</a>
							<div class="m-menu__submenu ">
								<span class="m-menu__arrow"></span>
								<ul class="m-menu__subnav">
									<li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
										<a href="{{url('docCheckCategory')}}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">Category</span>
										</a>
									</li>
									<li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
										<a href="{{url('docCheckProduct')}}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">Product</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="m-menu__item  m-menu__item--active" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<a href="javascript:;" class="m-menu__link m-menu__toggle">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">Marketing Information</span>
								<i class="m-menu__ver-arrow la la-angle-right"></i>
							</a>
							<div class="m-menu__submenu ">
								<span class="m-menu__arrow"></span>
								<ul class="m-menu__subnav">
									<li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
										<a href="{{url('salesContest')}}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">Team Contests</span>
										</a>
									</li>
									<li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
										<a href="{{url('customerScheme')}}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">Customer Schemes</span>
										</a>
									</li>
									<li class="m-menu__item  m-menu__item--active" aria-haspopup="true" m-menu-submenu-toggle="hover">
										<a href="javascript:;" class="m-menu__link m-menu__toggle">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">Marketing Visual</span>
											<i class="m-menu__ver-arrow la la-angle-right"></i>
										</a>
										<div class="m-menu__submenu ">
											<span class="m-menu__arrow"></span>
											<ul class="m-menu__subnav">
												<li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
													<a href="{{url('visualCategory')}}" class="m-menu__link ">
														<i class="m-menu__link-bullet m-menu__link-bullet--dot">
															<span></span>
														</i>
														<span class="m-menu__link-text">Category</span>
													</a>
												</li>
												<li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
													<a href="{{url('marketingVisuals')}}" class="m-menu__link ">
														<i class="m-menu__link-bullet m-menu__link-bullet--dot">
															<span></span>
														</i>
														<span class="m-menu__link-text">Visuals</span>
													</a>
												</li>
											</ul>
										</div>
									</li>
								</ul>
							</div>
						</li>
						<li class="m-menu__item  m-menu__item--active" aria-haspopup="true" m-menu-submenu-toggle="hover">
							<a href="javascript:;" class="m-menu__link m-menu__toggle">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">DSA</span>
								<i class="m-menu__ver-arrow la la-angle-right"></i>
							</a>
							<div class="m-menu__submenu ">
								<span class="m-menu__arrow"></span>
								<ul class="m-menu__subnav">
									<li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
										<a href="{{url('dsaList')}}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">Onboarding Detail</span>
										</a>
									</li>
									<li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
										<a href="{{url('corporateList')}}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">Corporate Presentation</span>
										</a>
									</li>
									<li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
										<a href="{{url('dsaLead')}}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">DSA Lead</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</li>
			<!-- <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
				<a href="{{url('docCheckCategory')}}" class="m-menu__link ">
					<i class="m-menu__link-icon flaticon-user-settings"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">Document Checklist Category</span>
						</span>
					</span>
				</a>
			</li>
			<li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
				<a href="{{url('docCheckProduct')}}" class="m-menu__link ">
					<i class="m-menu__link-icon flaticon-user-settings"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">Document Checklist Product</span>
						</span>
					</span>
				</a>
			</li> -->
			<!-- <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
				<a href="{{url('salesContest')}}" class="m-menu__link ">
					<i class="m-menu__link-icon flaticon-user-settings"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">Team Contests</span>
						</span>
					</span>
				</a>
			</li>
			<li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
				<a href="{{url('customerScheme')}}" class="m-menu__link ">
					<i class="m-menu__link-icon flaticon-user-settings"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">Customer Schemes</span>
						</span>
					</span>
				</a>
			</li> -->
			<!-- <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
				<a href="{{url('visualCategory')}}" class="m-menu__link ">
					<i class="m-menu__link-icon flaticon-user-settings"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">Marketing Visual Category</span>
						</span>
					</span>
				</a>
			</li>
			<li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
				<a href="{{url('marketingVisuals')}}" class="m-menu__link ">
					<i class="m-menu__link-icon flaticon-user-settings"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">Marketing Visuals</span>
						</span>
					</span>
				</a>
			</li> -->
			<!-- <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
				<a href="{{url('dsaList')}}" class="m-menu__link ">
					<i class="m-menu__link-icon flaticon-user-settings"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">DSA Onboarding Details</span>
						</span>
					</span>
				</a>
			</li>
			<li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
				<a href="{{url('corporateList')}}" class="m-menu__link ">
					<i class="m-menu__link-icon flaticon-user-settings"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">Corporate Presentations</span>
						</span>
					</span>
				</a>
			</li> -->
		</ul>
	</div>

	<!-- END: Aside Menu -->
</div>