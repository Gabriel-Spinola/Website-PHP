<section class="content-box left w100">

    <div class="stats-box">

        <h2><i class="fa fa-home"></i> DashBoard - <?php print COMPANY_NAME ?></h2>

        <div class="stats-box-wrapper">

            <div class="stats-box-single">

                <h2>Online Users</h2>
                <p>10</p>

            </div><!--stats-box-single-->

            <div class="stats-box-single">

                <h2>Visits Total</h2>
                <p>100</p>

            </div><!--stats-box-single-->

            <div class="stats-box-single">

                <h2>Today's Visits</h2>
                <p>3</p>

            </div><!--stats-box-single-->

        </div><!--stats-box-wrapper-->

    </div><!--stats-box-->

</section><!--content-box-->

<section class="content-box left w100">
    
    <div class="stats-box">

        <h2><i class="fa fa-user" aria-hidden="true"></i> DashBoard - <?php print COMPANY_NAME ?></h2>

        <table class="users-table">

            <thead class="col">

                <th>IP</th>
                <th>Last Action</th>

            </thead>

            <?php for($i = 0; $i < 10; $i++): ?>

                <tbody class="col">

                    <td>199.199.199.199</td>
                    <td>18/01/2021 6:46PM</td>

                </tbody>

            <?php endfor ?>

        </table>

    </div><!--stats-box-->

</section><!--content-box-->

<div class="clear"></div> 