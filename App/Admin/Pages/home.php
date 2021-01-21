<?php 

    $UserStatsManager = new UserStatsManager(new MySqlDataBase);
    $VisitsManager = new VisitsManager(new MySqlDataBase);
    $Admin = new Admin(new MySqlDataBase);

    $onlineUsers = $UserStatsManager -> getOnlineUsersList();
    $dashboardUsers = $Admin -> getDashboardUsers();

?>

<section class="content-box left w100">

    <div class="stats-box">

        <h2><i class="fa fa-home"></i> DashBoard - <?php print COMPANY_NAME ?></h2>

        <div class="stats-box-wrapper">

            <div class="stats-box-single">

                <h2>Online Users</h2>
                <p><?php print count($onlineUsers) ?></p>

            </div><!--stats-box-single-->

            <div class="stats-box-single">

                <h2>Visits Total</h2>
                <p><?php print $VisitsManager -> getVisitsList() ?></p>

            </div><!--stats-box-single-->

            <div class="stats-box-single">

                <h2>Today's Visits</h2>
                <p><?php print $VisitsManager -> getDiaryVisitsList() ?></p>

            </div><!--stats-box-single-->

        </div><!--stats-box-wrapper-->

    </div><!--stats-box-->

</section><!--content-box-->

<section class="content-box left w100">
    
    <div class="stats-box">

        <h2><i class="fa fa-archive" aria-hidden="true"></i> DashBoard Users</h2>

        <table class="users-table">

            <thead class="col">

                <th>Name</th>
                <th>Position</th>

            </thead>

            <?php foreach($dashboardUsers as $key => $row): ?>

                <tbody class="col">

                    <td><?php print $row['name'] ?></td>

                    <!--?convert the date/time method?-->
                    <td><?php print Admin :: getPosition($row['position']) ?></td>

                </tbody>

            <?php endforeach ?>

        </table>

    </div><!--stats-box-->

</section><!--content-box-->

<section class="content-box left w100">
    
    <div class="stats-box">

        <h2><i class="fa fa-user" aria-hidden="true"></i> Online Users info</h2>

        <table class="users-table">

            <thead class="col">

                <th>IP</th>
                <th>Last Action</th>

            </thead>

            <?php foreach($onlineUsers as $key => $row): ?>

                <tbody class="col">

                    <td><?php print $row['ip'] ?></td>

                    <!--?convert the date/time method?-->
                    <td><?php print date('d/m/Y H:i:s', strtotime($row['last_action'])) ?></td>

                </tbody>

            <?php endforeach ?>

        </table>

    </div><!--stats-box-->

</section><!--content-box-->

<div class="clear"></div> 