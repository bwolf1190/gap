@include('gaap.header')

<!-- Main -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9 col-sm-offset-2">

            <!-- column 2 -->
            <ul class="list-inline pull-right">
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">1. Is there a way..</a></li>
                        <li><a href="#">2. Hello, admin. I would..</a></li>
                        <li><a href="#"><strong>All messages</strong></a></li>
                    </ul>
                </li>
            </ul>
            <a href="#"><strong><i class="glyphicon glyphicon-dashboard"></i>  Dashboard</strong></a>
            <hr>

            <div class="row">
                <!-- center left-->
                <div class="col-md-6">
                    <!--<div class="well">Inbox Messages <span class="badge pull-right">3</span></div>-->

                    <hr>

                    <div class="btn-group btn-group-justified">
                        <a href="#" class="btn btn-primary col-sm-3">
                            <i class="glyphicon glyphicon-user"></i>
                            <br> Profile
                        </a>
                        <a href="/gaap/enrollments" class="btn btn-primary col-sm-3">
                            <i class="glyphicon glyphicon-usd"></i>
                            <br> Enrollments
                        </a>
                        <a href="/gaap/plans" class="btn btn-primary col-sm-3">
                            <i class="glyphicon glyphicon-flash"></i>
                            <br> Plans
                        </a>
                        <a href="/gaap/messages" class="btn btn-primary col-sm-3">
                            <i class="glyphicon glyphicon-question-sign"></i>
                            <br> Messages
                        </a>
                    </div>

                    <hr>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Reports</h4></div>
                        <div class="panel-body">

                            <small>Confirmed Enrollments</small>
                            <div class="progress">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: {{ $confirmed }}%">
                                    <span>{{ $confirmed }}%</span>
                                </div>
                            </div>
                            <small>Unconfirmed Enrollments</small>
                            <div class="progress">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $unconfirmed }}%">
                                    <span>{{ $unconfirmed }}%</span>
                                </div>
                            </div>
                            <small>Total</small>
                            <div class="progress">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: {{ $total }}%">
                                    <span>{{ $total }}</span>
                                </div>
                            </div>
                        </div>
                        <!--/panel-body-->
                    </div>
                    <!--/panel-->

                    <hr>

                    <!--tabs-->
                    <div class="panel">
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
                            <li><a href="#messages" data-toggle="tab">Messages</a></li>
                            <li><a href="#settings" data-toggle="tab">Settings</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active well" id="profile">
                                <h4><i class="glyphicon glyphicon-user"></i></h4> This is where we can have information about the business.
                                <p>Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis dolor, in sagittis nisi.</p>
                            </div>
                            <div class="tab-pane well" id="messages">
                                <h4><i class="glyphicon glyphicon-comment"></i> Most Recent</h4> 
                                <p>{{ $messages->last()->message }}</p>
                            </div>
                            <div class="tab-pane well" id="settings">
                                <h4><i class="glyphicon glyphicon-cog"></i></h4> Lorem settings dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
                                <p>Quisque mauris augue, molestie.</p>
                            </div>
                        </div>

                    </div>
                    <!--/tabs-->

                    <hr>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>New Requests</h4></div>
                        <div class="panel-body">
                            <div id="new-requests" class="list-group">
                                @foreach($messages as $message)
                                    <a href="#" class="list-group-item">{{ $message->message }}</a>
                                @endforeach
                                <!--<a href="#" class="list-group-item">Most recent service request..</a>
                                <a href="#" class="list-group-item">Second most recent request..</a>
                                <a href="#" class="list-group-item">Third most recent request..</a>-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--/col-->
                <hr>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Notices</h4></div>
                        <div class="panel-body">
                            <div class="alert alert-info">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                Welcome to your dashboard!
                            </div>
                            <p>This is a dashboard-style layout that uses Bootstrap. You can use this template as a starting point to create something more unique.</p>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Visits</th>
                                    <th>Bounces</th>
                                    <th>Source</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>45</td>
                                    <td>2.45%</td>
                                    <td>Direct</td>
                                </tr>
                                <tr>
                                    <td>289</td>
                                    <td>56.2%</td>
                                    <td>Referral</td>
                                </tr>
                                <tr>
                                    <td>98</td>
                                    <td>25%</td>
                                    <td>Direct</td>
                                </tr>
                                <tr>
                                    <td>..</td>
                                    <td>..</td>
                                    <td>..</td>
                                </tr>
                                <tr>
                                    <td>..</td>
                                    <td>..</td>
                                    <td>..</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <i class="glyphicon glyphicon-question-sign pull-right"></i>
                                <h4>Service Request</h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="/gaap/message" class="form form-vertical">
                                {{ csrf_field() }}
                                <div class="control-group">
                                    <label>Message</label>
                                    <div class="controls">
                                        <textarea id="message" name="message" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label></label>
                                    <div class="controls">
                                        <button type="submit" id="submit-request" class="btn btn-success">
                                            Post
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--/panel content-->
                    </div>
                    <!--/panel-->
                    <hr>
                    <!--<div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Engagement</h4></div>
                        </div>
                        <div class="panel-body">
                            <div class="col-xs-4 text-center"><img src="http://placehold.it/80/BBBBBB/FFF" class="img-circle img-responsive"></div>
                            <div class="col-xs-4 text-center"><img src="http://placehold.it/80/EFEFEF/555" class="img-circle img-responsive"></div>
                            <div class="col-xs-4 text-center"><img src="http://placehold.it/80/EEEEEE/222" class="img-circle img-responsive"></div>
                        </div>
                    </div>-->
                    <!--/panel-->

                </div>
                <!--/col-span-6-->

            </div>
            <!--/row-->

            <hr>

            <hr>
        <!--/col-span-9-->
    </div>
</div>
<!-- /Main -->
@include('gaap.footer')