<?php
require_once "include/head.php";
?>

<body>

<div class="wrapper">

    <?php
    require_once "include/header.php";
    ?>




    <div class="page-wrap">


        <?php
        require_once "include/asider.php";
        ?>

<!--        <a class="first-house a" href="#first-house"></a>-->
        <div class="main-content">
            <div class="container-fluid">
                <div class="img-rublyovka" style="min-height: 629.438px;">
                        <img src="<?=SITE_URL?>templates/default/assets/imgs/main-plan1.jpg" alt="" style="width: 100%; height: 800px; border-radius: 50px; border: solid 4px #404E67">
                    <div style="margin-top: -848px; ">
                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="2.0" x="0px" viewBox="0 0 1920 1080">

                    <g class="visual_poly"><polygon points="647.1,821.9 655.9,805.2 662.7,806.1 668.6,794.3 668.6,779.4 676.2,763.1 761.3,765.7
		761.3,790.6 761,809.8 697,809.1 690.5,820.4 731.4,837 732.5,864.5 722.1,880.3 647.1,849.5"></g>

                    <g class="visual_poly"><polygon points="466.8,761.4 476.3,747.6 476.3,741 490.7,720.7 602.4,759.6 603.7,787.2 593.4,803.1
		504.8,771.5 498.9,778.4 571.9,804 574.5,831.6 563.8,846 452.2,806.3 448.9,780.5 462.6,760.2"></g>

                        <g class="visual_poly"><polygon points="420.1,766.8 408.9,787.9 320.8,765.7 315.9,737.6 329.6,714.1 331.3,714.8 343.4,694.3 343.1,690.3
		356.6,667.3 443.9,688.2 447.5,717.6 436.6,736.5 416.1,731.4 415.8,726.1 372.5,716 363.8,731.1 392.1,738.1 395,733.8
		415.4,738.6 	"></g>

                        <g class="visual_poly"><polygon points="286.7,739.5 277.8,755.7 121.3,717.2 115.3,688.3 142.3,646.5 220.3,638 311.7,660
		316.8,688.3 308,703.7 221.3,682.8 180.3,686.7 281.2,711.3">
                    </svg>
                    </div>
                </div>
                <script>
                    function getPosition(e){
                        var x = y = 0;

                        if (!e) {
                            var e = window.event;
                        }

                        if (e.pageX || e.pageY){
                            x = e.pageX;
                            y = e.pageY;
                        } else if (e.clientX || e.clientY){
                            x = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
                            y = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
                        }

                        return {x: x, y: y}
                </script>
                <style>
                    .visual_poly {
                        fill: rgba(0, 123, 251, .40);
                        stroke: #007bfb;
                        cursor: pointer;
                        transition: .3s;
                    }
                    .visual_poly:hover{
                        fill: rgba(0, 123, 251, .10);
                        transition: .3s;
                    }
                    polygon{
                        position: absolute;
                        top: 0;
                    }
                    /*svg{*/
                    /*    position: absolute;*/
                    /*    z-index: 1000;*/
                    /*}*/
                    /*.visual_poly{*/
                    /*    fill: rgba(0,123,251, .24);*/
                    /*    stroke: #007bfb;*/
                    /*}*/
                    /*polygon{*/
                    /*    position: absolute;*/
                    /*    left: 295px;*/
                    /*    top: 492px;*/
                    /*    width: 107px;*/
                    /*    height: 105px;*/
                    /*    background: rgba(0, 0, 0, 0.53);*/
                    /*    z-index: 1000;*/
                    /*    cursor: pointer;*/
                    /*}*/
                </style>
            </div>
        </div>

        <aside class="right-sidebar">
            <div class="sidebar-chat" data-plugin="chat-sidebar">
                <div class="sidebar-chat-info">
                </div>
            </div>
        </aside>

        <div class="chat-panel" hidden>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <a href="javascript:void(0);"><i class="ik ik-message-square text-success"></i></a>
                    <span class="user-name">John Doe</span>
                    <button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="card-body">
                    <div class="widget-chat-activity flex-1">
                        <div class="messages">
                            <div class="message media reply">
                                <figure class="user--online">
                                    <a href="#">
                                        <img src="img/users/3.jpg" class="rounded-circle" alt="">
                                    </a>
                                </figure>
                                <div class="message-body media-body">
                                    <p>Epic Cheeseburgers come in all kind of styles.</p>
                                </div>
                            </div>
                            <div class="message media">
                                <figure class="user--online">
                                    <a href="#">
                                        <img src="img/users/1.jpg" class="rounded-circle" alt="">
                                    </a>
                                </figure>
                                <div class="message-body media-body">
                                    <p>Cheeseburgers make your knees weak.</p>
                                </div>
                            </div>
                            <div class="message media reply">
                                <figure class="user--offline">
                                    <a href="#">
                                        <img src="img/users/5.jpg" class="rounded-circle" alt="">
                                    </a>
                                </figure>
                                <div class="message-body media-body">
                                    <p>Cheeseburgers will never let you down.</p>
                                    <p>They'll also never run around or desert you.</p>
                                </div>
                            </div>
                            <div class="message media">
                                <figure class="user--online">
                                    <a href="#">
                                        <img src="img/users/1.jpg" class="rounded-circle" alt="">
                                    </a>
                                </figure>
                                <div class="message-body media-body">
                                    <p>A great cheeseburger is a gastronomical event.</p>
                                </div>
                            </div>
                            <div class="message media reply">
                                <figure class="user--busy">
                                    <a href="#">
                                        <img src="img/users/5.jpg" class="rounded-circle" alt="">
                                    </a>
                                </figure>
                                <div class="message-body media-body">
                                    <p>There's a cheesy incarnation waiting for you no matter what you palete preferences are.</p>
                                </div>
                            </div>
                            <div class="message media">
                                <figure class="user--online">
                                    <a href="#">
                                        <img src="img/users/1.jpg" class="rounded-circle" alt="">
                                    </a>
                                </figure>
                                <div class="message-body media-body">
                                    <p>If you are a vegan, we are sorry for you loss.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="javascript:void(0)" class="card-footer" method="post">
                    <div class="d-flex justify-content-end">
                        <textarea class="border-0 flex-1" rows="1" placeholder="Type your message here"></textarea>
                        <button class="btn btn-icon" type="submit"><i class="ik ik-arrow-right text-success"></i></button>
                    </div>
                </form>
            </div>
        </div>

        <?php
        require_once "include/page-footer.php";
        ?>

    </div>
</div>












<div class="modal fade apps-modal" id="appsModal" tabindex="-1" role="dialog" aria-labelledby="appsModalLabel" aria-hidden="true" data-backdrop="false">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ik ik-x-circle"></i></button>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="quick-search">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 ml-auto mr-auto">
                            <div class="input-wrap">
                                <input type="text" id="quick-search" class="form-control" placeholder="Search..." />
                                <i class="ik ik-search"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="container">
                    <div class="apps-wrap">
                        <div class="app-item">
                            <a href="#"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                        </div>
                        <div class="app-item dropdown">
                            <a href="#" class="dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-command"></i><span>Ui</span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-mail"></i><span>Message</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-users"></i><span>Accounts</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-shopping-cart"></i><span>Sales</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-briefcase"></i><span>Purchase</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-server"></i><span>Menus</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-clipboard"></i><span>Pages</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-message-square"></i><span>Chats</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-map-pin"></i><span>Contacts</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-box"></i><span>Blocks</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-calendar"></i><span>Events</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-bell"></i><span>Notifications</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-pie-chart"></i><span>Reports</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-layers"></i><span>Tasks</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-edit"></i><span>Blogs</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-settings"></i><span>Settings</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-more-horizontal"></i><span>More</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .card{
        cursor: pointer;
        border: 2px solid rgba(16, 15, 15, 0.15);
    }
    .card:hover{
        border: 2px solid #007bfb;
    }
    .card-header{
    }
    .card-body{
        border: none;
        padding: 0!important;
    }
    .card-text{
        padding: 20px 20px;
        font-size: 15px;
        color: grey;
    }
</style>
<script>

</script>
<?php
require_once "include/footer.php";
?>
