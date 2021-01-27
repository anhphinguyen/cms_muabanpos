<?php
$user_data = get_user_by_id($_SESSION['id_account']);
?>
<div id="header">
    <nav class="navbar navbar-fixed-top white-bg show-menu-full" id="nav" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn" href="javascript:void(0)"><i class="fa fa-bars" style="font-size:27px;"></i> </a>
            <form role="search" class="navbar-form-custom">
                <div class="form-group">
                    <div class="kform inq">
                        <div>
                            <label class="field append-icon">
                                <input type="text" name="search" id="search" class="gui-input" placeholder="Type your search here...">
                                <span class="field-icon">
                                    <i class="fa fa-search"></i>
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown hidden-xs">
                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                    <i class="fa fa-envelope"></i> <span class="label label-danger">4</span>
                </a>
                <ul class="dropdown-menu dropdown-messages">
                    <li>
                        <div class="dropdown-messages-box">
                            <a href="profile.html" class="pull-left animated animated-short fadeInUp">
                                <img alt="image" class="img-circle" src="https://placeholdit.imgix.net/~text?txtsize=33&txt=128%C3%97128&w=128&h=128">
                            </a>
                            <div class="animated animated-short fadeInUp">
                                <small class="pull-right">46h ago</small>
                                <strong>Alden Richards</strong> started following <strong>Maine Mendoza</strong>. <br>
                                <small class="text-muted">2 days ago at 6:58 pm - 08.06.2015</small>
                            </div>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <div class="dropdown-messages-box">
                            <a href="profile.html" class="pull-left animated animated-short fadeInUp">
                                <img alt="image" class="img-circle" src="https://placeholdit.imgix.net/~text?txtsize=33&txt=128%C3%97128&w=128&h=128">
                            </a>
                            <div class="animated animated-short fadeInUp">
                                <small class="pull-right text-navy">5h ago</small>
                                <strong>Paulo Ballesteros</strong> started following <strong>Alden Richards</strong>. <br>
                                <small class="text-muted">Yesterday 1:21 pm - 08.06.2015</small>
                            </div>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <div class="dropdown-messages-box">
                            <a href="profile.html" class="pull-left animated animated-short fadeInUp">
                                <img alt="image" class="img-circle" src="https://placeholdit.imgix.net/~text?txtsize=33&txt=128%C3%97128&w=128&h=128">
                            </a>
                            <div class="animated animated-short fadeInUp">
                                <small class="pull-right">23h ago</small>
                                <strong>Maine Mendoza</strong> love <strong>Alden Richards</strong>. <br>
                                <small class="text-muted">3 days ago at 2:30 am - 11.06.2015</small>
                            </div>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <div class="text-center link-block">
                            <a href="mailbox.html" class="animated animated-short fadeInUp">
                                <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="dropdown hidden-xs">
                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell"></i> <span class="label label-danger">5</span>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="mailbox.html" class="animated animated-short fadeInUp">
                            <div>
                                <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="profile.html" class="animated animated-short fadeInUp">
                            <div>
                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                <span class="pull-right text-muted small">12 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="grid_options.html" class="animated animated-short fadeInUp">
                            <div>
                                <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <div class="text-center link-block">
                            <a href="notifications.html" class="animated animated-short fadeInUp">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="dropdown pull-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                    <span class="pl15"> <?php echo $user_data['account_fullname'] ?> </span>
                    <span class="caret caret-tp"></span>
                </a>
                <ul class="dropdown-menu animated m-t-xs">
                    <li><a href="profile.html" class="animated animated-short fadeInUp"><i class="fa fa-user"></i> Profile</a></li>
                    <li><a href="contacts.html" class="animated animated-short fadeInUp"><i class="fa fa-group"></i> Contacts</a></li>
                    <li><a href="mailbox.html" class="animated animated-short fadeInUp"><i class="fa fa-inbox"></i> Mailbox</a></li>
                    <li class="divider"></li>
                    <li><a href="?mod=users&action=logout" class="animated animated-short fadeInUp"><i class="fa fa-sign-out"></i> Đăng xuất</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>