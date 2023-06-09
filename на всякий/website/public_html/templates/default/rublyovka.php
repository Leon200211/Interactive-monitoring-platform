<link rel="stylesheet" href="<?=SITE_URL?>templates/default/assets/src/css/modal.css">
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


        <div class="main-content">
            <div class="card-head">
                <span class="title-head">Рублёвский проспект</span>
                <span class="main-head">О проекте</span>
                <span class="main-head">Генплан</span>
                <span class="main-head">Ипотека</span>
                <span class="main-head">Расположения</span>
                <span class="main-head">Планировки</span>
            </div>
            <div class="container-fluid" style="position: relative">
                <div class="img-rublyovka" style="min-height: 629.438px; display: flex; flex-direction: column; position: relative">
                    <div class="building-selection_wrap" style="position: absolute">
                        <button class="back-btn" type="button" id="back-btn2" onclick="back_tomain()"><</button>
                        <button class="back-btn" type="button" id="back-btn1" hidden="true" onclick="back()"><</button>
                        <img src="<?=SITE_URL?>templates/default/assets/imgs/main-plan1.jpg" alt=""  class="rublyovka-img">

                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="2.0" x="0px" viewBox="0 0 1920 1080" class="building-selection">

                    <g class="visual_poly" ><polygon id="first_house" points="647.1,827.9 655.9,811.2 662.7,813.1 668.6,801.3 668.6,786.4 676.2,770.1 761.3,772.7
		761.3,797.6 761,816.8 697,816.1 690.5,827.4 731.4,844 732.5,871.5 722.1,887.3 647.1,855.5 	"></g>

                    <g class="visual_poly" ><polygon id="second_house" points="466.8,761.4 476.3,747.6 476.3,741 490.7,720.7 602.4,759.6 603.7,787.2 593.4,803.1
		504.8,771.5 498.9,778.4 571.9,804 574.5,831.6 563.8,846 452.2,806.3 448.9,780.5 462.6,760.2"></g>

                        <g class="visual_poly" ><polygon id="third_house" points="420.1,766.8 408.9,787.9 320.8,765.7 315.9,737.6 329.6,714.1 331.3,714.8 343.4,694.3 343.1,690.3
		356.6,667.3 443.9,688.2 447.5,717.6 436.6,736.5 416.1,731.4 415.8,726.1 372.5,716 363.8,731.1 392.1,738.1 395,733.8
		415.4,738.6 	"></g>

                        <g class="visual_poly"><polygon id="fourth_house" points="286.7,739.5 277.8,755.7 121.3,717.2 115.3,688.3 142.3,646.5 220.3,638 311.7,660
		316.8,688.3 308,703.7 221.3,682.8 180.3,686.7 281.2,711.3"></polygon></g>






                        <a href="home/floor">
                        <g class="floor_1house" hidden="true" id="1floor_1house"><polygon points="201,850 201,791 466,791 729,740 784,740 1120,740 1455,790 1705,790 1705,850 1455,850 1120,790 784,790 729,790 466,850 "></polygon></g>
                        <g class="floor_1house" hidden="true" id="2floor_1house"><polygon points="201,790 201,725 466,725 729,700 784,700 1120,700 1455,730 1705,730 1705,790 1455,790 1120,740 784,740 729,740 466,790 "></polygon></g>
                        <g class="floor_1house" hidden="true" id="3floor_1house"><polygon points="201,723.9 201,669 466,669 729,662 784,662 1120,662 1455,672 1705,670 1705,730 1455,728 1120,700 784,700 729,700 466,723.9 "></polygon></g>
                        <g class="floor_1house" hidden="true" id="4floor_1house"><polygon points="201,450 201,380 466,375 729,465 784,465 800,485 800,530 784,512 729,512 466,448 "></polygon></g>
                        <g class="floor_1house" hidden="true" id="5floor_1house"><polygon points="201,510 201,450 466,448 729,513 784,513 800,530 800,560 784,552 729,552 466,508 "></polygon></g>
                        <g class="floor_1house" hidden="true" id="6floor_1house"><polygon points="201,560 201,510 466,508 729,551 784,551 800,562 800,598 784,592 729,589 466,558 "></polygon></g>
                        <g class="floor_1house" hidden="true" id="7floor_1house"><polygon points="201,610 201,560 466,558 729,589 784,592 800,599 800,630 784,626 729,626 466,608 "></polygon></g>
                        <g class="floor_1house" hidden="true" id="8floor_1house"><polygon points="201,670 201,610 466,608 729,627 784,626 784,665 729,663 466,668 "></polygon></g>
                        <g class="floor_1house" hidden="true" id="1floor_1house2"><polygon points="1701,445 1701,380 1456,365 1125,470 1065,473 1053,485 1053,530 1065,520 1125,520 1456,438"></polygon></g>
                        <g class="floor_1house" hidden="true" id="2floor_1house2"><polygon points="1701,505 1701,445 1456,438 1125,518 1065,521 1053,530 1053,560 1065,560 1125,560 1456,498"></polygon></g>
                        <g class="floor_1house" hidden="true" id="3floor_1house2"><polygon points="1702,560 1702,506 1456,500 1125,560 1065,562 1053,562 1053,600 1065,595 1125,595 1456,558"></polygon></g>
                        <g class="floor_1house" hidden="true" id="4floor_1house2"><polygon points="1702,615 1702,560 1456,558 1125,594 1065,595 1053,602 1053,630 1065,625 1125,625 1456,618"></polygon></g>
                        <g class="floor_1house" hidden="true" id="5floor_1house2"><polygon points="1703,670 1703,614 1456,618 1125,624 1065,625 1065,660 1125,660 1456,673"></polygon></g></a>


                    </div>
                </div>
            </div>


            <script>
                        const building_selection = document.querySelector(".building-selection_wrap")
                        const first_house = document.getElementById("first_house")
                        const second_house = document.getElementById("second_house")
                        const third_house = document.getElementById("third_house")
                        const fourth_house = document.getElementById("fourth_house")
                        const floor_house = document.querySelectorAll(".floor_1house")
                        first_house.onclick = function () {
                            document.querySelector("#back-btn2").setAttribute('hidden', true)
                            document.querySelector(".rublyovka-img").setAttribute("src", "<?=SITE_URL?>templates/default/assets/imgs/first_house.jpg")
                            document.querySelectorAll(".floor_1house").forEach(function (ev) {
                                ev.onclick = ev.removeAttribute("hidden")
                            })
                            document.querySelectorAll(".visual_poly").forEach(function (el) {
                                el.onclick = el.setAttribute("hidden", true);
                            });
                            document.getElementById("back-btn1").removeAttribute("hidden")
                        }
                        function back(){
                            document.querySelector("#back-btn2").removeAttribute('hidden')
                            document.querySelector(".rublyovka-img").setAttribute("src", "<?=SITE_URL?>templates/default/assets/imgs/main-plan1.jpg")
                            document.querySelectorAll(".floor_1house").forEach(function (ev) {
                                ev.setAttribute("hidden", true)
                            })
                            document.querySelectorAll(".visual_poly").forEach(function (el) {
                                el.removeAttribute("hidden");
                            });
                            document.getElementById("back-btn1").setAttribute("hidden", true)
                        }
                        floor_house.forEach(function (e){
                           floor_house.onclick = function (eh){
                               eh.onclick = window.location.href = 'home/floor'  //подправить на нормальный переход
                           }
                        })
                        function back_tomain(){
                            window.location.href = '/projects'
                        }


                </script>
                <style>
                    .back-btn{
                        position: absolute; z-index: 999; top: 40px; left: 40px; font-size: 24px;
                        border: none;
                        background-color: white;
                        color: #007bfb;
                        width: 3%;
                        height: 5%;
                        border-radius: 35px;
                        transition: all .3s;
                    }
                    .back-btn:hover{
                        background-color: #007bfb;
                        color: white;
                        border-radius: 8px;
                        transition: all .3s;
                    }
                    .rublyovka-img{
                        position: relative;
                        width: 100%; border-radius: 50px; border: solid 4px #404E67; z-index: 1;
                    }
                    .building-selection{
                        position: absolute;
                        top: 0;
                        left: 0;
                        z-index: 2;
                        display: block;
                        width: 100%;
                        height: 100%;
                    }
                    polygon{
                        position: static;
                    }
                    .card-head{
                        display: flex;
                        justify-content: space-between;
                        margin-left: 80px;
                        margin-right: 65px;
                    }
                    .title-head{
                        font-size: 32px;
                    }
                    .main-head{
                        margin-top: 15px;
                        font-size: 20px;
                        color: rgba(101, 101, 101, 0.85);
                        cursor: pointer;
                    }

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
                    .floor_1house {
                        fill: rgba(0, 123, 251, 0.3);
                        stroke: #007bfb;
                        cursor: pointer;
                        transition: .3s;
                    }
                    .floor_1house:hover{
                        fill: rgba(0, 123, 251, .10);
                        transition: .3s;
                    }
                </style>

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
    .footer{
        margin-top: 200px;
    }
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
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"> </script>
<?php
require_once "include/footer.php";
?>
