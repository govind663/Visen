<div class="right-sidebar">
    <div class="sidebar-title">
        <h3 class="weight-600 font-16 text-blue">
            Layout Settings
            <span class="btn-block font-weight-400 font-12">User Interface Settings</span>
        </h3>
        <div class="close-sidebar" data-toggle="right-sidebar-close">
            <i class="icon-copy ion-close-round"></i>
        </div>
    </div>
    <div class="right-sidebar-body customscroll">
        <div class="right-sidebar-body-content">
            <h4 class="weight-600 font-18 pb-10">Header Background</h4>
            <div class="sidebar-btn-group pb-30 mb-10">
                <a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
                <a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
            </div>

            <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
            <div class="sidebar-btn-group pb-30 mb-10">
                <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light">White</a>
                <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
            </div>

            <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
            <div class="sidebar-radio-group pb-10 mb-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebaricon-1" name="menu-dropdown-icon"
                        class="custom-control-input" value="icon-style-1" checked="" />
                    <label class="custom-control-label" for="sidebaricon-1"><i
                            class="fa fa-angle-down"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebaricon-2" name="menu-dropdown-icon"
                        class="custom-control-input" value="icon-style-2" />
                    <label class="custom-control-label" for="sidebaricon-2"><i
                            class="ion-plus-round"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebaricon-3" name="menu-dropdown-icon"
                        class="custom-control-input" value="icon-style-3" />
                    <label class="custom-control-label" for="sidebaricon-3"><i
                            class="fa fa-angle-double-right"></i></label>
                </div>
            </div>

            <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
            <div class="sidebar-radio-group pb-30 mb-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-1" name="menu-list-icon"
                        class="custom-control-input" value="icon-list-style-1" checked="" />
                    <label class="custom-control-label" for="sidebariconlist-1"><i
                            class="ion-minus-round"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-2" name="menu-list-icon"
                        class="custom-control-input" value="icon-list-style-2" />
                    <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o"
                            aria-hidden="true"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-3" name="menu-list-icon"
                        class="custom-control-input" value="icon-list-style-3" />
                    <label class="custom-control-label" for="sidebariconlist-3"><i
                            class="dw dw-check"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-4" name="menu-list-icon"
                        class="custom-control-input" value="icon-list-style-4" checked="" />
                    <label class="custom-control-label" for="sidebariconlist-4"><i
                            class="icon-copy dw dw-next-2"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-5" name="menu-list-icon"
                        class="custom-control-input" value="icon-list-style-5" />
                    <label class="custom-control-label" for="sidebariconlist-5"><i
                            class="dw dw-fast-forward-1"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-6" name="menu-list-icon"
                        class="custom-control-input" value="icon-list-style-6" />
                    <label class="custom-control-label" for="sidebariconlist-6"><i
                            class="dw dw-next"></i></label>
                </div>
            </div>

            <div class="reset-options pt-30 text-center">
                <button class="btn btn-danger" id="reset-settings">
                    Reset Settings
                </button>
            </div>
        </div>
    </div>
</div>

<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('assets/backend/src/images/visen-logo.jpg') }}" alt="" class="dark-logo" style="height: 80% !important; width:60px !important;"/>
            <img src="{{ asset('assets/backend/src/images/visen-logo.jpg') }}" alt="" class="light-logo" style="height: 80% !important; width:60px !important;"/>
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="dropdown-toggle no-arrow {{ ($currentRoute === 'admin.dashboard') ? 'active' : '' }}">
                        <span class="micon fa fa-desktop"></span>
                        <span class="mtext">Dashboard</span>
                    </a>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-house"></span>
                        <span class="mtext">Home</span>
                    </a>
                    <ul class="submenu
                    {{ ($currentRoute === 'banner.index') || ($currentRoute === 'banner.create') || ($currentRoute === 'banner.edit')
                    || ($currentRoute === 'counter.index') || ($currentRoute === 'counter.create') || ($currentRoute === 'counter.edit')
                    || ($currentRoute === 'service.index') || ($currentRoute === 'service.create') || ($currentRoute === 'service.edit')
                    || ($currentRoute === 'sustainability.index') || ($currentRoute === 'sustainability.create') || ($currentRoute === 'sustainability.edit')
                    || ($currentRoute === 'customer.index') || ($currentRoute === 'customer.create') || ($currentRoute === 'customer.edit')
                    ? 'show' : '' }} ">
                        <li>
                            <a href="{{ route('banner.index') }}" class="{{ ($currentRoute === 'banner.index') || ($currentRoute === 'banner.create') || ($currentRoute === 'banner.edit') ? 'active' : '' }}">
                                Banner
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('counter.index') }}" class="{{ ($currentRoute === 'counter.index') || ($currentRoute === 'counter.create') || ($currentRoute === 'counter.edit') ? 'active' : '' }}">Counter</a>
                        </li>
                        <li>
                            <a href="{{ route('sustainability.index') }}" class="{{ ($currentRoute === 'sustainability.index') || ($currentRoute === 'sustainability.create') || ($currentRoute === 'sustainability.edit') ? 'active' : '' }}">Sustainability</a>
                        </li>
                        <li>
                            <a href="{{ route('customer.index') }}" class="{{ ($currentRoute === 'customer.index') || ($currentRoute === 'customer.create') || ($currentRoute === 'customer.edit') ? 'active' : '' }}">Customer</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-info-circle"></span>
                        <span class="mtext">About Visen</span>
                    </a>
                    <ul class="submenu {{
                        ($currentRoute === 'about-us.index') || ($currentRoute === 'about-us.create') || ($currentRoute === 'about-us.edit')
                        || ($currentRoute === 'meet-our-minds.index') || ($currentRoute === 'meet-our-minds.create') || ($currentRoute === 'meet-our-minds.edit')
                        || ($currentRoute === 'members.index') || ($currentRoute === 'members.create') || ($currentRoute === 'members.edit')
                        || ($currentRoute === 'group-policies.index') || ($currentRoute === 'group-policies.create') || ($currentRoute === 'group-policies.edit')
                        ? 'show' : '' }} ">
                        <li>
                            <a href="{{ route('about-us.index') }}" class="{{ ($currentRoute === 'about-us.index') || ($currentRoute === 'about-us.create') || ($currentRoute === 'about-us.edit') ? 'active' : '' }}">Introduction</a>
                        </li>
                        <li>
                            <a href="#" >Who we are</a>
                        </li>
                        <li>
                            <a href="#" >What we do</a>
                        </li>
                        <li>
                            <a href="#" >Where we are</a>
                        </li>
                        <li>
                            <a href="#" >Our Vision</a>
                        </li>
                        <li>
                            <a href="#" >Our Values</a>
                        </li>
                        <li>
                            <a href="#" >Our History</a>
                        </li>
                        <li>
                            <a href="#" >About our MD</a>
                        </li>
                        <li>
                            <a href="{{ route('meet-our-minds.index') }}" class="{{ ($currentRoute === 'meet-our-minds.index') || ($currentRoute === 'meet-our-minds.create') || ($currentRoute === 'meet-our-minds.edit') ? 'active' : '' }}">Team</a>
                        </li>
                        <li>
                            <a href="{{ route('members.index') }}" class="{{ ($currentRoute === 'members.index') || ($currentRoute === 'members.create') || ($currentRoute === 'members.edit') ? 'active' : '' }}">Members</a>
                        </li>
                        <li>
                            <a href="#" >Our Brands</a>
                        </li>
                        <li>
                            <a href="{{ route('group-policies.index') }}" class="{{ ($currentRoute === 'group-policies.index') || ($currentRoute === 'group-policies.create') || ($currentRoute === 'group-policies.edit') ? 'active' : '' }}">Group Policies</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-bag-check"></span>
                        <span class="mtext">Markets & Products</span>
                    </a>
                    <ul class="submenu {{
                        ($currentRoute === 'market-introduction.index') || ($currentRoute === 'market-introduction.create') || ($currentRoute === 'market-introduction.edit')
                        || ($currentRoute === 'industry.index') || ($currentRoute === 'industry.create') || ($currentRoute === 'industry.edit')
                        || ($currentRoute === 'product-filter.index') || ($currentRoute === 'product-filter.create') || ($currentRoute === 'product-filter.edit')
                        || ($currentRoute === 'product.index') || ($currentRoute === 'product.create') || ($currentRoute === 'product.edit')
                        || ($currentRoute === 'industryDetails.index') || ($currentRoute === 'industryDetails.create') || ($currentRoute === 'industryDetails.edit')
                        || ($currentRoute === 'product-details.index') || ($currentRoute === 'product-details.create') || ($currentRoute === 'product-details.edit')
                        ? 'show' : '' }} ">
                        <li>
                            <a href="{{ route('market-introduction.index') }}" class="{{ ($currentRoute === 'market-introduction.index') || ($currentRoute === 'market-introduction.create') || ($currentRoute === 'market-introduction.edit') ? 'active' : '' }}" >Market Introduction</a>
                        </li>
                        <li>
                            <a href="{{ route('industry.index') }}" class="{{ ($currentRoute === 'industry.index') || ($currentRoute === 'industry.create') || ($currentRoute === 'industry.edit') ? 'active' : '' }}">Industry</a>
                        </li>
                        <li>
                            <a href="{{ route('product-filter.index') }}" class="{{ ($currentRoute === 'product-filter.index') || ($currentRoute === 'product-filter.create') || ($currentRoute === 'product-filter.edit') ? 'active' : '' }}">Product Filter</a>
                        </li>
                        <li>
                            <a href="{{ route('product.index') }}" class="{{ ($currentRoute === 'product.index') || ($currentRoute === 'product.create') || ($currentRoute === 'product-details.edit') ? 'active' : '' }}">Products</a>
                        </li>
                        <li>
                            <a href="{{ route('industryDetails.index') }}" class="{{ ($currentRoute === 'industryDetails.index') || ($currentRoute === 'industryDetails.create') || ($currentRoute === 'industryDetails.edit') ? 'active' : '' }}">Product Details</a>
                        </li>
                        <li>
                            <a href="{{ route('product-category.index') }}" class="{{ ($currentRoute === 'product-category.index') || ($currentRoute === 'product-category.create') || ($currentRoute === 'product-category.edit') ? 'active' : '' }}">
                                Product Category
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-lightbulb"></span>
                        <span class="mtext">Innovation</span>
                    </a>
                    <ul class="submenu {{
                        ($currentRoute === 'innovation-details.index') || ($currentRoute === 'innovation-details.create') || ($currentRoute === 'innovation-details.edit')
                        || ($currentRoute === 'features.index') || ($currentRoute === 'features.create') || ($currentRoute === 'features.edit')
                        || ($currentRoute === 'features-details.index') || ($currentRoute === 'features-details.create') || ($currentRoute === 'features-details.edit')
                        || ($currentRoute === 'statistics.index') || ($currentRoute === 'statistics.create') || ($currentRoute === 'statistics.edit')
                        ? 'show' : '' }}">
                        <li>
                            <a href="{{ route('innovation-details.index') }}" class="{{ ($currentRoute === 'innovation-details.index') || ($currentRoute === 'innovation-details.create') || ($currentRoute === 'innovation-details.edit') ? 'active' : '' }}">Innovation Details</a>
                        </li>
                        <li>
                            <a href="{{ route('features.index') }}" class="{{ ($currentRoute === 'features.index') || ($currentRoute === 'features.create') || ($currentRoute === 'features.edit') ? 'active' : '' }}">Features</a>
                        </li>
                        <li>
                            <a href="{{ route('features-details.index') }}" class="{{ ($currentRoute === 'features-details.index') || ($currentRoute === 'features-details.create') || ($currentRoute === 'features-details.edit') ? 'active' : '' }}">Feature Details</a>
                        </li>
                        <li>
                            <a href="{{ route('statistics.index') }}" class="{{ ($currentRoute === 'statistics.index') || ($currentRoute === 'statistics.create') || ($currentRoute === 'statistics.edit') ? 'active' : '' }}">Statistics</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-file-earmark-text"></span>
                        <span class="mtext">Investor Relations</span>
                    </a>
                    <ul class="submenu {{
                        ($currentRoute === 'annual-reports.index') || ($currentRoute === 'annual-reports.create') || ($currentRoute === 'annual-reports.edit')
                        || ($currentRoute === 'investors-contacts.index') || ($currentRoute === 'investors-contacts.create') || ($currentRoute === 'investors-contacts.edit')
                        ? 'show' : '' }}">
                        <li>
                            <a href="{{ route('annual-reports.index') }}" class="{{ ($currentRoute === 'annual-reports.index') || ($currentRoute === 'annual-reports.create') || ($currentRoute === 'annual-reports.edit') ? 'active' : '' }}">Annual Reports</a>
                        </li>
                        <li>
                            <a href="{{ route('investors-contacts.index') }}" class="{{ ($currentRoute === 'investors-contacts.index') || ($currentRoute === 'investors-contacts.create') || ($currentRoute === 'investors-contacts.edit') ? 'active' : '' }}">Investors Contacts</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-newspaper"></span>
                        <span class="mtext">News, Media & Events</span>
                    </a>
                    <ul class="submenu {{
                        ($currentRoute === 'news.index') || ($currentRoute === 'news.create') || ($currentRoute === 'news.edit')
                        || ($currentRoute === 'media.index') || ($currentRoute === 'media.create') || ($currentRoute === 'media.edit')
                        || ($currentRoute === 'events.index') || ($currentRoute === 'events.create') || ($currentRoute === 'events.edit')
                        ? 'show' : '' }}">
                        <li>
                            <a href="{{ route('news.index') }}" class="{{ ($currentRoute === 'news.index') || ($currentRoute === 'news.create') || ($currentRoute === 'news.edit') ? 'active' : '' }}">News</a>
                        </li>
                        <li>
                            <a href="{{ route('media.index') }}" class="{{ ($currentRoute === 'media.index') || ($currentRoute === 'media.create') || ($currentRoute === 'media.edit') ? 'active' : '' }}">Media</a>
                        </li>
                        <li>
                            <a href="{{ route('events.index') }}" class="{{ ($currentRoute === 'events.index') || ($currentRoute === 'events.create') || ($currentRoute === 'events.edit') ? 'active' : '' }}">Events</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-telephone"></span>
                        <span class="mtext">Contact Us</span>
                    </a>
                    <ul class="submenu {{
                        ($currentRoute === 'contact-information.index') || ($currentRoute === 'contact-information.create') || ($currentRoute === 'contact-information.edit')
                        || ($currentRoute === 'corporate-head-office.index') || ($currentRoute === 'corporate-head-office.create') || ($currentRoute === 'corporate-head-office.edit')
                        || ($currentRoute === 'factory-details.index') || ($currentRoute === 'factory-details.create') || ($currentRoute === 'factory-details.edit')
                        ? 'show' : '' }}">
                        <li>
                            <a href="{{ route('contact-information.index') }}" class="{{ ($currentRoute === 'contact-information.index') || ($currentRoute === 'contact-information.create') || ($currentRoute === 'contact-information.edit') ? 'active' : '' }}">Contact Information</a>
                        </li>
                        <li>
                            <a href="{{ route('corporate-head-office.index') }}" class="{{ ($currentRoute === 'corporate-head-office.index') || ($currentRoute === 'corporate-head-office.create') || ($currentRoute === 'corporate-head-office.edit') ? 'active' : '' }}">Corporate Head Office</a>
                        </li>
                        <li>
                            <a href="{{ route('factory-details.index') }}" class="{{ ($currentRoute === 'factory-details.index') || ($currentRoute === 'factory-details.create') || ($currentRoute === 'factory-details.edit') ? 'active' : '' }}">Factory Details</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>
